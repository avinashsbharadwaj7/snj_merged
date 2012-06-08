
<div id="nodeInfoDiv" class="grid_12 prepend_top append_bottom alpha omega highlight_row">
  <h5> TASK INFORMATION </h5>

<center>
<table cellpadding="0" cellspacing="0" border="0" class="ui-widget-content display" id="nodeInfoTable">
	<th>Task ID</th>
	<th>Sorucre  Node </th>
	<th>Target Node </th>
	<th>Adjacent Node </th>
	<th>Concerned Node </th>
	<th>Job ID </th>
	<th>Job Rev </th>
	
	<th>Task Rev</th>
	<th>Node Type </th>

	<?php 
$i = 0;
$oldtaskid = 0;
foreach ($nodes as $node): 

?>
<tr>
<td>

<?php 
$newtaskid = $nodes[$i]['tasks']['task_id'];
if($newtaskid != $oldtaskid)  
{
    
    echo $this->Html->link($newtaskid, array('controller' => 'jobs', 'action' => 'view', $nodes[$i]['tasks']['job_id'], $nodes[$i]['tasks']['task_id']));
    echo "<br/>";
	echo "Start DateTime:<br/>".$nodes[$i]['tasks']['start_date']." ".$nodes[$i]['tasks']['start_time']."<br/>";; 
	echo "<br/>";
    echo "End DateTime:<br/>".$nodes[$i]['tasks']['end_date']." ".$nodes[$i]['tasks']['end_time']."<br/>"; 
}
else 
        echo ""; ?>

        </td>
	
		<td>
            <?php echo $nodes[$i]['nodes']['source_node']; ?>
        </td>
		<td>
            <?php echo $nodes[$i]['nodes']['target_node']; ?>
        </td>
		<td>
            <?php echo $nodes[$i]['nodes']['adjacent_nodes']; ?>
        </td>
		<td>
            <?php echo $nodes[$i]['nodes']['concerned_node']; ?>
        </td>
		<td>
            <?php echo $nodes[$i]['nodes']['job_id']; ?>
        </td>
		<td>
            <?php echo $nodes[$i]['nodes']['job_rev']; ?>
        </td>
		
		<td>
            <?php echo $nodes[$i]['nodes']['task_rev']; ?>
        </td>
		<td>
            <?php echo $nodes[$i]['nodes']['node_type']; ?>
<br/><br/><br/>
        </td>
	
    </tr>

    
<?php 
$i = $i + 1;
$oldtaskid = $newtaskid;
endforeach; 
?>
</center>
</table>


	
