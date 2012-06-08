<?php
/*
 * Search for SLR module
 * 
 */
?>
    <head>
        <li><?php echo $html->link("Back",array('controller'=>'noc_reports','action' => 'index') ); ?>
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


    <legend>NOC Reports</legend>

    <table>
        <tr>
                <th style='background-color:#BBBBBB;'>NOC Report Number</th>
                <th style='background-color:#BBBBBB;'>Date Created</th>
                <th style='background-color:#BBBBBB;'>Report Creator</th>
                <th style='background-color:#BBBBBB;'>Region</th>
                <th style='background-color:#BBBBBB;'>RNC</th>
                <th style='background-color:#BBBBBB;'>Site Name</th>
                <th style='background-color:#BBBBBB;'>Activity Type</th>
        </tr>

        <?php foreach ($NocReports as $noc): ?>
            <tr>
               
                                <th style='font-size:10px;'><?php echo $html->link("NOC".$noc['NocReport']['id'],array('controller'=>'noc_reports','action' => 'view',$noc['NocReport']['id'] ),array('target' => '_blank') ); ?></th>
								<th style='font-size:10px;'><?php echo $noc['NocReport']['date_created']; ?></th>
                                <th style='font-size:10px;'><?php echo $noc['NocReport']['signum']." - ".$noc['NocReport']['name']; ?></th>
                                <th style='font-size:10px;'><?php echo $noc['NocReport']['region']; ?></th>
                                <th style='font-size:10px;'><?php echo $noc['NocReport']['rnc']; ?></th>
                                <th style='font-size:10px;'><?php echo $noc['NocReport']['site_name_main_cabinet']; ?></th>
                                <th style='font-size:10px;'><?php echo $noc['NocReport']['activity_type']; ?></th>								
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