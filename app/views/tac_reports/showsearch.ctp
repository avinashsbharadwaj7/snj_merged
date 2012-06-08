<?php
/*
 * Search for SLR module
 * 
 */
?>
    <head>
        <li><?php echo $html->link("Back",array('controller'=>'tac_reports','action' => 'index') ); ?>
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


    <legend>TAC Reports</legend>

    <table>
        <tr>
                <th style='background-color:#BBBBBB;'>TAC Report Number</th>
                <th style='background-color:#BBBBBB;'>Date Created</th>
                <th style='background-color:#BBBBBB;'>Report Creator</th>
                <th style='background-color:#BBBBBB;'>Region</th>
                <th style='background-color:#BBBBBB;'>RNC</th>
                <th style='background-color:#BBBBBB;'>Site Name</th>
                <th style='background-color:#BBBBBB;'>Activity Type</th>
                <th style='background-color:#BBBBBB;'>Issue Resolved</th>
        </tr>

        <?php foreach ($TacReports as $tac): ?>
            <tr>
               
                                <th style='font-size:10px;'><?php echo $html->link("TAC".$tac['TacReport']['id'],array('controller'=>'tac_reports','action' => 'view',$tac['TacReport']['id'] ),array('target' => '_blank') ); ?></th>
								<th style='font-size:10px;'><?php echo $tac['TacReport']['date_created']; ?></th>
                                <th style='font-size:10px;'><?php echo $tac['TacReport']['signum']." - ".$tac['TacReport']['name']; ?></th>
                                <th style='font-size:10px;'><?php echo $tac['TacReport']['region']; ?></th>
                                <th style='font-size:10px;'><?php echo $tac['TacReport']['rnc']; ?></th>
                                <th style='font-size:10px;'><?php echo $tac['TacReport']['site_name']; ?></th>
                                <th style='font-size:10px;'><?php echo $tac['TacReport']['activity_type']; ?></th>
								<?php if($tac['TacReport']['issue_resolved'] == "No") { ?>
									<th style='font-size:10px;background-color:red;'><?php echo $tac['TacReport']['issue_resolved']; ?></th>
								<?php } else { ?>
									<th style='font-size:10px;background-color:green;'><?php echo $tac['TacReport']['issue_resolved']; ?></th>
								<?php } ?>
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