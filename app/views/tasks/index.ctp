<h1>Jobs</h1>
<BR>

<BR><BR>
<table border="1" cellpadding="5" cellspacing="5" width="100%"
style="background-color:lightblue;border:3px dashed black;">
     <tr>
        <th>Job Id</th>
        <th>Task Id</th>
		<th>Options</th>
		<th>Revision Number</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>maintenance Window Start Date</th>
        <th>maintenance Window Start Time</th>
		<th>maintenance Window End Date</th>
		<th>maintenance Window End Time</th>
    </tr>
<!-- Here's where we loop through our $tasks array, printing out task info -->

    <?php foreach ($tasks as $task): ?>
    <tr>
        
		<td><?php echo $task['Task']['job_id'];?></td>
		<td><?php echo $this->Html->link($task['Task']['task_id'], array('action' => 'view', $task['Task']['job_id']));?>
    	</td>
        <td width="60%">
    	<?php 
			if (Authsome::get('user_group_id') == '109')
			{
				echo $this->Html->link("Add-Resource", array('controller' => 'resources', 'action' => 'add', $task['Task']['job_id'], $task['Task']['task_id']));
			}
			
			else
			{
				echo $this->Html->link("SELF ASSIGN", array('controller' => 'jobs', 'action' => 'viewengineer', $task['Task']['job_id'], $task['Task']['task_id']));
			}
		?>
        
        </td>
        <td>
            <?php echo $task['Task']['rev_no']; ?>
        </td>
		<td>
            <?php echo $task['Task']['start_date']; ?>
        </td>
		<td>
            <?php echo $task['Task']['end_date']; ?>
        </td>
		<td>
            <?php echo $task['Task']['start_time']; ?>
        </td>
		<td>
            <?php echo $task['Task']['end_time']; ?>
        </td>
		<td>
            <?php echo $task['Task']['maintenance_window_start_date']; ?>
        </td>
		<td>
            <?php echo $task['Task']['maintenance_window_start_time']; ?>
        </td>
		<td>
            <?php echo $task['Task']['maintenance_window_end_date']; ?>
        </td>
		<td>
            <?php echo $task['Task']['maintenance_window_end_time']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>