<html>
    <head>            
			<li><?php echo $html->link("Back",array('controller'=>'tac_reports','action' => 'index') ); ?>
           <h2><u><b>TAC - Search Report.</b></u></h2>
    </head>
		<?php
            echo $this->Form->create('TacReport', array('action' => 'showsearch'));
			
			$causes_list = $this->ntpdropdownLogics->getDropdown('cause_of_the_problem',$dropdown_fields);
			
			if(Authsome::get('user_group_id') != 35004 || Authsome::get('user_group_id') != 1) {		
				unset($causes_list['NIC Engineer Competence']);
			}
			
            echo $this->Form->input('customer_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('customer',$dropdown_fields)),'label'=>'Customer'));
            echo $this->Form->input('region_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('region',$dropdown_fields)),'label'=>'Region'));
            echo $this->Form->input('work_location_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('work_location',$dropdown_fields)),'label'=>'Work Location'));
            echo $this->Form->input('activity_type_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('activity_type',$dropdown_fields)),'label'=>'Activity Type'));
            echo $this->Form->input('signum_search', array('label'=>'Report Creator Signum','type'=>'text'));
            echo $this->Form->input('issue_search', array('label'=>'Issue Faced','type'=>'text'));
			echo $this->Form->input('cause_of_the_problem_search', array('options' => array('%' => 'All', $causes_list),'label'=>'Cause Of The Problem'));
           
            echo $this->Form->input('search', array('options' => array('%'=>'All','Y'=>'Year','D'=>'Date Range'),'id' => 'search'));
           

            echo "<div id = 'div_year'>";
            echo $this->Form->input('year', array('options' => array('2011'=>'2011'),'empty' => '','id' => 'year'));
            echo "</div>";           

            echo "<div id = 'div_date_range'>";
            echo $this->Form->label('Date Range');           
            echo $datePicker->picker('From',array('label'=>false,'id'=>'From'));
            echo $datePicker->picker('To',array('label'=>false,'id'=>'To'));
            echo "</div>";

             echo $this->Form->end(array("label" => 'Submit'));
            
        ?>
</html>