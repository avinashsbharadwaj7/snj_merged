<h1>Jobs</h1>
<BR>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<BR><BR>
<table border="1" cellpadding="5" cellspacing="5" width="100%"
style="background-color:lightblue;border:3px dashed black;">
     <tr>
        <th>Id</th>
        <th>Actions</th>
		<th>Date created</th>
		<th>PM/ IM Signum</th>
		<th>PM/ IM Name</th>
		<th>Organization</th>
		<th>Work Location</th>
		<th>Network Number</th>
        <th>MORE ID</th>
		<th>CCB Ticket Number</th>
		<th>Technology</th>
		<th>Region</th>
		<th>Market</th>
		<th>Work Day and Time</th>
		<th>Number of engineers required</th>
		<th>Request Type</th>
		<th>Scope Of Work</th>
		<th>MOP Link</th>
		<th>MOP Risk Level</th>
		<th>Node Entry Type</th>
    </tr>
<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($jobs as $job): ?>
    <tr>
        
		<td><?php echo $this->Html->link($job['Job']['job_id'], array('controller' => 'Tasks', 'action' => 'index', $job['Job']['job_id']));?></td>
        
        <td width="60%">
           <?php echo $this->Html->link('Edit', array('action' => 'edit', $job['Job']['job_id']));?>	
        </td>
        <td>
            <?php echo $job['Job']['date_created']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Signum']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Name']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Organization']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Work_Location']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Network_Number']; ?>
        </td>
		<td>
            <?php echo $job['Job']['More_id']; ?>
        </td>
		<td>
            <?php echo $job['Job']['CCB_tckt_no']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Technology']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Region']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Market']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Work_day_time']; ?>
        </td>
		<td>
            <?php echo $job['Job']['no_of_eng_needed']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Request_type']; ?>
        </td>
		<td>
            <?php echo $job['Job']['Scope_of_work']; ?>
        </td>
		<td>
            <?php echo $job['Job']['mop_link']; ?>
        </td>
		<td>
            <?php echo $job['Job']['mop_risk_level']; ?>
        </td>
		
    </tr>
    <?php endforeach; ?>

</table>