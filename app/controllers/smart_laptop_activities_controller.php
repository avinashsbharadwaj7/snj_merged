<?php
/* 
 * Controller to show Smart Laptop activities
 * 
 */

/**
 * @author emoibhu
 */
class SmartLaptopActivitiesController extends AppController {
   var $uses = array("IrModule", "Dropdown");


   function  beforeFilter() {
        parent::beforeFilter();
        $this->layout = "rnc";
    }

   function show(){
       $markets = $this->Dropdown->find("all", array("conditions" => array("field" => "market", "module_id LIKE " => "113%")));
       $results = $this->Dropdown->find("all", array("conditions" => array("field" => "activity_result", "module_id" => 1)));
       $activities = $this->Dropdown->find("all", array("conditions" => array("field" => "smart_laptop_activities", "module_id" => 1)));
       $markets = $this->repairArray($markets);
       $activities = $this->repairArray($activities);
       $results = $this->repairArray($results);
       $this->set(compact("markets", 'activities', "results"));
       $this->set("returnJSON", $this->setGraphData());
       $this->render("/ir_modules/smart_laptop");
   }

   function setGraphData(){
       $markets = $this->Dropdown->find("all", array("conditions" => array("field" => "market", "module_id LIKE " => "113%")));
       $markets = $this->repairArray($markets);
       $results = $this->Dropdown->find("all", array("conditions" => array("field" => "activity_result", "module_id" => 1)));
       $results = $this->repairArray($results);
       $activities = $this->Dropdown->find("all", array("conditions" => array("field" => "smart_laptop_activities", "module_id" => 1)));
       $activities = $this->repairArray($activities);//var_dump($results, $activities);
       foreach($markets as $market){
           $cleanMarket = preg_replace("/[^a-zA-Z0-9]/", "", $market);
           $returnJSON[$cleanMarket]["name"] = $market;
           for($i=0;$i<count($results);$i++){
               for($k=0;$k<count($activities);$k++){
                   $returnJSON[$cleanMarket][$i][$k] = 0;
               }
           }
           $queryResult = $this->IrModule->find('all', array("conditions"=>array("IrModule.customer" => "AT&T", "IrModule.access_method" => "Smart Laptop", "IrModule.market" => $market)));
           foreach($queryResult as $key => $row){
               $activityKey = array_search($row['IrModule']['activity_type'], $activities);
               $resultKey = array_search($row['IrModule']['activity_result'], $results);
               if(!is_bool($activityKey))
                    $returnJSON[$cleanMarket][$resultKey][$activityKey]++;
           }
       }
       return $returnJSON;
   }

   function repairArray($arr){
       $ret = array();
       foreach($arr as $key => $value){
           $ret[$key] = $value['Dropdown']['label'];
       }
       return $ret;
   }
}
?>
