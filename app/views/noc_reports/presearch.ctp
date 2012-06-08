<html>
    <head>            
			<li><?php echo $html->link("Back",array('controller'=>'tac_reports','action' => 'index') ); ?>
           <h2><u><b>NOC - Search Report.</b></u></h2>
    </head>
		<?php
            echo $this->Form->create('NocReport', array('action' => 'showsearch'));
			
			
            echo $this->Form->input('customer_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('customer',$dropdown_fields)),'label'=>'Customer'));
            echo $this->Form->input('region_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('region',$dropdown_fields)),'label'=>'Region'));
            echo $this->Form->input('work_location_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('work_location',$dropdown_fields)),'label'=>'Work Location'));
            echo $this->Form->input('activity_type_search', array('options' => array('%' => 'All', $this->ntpdropdownLogics->getDropdown('activity_type',$dropdown_fields)),'label'=>'Activity Type'));
            echo $this->Form->input('day_or_night_search', array('options' => array('%' => 'All', 'Day'=>'Day', 'Night'=>'Night'),'label'=>'Day Activity or Maintenance Window Activity'));
            
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