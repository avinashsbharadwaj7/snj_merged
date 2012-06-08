<?php

	class Task extends AppModel
	{
		public $name = 'Task';
		public $primaryKey = 'id_tasks';
		
		function getTicketConflictStatus ($jobId, $taskId)
		{
			$query = "SELECT ticket_conflict_status FROM tasks WHERE job_id = '".$jobId. "'AND task_id = '". $taskId. "'";
			
			$res = $this->query($query);
			
			$sizeRes = sizeof($res);					
			$resTicketConflictStatus = $res[$sizeRes - 1]['tasks']['ticket_conflict_status'];
			
			
			return $resTicketConflictStatus;
		}
		
		function getCountTasks ($jobId)
		{
			$query = "SELECT count(*) as no_of_tasks FROM tasks WHERE job_id = '".$jobId."' AND rev_no = (SELECT max(rev_no) FROM tasks WHERE job_id = '".$jobId."')";
			$res = $this->query($query);
			
			$resCountTasks = $res[0][0]['no_of_tasks'];
			
			
			return $resCountTasks;
		}
		
		function cancel($jobId = null, $signum = null, $name = null)
		{
			if ($jobId != null)
			{
				$query = "UPDATE tasks SET rev_no = '-1', job_rev_no = 0,modifier_signum='$signum',modifier_name='$name',modifier_timestamp='".date("Y-m-d H:i:s")."' WHERE job_id = '".$jobId."'";
				//debug($query);
				$res = $this->query ($query);
			}
		}
	}
?>