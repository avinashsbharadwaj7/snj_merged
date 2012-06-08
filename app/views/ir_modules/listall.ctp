<?PHP
    echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
    echo $html->css('jscal2', 'stylesheet');
    echo $html->css('border-radius', 'stylesheet');
    echo $html->css('steel/steel', 'stylesheet');
    echo $html->css("lte-lit");
    
    $class = " class=\"paginator_col_inner\"";
    $class_alt = " class=\"paginator_col_inner_alt\"";
?>


<div class="table_cdma">
<div class="irModules index">
	<h2><?php __('Ir Modules');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('date_initiated');?></th>
			<th><?php echo $this->Paginator->sort('engineer_name');?></th>
			<th><?php echo $this->Paginator->sort('customer');?></th>
			<th><?php echo $this->Paginator->sort('engineer_work_location');?></th>
			<th><?php echo $this->Paginator->sort('region');?></th>
			<th><?php echo $this->Paginator->sort('activity_type');?></th>
			<th><?php echo $this->Paginator->sort('activity_result');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($irModules as $irModule):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $html->link("IR".$irModule['IrModule']['id'],array('controller'=>'ir_modules','action' => 'view',$irModule['IrModule']['id'] ),array('target' => '_blank') ); ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['date_initiated']; ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['engineer_name']; ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['customer']; ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['engineer_work_location']; ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['region']; ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['activity_type']; ?>&nbsp;</td>
		<td><?php echo $irModule['IrModule']['activity_result']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $paginator->first(); ?>
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		<?php echo $paginator->last();	?>
	</div>
</div>
    </div>
	