<?php
			function getDropdown($field,$dropdown_fields)
            {
                $temp;
                $flag = 0;
                $optgrp;
                foreach($dropdown_fields as $dd):
                    if($dd['Dropdown']['field']==$field)
                    {
                        if($dd['Dropdown']['field']=="activity_result" && $dd['Dropdown']['weight'] != '3' && $dd['Dropdown']['weight'] != '5')
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