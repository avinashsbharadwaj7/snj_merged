<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=CDMA_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");
    
    /* print the column headers */
    //var_dump($row[0]['IrIssue']);
    //var_dump($irheader);
    //var_dump($row);
    //var_dump($irissuevalues);
    foreach($row[0]['Cdmamaster'] as $key => $value){        
        echo $databaseFields->getLabel($key) . "\t";
    }
       
    echo "\n";
    /* print each row */
        
 foreach($row as $entry) {
        foreach($entry['Cdmamaster'] as $key => $value){
            echo $databaseFields->removeSpecialCharacters($value) . "\t";
        }
        echo "\n";
    }	
    ?>

