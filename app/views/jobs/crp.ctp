<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'jobs', 'action' => 'add')); ?></li> 
<h1> CONFLICT RESOULTION PAGE</h1>

<?php

	echo $this->Form->create('Job'); 

	$flag_sow = false;
	echo $this->Form->hidden('id', array ('value' => $id));
	
	if ($flag == 1)
	{
		echo "NO CONFLICTS DETECTED";
	}
	
	else
	{
		echo "CONFLICTS DETECTED";
		
		
		echo "<table>";
		echo "<tr>";
		echo "<th> Node Name </th>";
		echo "<th> Job conflicting with</th>";
		echo "<th> Created by </th>";
		echo "<th> Scope of Work </th>";
		echo "</tr>";
		
			
		$arrConflictingNodes = $conflicting_nodes;
		//debug ($arrConflictingNodes);
		
		//debug ($arrConflictingNodes);	
		foreach ($arrConflictingNodes as $nodes)
		{
		
			if (is_array($nodes))
			{
				//exit;
				$count = sizeof($nodes) - 2;
				while ($count > 0)
				{
					$node = $nodes[$count - 1]['NodeConflict'];
					echo "<tr>";
					
					echo "<td>";
					echo $node['node_name'];
					echo "</td>";
					
					echo "<td>";
					echo $node['conflicting_job_id'];
					echo "</td>";
					
					echo "<td>";
					echo $conflicting_nodes[0]['job_name'];
					echo "</td>";
					
					echo "<td>";
					if ($conflicting_nodes[0]['sow'] == 'Data Freeze')
					{
						$flag_sow = true;
					}
					
					echo $conflicting_nodes[0]['sow'];
					echo "</td>";
					
					$count --;
				}
			}
			
		}
		/*debug ($conflicting_informations);
		foreach ($conflicting_informations as $conflicting_information)
		{
			
			echo "<td>";
			if (sizeof($conflicting_information) > 0)
			{
				
				echo $conflicting_information[0]['Job']['Name'];
				
			}
			echo "</td>";
			
			
			//echo debug ($sow);
			echo "<td>";
			if (sizeof($conflicting_information) > 0)
			{
				
				echo $sow[$conflicting_information[0]['Job']['Scope_of_work']];
				
			}
			echo "</td>";
			
			
			echo "</tr>";
			
		}*/
		
		echo "</table>";
		
		echo "<br/><br/><i><b>";
		echo "In order to resolve this conflict, you can do the following after discussing with the PM/IM shown above. <br/>";
		echo "- Make this activity run in parallel with the conflicting activity <br/>";
		echo "- Change the start/end date/times so that they do not conflict with other activities <br/>";
		echo "</i></b>";
		echo "<br/><br/>";
		
		if ($flag_sow == true)
		{
			echo  $this->Form->input("conflict_comments", array('label'=>'Please provide the name of the PM who aproved the conflict.', 'type'=>'textarea'));
		}
		
		else
		{
			echo  $this->Form->input("conflict_comments", array('label'=>'Approval Comments', 'type'=>'textarea'));
		}
		echo $this->Form->submit('Submit Ticket');
	}