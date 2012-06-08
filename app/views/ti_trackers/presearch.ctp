<html>
    <head>            
			<li><?php echo $html->link("Back",array('controller'=>'ti_trackers','action' => 'index') ); ?>
           <h2><u><b>NPI TI Tracker - Search Report.</b></u></h2>
    </head>
		<?php
            echo $this->Form->create('TiTracker', array('action' => 'showsearch'));			
            echo $this->Form->input('signum_search', array('label'=>'Signum'));
            echo $this->Form->input('project_search', array('label'=>'Project'));
            
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