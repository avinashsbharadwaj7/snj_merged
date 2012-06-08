<?php
class Resource extends AppModel {
    public $name = 'Resource';
	public $validate = array (
		
		'user_signum' => array (
					'rule' => 'notEmpty',
					'message' => "FIELD CAN'T BE EMPTY"
				),
				
		'resource_name' => array (
					'rule' => 'notEmpty',
					'message' => "FIELD CAN'T BE EMPTY"
				),
				
		'start_date' => array (
					'rule' => 'notEmpty',
					'message' => "FIELD CAN'T BE EMPTY"
				),
				
		'end_date' => array (
					'rule' => 'notEmpty',
					'message' => "FIELD CAN'T BE EMPTY"
				),
				
		'start_time' => array (
					'rule' => 'notEmpty',
					'message' => "FIELD CAN'T BE EMPTY"
				),
				
		'end_time' => array (
					'rule' => 'notEmpty',
					'message' => "FIELD CAN'T BE EMPTY"
				),
		
		'approved' => array (
			'rule' => 'notEmpty',
			'message' => 'PLEASE ACCEPT IT'
		),
		
		'approval_comments' => array (
			'rule' => 'notEmpty',
			'message' => 'FIELD CAN NOT BE EMPTY'
		),
		
		'approval_comments_more' => array (
			'rule' => 'notEmpty',
			'message' => 'FIELD CAN NOT BE EMPTY'
		)
	);
	
	public function getAvailability($signum, $startDate, $startTime, $endDate, $endTime)
	{
		//$query = "select sum(availability) as avail from resources where user_signum = '".$signum."' and ('".$startTime."' between start_time and end_time) or (' ".$endTime."' between start_time and end_time) and (' ".$startDate."' between start_date and end_date) or ('".$endDate."' between start_date and end_date)";
		$query = "select sum(availability) as avail from resources where user_signum = '".$signum."' and nullified <> 1 and ((start_date between '".$startDate ."' and '". $endDate ."') or (end_date between '".$startDate ."' and '".$endDate ."')) and ((start_time >= '".$startTime ."' and end_time <= '". $endTime ."'))";
		$resAvailability = $this->query($query);
		
		$availability = $resAvailability[0][0]['avail'];
		
		
		
		//select *  from resources where user_signum = 'engineerRAN' and ((start_date between '2012-05-30' and '2012-05-30') or (end_date between '2012-05-31' and '2012-05-31')) and ((start_time >= '1:00:00') and (end_time<= '4:00:00'));
		
		return $availability;
	}
	
	public function getDesignationCount($designation, $jobId, $taskId)
	{
		$query = "SELECT count(*) as designation FROM resources WHERE designation LIKE '%". $designation ."%' AND job_id = '".$jobId."' AND task_id = '".$taskId . "'";
		$resDesignation = $this->query ($query);
		$countDesignation = $resDesignation[0][0]['designation'];
		
		return $countDesignation;
	}
	
	public function getJobInfo ($signum)
	{
		//debug ($signum);
		$query = "SELECT * FROM jobs as Job WHERE job_id IN (SELECT job_id FROM resources WHERE user_signum = '".$signum."')";
		
		$res = $this->query ($query);
		
		return $res;
	}
        
        public function getResource ($signum)
	{
		//debug ($signum);
		$query = "SELECT * FROM users WHERE username = '".$signum."'";
		
		$res = $this->query ($query);
		
		return $res;
	}
        
	public function getResourceCount($jobId)
	{
		$query = "select count(*) as NORES from resources where job_id=".$jobId;
		$res = $this->query ($query);
		$resEngg = $res[0][0]['NORES'];
		print_r("$resEngg".$resEngg);
		return $resEngg;
	}
	
	public function getEndTime ($jobId = null, $taskId = null, $signum = null)
	{
		$query = "SELECT end_time FROM resources as Resource WHERE job_id = '".$jobId."' AND task_id = '".$taskId."' AND user_signum = '".$signum."'";
		
		$res = $this->query($query);
		
		return $res[0]['Resource']['end_time'];
	}
}