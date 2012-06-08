<html>
    <head>            
           <h2><u><b>Integration Report Functions - Excel Report.</b></u></h2>
    </head>
        <?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en', 'jquery-ui-1.7.2.custom.min.js' , 'jquery-1.3.2.min.js' ,'ir.js')); ?>
        <?php echo $html->css('jscal2', 'stylesheet')."\n"; ?>
        <?php echo $html->css('border-radius', 'stylesheet')."\n"; ?>
        <?php echo $html->css('steel/steel', 'stylesheet')."\n"; ?>

        <?php
            echo $this->Form->create('Report', array('action' => 'ir',onsubmit=>'return validateForm()','type' => 'get'));

            foreach($dropdown_fields as $dd):
                $dd = $dd['Dropdown'];
                    if($dd['field']=='customer')
                        $temp1[$dd['value']] = $dd['value'];
                    else if($dd['field']=='region')
                        $temp2[$dd['value']] = $dd['value'];
                    else if($dd['field']=='work_loc')
                        $temp3[$dd['value']] = $dd['value'];
                    else if($dd['field']=='activity')
                        $temp4[$dd['value']] = $dd['value'];
                    else if($dd['field']=='year')
                        $temp5[$dd['value']] = $dd['value'];
            endforeach;
            
            echo $this->Form->input('customer', array('options' => array('%' => 'All', $temp1)));
            echo $this->Form->input('region', array('options' => array('%' => 'All', $temp2)));
            echo $this->Form->input('MOP Used', array('options' => array('%' => 'Yes/No', 'Yes' => 'Yes','No' => 'No')));
            echo $this->Form->input('work_location', array('options' => array('%' => 'All', $temp3)));
            echo $this->Form->input('activity', array('options' => array('%' => 'All', $temp4)));
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

            echo $form->submit('Submit');

            
        ?>
</html>