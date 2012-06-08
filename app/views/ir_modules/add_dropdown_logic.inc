<?php
           $TcmEnggCentral = array(""=>"", "Not Applicable"=>"Not Applicable");
           $TcmEnggEast = array(""=>"", "Not Applicable"=>"Not Applicable");
           $TcmEnggWest = array(""=>"", "Not Applicable"=>"Not Applicable");
           
          //var_dump($tcm_fields);  
           foreach($tcm_fields as $userrecords)
           {    
               $fieldvalue = $userrecords['User']['first_name'] . "" . $userrecords['User']['last_name'] . 
                             "(" . $userrecords['User']['username'] . ")" ;
               
               if ($userrecords['User']['tcm_region'] == "Central" || $userrecords['User']['tcm_region'] == "India" || $userrecords['User']['tcm_region'] == "Mexico")
                   $TcmEnggCentral[$fieldvalue] = $fieldvalue;
               
               if ($userrecords['User']['tcm_region'] == "East" || $userrecords['User']['tcm_region'] == "India" || $userrecords['User']['tcm_region'] == "Mexico")
                   $TcmEnggEast[$fieldvalue] = $fieldvalue;
               
               elseif ($userrecords['User']['tcm_region'] == "West" || $userrecords['User']['tcm_region'] == "India" || $userrecords['User']['tcm_region'] == "Mexico")
                   $TcmEnggWest[$fieldvalue] = $fieldvalue;
           }	
?>