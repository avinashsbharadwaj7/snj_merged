<?php

/*
 * LTE (Bulk Records Upload) Controller
 *
 */

class BulkLteRecordsController extends AppController {

    var $name = 'BulkLteRecords';
    var $helpers = array('Html', 'Form', 'DatabaseFields', 'ShowFields', 'DatePicker');
    var $components = array('Session', 'Email');
    
    // Excel reader vars
    var $exceptionMsg = '';
    var $compSheetName = 'TEMPLATE';
    
    function bulkupload() {
        if(!empty($this->data)) {
            $this->BulkLteRecord->create();
            if(isset($this->data['BulkLteFile'])) {
                //save the upload
                $this->saveUploadState('BulkLteFile');
            }
            if($this->BulkLteRecord->saveAll($this->data)) {
                //validation passes
                //parse the file
                $result = $this->__parseRecords($this->BulkLteRecord->id);
                if($result >= 0) {
                    //Attempt to save the individual records
                    App::import('model', 'Litmaster');
                    $litmasters = new Litmaster();
                    $failArray = array();
                    foreach($this->data['Litmaster'] as $index => $record) {
                        //first check validation
                        $data['Litmaster'] = $record;
                        $litmasters->set($record);
                        if(!$litmasters->validates()) {
                            array_push($failArray, $index + 2);
                        }
                    }
                    if(count($failArray) == 0) {
                        //validation passes
                        $failArray = array();
                        foreach($this->data['Litmaster'] as $index => $record) {
                            //now save
                            $litmasters->create();
                            $data['Litmaster'] = $record;
                            if(!$litmasters->save($record)) {
                                array_push($failArray, $index + 2);
                            }
                        }
                        if(count($failArray) > 0) {
                            //at least some records didn't save for some reason
                            $outMsg = '<BR>--' . count($failArray) . ' records cound not be saved<BR>--Records (Row #):';
                            foreach($failArray as $record) {
                                $outMsg .= $record . ' ';
                            }
                        }
                        else {
                            $outMsg = '<BR>--' . count($this->data['Litmaster']) . ' records added';
                        }
                        $this->Session->setFlash("Records have been extracted and saved" . $outMsg);
                    }
                    else {
                        $outMsg = '<BR>--' . count($failArray) . ' records cound not be validated<BR>--Records (Row #):';
                        foreach($failArray as $record) {
                            $outMsg .= $record . ' ';
                        }
                        $this->Session->setFlash("Records have NOT been saved" . $outMsg);
                    }
                }
                else {
                   $this->Session->setFlash("Records could not be extracted from Template (Template file saved)<BR>--" . $this->exceptionMsg); 
                }
                $this->deleteUploadState('BulkLteFile');
                $this->redirect(array('controller' => 'litmasters', 'action' => 'index'));
            } 
            else {
		$this->Session->setFlash(__('Records could not be saved. Please try again.', true));
            }
        }
        else {
            $this->deleteUploadState('BulkLteFile');
        }
        //var_dump($this->data);
    }
    
    private function __parseRecords($fileID) {
        $dirPath = $this->BulkLteRecord->BulkLteFile->getUploadPath();
        $fileName = $this->BulkLteRecord->BulkLteFile->getFileName($fileID, 0);
        if(is_array($fileName) && isset($fileName['BulkLteFile']) && is_array($fileName['BulkLteFile'])) {
            //returned a hit
            $fileName = $fileName['BulkLteFile']['file_name'];
        }
        App::import('Vendor', 'php-excel/Classes/phpexcel', array('file' => 'PHPExcel.php'));
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory;
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod);
        try {
            //file load
            $fileType = PHPExcel_IOFactory::identify($dirPath . DS . $fileName);
            $reader = PHPExcel_IOFactory::createReader($fileType);
            if($fileType != 'CSV') {
                $reader->setReadDataOnly(true);
                $reader->setLoadSheetsOnly($this->compSheetName);
            }
            $records = $reader->load($dirPath . DS . $fileName);
        }
        catch(Exception $e) {
            $this->exceptionMsg = $e->getMessage();
            return -2;
        }
        if($fileType != 'CSV' && ($records->getSheetCount() == 0 || strtoupper($records->getActiveSheet()->getTitle()) != $this->compSheetName)) {
            //invalid loaded sheet for preCheck
            $this->exceptionMsg = "Cannot find sheet: " . $this->compSheetName;
            return -3;
        }
        //now the file should be loaded, so lets start some serious parsing action
        $highestColumn = $records->getActiveSheet()->getHighestColumn();
        $highestRow = $records->getActiveSheet()->getHighestRow();
        $highestColumn++;
        $data = array();
        $columns = array();
        //first we straight-up parse, then we derive other fields later on
        //grab field (column) names
        for($column = 'A'; $column != $highestColumn; $column++) {
            //parse down each column
            $currentValue = $records->getActiveSheet()->getCell($column . '1')->getValue();
            $columns[$column] = $currentValue;
        }
        for($column = 'A'; $column != $highestColumn; $column++) {
            //parse down each column
            for($row = 2; $row < $highestRow + 1; $row++) {
                //parse each row for the current field
                $currentValue = $records->getActiveSheet()->getCell($column . $row)->getValue();
                $data[$row - 2][$columns[$column]] = trim($currentValue);
            }
        }
        //derive the other values
        for($row = 0; $row < count($data); $row++) {
            if(isset($data[$row]['engineer_signum'])) {
                App::import('model', 'User');
                $users = new User();
                $user = $users->find('first', array('conditions' => array('User.username' => $data[$row]['engineer_signum'])));
                $nameConcat = $user['User']['first_name'] . ' ' . $user['User']['last_name'];
                if($nameConcat != ' ') {
                    $data[$row]['engineer_name'] = $nameConcat;
                }
                else {
                   $data[$row]['engineer_name'] = $data[$row]['engineer_signum'];
                }
            }
            $data[$row]['team_name'] = 'NI';
            $data[$row]['date_initiated'] = date("Y-m-d");
        }
        $this->data['Litmaster'] = $data;
        return 0;
    }
}

?>
