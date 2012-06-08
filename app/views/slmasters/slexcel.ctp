<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=SL_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");


        if (is_array($row[0]['Slmaster'])) {
            $title_array = $row[0]['Slmaster'];
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
            foreach ($row as $entry) {
                $entry = $entry['Slmaster'];
                foreach($entry as $key => $value){
                    echo $databaseFields->removeSpecialCharacters($value) . "\t";
                }
                echo "\n";
            }
        }	
?>