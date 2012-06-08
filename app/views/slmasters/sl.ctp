<?php
/*
 * Search for SLR module
 * 
 */
?>
    <head>
        <li><?php echo $html->link("Back",array('controller'=>'slmasters','action' => 'index') ); ?>
    </head>

    <fieldset>
        <?php echo $this->Html->link("Download Excel", array('action' => 'slexcel'), array("style"=>"text-align:center;margin-bottom:10px;display:block;")); ?>
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


    <legend>SL Reports</legend>

    <table>
        <tr>
                <th style='background-color:#BBBBBB;'>SLR Number</th>
                <th style='background-color:#BBBBBB;'>Activity Performed On</th>
                <th style='background-color:#BBBBBB;'>Engineer</th>
                <th style='background-color:#BBBBBB;'>Project Manager</th>
                <th style='background-color:#BBBBBB;'>Region</th>
                <th style='background-color:#BBBBBB;'>Activity Type</th>
                <th style='background-color:#BBBBBB;'>Activity Result</th>
		<th style='background-color:#BBBBBB;'>RNC</th>
		<th style='background-color:#BBBBBB;'>OSS</th>
		<th style='background-color:#BBBBBB;'>SLR Closed</th>
        </tr>

        <?php foreach ($slmasters as $sl): ?>
            <tr>
               
                                <th style='font-size:smaller;'><?php echo $html->link("SLRW".$sl['Slmaster']['id'],array('controller'=>'slmasters','action' => 'view',$sl['Slmaster']['id'] ),array('target' => '_blank') ); ?></th>
				<th style='font-size:smaller;'><?php echo $sl['Slmaster']['date_activity_performed']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['nic_name']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['project_manager']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['region']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['activity_type']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['activity_result']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['rnc']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['oss']; ?></th>
				<?php if(($sl['Slmaster']['slr_report_status']) == '1') $sl['Slmaster']['slr_report_status'] = 'Yes';
					  if(($sl['Slmaster']['slr_report_status']) == '0') $sl['Slmaster']['slr_report_status'] = 'No'; ?>
                                <th style='font-size:smaller;'><?php echo $sl['Slmaster']['slr_report_status']; ?></th>



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