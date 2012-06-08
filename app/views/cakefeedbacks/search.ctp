<?php
/*
 * Feedback Search for LL module
 * 
 */
?>
    <head>
        <li><?php echo $html->link("Back",array('controller'=>'cakefeedbacks','action' => 'feedbackindex') ); ?>
    </head>

    <fieldset>			
		<br><br>
        <?php //echo $this->Html->link("Download Excel", array('action' => 'excel'), array("style"=>"text-align:center;margin-bottom:10px;display:block;")); ?>
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


    <legend>PQR Feedback Reports</legend>
    <table>
        <tr>
				<?php 	
				if(empty($condition_search))
					$flag = "both";
				else
				{		
					if($condition_search['category LIKE'] == "Request")
						$flag = "Request";
					elseif($condition_search['category LIKE'] == "Feedback")
						$flag = "Feedback";
					else
						$flag = "both";
				}
				?>
                <th style='background-color:#BBBBBB;'>Feedback Number</th>
                <th style='background-color:#BBBBBB;'>Signum</th>                
                <th style='background-color:#BBBBBB;'>Name</th>                
                <th style='background-color:#BBBBBB;'>Date</th>
                <th style='background-color:#BBBBBB;'>Module</th>
				<th style='background-color:#BBBBBB;'>Report Type</th>
				<?php if($flag == "both" || $flag == "Request") { ?>
					<th style='background-color:#BBBBBB;'>Priority</th>
					<th style='background-color:#BBBBBB;'>Status</th>
				<?php } ?>						
				
        </tr>
	
		
        <?php 
		foreach ($data as $pqr_feedback): 
			?>
            <tr>
			
               
                                <th style='font-size:smaller;'>
								<?php 														
									echo $html->link($pqr_feedback['Cakefeedback']['id'],array('controller'=>'cakefeedbacks','action' => 'viewfeedback',$pqr_feedback['Cakefeedback']['id']),array('target' => '_blank') ); 
								?>
								</th>				
								<th style='font-size:smaller;'><?php echo $pqr_feedback['Cakefeedback']['signum']; ?></th>
								<th style='font-size:smaller;'><?php echo $pqr_feedback['Cakefeedback']['name']; ?></th>
                                <th style='font-size:smaller;'><?php echo $pqr_feedback['Cakefeedback']['date']; ?></th>
                                <th style='font-size:smaller;'><?php echo $pqr_feedback['Cakefeedback']['module']; ?></th>
                                <th style='font-size:smaller;'><?php echo $pqr_feedback['Cakefeedback']['category']; ?></th>
								
								<?php if($flag == "both" || $flag == "Request") { ?>
										<?php if($pqr_feedback['Cakefeedback']['category'] == "Feedback") { ?>
											<th style='font-size:smaller;'><?php echo "NA"; ?></th>
										<?php } elseif($pqr_feedback['Cakefeedback']['priority'] == 1) { ?>
											<th style='font-size:smaller;background-color:red;'><?php echo "High"; ?></th>
										<?php } elseif($pqr_feedback['Cakefeedback']['priority'] == 2) { ?>
											<th style='font-size:smaller;background-color:orange;'><?php echo "Medium"; ?></th>
										<?php } elseif($pqr_feedback['Cakefeedback']['priority'] == 3) { ?>
											<th style='font-size:smaller;background-color:pink'><?php echo "Low"; ?></th>
										<?php } ?>
								<?php } ?>				
								
								<?php if($flag == "both" || $flag == "Request") { ?>
										<?php if($pqr_feedback['Cakefeedback']['category'] == "Feedback") { ?>
											<th style='font-size:smaller;'><?php echo "NA"; ?></th>
										<?php } elseif($pqr_feedback['Cakefeedback']['status'] == 1) { ?>
											<th style='font-size:smaller;background-color:green;'><?php echo "Completed"; ?></th>
										<?php } elseif($pqr_feedback['Cakefeedback']['status'] == 0) { ?>
											<th style='font-size:smaller;background-color:orange;'><?php echo "Pending"; ?></th>
										<?php } elseif($pqr_feedback['Cakefeedback']['status'] == 2) { ?>
											<th style='font-size:smaller;background-color:red;'><?php echo "Canceled"; ?></th>
										<?php } ?>
								<?php } ?>									
        </tr>
        <?php		
		endforeach; 
		?>

            </table>

     <div class="paging">
	 
        <?php echo $paginator->first(); ?>
		
		<?php echo $paginator->prev('<< ' . __('Previous', true), array(), null, array('class' => 'disabled')); ?>
        |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
		
		<?php echo $paginator->last();	?>
		
                <br><br><?php
                echo $paginator->counter(array(
                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                ));
        ?>
	 </div>
	 
     </fieldset>