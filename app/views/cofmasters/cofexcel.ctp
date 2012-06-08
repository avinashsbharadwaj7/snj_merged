<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=COF_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");

/* print the column headers */

foreach ($row[0]['Cofmaster'] as $key => $value) {
    echo $databaseFields->getLabel($key) . "\t";
}
echo "\n";
/* print each row */

foreach ($row as $entry) {
//        foreach($entry['LitmasterVerizon'] as $key => $value){

    foreach ($entry as $key => $value) {
        foreach($value as $k => $v) {
            echo $databaseFields->removeSpecialCharacters($v) . "\t";
        }
    }
    echo "\n";
}
?>