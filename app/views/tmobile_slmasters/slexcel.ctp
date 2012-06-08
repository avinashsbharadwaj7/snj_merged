<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=SL_Tmobile".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary ");
$unwanted = array('rnc_script1_comments',
                  'rnc_script2_comments',
                  'rnc_script3_comments',
                  'rnc_script4_comments',
                  'rnc_script5_comments',
                  'rnc_script6_comments',
                  'rnc_script7_comments',
                  'rnc_script8_comments',
                  'rnc_script9_comments',
                  'rnc_script10_comments',
                  'rnc_script11_comments',
                  'rbs_script1_comments',
                  'rbs_script2_comments',
                  'rbs_script3_comments',
                  'rbs_script4_comments',
                  'rbs_script5_comments',
                  'rbs_script6_comments',
                  'rbs_script7_comments',
                  'rbs_script8_comments',
                  'rbs_script9_comments',
                  'rbs_script10_comments',
                  'rbs_script11_comments',
                  'rbs_script12_comments',
                  'rbs_script13_comments',
                  'rbs_script14_comments',
                  'rbs_script15_comments',
                  'rbs_script16_comments',
                  'rbs_script17_comments',
                  'rbs_script19_comments',
                  'fback_script1_comments',
                  'fback_script2_comments',
                  'fback_script3_comments',
                  'fback_script4_comments',
                  'fback_script5_comments',
                  'fback_script6_comments',
                  'fback_script7_comments',
                  'fback_script8_comments',
                  'fback_script9_comments',
                  'fback_script10_comments',
                  'fback_script11_comments',
                  'fback_script12_comments',
                  'fback_script13_comments',
                  'fback_script14_comments',
                  'fback_script15_comments',
                  'fback_script16_comments',
                  'fback_script1_comments',
                  'oss_script1_comments',
                  'oss_script2_comments',
                  'oss_script3_comments',
                  'oss_script4_comments',
                  'oss_script5_comments',
                  'rnc_script1_tcm_explanation',
                  'rnc_script2_tcm_explanation',
                  'rnc_script3_tcm_explanation',
                  'rnc_script4_tcm_explanation',
                  'rnc_script5_tcm_explanation',
                  'rnc_script6_tcm_explanation',
                  'rnc_script7_tcm_explanation',
                  'rnc_script8_tcm_explanation',
                  'rnc_script9_tcm_explanation',
                  'rnc_script10_tcm_explanation',
                  'rnc_script11_tcm_explanation',
                  'rbs_script1_tcm_explanation',
                  'rbs_script2_tcm_explanation',
                  'rbs_script3_tcm_explanation',
                  'rbs_script4_tcm_explanation',
                  'rbs_script5_tcm_explanation',
                  'rbs_script6_tcm_explanation',
                  'rbs_script7_tcm_explanation',
                  'rbs_script8_tcm_explanation',
                  'rbs_script9_tcm_explanation',
                  'rbs_script10_tcm_explanation',
                  'rbs_script11_tcm_explanation',
                  'rbs_script12_tcm_explanation',
                  'rbs_script13_tcm_explanation',
                  'rbs_script14_tcm_explanation',
                  'rbs_script15_tcm_explanation',
                  'rbs_script16_tcm_explanation',
                  'rbs_script17_tcm_explanation',
                  'rbs_script19_tcm_explanation',
                  'fback_script1_tcm_explanation',
                  'fback_script2_tcm_explanation',
                  'fback_script3_tcm_explanation',
                  'fback_script4_tcm_explanation',
                  'fback_script5_tcm_explanation',
                  'fback_script6_tcm_explanation',
                  'fback_script7_tcm_explanation',
                  'fback_script8_tcm_explanation',
                  'fback_script9_tcm_explanation',
                  'fback_script10_tcm_explanation',
                  'fback_script11_tcm_explanation',
                  'fback_script12_tcm_explanation',
                  'fback_script13_tcm_explanation',
                  'fback_script14_tcm_explanation',
                  'fback_script15_tcm_explanation',
                 
                  'oss_script1_tcm_explanation',
                  'oss_script2_tcm_explanation',
                  'oss_script3_tcm_explanation',
                  'oss_script4_tcm_explanation',
                  'oss_script5_tcm_explanation',
    
);



       
        if (is_array($row[0]['TmobileSlmaster'])) {
            $title_array = $row[0]['TmobileSlmaster'];
            $title = null;
            /*
             * Print the title
             */
            foreach ($title_array as $key => $value) {
                if(!in_array($key,$unwanted))
                echo $databaseFields->getLabelTmob($key) . "\t";
            }
            echo "\n";
            /*
             * Print Data from the database
             */
            foreach ($row as $entry) {
                $entry = $entry['TmobileSlmaster'];
                foreach($entry as $key => $value){
                    if(!in_array($key,$unwanted))
                    echo $databaseFields->removeSpecialCharacters($value) . "\t";
                }
                echo "\n";
            }
        }	
?>