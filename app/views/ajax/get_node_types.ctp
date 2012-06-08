<?php if(count($list) > 0): ?>
<?php foreach($list as $id => $name): ?>
	<option value="<?php echo $id; ?>"><?php echo $name ?></option>
<?php endforeach; ?>
<?php else: ?>
	<option>None Found</option>
<?php endif; ?>
