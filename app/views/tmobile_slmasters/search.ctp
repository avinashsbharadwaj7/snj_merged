<li><?php echo $html->link("Back",array('action' => 'index','controller'=>'slmasters') ); ?>
<fieldset>

<?php if($search_criteria_cond != "") { ?>
    <legend>SL Search</legend>
<?php } else { ?>
    <legend>SL List All Reports</legend>
<?php } ?>


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

<?php

if($search_criteria_cond != "")
{
	if($search_criteria_cond == 'network_number')
			$search_criteria = 'Network Number';
	elseif($search_criteria_cond == 'id')
			$search_criteria = 'SLR Number';                                                              
    elseif($search_criteria_cond == 'date_activity_performed')
			$search_criteria = 'Date Activity Performed';
    elseif($search_criteria_cond == 'date_created')
			$search_criteria = 'Date Created';
    elseif($search_criteria_cond == 'nic_signum')
			$search_criteria = 'NIC Engineer Signum';
    elseif($search_criteria_cond == 'region')
			$search_criteria = 'Region';
    elseif($search_criteria_cond == 'work_location')
			$search_criteria = 'NIC Engineer Work Location';                                                                
    elseif($search_criteria_cond == 'activity_type')
			$search_criteria = 'Activity';
    elseif($search_criteria_cond == 'rnc')
			$search_criteria = 'RNC';
    elseif($search_criteria_cond == 'slr_report_status')
			$search_criteria = 'SLR Report Status';
    elseif($search_criteria_cond == 'issues_reports')
			$search_criteria = 'Reports with issues';

?>
<span class='freetext' style='color:red;'>Search Based on : <?php echo $search_criteria; }?></span>

<?php if($search_criteria_cond != "") { ?>
<table>
        <tr>
                <th><?php
                            echo $html->link("Back to the Search Page",array('action' => 'presearch') );
                    ?>
               </th>
        </tr>
</table>
<?php } ?>
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
		<th style='background-color:#BBBBBB;'>SLR Closed</th>
	</tr>

	<?php foreach($search_results as $sl): ?>
	<tr>
				<th style='font-size:smaller;'><?php echo $html->link("SLRW".$sl['TmobileSlmaster']['id'],array('controller'=>'tmobile_slmasters','action' => 'view',$sl['TmobileSlmaster']['id']),array('target' => '_blank') ); ?></th>
				<th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['date_activity_performed']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['nic_name']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['project_manager']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['region']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['activity_type']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['activity_result']; ?></th>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['rnc']; ?></th>
				<?php if(($sl['TmobileSlmaster']['slr_report_status']) == '1') $sl['TmobileSlmaster']['slr_report_status'] = 'Yes';
                                      elseif($sl['TmobileSlmaster']['slr_report_status'] != '1') $sl['TmobileSlmaster']['slr_report_status'] = 'No'; ?>
                                <th style='font-size:smaller;'><?php echo $sl['TmobileSlmaster']['slr_report_status']; ?></th>
	</tr>      
	
	<?php endforeach; ?>         
	
</table>

        <div class="paging">
        <?php echo $paginator->prev('<< ' . __('Previous', true), array(), null, array('class' => 'disabled')); ?>
        |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
        <br>
        <br><?php
        echo $paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>
        </div>
</fieldset>



