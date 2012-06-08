<html>
    <head>            
           <h2><u><b>Graphical Analysis</b></u></h2>
    </head>
		<?php			
            echo $this->Form->create('Graph', array('action' => 'generate',onsubmit=>'return validateFormGraph()'));
			$temp1 = $this->dropdownLogics->getFields($dropdown_fields_slr);
			$temp2 = $this->dropdownLogics->getFields($dropdown_fields_ir);
		?>
		
		
		<fieldset>
			<legend>Select Matrix</legend>
			<span id='matrix_container'>
			<?php
				//echo $this->Form->input('matrix', array('options' => array('Performance Matrix'=>'Performance Matrix','Service Assurance Matrix'=>'Service Assurance Matrix'),'id'=>'matrix'));
				echo $this->Form->input('matrix', array('options' => array('Performance Matrix'=>'Performance Matrix'),'id'=>'matrix'));
			?>
			</span>
		</fieldset>
		<br><br>
		
		<span id='mod_container'>
		<fieldset>
			<legend>Select Modules</legend>
				<span id='module_container_ir'>
				<?php
					echo $this->Form->input('ir', array('type' => 'checkbox','label'=>'Integration Functions','id'=>'ir'));
				?> 
				</span> 
				<span id='module_container_slr'>
				<?php
				//	echo $this->Form->input('slr', array('type' => 'checkbox','label'=>'Script Load','id'=>'slr'));
				?>
				</span>
				<span id='module_container_sh'>
				<?php
					echo $this->Form->input('sh', array('type' => 'checkbox','label'=>'Site Handler','id'=>'sh'));
				?>
				</span>
		</fieldset>
		<br><br>
		</span>
		
		<span id='options_container'>
		<fieldset>
			<legend>Select Options</legend>
			<span id='customerIR_container'>
			<?php         
            echo $this->Form->input('customer_ir', array('options' => array('%' => 'All', $temp2['customer']),'label' => 'Customer'));
			echo $this->Form->input('access_method', array('options' => array('%'=>'All','OSS'=>'OSS','Sonar'=>'Sonar','Smart Laptop'=>'Smart Laptop'),'label' => 'Access Method'));
			echo $this->Form->input('market', array('options' => array('%'=>'All',$temp2['market']),'label' => 'Market', 'multiple' => true, 'default'=>'%'));
			?>
			</span>
			<span id='customerRest_container'>
			<?php         
            echo $this->Form->input('customer_all', array('options' => array('AT&T'=>'AT&T'),'label' => 'Customer'));
            ?>
			</span>
			
			<span id='reg_container_sh'>
			<?php         
            echo $this->Form->input('region_sh', array('options' => array('%'=>'All','Midwest'=>'Midwest','Northeast'=>'Northeast','Southeast'=>'Southeast','Southwest'=>'Southwest','West'=>'West'),'label' => 'Region'));
			?>
			</span>
			<span id='reg_container_all'>
			<?php
            echo $this->Form->input('region', array('options' => array('%' => 'All', $temp1['region'])));
			?>	
			</span>
			<span id='workloc_container'>
			<?php         
            echo $this->Form->input('work_location', array('options' => array('%' => 'All', $temp1['work_location'])));
			?>
			</span>
			<?php /*
			<span id='team_container'>
			<?php         
            echo $this->Form->input('team', array('options' => array('NIC'=>'NIC','NDS'=>'NDS')));
			?>
			</span>
			*/ ?>
			
			
			<span id='actTypeIR_container'>
			<?php         
          //  echo $this->Form->input('team', array('options' => array('%'=> 'Both','NIC'=>'NIC','NDS'=>'NDS'), 'label' => 'Team'));
		  $nic_acts = $temp2['new_activities'];
		  $nds_acts = $temp2['activity'];
		  $acts = array_merge($nic_acts, $nds_acts);
		  
		  
            echo $this->Form->input('activity_type_ir', array('options' => $acts, 'label' => 'Activity'));
			?>	
			</span>
			<span id='actTypeSLR_container'>
			<?php 
            echo $this->Form->input('activity_type_slr', array('options' => $temp1['activity_type'], 'label' => 'Activity'));
			?>
			</span>
			
			<?php
            echo $this->Form->input('search', array('options' => array('Y'=>'Year','Q'=>'Quarter','D'=>'Date Range'),'empty' => 'Select Search Type','id' => 'search'));
           
            echo "<div id = 'div_year'>";
            echo $this->Form->input('year', array('options' => array($temp1['year']),'empty' => '','id' => 'year'));
            echo "</div>";       
			
			echo "<div id = 'div_quarter'>";
            echo $this->Form->input('quarter', array('options' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4'),'empty' => '','id' => 'quarter'));
            echo "</div>";           

            echo "<div id = 'div_date_range'>";
            echo $this->Form->label('Date Range');           
            echo $datePicker->picker('From',array('label'=>false,'id'=>'From'));
            echo $datePicker->picker('To',array('label'=>false,'id'=>'To'));
           
			/*echo $datePicker->picker('From_temp',array('label'=>false,'id'=>'From_temp'));
            echo $datePicker->picker('To_temp',array('label'=>false,'id'=>'To_temp'));
            echo $this->Form->hidden( 'From',array('id'=>'From'));
            echo $this->Form->hidden( 'To',array('id'=>'To'));*/
            echo "</div>";
			
		
			echo "<span id='not_sh'>";
			echo $this->Form->input('view', array('options' => array('Week View'=>'Week view','Month View'=>'Month View'),'empty' => '','label'=>'Select View','id'=>'view'));
			echo "</span>";
			
			
            echo $this->Form->end(array("label" => 'Submit'));
			?>			
		</fieldset>
		</span>
</html>