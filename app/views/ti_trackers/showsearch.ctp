<?php
/*
 * Search for SLR module
 * 
 */
?>
    <head>
        <li><?php echo $html->link("Back",array('controller'=>'ti_trackers','action' => 'index') ); ?>
    </head>

    <fieldset>
        <?php echo $this->Html->link("Download Excel", array('action' => 'excel'), array("style"=>"text-align:center;margin-bottom:10px;display:block;")); ?>
        <div class="paging">
		
		<?php echo $paginator->first(); ?>
		
        <?php echo $paginator->prev('<< ' . __('Previous', true), array(), null, array('class' => 'disabled')); ?>
        |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
		
		<?php echo $paginator->last();	?>
        <br>
        <br><?php
        echo $paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>
        </div>


    <legend>NPI TI Tracker Reports</legend>

    <table>
        <tr>
                <th style='background-color:#BBBBBB;'>NPI TI Number</th>
                <th style='background-color:#BBBBBB;'>Date Created</th>
                <th style='background-color:#BBBBBB;'>Engineer</th>
                <th style='background-color:#BBBBBB;'>Project</th>
                <th style='background-color:#BBBBBB;'>Project Manager</th>
                <th style='background-color:#BBBBBB;'>Link</th>
        </tr>

        <?php foreach ($TiTrackers as $ti): ?>
            <tr>
               
                                <th style='font-size:12px;'><?php echo $html->link("TI".$ti['TiTracker']['id'],array('controller'=>'ti_trackers','action' => 'view',$ti['TiTracker']['id'] ),array('target' => '_blank') ); ?></th>
								<th style='font-size:12px;'><?php echo $ti['TiTracker']['created']; ?></th>
                                <th style='font-size:12px;'><?php echo $ti['TiTracker']['signum']." - ".$ti['TiTracker']['name']; ?></th>
                                <th style='font-size:12px;'><?php echo $ti['TiTracker']['project']; ?></th>
                                <th style='font-size:12px;'><?php echo $ti['TiTracker']['project_manager']; ?></th>
                                <th style='font-size:12px;'><?php echo $ti['TiTracker']['link']; ?></th>
        </tr>
        <?php endforeach; ?>

            </table>

     <div class="paging">
	 
		<?php echo $paginator->first(); ?>
		
        <?php echo $paginator->prev('<< ' . __('Previous Page', true), array(), null, array('class' => 'disabled')); ?>
                |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next Page', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
		
		<?php echo $paginator->last();	?>
		
                <br><br><?php
                echo $paginator->counter(array(
                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                ));
        ?>
            </div>
     </fieldset>