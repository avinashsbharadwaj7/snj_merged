<?PHP
    $class = 'class="alt row"';
    //pr($data);
?>

<style>

root {
    display: block;
}
html {
    font-family: arial;
    font-size: 12px;
}
div.lte-link {
    margin: 2px 2px 2px 245px;
    padding: 5px;
}
div.div_rssi_table {
    height: 128px;
    margin: 0;
    padding: 0;
    width: 520px;
}
div.div_rssi_row {
    margin: 0;
    padding: 0;
    width: 100%;
}
div.div_rssi_column_header {
    clear: none;
    float: left;
    margin: 0;
    padding: 0 0 6px;
    text-align: center;
    width: 62%;
}
div.div_rssi_column {
    clear: none;
    float: left;
    margin: 0;
    padding: 0 0 6px;
    text-align: center;
    width: 31%;
}
label.div_rssi_column {
    width: 0;
}
div.lte_view {
}
div.lte_container {
    margin-left: 0;
}
div.altrow {
    background: none repeat scroll 0 0 #E4E8EF;
}
div.view_col_left {
    border-bottom: 1px solid #DFDFDF;
    clear: none;
    float: left;
    font-size: 12px;
    font-weight: bold;
    line-height: 1.5em;
    margin: 0;
    padding: 0 5px;
    width: 30%;
    word-wrap: break-word;
}
div.view_col_right {
    border-bottom: 1px solid #DFDFDF;
    clear: right;
    float: left;
    font-size: 12px;
    line-height: 1.5em;
    margin: 0;
    width: 65%;
    word-wrap: break-word;
}
div.paginator_table {
    margin: 0;
    padding: 0;
    width: 100%;
}
div.paginator_row {
    margin: 0;
    min-width: 775px;
    padding: 0;
    width: 100%;
}
div.paginator_col_header_inner {
    background-color: #C7E2CC;
    line-height: 1.5em;
    padding: 6px;
}
div.paginator_col_header {
    border: 1px solid #000000;
    clear: none;
    float: left;
    font-weight: bold;
    margin: 1px;
    width: 16%;
}
div.paginator_col_header_id {
    border: 1px solid #000000;
    clear: none;
    float: left;
    font-weight: bold;
    margin: 1px;
    width: 100px;
}
div.paginator_col_header_date {
    border: 1px solid #000000;
    clear: none;
    float: left;
    font-weight: bold;
    margin: 1px;
    width: 90px;
}
div.paginator_col_inner {
    padding: 6px;
}
div.paginator_col_inner_alt {
    background: none repeat scroll 0 0 #E4E8EF;
    padding: 6px;
}
div.paginator_col {
    border: 1px solid #000000;
    clear: none;
    float: left;
    margin: 1px;
    overflow: auto;
    width: 16%;
}
div.paginator_col_id {
    border: 1px solid #000000;
    clear: none;
    float: left;
    margin: 1px;
    width: 100px;
}
div.paginator_col_date {
    border: 1px solid #000000;
    clear: none;
    float: left;
    margin: 1px;
    width: 90px;
}
div.paginator_nav_left {
    margin: 0;
    padding-bottom: 6px;
    padding-left: 1px;
    padding-top: 6px;
    text-align: left;
}
table {
    width: 100%;
}
table tbody td {
    text-align: left;
}
table thead th {
    border-bottom: 1px solid #000000;
    text-align: left;
}
table tbody tr:nth-child(2n+1) {
    background: none repeat scroll 0 0 #DFDFDF;
}

</style>


<?php
  
                              
  $groupId = Authsome::get('user_group_id');
  $userOrg = Authsome::get('organization');
  
  //pr($userOrg);
  //pr($data);
  
?>

<div class="lte_container">
	<h2><?php  __('Job ');?><?php echo $data['Job']['job_id'];?></h2>


	<fieldset>
	    <legend>Job Information</legend>
	    <div class="lte_view">
	    	<?PHP $i = 0; ?>
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Date Created'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['date_created']; ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Signum'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Signum'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Name'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Name'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Organization'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Organization'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Work Location'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Work_Location'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Customer'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['customer'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Network Number'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Network_Number'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Mode ID'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['More_id'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Request ID'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['request_id'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('CCB Ticket Number'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['CCB_tckt_no'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Technology'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Technology'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Region'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Region'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Market'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Market'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Work Day Time'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Work_day_time'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Number of Engineers Needed'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['no_of_eng_needed'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Request Type'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Request_type'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('Scope of Work'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['Scope_of_work'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('MOP Link'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['mop_link'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	        
	        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
	            <div class="view_col_left"><?php __('MOP Risk Level'); ?></div>
	            <div class="view_col_right"><?php echo $data['Job']['mop_risk_level'];  ?></div>
	            <div style="clear: both;"></div>
	        </div>
	                
	    </div>
	</fieldset>

	<fieldset>
	    <legend>Task Information</legend>
		<div class="lte_view">
	    	<?PHP $i = 0; ?>
	    	<table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="taskInfoTable">
		    <thead>
		      <tr>
		        <th>Job Id</th>
		        <th>Task Id</th>
		        <th>Revision</th>
		        <th>Start Date</th>
		        <th>Start Time</th>
		        <th>End Date</th>
		        <th>End Time</th>
				
				<?php
					if ($data['Job']['Work_day_time'] == "Week Maintenance Window Time" || $data['Job']['Work_day_time'] == "Weekend Maintenance Window Time")
					{
						echo "<th>Maint Start Date</th>";
						echo "<th>Maint Start Time</th>";
						echo "<th>Maint End Date</th>";
						echo "<th>Maint End Time</th>";
					}
				?>
				
				
		      </tr>
		    </thead>
		  
		    <tbody>
		      <?php foreach ($data['Task'] as $task){ ?>
		        <tr>
		          <td><?php echo $task['Task']['job_id'];?></td>
		          <td><?php echo $task['Task']['task_id']?></td>
		          <td><?php echo $task['Task']['rev_no']; ?></td>
		          <td><?php echo $task['Task']['start_date']; ?></td>
		          <td><?php echo $task['Task']['start_time']; ?></td>
		          <td><?php echo $task['Task']['end_date']; ?></td>
		          <td><?php echo $task['Task']['end_time']; ?></td>
				  
				  <?php
				  
					if ($data['Job']['Work_day_time'] == "Week Maintenance Window Time" || $data['Job']['Work_day_time'] == "Weekend Maintenance Window Time")
					{
						echo "<td>";
						echo $task['Task']['maintenance_window_start_date']; 
						echo "</td>";
					
						echo "<td>";
						echo $task['Task']['maintenance_window_start_time'];
						echo "</td>";
						
						
						echo "<td>";
						echo $task['Task']['maintenance_window_end_date'];
						echo "</td>";
						
						echo "<td>";
						echo $task['Task']['maintenance_window_end_time'];
						echo "</td>";
					}
				?>
				
		        </tr>
		      <?php } ?> 
		    </tbody>
		  </table>
	    </div>
	</fieldset>
	
	<fieldset>
	    <legend>Node Information</legend>
		<div class="lte_view">
	    	<?PHP $i = 0; ?>
	    	<table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="nodeInfoTable">
			    <thead>
			      <tr>
			        <th>Job Id</th>
			        <th>Task Id</th>
			        <th>Concerned Node</th>
					<th>Node Type</th>
			        <th>Source Node</th>
			        <th>Target Node</th>
			        <th>Adjacent Nodes</th>
					
					
			      </tr>
			    </thead>
			    <tbody>
			      <?php foreach ($data['Node'] as $node){ ?>
			        <tr>
			          <td><?php echo $node['Node']['job_id'];?></td>
			          <td><?php echo $node['Node']['task_id']?></td>
			          <td><?php echo $node['Node']['concerned_node']; ?></td>
					  <td><?php echo $node['Node']['node_type']; ?></td>
			          <td><?php echo $node['Node']['source_node']; ?></td>
			          <td><?php echo $node['Node']['target_node']; ?></td>
			          <td><?php echo $node['Node']['adjacent_nodes']; ?></td>
			        </tr>
			      <?php } ?>
			    </tbody>
			  </table>
	    </div>
	</fieldset>

	<fieldset>
	    <legend>Resource Information</legend>
		<div class="lte_view">
	    	<?PHP $i = 0; ?>
	    	<table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="resourceInfoTable">
			    <thead>
					<th>Job ID</th>
					<th>Task ID</th>
					<th>Signum </th>
					<th>Designation </th>
					<th>Start Date </th>
					<th>Start Time </th>
					<th>End Date </th>
					<th>End Time </th>
					<th>Availability </th>
					
				</thead>
				
				<tbody>
					<?php if(empty($data['Resource'])){ ?>
						<tr>
							<td colspan="9">No Resources Allocated</td>
						</tr>
					<?php }else{ ?>
						<?php foreach ($data['Resource'] as $resource){ ?>
							<tr>
							  <td><?php echo $resource['Resource']['job_id'];?></td>
							  <td><?php echo $resource['Resource']['task_id']?></td>
							  <td><?php echo $resource['Resource']['user_signum']; ?></td>
							  <td><?php echo $resource['Resource']['designation']; ?></td>
							  <td><?php echo $resource['Resource']['start_date']; ?></td>
							  <td><?php echo $resource['Resource']['start_time']; ?></td>
							  <td><?php echo $resource['Resource']['end_date']; ?></td>
							  <td><?php echo $resource['Resource']['end_time']; ?></td>
							  <td><?php echo $resource['Resource']['availability']; ?></td>
							</tr>
						<?php } ?>   
					<?php } ?>    
			    </tbody>
			  </table>
	    </div>
	</fieldset>
</div> <!-- end viewContainer -->