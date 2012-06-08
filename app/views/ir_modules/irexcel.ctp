<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=IR_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");
    
$unwantedfields = array(
    "ccb_work_ticket",
    "concerned_nodes",
    "last_status_utrancells",
    "reason_failed_nodes",
    "nodes_state",
    "sh_region",
    "sh_sitename",
    "sh_projecttype",
    "sh_programtype",
    "sh_sitemarket",
    "site_name",
    "sh_submarket",
    "sh_programmanager",        
    "sh_calltestcomments",
    "sh_calltestvoice",
    "sh_calltestcsdata",
    "sh_calltestpsdata",
    "sh_calltest911",
    "sh_calltest611",
    "sh_calltest411",    
    "sh_dateipconnectivity",
    "sh_ipconnectivitytestedby",
    "sh_ipconnectivitycomments",        
    "sh_datebaselineloaded",
    "sh_baselineloadedtestedby",
    "sh_baselineloadedcomments",    
    "sh_datentpserverping",
    "sh_ntpserverpingtestedby",
    "sh_ntpserverpingcomments",     
    "sh_datenodealarm",
    "sh_nodealarmtestedby",
    "sh_nodealarmcomments",    
    "sh_performanceimpactdate",
    "sh_performanceimpacttestedby",
    "sh_performanceimpactcomments",    
    "sh_dateftpserverping",
    "sh_ftpserverpingtestedby",
    "sh_ftpserverpingcomments",   
    "sh_lkfdate",
    "sh_lkftestedby",
    "sh_lkfcomments",
    "no_of_files",
    "additional_notes",
    "sh_launchstatus",
    "sh_launchedby",
    "sh_launcheddate",
    "sh_launchedname",
    "sh_timespent",
    "sh_dateintegrationcomplete",
    "sh_datereadyfortuning",
    "sh_datereadyforservice",
    "sh_nameintegrationcomplete",
    "sh_namereadyfortuning",
    "sh_namereadyforservice",
    "sh_comments",
    "sh_createdon",
    "sh_createdby",
    "sh_lastupdatedon",
    "sh_lastupdatedby",   
    "issue_summary"
);

    /* print the column headers */
    foreach($row[0]['IrModule'] as $key => $value){
        if(!in_array($key, $unwantedfields))
        echo $databaseFields->getLabel($key) . "\t";
    }
   
   for($i=0; $i < 5; $i++){       
   foreach($irheader as $key){
       if($key['COLUMNS']['Field'] != "issue_summary")
        echo $databaseFields->getLabel($key['COLUMNS']['Field']) . "\t";                     
        }    
    }
   
    echo "\n";
    /* print each row */
    //var_dump($row);
    foreach($row as $entry) {
        foreach($entry['IrModule'] as $key => $value){
            if(!in_array($key, $unwantedfields)){
                echo $databaseFields->removeSpecialCharacters($value) . "\t";
        }
      } 
    $count  = count($entry['IrIssue']);   
    
    for($i=0; $i < $count; $i++)
    {      
       foreach($entry['IrIssue'][$i] as $key => $value){ 
           if($key != "issue_summary")
              echo $databaseFields->removeSpecialCharacters($value) . "\t";           
                }            
    }
        echo "\n";
    }	
?>

