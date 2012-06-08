<html>
    <head>            
           <h2><u><b>Script Load Report Functions - Excel Report.</b></u></h2>
    </head>
        <?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en', 'jquery-ui-1.7.2.custom.min.js' , 'jquery-1.3.2.min.js' ,'sl.js')); ?>
        <?php echo $html->css('jscal2', 'stylesheet')."\n"; ?>
        <?php echo $html->css('border-radius', 'stylesheet')."\n"; ?>
        <?php echo $html->css('steel/steel', 'stylesheet')."\n"; ?>

        <?php
            echo $this->Form->create('Report', array('action' => 'sl',onsubmit=>'return validateForm()'));

			$flag = 0;
			$optgrp;
			$i=0;
            foreach($dropdown_fields as $dd):
                $dd = $dd['Dropdown'];
                    if($dd['field']=='customer')
                        $temp1[$dd['value']] = $dd['value'];
                    else if($dd['field']=='region')
                        $temp2[$dd['value']] = $dd['value'];
                    else if($dd['field']=='work_location')
                        $temp3[$dd['value']] = $dd['value'];
                    else if($dd['field']=='activity_type')
						{	$i++;														
							 if($dd['value'] == "")
							{
								if($i == 1)
								{
									$temp4['%'] = 'All';
								}
								$optgrp[$flag] = $dd['label'];
								$flag++;
							}
							else
							{
								if($flag > 0)
								{									
									$temp4[$optgrp[$flag-1]][$dd['value']] = $dd['label'];
								}
								else
									$temp4[$dd['value']] = $dd['label'];
							}
						}
                    else if($dd['field']=='year')
                        $temp5[$dd['value']] = $dd['value'];
            endforeach;
			            
            echo $this->Form->input('customer', array('options' => array('%' => 'All', $temp1)));
            echo $this->Form->input('region', array('options' => array('%' => 'All', $temp2)));
            echo $this->Form->input('MOP Used', array('options' => array('%' => 'Yes/No', 'Yes' => 'Yes','No' => 'No')));
            echo $this->Form->input('work_location', array('options' => array('%' => 'All', $temp3)));
            echo $this->Form->input('activity_type', array('options' => $temp4, 'label' => 'Activity'));
			echo $this->Form->input('issues', array('options' => array('%'=>'Yes/No','Y'=>'Yes','N'=>'No'), 'label' => 'Reports with Issues'));
			echo $this->Form->input('closed', array('options' => array('%'=>'All','y'=>'Closed Reports',''=>'Open Reports'), 'label' => 'SLR Report Status'));
            echo $this->Form->input('search', array('options' => array('Y'=>'Year','D'=>'Date Range'),'empty' => 'Select Search Type','id' => 'search'));
           

            echo "<div id = 'div_year'>";
            echo $this->Form->input('year', array('options' => array($temp5),'empty' => '','id' => 'year'));
            echo "</div>";           

            echo "<div id = 'div_date_range'>";
            echo $this->Form->label('Date Range');           
            echo $datePicker->picker('From_temp',array('label'=>false,'id'=>'From_temp'));
            echo $datePicker->picker('To_temp',array('label'=>false,'id'=>'To_temp'));
            echo $this->Form->hidden( 'From',array('id'=>'From'));
            echo $this->Form->hidden( 'To',array('id'=>'To'));
            echo "</div>";

             echo $this->Form->end(array("label" => 'Submit'));
            
        ?>
</html>