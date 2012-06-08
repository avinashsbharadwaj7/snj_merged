<?php
/*
 * Search for SLR module
 * 
 */
?>
    <head>
        <li><?php echo $html->link("Back",array('controller'=>'ntp_validations','action' => 'index') ); ?>
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


    <legend>NTP Validation Reports</legend>

    <table>
        <tr>
                <th style='background-color:#BBBBBB;'>NTP Number</th>
                <th style='background-color:#BBBBBB;'>Date Created</th>
                <th style='background-color:#BBBBBB;'>Engineer</th>
                <th style='background-color:#BBBBBB;'>Region</th>
                <th style='background-color:#BBBBBB;'>Market</th>
                <th style='background-color:#BBBBBB;'>Activity Type</th>
                <th style='background-color:#BBBBBB;'>Activity Result</th>
        </tr>

        <?php foreach ($NtpValidations as $ntp): ?>
            <tr>
               
                                <th style='font-size:10px;'><?php echo $html->link("NTP".$ntp['NtpValidation']['id'],array('controller'=>'ntp_validations','action' => 'view',$ntp['NtpValidation']['id'] ),array('target' => '_blank') ); ?></th>
								<th style='font-size:10px;'><?php echo $ntp['NtpValidation']['date_created']; ?></th>
                                <th style='font-size:10px;'><?php echo $ntp['NtpValidation']['nic_signum']." - ".$ntp['NtpValidation']['nic_name']; ?></th>
                                <th style='font-size:10px;'><?php echo $ntp['NtpValidation']['region']; ?></th>
                                <th style='font-size:10px;'><?php echo $ntp['NtpValidation']['market']; ?></th>
                                <th style='font-size:10px;'><?php echo $ntp['NtpValidation']['activity_type']; ?></th>
								<?php if($ntp['NtpValidation']['final_results'] == "Did Not Pass") { ?>
									<th style='font-size:10px;background-color:red;'><?php echo $ntp['NtpValidation']['final_results']; ?></th>
								<?php } elseif($ntp['NtpValidation']['final_results'] == "Passed With Issues") { ?>
									<th style='font-size:10px;background-color:orange;'><?php echo $ntp['NtpValidation']['final_results']; ?></th>
								<?php } else { ?>
									<th style='font-size:10px;background-color:green;'><?php echo $ntp['NtpValidation']['final_results']; ?></th>
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