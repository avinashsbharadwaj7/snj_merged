<h1>Resource posts</h1>
<table>
    <tr>
        <th>Resources Id</th>
        <th>Job Id</th>
        <th>Task Id</th>
        <th>User Signum</th>
        <th>designation</th>
        <th>start date</th>
        <th>start time</th>
        <th>end date</th>
        <th>end time</th>
        <th>location</th>
		<th>availability</th>
		<th>approved</th>
        
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($resources as $resource): ?>
    <tr>
        <td><?php echo $resource['Resource']['resources_id']; ?></td>
        <td><?php echo $resource['Resource']['job_id']; ?></td>
		<td><?php echo $resource['Resource']['user_signum']; ?></td>
        <td><?php echo $resource['Resource']['designation']; ?></td>
        <td><?php echo $resource['Resource']['start_date']; ?></td>
        <td><?php echo $resource['Resource']['start_time']; ?></td>
        <td><?php echo $resource['Resource']['end_date']; ?></td>
        <td><?php echo $resource['Resource']['end_time']; ?></td>
        <td><?php echo $resource['Resource']['location']; ?></td>
        <td><?php echo $resource['Resource']['start_date']; ?></td>
        <td><?php echo $resource['Resource']['availability']; ?></td>
        <td><?php echo $resource['Resource']['approved']; ?></td>
        
      </tr>
    <?php endforeach; ?>

</table>