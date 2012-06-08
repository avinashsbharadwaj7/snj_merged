<?php
class UploadexcelrecordsController extends AppController {
        
	var $name = 'Uploadexcelrecords';
        var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
        var $components = array('Session');
        
        function uploadrecords()
        {
            if (!empty($this->data)) 
            {
              if(isset($this->data['Irndsfile'])) 
              {
                 //save all valid uploads
                 $this->saveUploadState('Irndsfile');
              }  
                 if($this->Uploadexcelrecord->saveAll($this->data)) 
                 {  /* validation passes */
                     $this->Session->setFlash("File Uploaded : ". $this->data['Irndsfile'][0]['file']['name']); 
                     //echo $this->data['Irndsfile'][0]['file']['name'];
                     
                     /*Now, parse the records*/
                     if($this->data['Uploadexcelrecord']['filetype'] === "Post Activity Check")
                     {    
                     $result = $this->__parseRecordspac($this->Uploadexcelrecord->id);                     
                     }
                     elseif($this->data['Uploadexcelrecord']['filetype'] === "Market Launch")
                     {    
                     $result = $this->__parseRecordsml($this->Uploadexcelrecord->id);                     
                     }
                             
                     //$this->set('exceldata', $data);     
                     $this->redirect(array('controller'=>'ir_modules', 'action' => 'index'));                                                         
                     //var_dump($this->data['Irndsfile']);                     
                 }
                 else 
                 {    
                     $this->Session->setFlash(__('File not saved, Please try again', true));
                 }
              
            }
            else 
            {
                 $this->deleteUploadState('Irndsfile');
            }   
        }
        
        private function __parseRecordspac($fileID){
            $dirPath = $this->Uploadexcelrecord->Irndsfile->getUploadPath();
            $fileName = $this->Uploadexcelrecord->Irndsfile->getFileName($fileID, 0);
            //var_dump($this->data['Irndsfile'][0]['file']['tmp_name']);
            //debug($this->data);
            //$folder = "C:\\wamp\\repository\\irndstmp\\ABC.xls";
            //$folder = "C:" .DS. "wamp" . DS . "repository" . DS . "irndstmp";
                        
            //move_uploaded_file($this->data['Irndsfile'][0]['file']['tmp_name'], $folder);
            
            App::import('Vendor', 'php-excel-reader/reader2');
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP1251');
            $data->read("C:\\wamp\\repository\\irnds\\".$fileName['Irndsfile']['file_name']);
            //$data->read("/irt/app/webroot/files/irndsupload/".$fileName['Irndsfile']['file_name']);
            $rows = $data->sheets[0]['cells'];
            $map = $this->map();
            $i=0;
            $exceldata = array();
            foreach($rows as $row){
                if ($row[1] === "SITE")
                    continue;                
                $temp = null;
                $j=1;
                foreach($row as $column){                    
                    $temp[$map[$j++]] = $column;
                }
                $exceldata[$i] = $temp;
                $i++;
            }
            $this->__SaveDatapac($exceldata);                       
        }
        
    private function __SaveDatapac($exceldata){        
        App::import('model', 'Ndsdetail');
        $ndsdetails = new Ndsdetail();
        Configure::write('debug', 0);
        foreach($exceldata as $record)
        {   
            $ndsdetails->saveAll($record);        
        }    
    }
        private function __parseRecordsml($fileID){
            $dirPath = $this->Uploadexcelrecord->Irndsfile->getUploadPath();
            $fileName = $this->Uploadexcelrecord->Irndsfile->getFileName($fileID, 0);
            //var_dump($this->data['Irndsfile'][0]['file']['tmp_name']);
            //debug($this->data);
            //$folder = "C:\\wamp\\repository\\irndstmp\\ABC.xls";
            //$folder = "C:" .DS. "wamp" . DS . "repository" . DS . "irndstmp";
                        
            //move_uploaded_file($this->data['Irndsfile'][0]['file']['tmp_name'], $folder);
            
            App::import('Vendor', 'php-excel-reader/reader2');
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP1251');
            $data->read("C:\\wamp\\repository\\irnds\\".$fileName['Irndsfile']['file_name']);
            //$data->read("/irt/app/webroot/files/irndsupload/".$fileName['Irndsfile']['file_name']);
            $rows_p1 = $data->sheets[0]['cells'];          
            $rows_p2 = $data->sheets[1]['cells'];          
            $rows_p3 = $data->sheets[2]['cells'];          
            $map_1 = $this->map_1();
            $map_2 = $this->map_2();
            $map_3 = $this->map_3();
            $i=0;
            $exceldata_1 = array();
            $exceldata_2 = array();
            $exceldata_3 = null;
            
            foreach($rows_p1 as $row_1){
                if ($row_1[1] === "Site")
                    continue;
                $temp = null;
                $j=1;
                foreach($row_1 as $column_1){                    
                    $temp[$map_1[$j++]] = $column_1;
                }
                $exceldata_1[$i] = $temp;
                $i++;
            }
            $i=0;
            foreach($rows_p2 as $row_2){
                if ($row_2[1] === "Site")
                    continue;
                $temp = null;
                $j=1;
                foreach($row_2 as $column_2){                    
                    $temp[$map_2[$j++]] = $column_2;
                }
                $exceldata_2[$i] = $temp;
                $i++;
            }
            $i=0;
            for($i=3; $i <= count($rows_p3); $i++){
                $countr = count($rows_p3[$i]);
                for($j=1; $j <= $countr; $j++){
                    if(isset($rows_p3[$i][$j]))
                        $exceldata_3[$i-3][$map_3[$j]] = $rows_p3[$i][$j];     
                    else $countr++;
                }
            }
            $this->__SaveDataml_1($exceldata_1);                               
            $this->__SaveDataml_2($exceldata_2);                               
            $this->__SaveDataml_3($exceldata_3);                               
        }
        
    private function __SaveDataml_1($exceldata_1){  
        App::import('model', 'Marketlaunchinfo');
        $mlaunchinfo = new Marketlaunchinfo();
        Configure::write('debug', 0);
        foreach($exceldata_1 as $record_1)
        {   
            $mlaunchinfo->saveAll($record_1);        
        }    
    }

    private function __SaveDataml_2($exceldata_2){  
        App::import('model', 'Sitelaunchedocn');
        $slaunchinfo = new Sitelaunchedocn();
        Configure::write('debug', 0);
        foreach($exceldata_2 as $record_2)
        {   
            $slaunchinfo->saveAll($record_2);        
        }    
    }

    private function __SaveDataml_3($exceldata_3){   
        App::import('model', 'Sitelaunchedalarm');
        $slaunchalm = new Sitelaunchedalarm();
        Configure::write('debug', 0);
        for($k=0; $k < count($exceldata_3); $k++){                       
           $slaunchalm->saveAll($exceldata_3[$k]);         
        }
    }
    
    function map(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'market',5 => 'oss',
            6 => 'sonarport',7 => 'utranengg', 8 => 'rfpm',9 => 'comments'
         );
    }
    
    function map_1(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'carrier', 5=>'cellstatus' ,6 => 'alarms',
            7 => 'ocnsstatus',8 => 'launchdate', 9 => 'ndsengg',10 => 'oss', 11 => 'sonarport', 
            12 => 'poc', 13 => 'comments'
         );
    }

    function map_2(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'reason',5 => 'personapproved'
            );
    }

    function map_3(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'date',5 => 'severity',
            6 => 'problem',7 => 'cause', 8 => 'mo_ref',9 => 'personapproved'
         );
    }

}
?>