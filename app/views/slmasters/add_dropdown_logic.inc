<?php
			$tcm_temp_C;
            $tcm_temp_E;
            $tcm_temp_W;
            foreach($tcm_fields as $tcm):
                $tcm = $tcm['User'];
				$tcm['last_name'] = trim($tcm['last_name']);
				$tcm['first_name'] = trim($tcm['first_name']);
				if(empty($tcm['last_name']))
					$display = $tcm['first_name'].'('.$tcm['username'].')';
				else
					$display = $tcm['first_name'].' '.$tcm['last_name'].'('.$tcm['username'].')';
                if($tcm['tcm_region'] == 'Central' || $tcm['tcm_region'] == 'India' || $tcm['tcm_region'] == 'Mexico')
                {
                    $tcm_temp_C[$display] = $display;
                }
                if($tcm['tcm_region'] == 'East' || $tcm['tcm_region'] == 'India' || $tcm['tcm_region'] == 'Mexico')
                {
                    $tcm_temp_E[$display] = $display;
                }
                if($tcm['tcm_region'] == 'West' || $tcm['tcm_region'] == 'India' || $tcm['tcm_region'] == 'Mexico')
                {
                    $tcm_temp_W[$display] = $display;
                }				
            endforeach;
			
		


            function getDropdown($field,$dropdown_fields)
            {
                $temp;
                $flag = 0;
                $optgrp;
                foreach($dropdown_fields as $dd):
                    if($dd['Dropdown']['field']==$field)
                    {
                        if($dd['Dropdown']['field']=="activity_result" && $dd['Dropdown']['weight'] == '5')
                        {

                        }
                        else
                        {
                            if($dd['Dropdown']['value'] == "")
                            {
                                $optgrp[$flag] = $dd['Dropdown']['label'];
                                $flag++;
                            }
                            else
                            {
                                if($flag > 0)
                                    $temp[$optgrp[$flag-1]][$dd['Dropdown']['value']] = $dd['Dropdown']['label'];
                                else
                                    $temp[$dd['Dropdown']['value']] = $dd['Dropdown']['label'];
                            }
                        }
                    }
                endforeach;
                return $temp;
            }
?>