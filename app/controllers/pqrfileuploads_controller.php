<?php

class PqrfileuploadsController extends AppController
{
    var $name = 'Pqrfileuploads';
    var $helpers = array('Html', 'Form', 'Javascript', 'DatabaseFields', 'Ajax', 'ShowFields', 'DatePicker');
    var $components = array('Session');
    var $uses  =array('Prelaunch_nd','Marketlaunch_ntx','Market_launchntx_alarm','Pqrfileupload'); 
    
    
    function index()
    {
        
    }
    /*function upload() {
        if (!empty($this->data) &&
             is_uploaded_file($this->data['Irndsfile']['File']['name'])) {
            $fileData = fread(fopen($this->data['Irndsfile']['File']['name'], "r"),
                                     $this->data['Irndsfile']['File']['size']);

            $this->data['Irndsfile']['name'] = $this->data['Irndsfile']['File']['name'];
            $this->data['Irndsfile']['data'] = $fileData;
            $this->Irndsfile->save($this->data);
            $this->redirect(array('action'=> 'upload'));
        }
    }*/
    
    function upload()
        {
            if (!empty($this->data)) 
            {
              if(isset($this->data['Irndsfile'])) 
              {
                 //save all valid uploads
                 $this->saveUploadState('Irndsfile');
              }  
                 if($this->Pqrfileupload->save($this->data)) //chk this
                 
                 {  
                     /* validation passes */
                     $this->Session->setFlash("File Uploaded : ". $this->data['Irndsfile'][0]['file']['name']); 
                     //echo $this->data['Irndsfile'][0]['file']['name'];
                       
                      /*Now, parse the records*/
                   if($this->data['Pqrfileupload']['filetype'] === "pre")
                     {    
                        //$result = $this->__parseRec($this->Pqrfileupload->id); 
                                           }
                     elseif($this->data['Pqrfileupload']['filetype'] === "market")
                     {
                      $result = $this->__parse($this->Pqrfileupload->id);     
                     }
                    
                     //$this->set('exceldata', $data);     
                     //$this->redirect(array('controller'=>'users_controller', 'action' => 'dashboard'));                                                         
                     
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
        
      private function __parseRec($fileID){
            $dirPath = $this->Pqrfileupload->Prelaunch_nd->getUploadPath();
            $fileName = $this->Pqrfileupload->Prelaunch_nd->getFileName($fileID, 0);
            //var_dump($this->data['Irndsfile'][0]['file']['tmp_name']);
            //debug($this->data);
            //$folder = "C:\\wamp\\repository\\irndstmp\\ABC.xls";
            //$folder = "C:" .DS. "wamp" . DS . "repository" . DS . "irndstmp";
            //move_uploaded_file($this->data['Irndsfile'][0]['file']['tmp_name'], $folder);
            App::import('Vendor', 'php-excel-reader/reader2');
            $data = new Spreadsheet_Excel_Reader();
            //Reading xldata 
            $data->setOutputEncoding('CP1251');
            $data->read("C:\\wamp\\repository\\pqrfileupload\\".$fileName['Pqrfileupload']['file_name']);
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
            $this->__SaveData($exceldata);                       
        }   
        
     //accessing database and creating object   
     private function __SaveData($exceldata){  
        App::import('model', 'Prelaunch_nd');
        $pre = new Prelaunch_nd();
        Configure::write('debug', 0);
        foreach($exceldata as $record_1)
        {   
            $pre->saveAll($record_1);        
        }    
       }
    }
   function map(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'market',5 => 'oss'
          );
    }
    
   function __parse($fileID)
    {
      /*$prendsplit = array(12 => 'site_pre_nds', 13 => 'Utrancell_pre_nds',14 => 'RNC_pre_nds', 15 => 'Market_pre_nds',16=>'OSS_pre_nds');
      $marketntxsplit1 = array(17 => 'Utrancell_mark_ntx', 18 => 'rnc_mark_ntx',19 => 'carrier_mark_ntx', 20 => 'callreserved_status_mark_ntx',21=>'alarm_mark_ntx',22=>'ocns_status_mark_ntx');
      $marketntxsplit2 = array(23=>'marlaunched_date_mark_ntx',24=>'ndsengineer_mark_ntx',25=>'oss_mark_ntx',26=>'sonar_port',27=>'market_point_contact',28=>'soft_level',29=>'sitelaunch_ocns',30=>'whysite_ocns',31=>'person_approved_ocns',32=>'site_mark_ntx');
      $marketntxalarm = array(33=>'site_market_alarm',34=>'Utrancell_market_alarm',35=>'rnc_market_alarm',36=>'inrbs_date_market_alarm',37=>'rbs_severity_market_alarm',38=>'rbs_specproblem_market_alarm',39=>'rbs_cause_market_alarm',40=>'mo_referance_market_alarm');*/
      
      $dirPath = $this->Pqrfileuploads->Irndsfile->getUploadPath();
      $fileName = $this->Pqrfileuploads->Irndsfile->getFileName($fileID, 0);
      
      App::import('Vendor', 'php-excel-reader/reader2');
      $data = new Spreadsheet_Excel_Reader();
      $data->setOutputEncoding('CP1251');
      $data->read("C:\\wamp\\repository\\pqrfileupload\\".$fileName['Pqrfileupload']['file_name']);
            $rows = $data->sheets[0]['cells'];  
            $rows_p2 = $data->sheets[1]['cells'];          
            $rows_p3 = $data->sheets[2]['cells'];          
            $map_2 = $this->map_2();
            $map_3 = $this->map_3();
            $i=0;
            $exceldata_2 = array();
            $exceldata_3 = array();
                        
            foreach($rows_p1 as $row_1){
                if ($row_1[1] === "Site")
                    continue;
                $temp = null;
                $j=1;
                foreach($row_1 as $column_1){                    
                    $temp[$map_1[$j++]] = $column_1;
                }
                //$exceldata_1[$i] = $temp;
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
                                       
              $this->__SaveDataml_2($exceldata_2);                               
              $this->__SaveDataml_3($exceldata_3);  
          }
                 
       //accessing database and creating object       
    
   function __SaveDataml_2($exceldata_2)
        {  
        App::import('model', 'Marketlaunch_ntx');
        $market = new Marketlaunch_ntx();
        Configure::write('debug', 0);
          foreach($exceldata_2 as $record_2)
          {
            $market->saveAll($record_2);        
          } 
        }
     //accessing database and creating object   
    function __SaveDataml_3($exceldata_3)
        {
        App::import('model', 'Market_launchntx_alarm');
        $marketalarm = new Market_launchntx_alarm();
        Configure::write('debug', 0);
        for($k=0; $k < count($exceldata_3); $k++){                       
           $marketalarm->saveAll($exceldata_3[$k]);         
        
        }
        }
      
    function map_2(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'carrier', 5=>'callreserved_status' ,6 => 'alarms',
            7 => 'ocns_status',8 => 'market_launcheddate', 9 => 'ndsengineer',10 => 'oss', 11 => 'sonar_port', 
            12 => 'poc', 13 => 'comments',14=>'market_point_contact',15=>'software_level',16=>'sitelaunched_withocns',17=>'whysite_launcedwith_ocns',
            18=>'person_approvedgoahead_ocns');
         
    }
    function map_3(){
        return array(
            1 => 'site', 2 => 'utrancell',3 => 'rnc',4 => 'alarm_inrbs_date',5 => 'alarm_rbs_severity',
            6 => 'alarm_rbs_specificproblem',7 => 'alarm_rbs_cause', 8 => 'alarm_rbs_mo_referance'
            );
    
          }
?>
