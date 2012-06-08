<?php

            $check = false;
            //rnc
            $check_tcm_rnc1 = false;
            $check_tcm_rnc2 = false;
            $check_tcm_rnc3 = false;
            $check_tcm_rnc4 = false;
            $check_tcm_rnc5 = false;
            $check_tcm_rnc6 = false;
            $check_tcm_rnc7 = false;
            $check_tcm_rnc8 = false;
            $check_tcm_rnc10 = false;
            $check_tcm_rnc11 = false;
                        
            $check_rnc1 = false;
            $check_rnc2 = false;
            $check_rnc3 = false;
            $check_rnc4 = false;
            $check_rnc5 = false;
            $check_rnc6 = false;
            $check_rnc7 = false;
            $check_rnc8 = false;
            $check_rnc10 = false;
            $check_rnc11 = false;
            //rbs
            $check_tcm_rbs1 = false;
            $check_rbs1 = false;
            
            $check_tcm_rbs2 = false;
            $check_rbs2 = false;
            
            $check_tcm_rbs3 = false;
            $check_rbs3 = false;
            
            $check_tcm_rbs4 = false;
            $check_rbs4 = false;
            
            $check_tcm_rbs5 = false;
            $check_rbs5 = false;
            
            $check_tcm_rbs6 = false;
            $check_rbs6 = false;
            
            $check_tcm_rbs7 = false;
            $check_rbs7 = false;
            
            $check_tcm_rbs8 = false;
            $check_rbs8 = false;
            
            $check_tcm_rbs9 = false;
            $check_rbs9 = false;
            
            $check_tcm_rbs10 = false;
            $check_rbs10 = false;
            
            $check_tcm_rbs11 = false;
            $check_rbs11 = false;
            
            $check_tcm_rbs12 = false;
            $check_rbs12 = false;
            
            $check_tcm_rbs13 = false;
            $check_rbs13 = false;
            
            $check_tcm_rbs14 = false;
            $check_rbs14 = false;
            
            $check_tcm_rbs15 = false;
            $check_rbs15 = false;
            
            $check_tcm_rbs16 = false;
            $check_rbs16 = false;
            
            $check_tcm_rbs17 = false;
            $check_rbs17 = false;
            
            $check_tcm_rbs18 = false;
            $check_rbs18 = false;
            
            $check_tcm_rbs19 = false;
            $check_rbs19 = false;
            
            
            //fback
             $check_tcm_fback1 = false;
             $check_fback1 = false;            
            
             $check_tcm_fback2 = false;
             $check_fback2 = false; 
             
             $check_tcm_fback3 = false;
             $check_fback3 = false; 
             
             $check_tcm_fback4 = false;
             $check_fback4 = false; 
             
             $check_tcm_fback5 = false;
             $check_fback5 = false; 
             
             $check_tcm_fback6 = false;
             $check_fback6 = false; 
             
             $check_tcm_fback7 = false;
             $check_fback7 = false; 
             
             $check_tcm_fback8 = false;
             $check_fback8 = false;            
            
             $check_tcm_fback9 = false;
             $check_fback9 = false; 
             
             $check_tcm_fback10 = false;
             $check_fback10 = false; 
             
             $check_tcm_fback11 = false;
             $check_fback11 = false; 
             
             $check_tcm_fback12 = false;
             $check_fback12 = false; 
             
             $check_tcm_fback13 = false;
             $check_fback13 = false; 
             
             $check_tcm_fback14 = false;
             $check_fback14 = false; 
             
             $check_tcm_fback15 = false;
             $check_fback15 = false;
             
             $check_tcm_fback16 = false;
             $check_fback16 = false;
             
            //oss
             $check_tcm_oss1 = false;
             $check_oss1 = false;   
            
             $check_tcm_oss2 = false;
             $check_oss2 = false; 
             
             $check_tcm_oss3 = false;
             $check_oss3 = false; 
             
             $check_tcm_oss4 = false;
             $check_oss4 = false; 
             
             $check_tcm_oss5 = false;
             $check_oss5 = false; 
           
            if($signum == $modify_fields['tcm_signum'] || in_array($signum,$tcm_lead))
            {
                $check = true;
                //rnc
                $check_rnc1 = true;
                $check_rnc2 = true;
                $check_rnc3 = true;
                $check_rnc4 = true;
                $check_rnc5 = true;
                $check_rnc6 = true;
                $check_rnc7 = true;
                $check_rnc8 = true;
                $check_rnc10 = true;
                $check_rnc11 = true;
                //rbs
                $check_rbs1 = true;
                $check_rbs2 = true;
                $check_rbs3 = true;
                $check_rbs4 = true;
                $check_rbs5 = true;
                $check_rbs6 = true;
                $check_rbs7 = true;
                $check_rbs8 = true;
                $check_rbs9 = true;
                $check_rbs10 = true;
                $check_rbs11 = true;
                $check_rbs12 = true;
                $check_rbs13 = true;
                $check_rbs14 = true;
                $check_rbs15 = true;
                $check_rbs16 = true;
                $check_rbs17 = true;
                $check_rbs18 = true;
                $check_rbs19 = true;
                
                //fback
                $check_fback1 = true;
                $check_fback2 = true;
                $check_fback3 = true;
                $check_fback4 = true;
                $check_fback5 = true;  
                $check_fback6 = true;
                $check_fback7 = true;
                $check_fback8 = true;
                $check_fback9 = true;
                $check_fback10 = true;
                $check_fback11 = true;
                $check_fback12 = true;
                $check_fback13 = true;
                $check_fback14 = true;
                $check_fback15 = true;
                $check_fback16= true;
                
                //oss
                $check_oss1 = true;
                $check_oss2 = true;
                $check_oss3 = true;
                $check_oss4 = true;
                $check_oss5 = true;
            }
            //RNC
            if(isset($modify_fields['rnc_script1_tcm']))
            {
                if($modify_fields['rnc_script1_tcm'] != "")
                {
                    $check_rnc1 = true;
                    $check_tcm_rnc1 = true;
                }
                    
            }
           if(isset($modify_fields['rnc_script2_tcm']))
           {
            if($modify_fields['rnc_script2_tcm'] != "")
            {
                    $check_rnc2 = true;
                    $check_tcm_rnc2 = true;
            }
           }
           
           if(isset($modify_fields['rnc_script3_tcm']))
           {
            if($modify_fields['rnc_script3_tcm'] != "")
            {
                    $check_rnc3 = true;
                    $check_tcm_rnc3 = true;
            }
           }
            if(isset($modify_fields['rnc_script4_tcm']))
           {
            if($modify_fields['rnc_script4_tcm'] != "")
            {
                    $check_rnc4 = true;
                    $check_tcm_rnc4 = true;
            }
           }
            if(isset($modify_fields['rnc_script5_tcm']))
           {
            if($modify_fields['rnc_script5_tcm'] != "")
            {
                    $check_rnc5 = true;
                    $check_tcm_rnc5 = true;
            }
           }
            if(isset($modify_fields['rnc_script6_tcm']))
           {
            if($modify_fields['rnc_script6_tcm'] != "")
            {
                    $check_rnc6 = true;
                    $check_tcm_rnc6 = true;
            }
           }
            if(isset($modify_fields['rnc_script7_tcm']))
           {
            if($modify_fields['rnc_script7_tcm'] != "")
            {
                    $check_rnc7 = true;
                    $check_tcm_rnc7 = true;
            }
           }
            if(isset($modify_fields['rnc_script8_tcm']))
           {
            if($modify_fields['rnc_script8_tcm'] != "")
            {
                    $check_rnc8 = true;
                    $check_tcm_rnc8 = true;
            }
           }
            if(isset($modify_fields['rnc_script10_tcm']))
           {
            if($modify_fields['rnc_script10_tcm'] != "")
            {
                    $check_rnc10 = true;
                    $check_tcm_rnc10 = true;
            }
           }
            if(isset($modify_fields['rnc_script11_tcm']))
           {
            if($modify_fields['rnc_script11_tcm'] != "")
            {
                    $check_rnc11 = true;
                    $check_tcm_rnc11 = true;
            }
           }
           
           //RBS
           if(isset($modify_fields['rbs_script1_tcm']))
           {
            if($modify_fields['rbs_script1_tcm'] != "")
            {
                    $check_rbs1 = true;
                    $check_tcm_rbs1 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script2_tcm']))
           {
            if($modify_fields['rbs_script2_tcm'] != "")
            {
                    $check_rbs2 = true;
                    $check_tcm_rbs2 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script3_tcm']))
           {
            if($modify_fields['rbs_script3_tcm'] != "")
            {
                    $check_rbs3 = true;
                    $check_tcm_rbs3 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script4_tcm']))
           {
            if($modify_fields['rbs_script4_tcm'] != "")
            {
                    $check_rbs4 = true;
                    $check_tcm_rbs4 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script5_tcm']))
           {
            if($modify_fields['rbs_script5_tcm'] != "")
            {
                    $check_rbs5 = true;
                    $check_tcm_rbs5 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script6_tcm']))
           {
            if($modify_fields['rbs_script6_tcm'] != "")
            {
                    $check_rbs6 = true;
                    $check_tcm_rbs6 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script7_tcm']))
           {
            if($modify_fields['rbs_script7_tcm'] != "")
            {
                    $check_rbs7 = true;
                    $check_tcm_rbs7 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script8_tcm']))
           {
            if($modify_fields['rbs_script8_tcm'] != "")
            {
                    $check_rbs8 = true;
                    $check_tcm_rbs8 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script9_tcm']))
           {
            if($modify_fields['rbs_script9_tcm'] != "")
            {
                    $check_rbs9 = true;
                    $check_tcm_rbs9 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script10_tcm']))
           {
            if($modify_fields['rbs_script10_tcm'] != "")
            {
                    $check_rbs10 = true;
                    $check_tcm_rbs10 = true;
            }
           }
           
             if(isset($modify_fields['rbs_script11_tcm']))
           {
            if($modify_fields['rbs_script11_tcm'] != "")
            {
                    $check_rbs11 = true;
                    $check_tcm_rbs11 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script12_tcm']))
           {
            if($modify_fields['rbs_script12_tcm'] != "")
            {
                    $check_rbs12 = true;
                    $check_tcm_rbs12 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script13_tcm']))
           {
            if($modify_fields['rbs_script13_tcm'] != "")
            {
                    $check_rbs13 = true;
                    $check_tcm_rbs13 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script14_tcm']))
           {
            if($modify_fields['rbs_script14_tcm'] != "")
            {
                    $check_rbs14 = true;
                    $check_tcm_rbs14 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script15_tcm']))
           {
            if($modify_fields['rbs_script15_tcm'] != "")
            {
                    $check_rbs15 = true;
                    $check_tcm_rbs15 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script16_tcm']))
           {
            if($modify_fields['rbs_script16_tcm'] != "")
            {
                    $check_rbs16 = true;
                    $check_tcm_rbs16 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script17_tcm']))
           {
            if($modify_fields['rbs_script17_tcm'] != "")
            {
                    $check_rbs17 = true;
                    $check_tcm_rbs17 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script18_tcm']))
           {
            if($modify_fields['rbs_script18_tcm'] != "")
            {
                    $check_rbs8 = true;
                    $check_tcm_rbs8 = true;
            }
           }
           
           if(isset($modify_fields['rbs_script19_tcm']))
           {
            if($modify_fields['rbs_script19_tcm'] != "")
            {
                    $check_rbs9 = true;
                    $check_tcm_rbs9 = true;
            }
           }
           //Fback
           if(isset($modify_fields['fback_script1_tcm']))
           {
            if($modify_fields['fback_script1_tcm'] != "")
            {
                    $check_fback1 = true;
                    $check_tcm_fback1 = true;
            }
           }
           
           if(isset($modify_fields['fback_script2_tcm']))
           {
            if($modify_fields['fback_script2_tcm'] != "")
            {
                    $check_fback2 = true;
                    $check_tcm_fback2 = true;
            }
           }
           
            if(isset($modify_fields['fback_script3_tcm']))
           {
            if($modify_fields['fback_script3_tcm'] != "")
            {
                    $check_fback3 = true;
                    $check_tcm_fback3 = true;
            }
           }
           
            if(isset($modify_fields['fback_script4_tcm']))
           {
            if($modify_fields['fback_script4_tcm'] != "")
            {
                    $check_fback4 = true;
                    $check_tcm_fback4 = true;
            }
           }
           
            if(isset($modify_fields['fback_script5_tcm']))
           {
            if($modify_fields['fback_script5_tcm'] != "")
            {
                    $check_fback5 = true;
                    $check_tcm_fback5 = true;
            }
           }
           
            if(isset($modify_fields['fback_script6_tcm']))
           {
            if($modify_fields['fback_script6_tcm'] != "")
            {
                    $check_fback6 = true;
                    $check_tcm_fback6 = true;
            }
           }
           
            if(isset($modify_fields['fback_script7_tcm']))
           {
            if($modify_fields['fback_script7_tcm'] != "")
            {
                    $check_fback7 = true;
                    $check_tcm_fback7 = true;
            }
           }
           
            if(isset($modify_fields['fback_script8_tcm']))
           {
            if($modify_fields['fback_script8_tcm'] != "")
            {
                    $check_fback8 = true;
                    $check_tcm_fback8 = true;
            }
           }
           
            if(isset($modify_fields['fback_script9_tcm']))
           {
            if($modify_fields['fback_script9_tcm'] != "")
            {
                    $check_fback9 = true;
                    $check_tcm_fback9 = true;
            }
           }
           
            if(isset($modify_fields['fback_script10_tcm']))
           {
            if($modify_fields['fback_script10_tcm'] != "")
            {
                    $check_fback10 = true;
                    $check_tcm_fback10 = true;
            }
           }
           
           if(isset($modify_fields['fback_script11_tcm']))
           {
            if($modify_fields['fback_script11_tcm'] != "")
            {
                    $check_fback11 = true;
                    $check_tcm_fback11 = true;
            }
           }
           
           if(isset($modify_fields['fback_script12_tcm']))
           {
            if($modify_fields['fback_script12_tcm'] != "")
            {
                    $check_fback12 = true;
                    $check_tcm_fback12 = true;
            }
           }
           
            if(isset($modify_fields['fback_script13_tcm']))
           {
            if($modify_fields['fback_script13_tcm'] != "")
            {
                    $check_fback13 = true;
                    $check_tcm_fback13 = true;
            }
           }
           
            if(isset($modify_fields['fback_script14_tcm']))
           {
            if($modify_fields['fback_script14_tcm'] != "")
            {
                    $check_fback14 = true;
                    $check_tcm_fback14 = true;
            }
           }
           
            if(isset($modify_fields['fback_script15_tcm']))
           {
            if($modify_fields['fback_script15_tcm'] != "")
            {
                    $check_fback15 = true;
                    $check_tcm_fback15 = true;
            }
           }
           
            if(isset($modify_fields['fback_script16_tcm']))
           {
            if($modify_fields['fback_script16_tcm'] != "")
            {
                    $check_fback16 = true;
                    $check_tcm_fback16 = true;
            }
           }
           
           
           //OSS
           if(isset($modify_fields['oss_script1_tcm']))
           {
            if($modify_fields['oss_script1_tcm'] != "")
            {
                    $check_oss1 = true;
                    $check_tcm_oss1 = true;
            }
           }
           
           if(isset($modify_fields['oss_script2_tcm']))
           {
            if($modify_fields['oss_script2_tcm'] != "")
            {
                    $check_oss2 = true;
                    $check_tcm_oss2 = true;
            }
           }
           
           if(isset($modify_fields['oss_script3_tcm']))
           {
            if($modify_fields['oss_script3_tcm'] != "")
            {
                    $check_oss3 = true;
                    $check_tcm_oss3= true;
            }
           }
           
           if(isset($modify_fields['oss_script4_tcm']))
           {
            if($modify_fields['oss_script4_tcm'] != "")
            {
                    $check_oss4 = true;
                    $check_tcm_oss4 = true;
            }
           }
           
           if(isset($modify_fields['oss_script5_tcm']))
           {
            if($modify_fields['oss_script5_tcm'] != "")
            {
                    $check_oss5 = true;
                    $check_tcm_oss5 = true;
            }
           }
?>

            