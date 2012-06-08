<?php 
/* Show field helper
 * Make sure to put the dependencies in the 'dropdown_dependents' table (cake DB)
 * 
 * @author Brian Ricks
 * 
 */ 

class NdsComparisonHelper extends Helper { 
    public $helpers = array('Html', 'Session','Form');
    
    private $counts = array();
    private $countsSites = array();
    
    public function display($value) {
        switch($value) {
            case 0:
                return "<div class=\"ndscomp_notapplicable\"><a href=\"javascript:void(0)\" title=\"Data Not Available\">N/A</a></div>";
                break;
            case 1:
                return "<div class=\"ndscomp_success\"><a href=\"javascript:void(0)\" title=\"Successful\">OK</a></div>";;
                break;
            case 2:
                return "<div class=\"ndscomp_notsuccess\"><a href=\"javascript:void(0)\" title=\"Unsuccessful\">NOK</a></div>";;
                break;
            case 3:
                return "<div class=\"ndscomp_nochange\"><a href=\"javascript:void(0)\" title=\"No Change\">OKNC</a></div>";
                break;
            case 4:
                return "<div class=\"ndscomp_investigate\"><a href=\"javascript:void(0)\" title=\"Investigation Needed\">INV</a></div>";
                break;
        }
    }
    
    /* counts the appropriate records for each metric and for each
     * parameter within these metrics.
     */
    public function countRecords($data, $metric_list, $sum_list = array()) {
        foreach($data as $record=>$metric) {
            $is_present = array(); //used for sum_list
            foreach($metric as $key=>$value) {
                //filter out the metrics that are not actually metrics
                if(in_array($key, $metric_list)) {
                    if(!isset($this->counts[$key][$value])) {
                        $this->counts[$key][$value] = 0;
                    }
                    $is_present[$key] = $value;  
                    $this->counts[$key][$value]++;
                    if(!isset($this->countsSites[$key][$value])) {
                        $this->countsSites[$key][$value] = array();
                    }
                    array_push($this->countsSites[$key][$value], $metric['id']);
                }
            }
            //tabulate summed fields
            if(!empty($sum_list)) {
                foreach($sum_list as $sum_metric=>$dependency) {
                    //for each field that is a combination of other fields
                    $is_used = array();
                    foreach($dependency as $dependent_field) {
                        //for each field that contributes to the total for current dependency
                        if(isset($is_present[$dependent_field])) {
                            if(!isset($this->counts[$sum_metric][$is_present[$dependent_field]])) {
                                $this->counts[$sum_metric][$is_present[$dependent_field]] = 0;
                            }
                            if(!isset($is_used[$is_present[$dependent_field]])) {
                                $this->counts[$sum_metric][$is_present[$dependent_field]]++;
                                $is_used[$is_present[$dependent_field]] = true;
                            }
                        }
                    }
                }
            }
        }
    }
    
    public function getCount($metric, $parameter) {
        if(!isset($this->counts[$metric][$parameter])) {
            return 0;
        }
        return $this->counts[$metric][$parameter];
    }
    
    public function getSiteList($metric, $parameter) {
        if(!isset($this->countsSites[$metric][$parameter]) || !is_array($this->countsSites[$metric][$parameter])) {
            return array();
        }
        return $this->countsSites[$metric][$parameter];
    }
} 
?> 