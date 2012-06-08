<?php
echo $html->css(array('rnc/style', 'rnc/jquery-ui', 'rnc/view', 'rnc/css_menu'));
echo $html->css('rnc/bcp');
e($javascript->link('rnc/jquery-1.4.1.min'));
e($javascript->link('Highcharts/js/highcharts.src'));
e($javascript->link('rnc/jquery-1.4.1.min'));
e($javascript->link('rnc/rnc-graphical-overview'));
?>
<div id="rnc-graphical-overview"></div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Create New RNC Report', true), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('RNC Dashboard', true), array('action' => 'index')); ?></li>
	</ul>
</div>