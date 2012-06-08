<?php

header("Content-Type: application/vnd.ms-excel");
header("Cache-Control: must-revalidate");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=TAC_".date('Y_m_d_h_i_s').".xls");
header("Content-Transfer-Encoding: binary "); 


        if (is_array($row[0]['TacReport'])) {
            $title_array = $row[0]['TacReport'];
            $title = null;
            /*
             * Print the title
             */
			$j=0;
            foreach ($title_array as $key => $value) {
					$j++;
					if($j == 17)
					{						
						if(Authsome::get('user_group_id') == 35004 || Authsome::get('user_group_id') == 1)
							echo $databaseFields->getLabel($key) . "\t";
					}
					else
						echo $databaseFields->getLabel($key) . "\t";							                
            }
            echo "\n";
            /*
             * Print Data from the database
             */

			 foreach ($row as $entry) {
                $entry = $entry['TacReport'];
				$i = 0;
                foreach($entry as $key => $value){
					$i++;
					if($i == 17)
					{
						if(Authsome::get('user_group_id') == 35004 || Authsome::get('user_group_id') == 1)
							echo $databaseFields->removeSpecialCharacters($value) . "\t";
					}
					else
						echo $databaseFields->removeSpecialCharacters($value) . "\t";							
                }
                echo "\n";
            }
        }	
?>