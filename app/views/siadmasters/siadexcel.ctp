<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=SIAD_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");
    
    /* print the column headers */
    if(isset($row[0]['Siadmaster'])) {
        foreach($row[0]['Siadmaster'] as $key => $value){
            echo '[Master] ' . $databaseFields->getLabel($key) . "\t";
        }
    }
    if(isset($row[0]['Siadsite'])) {
        foreach($row[0]['Siadsite'] as $key => $value){
            echo $databaseFields->getLabel($key) . "\t";
        }
    }
    echo "\n";
    /* print each row */
    foreach($row as $entry) {
        if(isset($entry['Siadmaster'])) {
            foreach($entry['Siadmaster'] as $key => $value){
                echo $databaseFields->removeSpecialCharacters($value) . "\t";
            }   
        }
        if(isset($entry['Siadsite'])) {
            foreach($entry['Siadsite'] as $key => $value){
                echo $databaseFields->removeSpecialCharacters($value) . "\t";
            }
        }
        echo "\n";
    }	
?>