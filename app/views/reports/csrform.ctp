<html>
    <head>            
           <h2><u><b>CSR Functions - Excel Report.</b></u></h2>
    </head>
        <?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en', 'jquery-ui-1.7.2.custom.min.js' , 'jquery-1.3.2.min.js' ,'csr.js')); ?>
        <?php echo $html->css('jscal2', 'stylesheet')."\n"; ?>
        <?php echo $html->css('border-radius', 'stylesheet')."\n"; ?>
        <?php echo $html->css('steel/steel', 'stylesheet')."\n"; ?>

        <?php
            echo $this->Form->create('Report', array('action' => 'csr',onsubmit=>'return validateForm()','type' => 'get'));
                       
            echo $this->Form->input('Network Number');
            echo $this->Form->input('Engineer Signum');
            
			echo $this->Form->input('search', array('options' => array('Y'=>'Year','D'=>'Date Range'),'empty' => 'Select Search Type','id' => 'search'));

            echo "<div id = 'div_year'>";
            echo $this->Form->input('year', array('options' => array('2009'=>'2009','2010'=>'2010','2011'=>'2011'),'empty' => '','id' => 'year'));
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