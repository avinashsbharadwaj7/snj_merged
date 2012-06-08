<?php
class WcdmaSiadRecordsController extends AppController {
        
	var $name = 'WcdmaSiadRecords';
        var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
        var $components = array('Session');        
        var $uses = array('WcdmaSiadRecord', 'WcdmaSiadFile', 'WcdmaSiadSupport');
        
        function index(){
            
        }
        
        function add(){
            if (!empty($this->data)){
              $this->WcdmaSiadRecord->create();
              if(isset($this->data['WcdmaSiadFile'])){
                 //save all valid uploads
                 $this->saveUploadState('WcdmaSiadFile');
              } 
                 if($this->WcdmaSiadRecord->saveAll($this->data)){
                     $this->Session->setFlash("File Uploaded : ". $this->data['WcdmaSiadFile'][0]['file']['name']); 
                     /*Now, parse the records*/                        
                     $result = $this->__parseRecords($this->WcdmaSiadRecord->id);                                          
                     $this->redirect(array('controller'=>'wcdma_siad_records', 'action' => 'index'));                     
                 }
                 else{    
                     $this->Session->setFlash(__('Data not saved, Please try again', true));
                 }              
            }
            else{
                 $this->deleteUploadState('WcdmaSiadFile');
            }               
        }        
    
        private function __parseRecords($fileID){  
            $siadsplit = array(12 => 'signum_siadconfig', 13 => 'status_siadconfig',14 => 'date_siadconfig', 15 => 'remarks_siadconfig');
            $pturnsplit = array(16 => 'signum_portsturnup', 17 => 'status_portsturnup',18 => 'date_portsturnup', 19 => 'remarks_portsturnup');
            $tssplit = array(20 => 'signum_trouble_shooting', 21 => 'status_trouble_shooting', 22 => 'date_trouble_shooting', 23 => 'remarks_trouble_shooting');
            $statussplit = array(24 => 'signum_status_checks', 25 => 'status_status_checks',26 => 'date_status_checks', 27 => 'remarks_status_checks');
            $othersplit = array(28 => 'signum_others', 29 => 'status_others',30 => 'date_others', 31 => 'remarks_others');                       
            
            $dirPath = $this->WcdmaSiadRecord->WcdmaSiadFile->getUploadPath();
            $fileName = $this->WcdmaSiadRecord->WcdmaSiadFile->getFileName($fileID, 0);
            App::import('Vendor', 'php-excel-reader/reader2');
            $data = new Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('CP1251');
            //$data->read("C:\\wamp\\repository\\wcdma_siad\\".$fileName['WcdmaSiadFile']['file_name']);            
            $data->read("/irt/app/webroot/files/wcdma_siad/".$fileName['WcdmaSiadFile']['file_name']);
            $rows = $data->sheets[0]['cells'];  
            $map = $this->map();
            $i=0;
            $exceldata = array();
            $reportsCount = 0;
            for($i=3; $i <= count($rows); $i++){
                $k=-1;
                for($j=1; $j <= count($map); $j++){
                    if($j>=12 && $j<32){
                        if(isset($rows[$i][$j])){
                            if(($j%4) == 0){
                                $k++;
                                $tempAct = $map[$j];
                                $temp["SiadActivity"][$k]["activity"] = $this->__getActivity($tempAct);
                                $temp["SiadActivity"][$k]["signum"] = $rows[$i][$j];
                            }
                            if($j%4 == 1)
                                $temp["SiadActivity"][$k]["status"] = $rows[$i][$j];
                            if($j%4 == 2)
                                $temp["SiadActivity"][$k]["date"] = $this->__changeDateFormat($rows[$i][$j]);
                            if($j%4 == 3){
                                $temp["SiadActivity"][$k]["remarks"] = $rows[$i][$j];
                            }
                        }
                     }else{
                        if(isset($rows[$i][$j])){                            
                            $temp[$map[$j]] = $rows[$i][$j];                        
                        }
                     }
                  }
                  if(isset($temp["SiadActivity"])){
                  foreach($temp["SiadActivity"] as $report){                      
                      $exceldata[$reportsCount] = $temp;                                             
                      foreach($report as $key => $value){
                          $exceldata[$reportsCount][$key] =  $value;       //Duplicating rows w.r.t different activities..                  
                      }                      
                      unset($exceldata[$reportsCount]["SiadActivity"]);    //to unset the reduntant array..  
                      $exceldata[$reportsCount]['wcdma_siad_record_id'] = $fileID;                
                      $reportsCount++;
                  }
                  unset($temp);
                }
            }              
            $this->__savedata($exceldata); 
        }
        
        function __getActivity($fieldName){
            switch($fieldName){
                case "signum_siadconfig": return "SIAD Configuration";
                case "signum_portsturnup": return "Ports Turn Up";
                case "signum_trouble_shooting": return "Troubleshooting";
                case "signum_status_checks": return "Status Check";
                case "signum_others": return "Other";
            }
        }
        
        function map(){
            return array(
            1 => 'site_id', 2 => 'market',3 => 'region',4 => 'siad_clli',5 => 'siad_oam',
            6 => 'node_name',7 => 'rnc_clli', 8 => 'edp_ciq',9 => 'received_date', 10 => 'with_script', 11 => 'network_number',
            12 => 'signum_siadconfig', 13 => 'status_siadconfig',14 => 'date_siadconfig', 15 => 'remarks_siadconfig',
            16 => 'signum_portsturnup', 17 => 'status_portsturnup',18 => 'date_portsturnup', 19 => 'remarks_portsturnup',                
            20 => 'signum_trouble_shooting', 21 => 'status_trouble_shooting', 22 => 'date_trouble_shooting', 23 => 'remarks_trouble_shooting',                
            24 => 'signum_status_checks', 25 => 'status_status_checks',26 => 'date_status_checks', 27 => 'remarks_status_checks',                
            28 => 'signum_others', 29 => 'status_others',30 => 'date_others', 31 => 'remarks_others',                
            32 =>'additional_information'
         );
        }
        
        private function __savedata($exceldata){                      
            App::import('model', 'WcdmaSiadSupport');
            $siadrecord = new WcdmaSiadSupport();
            Configure::write('debug', 0);
            foreach($exceldata as $record){               
                ini_set('max_execution_time', 600);
                $siadrecord->saveAll($record);                
             }    
        }

        /*Search Records*/
        function search(){            
            if (empty($this->data)) {
                $this->set('searchRendered', false);
            }
            if(empty($this->passedArgs) && empty($this->data)){
                $this->Session->delete("WcdmaSiadSupportSearchData");
            }
            if(!empty($this->passedArgs) && empty($this->data)){
                $this->data = $this->Session->read("WcdmaSiadSupportSearchData");
            }
            if(!empty($this->data)){
                $this->Session->write("WcdmaSiadSupportSearchData", $this->data);
                $this->set('searchRendered', true);                  
                $conditions = $this->__getConditions($this->data['WcdmaSiadRecord']);
                $this->paginate = array('WcdmaSiadSupport' => array('limit' => 20,'page' => 1,'order' => array('WcdmaSiadSupport.id' => 'asc')));
                $this->set('siadquery', $this->paginate("WcdmaSiadSupport", $conditions));
            }                
        }

        function __getConditions($data){    
            $conditions = array();
            if(!$this->__isEmpty($data['site_id'])){
                $conditions['WcdmaSiadSupport.site_id'] = $data['site_id'];
            }
            if(!$this->__isEmpty($data['network_number'])){
                $conditions['WcdmaSiadSupport.network_number'] = $data['network_number'];
            }
            if(!$this->__isEmpty($data['market'])){
                $conditions['WcdmaSiadSupport.market'] = $data['market'];
            }
            if(!$this->__isEmpty($data['node_name'])){
                $conditions['WcdmaSiadSupport.node_name'] = $data['node_name'];
            }
            if(!$this->__isEmpty($data['region'])){
                $conditions['WcdmaSiadSupport.region'] = $data['region'];
            }            
            if(!$this->__isEmpty($data['activity'])){
                $conditions['WcdmaSiadSupport.activity'] = $data['activity'];
            }
            if(!$this->__isEmpty($data['siad_oam'])){
                $conditions['WcdmaSiadSupport.siad_oam'] = $data['siad_oam'];
            }
            if(!$this->__isEmpty($data['siad_clli'])){
                $conditions['WcdmaSiadSupport.siad_clli'] = $data['siad_clli'];
            }
            if(!$this->__isEmpty($data['signum'])){
                $conditions['WcdmaSiadSupport.signum'] = $data['signum'];
            }
            if(!$this->__isEmpty($data['status'])){
                $conditions['WcdmaSiadSupport.status'] = $data['status'];
            }
            
            if (!$this->__isEmpty($data['From']) && !$this->__isEmpty($data['To'])){   
                $conditions['WcdmaSiadSupport.date BETWEEN ? AND ?'] = array($data['From'],$data['To']);    
            }
            return $conditions;
        }

        function __isEmpty($value){
            return ($value == null || empty($value) || $value == "") ? true : false;
        }        
        /*End Search*/   
        
        function __changeDateFormat($date){            
            preg_match('/^([0-9]+)\/([0-9]+)\/([0-9]+)$/', $date, $match);            
            $date = $match[3] . $match[2] . $match[1];            
            return date('Y-m-d', strtotime($date));
   }        
}