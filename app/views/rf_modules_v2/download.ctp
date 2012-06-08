<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=RF_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");

if (is_array($data[0]['RfModule'])) {
    $title_array = $data[0]['RfModule'];
    $title = null;
    /*
     * Print the title
     */
    foreach ($title_array as $key => $value) {
        echo $databaseFields->getLabel($key) . "\t";
    }
    echo "Additional Engineers";
    echo "\n";
    /*
     * Print Data from the database
     */
    foreach ($data as $row) {
        $entry = $row['RfModule'];
        foreach($entry as $key => $value){
            echo $value . "\t";
        }
        foreach($row['RfAdditionalEngineer'] as $additionalEngineer){
            echo $additionalEngineer['engineer_signum'] . " ";
        }
        echo "\n";
    }
}
?>