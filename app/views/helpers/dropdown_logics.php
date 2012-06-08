<?php
class DropdownLogicsHelper extends Helper{
        public $helpers = array('Html', 'Session','Form','Javascript','Ajax');

		function getFields($dropdown)
		{			
			$flag = 0;
			$optgrp;
			$i=0;
			$temp=array();
            foreach($dropdown as $dd):
                $dd = $dd['Dropdown'];
                    if($dd['field']=='customer')
                        $temp[$dd['field']][$dd['value']] = $dd['value'];
                    else if($dd['field']=='region')
                        $temp[$dd['field']][$dd['value']] = $dd['value'];
                    else if($dd['field']=='work_location')
                        $temp[$dd['field']][$dd['value']] = $dd['value'];
					else if($dd['field']=='market')
                        $temp[$dd['field']][$dd['value']] = $dd['value'];
                    else if($dd['field']=='activity_type' || $dd['field']=='new_activities' || $dd['field']=='activity')
						{		
							 if($dd['value'] == "")
							{								
								if($i == 0)
								{
									$temp[$dd['field']]['%'] = 'All';
									$i++;
								}
								$optgrp[$flag] = $dd['label'];
								$flag++;
							}
							else
							{
								if($i == 0)
								{
									$temp[$dd['field']]['%'] = 'All';
									$i++;
								}
								if($flag > 0)
								{									
									$temp[$dd['field']][$optgrp[$flag-1]][$dd['value']] = $dd['label'];
								}
								else
									$temp[$dd['field']][$dd['value']] = $dd['label'];
							}
						}
                    else if($dd['field']=='year')
                        $temp[$dd['field']][$dd['value']] = $dd['value'];
            endforeach;
			return $temp;
		}
}

?>