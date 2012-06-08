<?php
class TmobileSpecificHelper extends Helper{
    public $helpers = array('Html', 'Session','Form','Javascript','Ajax');
    
    function populatedropdown($for, $module_id)
    {
        App::import('model','Dropdown');
        $dropdowns = new Dropdown();
        $options = $dropdowns->options($for, $module_id);
        foreach($options as $option){
                $results[$option['Dropdown']['value']] = $option['Dropdown']['label'];
            }
            return $results;
        
    }

    function getsignum()
    {
            $signum = Authsome::get('username');
            
            return $signum;
    }
    
    function getname()
    {
            $fname = Authsome::get('first_name');
            $lname = Authsome::get('last_name');
            $fullName = $fname.' '.$lname;
            
            return $fullName;
    }
    
    function getAllactivityTypes($cust)
    {
        $results = null;
      
        App::import('model','Dropdown');
        $dropdowns = new Dropdown();
        $options1 = $dropdowns->options('activity_type', '2');
        $options2 = $dropdowns->options('activity_type', '8');
        if($cust=='att'/*||$cust=='all'*/){
        foreach($options1 as $option){
                $results[$option['Dropdown']['value']] = $option['Dropdown']['label'];
            }}
            if($cust=='tmobile'/*||$cust=='all'*/){
        foreach($options2 as $option){
                $results[$option['Dropdown']['value']] = $option['Dropdown']['label'];
            }
            }
            return $results;
    }
    
    function populatetcmComments($activity)
    {
        $results = array('ATND'=>'ATND',
            'RND'=>'RND',
            'TND'=>'TND',
            'Changes from the customer'=>'Changes from the customer',
            'Software level','Script already loaded'=>'Software level','Script already loaded',
            'Integration issue'=>'Integration issue',
            'Baseline'=>'Baseline',
            'Script issue'=>'Script issue',
            'Planning and Co-ordination issue'=>'Planning and Co-ordination issue',
            'Other'=>'Other');
        if($activity =='2nd Carrier Add' || $activity =='Split Power-2nd Carrier Add' || $activity =='Rip and Replace')
        {
            $results = array('RND'=>'RND','TND'=>'TND','Software level'=>'Software level','Script already loaded'=>'Script already loaded',
                'Integration issue'=>'Integration issue','Baseline'=>'Baseline','Script issue'=>'Script issue',
                'Planning and Co-ordination issue'=>'Planning and Co-ordination issue','Other'=>'Other');
        }
        else if($activity =='ATM to Hybrid' || $activity =='Hybrid to IP Migration')
        {
            $results = array('ATND','Changes from the customer','Software level','Script already loaded','Integration issue','Script issue','Planning and Co-ordination issue','Other');
        }
        
        
        return $results;
    }
    
    function populateOssdropDown(){
        $results = array(
            'Imported Successfully and Activation Successful' => 'Imported Successfully and Activation Successful',
            'Partially Imported and Activation Successful' => 'Partially Imported and Activation Successful',
            'Imported Successfully and Activation Not Successful' => 'Imported Successfully and Activation Not Successful',
            'Partially Imported and Activation Not Successful'=>'Partially Imported and Activation Not Successful',
            'Not Imported Successfully and No Activation' => 'Not Imported Successfully and No Activation'
            
        );
        
        return $results;
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
