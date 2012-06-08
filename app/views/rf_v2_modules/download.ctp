<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=RF_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");

if (is_array($data[0]['RfV2Module'])) {
    $title_array = $data[0]['RfV2Module'];
    $title = null;
    /*
     * Print the title
     */
    foreach ($title_array as $key => $value) {
        echo $databaseFields->getLabel($key) . "\t";
    }
    echo "\n";
    /*
     * Print Data from the database
     */
    foreach ($data as $row) {
        $entry = $row['RfV2Module'];
        foreach($entry as $key => $value){
            if($key === "additional_engineers"){
                echo implode(", ", $value) . "\t";
                continue;
            }
            echo $value . "\t";
        }
        echo "\n";
    }
}
?>