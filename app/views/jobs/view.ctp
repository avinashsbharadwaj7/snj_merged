<li id='backButton'><?php echo $this->Html->link(__('Back', true), array('controller' => 'jobs', 'action' => 'mytickets')); ?> </li>

<?php
  echo $html->css(array(  'snj/960'
                        , 'snj/snj'
                        , 'snj/demo_table_jui'
                        , 'snj/redmond/jquery-ui-1.8.16.custom'
                       ));
                       
  echo $javascript->link(array('snj/jquery-1.6.2.min'
                               , 'snj/jquery-ui-1.8.16.custom.min'
                               , 'snj/jquery.dataTables.min'
                               , 'snj/jquery.uiforms'
							   , 'snj/view'
                              ));
                              
  $groupId = Authsome::get('user_group_id');
  $userOrg = Authsome::get('organization');
  $revNo = @(int)$job['Job']['rev_no'];
  
  //debug ($userOrg);
  
  
?>


<?php

	if (sizeof($arrJobId) > 1)
	{
		foreach($arrJobId as $jobId)
		{			
			
			if ($jobId != $job['Job']['job_id'])
			{
				echo '<center>';
				echo '<h1> THERE ARE THESE JOBS ASSOCIATED WITH THIS TICKET </h1>';
				echo '<a href = "'.$jobId . '", target = "_blank">' . 'Job '. $jobId. '</a>';
				echo '</center>';
			}
			
			//echo '<br/>';
			//echo '<br/>'; 
		}
	}


?>
<div id="viewContainer" class="container_12 ui-widget">

<div id="jobInfo" class="grid_10 prefix_1 suffix_1 prepend_top alpha omega highlight_row">
  <h2><?php  __('Job ');?><?php echo $job['Job']['job_id'];?> - 
  	<?php if(!empty($job['Job']['rev_no'])){ ?>
  	Revision <?php echo $job['Job']['rev_no'];?>
  	<?php } ?>
  	<br />
  </h2>
  <dl><?php $i = 0; $class = ' class="altrow"';?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Created'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['date_created']; ?>
      &nbsp;
    </dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Signum'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Signum']; ?>
      &nbsp;
    </dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Name']; ?>
      &nbsp;
    </dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Organization']; ?>
      &nbsp;
    </dd>
                
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Work Location'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Work_Location']; ?>
      &nbsp;
    </dd>
	
	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customer'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['customer']; ?>
      &nbsp;
    </dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Network Number'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Network_Number']; ?>
      &nbsp;
    </dd>
                
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('More ID'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['More_id']; ?>
      &nbsp;
    </dd>
	
	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Request ID'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['request_id']; ?>
      &nbsp;
    </dd>
	
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CCB Ticket Number'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['CCB_tckt_no']; ?>
      &nbsp;
    </dd>
                
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Technology'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Technology']; ?>
      &nbsp;
    </dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Region'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Region']; ?>
      &nbsp;
    </dd>
     
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Market'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Market']; ?>
      &nbsp;
    </dd>

    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Work Day Time'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Work_day_time']; ?>
      &nbsp;
    </dd>
                
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number of Engineers Needed'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['no_of_eng_needed']; ?>
      &nbsp;
    </dd>
    
	<?php if ($job['Job']['Organization'] == 'LDO NIC') : ?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Request Type'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Request_type']; ?>
      &nbsp;
    </dd>
    <?php endif; ?>            
	
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Scope of Work'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['Scope_of_work']; ?>
      &nbsp;
    </dd>
	
	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conflict Comments'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['conflict_comments']; ?>
      &nbsp;
    </dd>
	
	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Addresses'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['email_addresses']; ?>
      &nbsp;
    </dd>
    <?php if(!empty($job['Job']['mop_link'])){?>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('MOP Link'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
     <?php 
      //debug($job['Job']);
      if( $job['Job']['mop_creation_text'] ==  null) 
	  {		  
          echo '<a href = ' . $job['Job']['mop_link'] .', target = "_blank">' .$job['Job']['mop_name']."</a>"; 
	  }
      else
          echo "<a href = http://".$job['Job']['mop_creation_text'] .', target = "_blank">' .$job['Job']['mop_creation_text']."</a>"; 
      ?>

      &nbsp;
    </dd>
    <?php } ?>            
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('MOP Risk Level'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
      <?php echo $job['Job']['mop_risk_level']; ?>
      &nbsp;
    </dd>



    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('OUTAGE'); ?></dt>
    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php

	foreach ($tasks as $task)
	{
		
		if ($task['Task']['outage'] == "1")
		{
			echo $task['Task']['task_id']." - OUTAGE";
		}
	}
?>

      &nbsp;
    </dd>
	
  </dl>
  
</div> <!-- jobInfo --> 
<div id="nodeInfoDiv" class="grid_12 prepend_top append_bottom alpha omega highlight_row">
  <h5> TASK AND NODE INFORMATION </h5>
  <table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="nodeInfoTable">
    <thead>
      <tr>
        <th>Job Id</th>
        <th>Task Id</th>
        <?php
			if ($groupId == $lmgroupid || $groupId == $pmgroupid)
			{
				echo "<th>Status</th>";
			}			
			
		?>
		<th>Start Date / Time</th>
		<th>End Date / Time </th>
        <th>Concerned Node</th>
		<th>Node Type</th>
		
		<?php 
		$flag = true;
		if ($nodes[0]['Node']['target_node'] != "---")
		{
			echo "<th>Source Node</th>";
			echo "<th>Target Node</th>";
			echo "<th>Adjacent Nodes</th>";
			$flag = false;
		}
		?>
		
		<?php
			if ($groupId == $lmgroupid || $groupId == $enggroupid)
			{
				echo "<th> Action </th>";
				echo "<th>Auth.<br />Code</th>";
			}			
			
		?>
      </tr>
    </thead>
    <tbody>
	  <?php $count = 0; ?>
	  <?php $total = count($nodes);
			//debug($nodes);
		?>
      <?php foreach ($nodes as $node): ?>
	  
	  <?php 
		//debug($count);
		/*if ($count % 2 != 0)
		{
			echo '<tr bgcolor="#0000FF" style="border-bottom:1px solid #dfdfdf">';
		}
		
		else
		{
			echo '<tr bgcolor="#0000FF" style="border-bottom:1px solid #dfdfdf">';
		}*/
		if(($count+1)==$total){
			echo '<tr bgcolor="#0000FF" style="border-bottom:1px solid #dfdfdf">';
		}else{
			echo '<tr bgcolor="#0000FF">';
		}
		
	?>
	  
		  <?php if ($count == 0 || $nodes[$count]['Node']['task_id'] != $nodes[$count-1]['Node']['task_id']) :?>
		  
			<td><?php echo $node['Node']['job_id'];?></td>
			<td><?php echo $node['Node']['task_id']?></td>
			<?php
				if ($groupId == $lmgroupid || $groupId == $pmgroupid)
				{
					switch(@(int)$tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status']){
						case 1:
							echo "<td>Started</td>";
						break;
						case 2:
							echo "<td>Partially<br />Complete</td>";
						break;
						case 3:
							echo "<td>Restarted</td>";
						break;
						case 4:
							echo "<td>Complete</td>";
						break;
						default:
							echo "<td></td>";
					}
					
				}			
			?>
			<td><?php echo $tasks[$node['Node']['task_id'] - 1]['Task']['start_date'] ?> <br />
			<?php echo $tasks[$node['Node']['task_id'] - 1]['Task']['start_time'] ?> </td>
			<td><?php echo $tasks[$node['Node']['task_id'] - 1]['Task']['end_date'] ?> <br />
			<?php echo $tasks[$node['Node']['task_id'] - 1]['Task']['end_time'] ?> </td>
		  <?php else : ?>
		  
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<?php if ($groupId == $lmgroupid || $groupId == $pmgroupid){ ?>
			<td> </td>
			<?php } ?>
			
		<?php endif ?>
			
		  
          <td><?php echo $node['Node']['concerned_node']; ?></td>
		  <td><?php echo $node['Node']['node_type']; ?></td>
		  
		  <?php if ($flag == false) : ?>
          <td><?php echo $node['Node']['source_node']; ?></td>
          <td><?php echo $node['Node']['target_node']; ?></td>
          <td><?php echo $node['Node']['adjacent_nodes']; ?></td>
		  <?php endif ?>
	 
		<?php if ($groupId != $pmgroupid) : ?>
		<td>
		<?php endif ?>
		 <?php 
		 
			

			if ($count == 0 || $nodes[$count]['Node']['task_id'] != $nodes[$count-1]['Node']['task_id'])
			{
			//echo "<td>";
			if ($groupId == $enggroupid && $userOrg == 'LDO NIC')
			{

				
				if ($count == 0 || $nodes[$count]['Node']['task_id'] != $nodes[$count-1]['Node']['task_id'])
				{
					//echo debug ($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status']);
					if ($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == '' || $tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == '2')
					{
						echo $this->Html->link("Self Assign", array('controller' => 'jobs', 'action' => 'viewengineer', $node['Node']['job_id'], $node['Node']['task_id']));
						echo "<hr />";
					}	
								
					else if ($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 3)
					{
						echo "COMPLETED";
						echo "<hr />";
					}
					
					else
					{
						echo $this->Html->link("Change Status", array('controller' => 'jobs', 'action' => 'viewengineer', $node['Node']['job_id'], $node['Node']['task_id']));
						echo "<hr />";
					}
					
					if (($flag == false || $job['Job']['Scope_of_work'] == "NodeB Rehome" && ($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 1 || $tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 4)))
					{	
						if ($groupId == $enggroupid)
						{
							//echo "<td>";
							
							echo $this->Html->link("Update IP Address", array('controller' => 'nodes', 'action' => 'target_node', $node['Node']['job_id'], $node['Node']['task_id'], $tasks[$node['Node']['task_id'] - 1]['Task']['node_name']));
							//echo "<br/>";
							//echo "</td>";
						}
					}
				}
				//echo "<br/>------------<br/>";	

			}
			
			//debug ($job['Job']['Scope_of_work']);
			
			
			if ($groupId == $enggroupid && $userOrg != 'LDO NIC')
			{

				echo $this->Html->link("Change Status", array('controller' => 'jobs', 'action' => 'viewengineer', $node['Node']['job_id'], $node['Node']['task_id']));
				echo "<hr />";
				//echo $this->Html->link("Add Support Signums", array('controller' => 'jobs', 'action' => 'support_signum', $node['Node']['job_id']));
				
				if (($flag == false || $job['Job']['Scope_of_work'] == "NodeB Rehome" && ($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 1 || $tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 4)))
				{
					if ($groupId == $enggroupid)
					{
						//echo "<hr />";
						//debug ($tasks[$node['Node']['task_id'] - 1]['Task']['node_name']);
						echo $this->Html->link("Update IP address", array('controller' => 'nodes', 'action' => 'target_node', $node['Node']['job_id'], $node['Node']['task_id'], $tasks[$node['Node']['task_id'] - 1]['Task']['node_name']));											
					}
				}
				
				//echo "</td>";
			}			
			//echo "</td>";
		}
		?>
		
		<?php $count++ ?>
		<?php if ($groupId != $pmgroupid) : ?>
		</td>
		<?php endif; ?>
		<!-- Begin Eddie -->
		<?php
		//if ($groupId == $lmgroupid && ($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 1 || $tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'] == 4))
		if ($groupId == $lmgroupid || $groupId == $enggroupid)
			{
				echo "<td>";
				if(!empty($tasks[$node['Node']['task_id'] - 1]['Task']['ticket_status'])) echo $this->Html->link("Generate", array('controller' => 'authcodes', 'action' => 'index', $node['Node']['job_id'], $node['Node']['task_id'], $node['Node']['concerned_node']));
				echo "</td>";
			}
		?>
		<! -- End Eddie -->
		
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div> <!-- end nodeInfoDiv -->

<!--
<center>
<FORM METHOD="LINK" ACTION="../support_signum/<?php echo $node['Node']['job_id'] ?>">
<INPUT TYPE="submit" VALUE="ADD SUPPORT SIGNUMS">
</FORM>
</center>
-->

<?php

	//debug($userOrg);
	
	if (($groupId == $lmgroupid) && $tasks[0]['Task']['ticket_status'] != "3" && $userOrg != 'LDO NIC' && $revNo>0)
	{

		echo '<center>
			<?php //debug ($tasks) ?>
			<FORM METHOD="LINK" ACTION="../../resources/add/'.$tasks[0]['Task']['job_id'].'">
			<INPUT TYPE="submit" VALUE="ADD RESOURCE OR SUPPORT">
			</FORM>
			
		</center>';
	}
	
?>
<?php if (($groupId == $pmgroupid) && $job['Job']['rev_no']!='-1') { ?>

	<center>
		
		<FORM METHOD = "LINK" ACTION ="../../jobs/cancel/<?php echo $tasks[0]['Task']['job_id'] ?>">
		<INPUT TYPE = "submit" VALUE = "CANCEL TICKET" >
		</FORM>
		
	</center>

<?php } ?>


<?php if (!empty ($resources)) : ?>

<div id="resourceInfoDiv" class="grid_12 prepend_top append_bottom alpha omega highlight_row">
  <h5> RESOURCE INFORMATION </h5>
  <table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="resourceInfoTable">
    <thead>
		<th>Job ID</th>
		<th>Task ID</th>
		<th>Role</th>
		<th>Signum </th>
		<th>Designation </th>
		<th>Start Date </th>
		<th>Start Time </th>
		<th>End Date </th>
		<th>End Time </th>
		<th>Availability </th>
		
		<?php
			if ($groupId == $lmgroupid)
			{
				echo "<th> Action </th>";
			}
		?>
		

	</thead>
	
	<tbody>
		<?php foreach ($resources as $resource): ?>
			<tr>
			  <td><?php echo $resource['Resource']['job_id'];?></td>
			  <td><?php echo $resource['Resource']['task_id']?></td>
			  <td><?php echo ($resource['Resource']['availability']==0)? "Support":"Resource";?></td>
			  <td><?php echo $resource['Resource']['user_signum']; ?></td>
			  <td><?php echo $resource['Resource']['designation']; ?></td>
			  <td><?php echo $resource['Resource']['start_date']; ?></td>
			  <td><?php echo $resource['Resource']['start_time']; ?></td>
			  <td><?php echo $resource['Resource']['end_date']; ?></td>
			  <td><?php echo $resource['Resource']['end_time']; ?></td>
			  <td><?php echo $resource['Resource']['availability']; ?></td>
			  
		<?php
		 
			if ($groupId == $lmgroupid )
			{
				echo "<td>";
				echo $this->Html->link("Extend Time", array('controller' => 'resources', 'action' => 'exception', $resource['Resource']['job_id'], $resource['Resource']['task_id'], $resource['Resource']['user_signum']));
				echo "</td>";
			}
		?>
			</tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php
	if (($groupId == $lmgroupid)&&$revNo>0)
	{

		echo '<center>
			<?php //debug ($tasks) ?>
			<FORM METHOD="LINK" ACTION="../../resources/outage/'.$tasks[0]['Task']['job_id'].'">
			<INPUT TYPE="submit" VALUE="OUTAGE">
			</FORM>
			
		</center>';
	}
	
	
?>


<?php endif; ?>

<?php if (!empty ($jobs)){ ?>
<div id="revisionDiv" class="grid_12 prepend_top append_bottom alpha omega highlight_row">
  <h5> REVISION HISTORY </h5>
  <table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="revisionTable">
    <thead>
		<th>Revision #</th>
		<th>Modified By</th>
		<th>Modified On</th>
	</thead>
	<tbody>
		<?php foreach($jobs as $row) {?>
		<tr>
			<td>
				<?php if($row['Job']['rev_no']=='-1'){ ?>
				<?php echo "Cancelled"; ?>
				<?php }else{ ?>
				<?php echo $this->Html->link ($row['Job']['rev_no'], array('controller' => 'jobs', 'action' => 'view',$row['Job']['job_id'],$row['Job']['rev_no']));?>
				<?php } ?>
			</td>
			<td>
				<?php if(@(int)$row['Job']['rev_no']==1) { ?>
					<?php echo "Not Applicable";?>
				<?php }else{ ?>
					<?php echo $row['Job']['modifier_name']?> (<?php echo $row['Job']['modifier_signum'];?>)
				<?php } ?>
			</td>
			<td>
				<?php if(@(int)$row['Job']['rev_no']==1) { ?>
					<?php echo "Not Applicable";?>
				<?php }else{ ?>
					<?php echo $row['Job']['modification_timestamp'];?>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
  </table>
</div>
<?php } ?>
  
  <?php 
    $groupId = Authsome::get('user_group_id');
    if ($groupId == $pmgroupid)
    {
      echo $this->Html->link ('ADD ANOTHER JOB', array('controller' => 'jobs', 'action' => 'add')); 
    }
  ?>
  
  <?php //echo $this->Html->link ('EDIT JOB', array('controller' => 'jobs', 'action' => 'edit', $task['Task']['job_id'])); ?>
</div> <!-- end viewContainer -->
