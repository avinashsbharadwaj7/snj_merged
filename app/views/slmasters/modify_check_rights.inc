<?php

            $check = false;
            $check_tcm_transport = false;
            $check_tcm_radio = false;
            $check_tcm_rbs = false;
            $check_tcm_gsm = false;
            $check_tcm_gsmrelns = false;
            $check_tcm_utran = false;
            $check_tcm_if = false;
            $check_tcm_femto = false;

            $check_transport = false;
            $check_radio = false;
            $check_rbs = false;
            $check_gsm = false;
            $check_gsmrelns = false;
            $check_utran = false;
            $check_if = false;
            $check_femto = false;
            
			
            if($sig == $modify_fields['tcm_signum'] || in_array($sig,$tcm_lead))
            {
                $check = true;
                $check_transport = true;
                $check_radio = true;
                $check_rbs = true;
                $check_gsm = true;
                $check_gsmrelns = true;
                $check_utran = true;
                $check_if = true;
                $check_femto = true;
            }
            if($modify_fields['transport_script_tcm'] != "")
            {
                    $check_tcm_transport = true;
                    $check_transport = true;
            }
            if($modify_fields['radio_script_tcm'] != "")
            {
                    $check_tcm_radio = true;
                    $check_radio = true;
            }
            if($modify_fields['rbs_site_file_tcm'] != "")
            {
                    $check_tcm_rbs = true;
                    $check_rbs = true;
            }
            if($modify_fields['gsm_cells_tcm'] != "")
            {
                    $check_tcm_gsm = true;
                    $check_gsm = true;
            }
            if($modify_fields['gsm_relations_tcm'] != "")
            {
                    $check_tcm_gsmrelns = true;
                    $check_gsmrelns = true;
            }
            if($modify_fields['utran_relations_tcm'] != "")
            {
                    $check_tcm_utran = true;
                    $check_utran = true;
            }
            if($modify_fields['interfrequency_relations_tcm'] != "")
            {
                    $check_tcm_if = true;
                    $check_if = true;
            }
            if($modify_fields['femto_relations_tcm'] != "")
            {
                    $check_tcm_femto = true;
                    $check_femto = true;
            }
?>
            