<html>
    <head>
            <li><?php echo $html->link("Back",array('action' => 'index') ); ?>
           <h3><u><b>Script Load Reporting - Modify</b></u></h3>
    </head>
        <?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en', 'jquery-ui-1.7.2.custom.min.js' , 'jquery-1.3.2.min.js' ,'slpremodify_view.js')); ?>
        <?php echo $html->css('jscal2', 'stylesheet')."\n"; ?>
        <?php echo $html->css('border-radius', 'stylesheet')."\n"; ?>
        <?php echo $html->css('steel/steel', 'stylesheet')."\n"; ?>


       <?php

        //foreach($ids as $foreach_ids):
        //    $temp[$foreach_ids['Slmaster']['id']] = 'SLRW'.$foreach_ids['Slmaster']['id'];
        //endforeach;
       //echo $this->Form->create('Slmaster',array('action' => 'modify',onsubmit=>'return validateForm()','type' => 'get'));
       echo $this->Form->create('Slmaster',array('action' => 'modify',"onsubmit"=>'return validateForm()','type' => 'get'));
       //echo $this->Form->input("id", array( 'options' => array($temp),'empty' => '', 'label'=>'SLR Number', 'id'=>'id_field', 'type'=>'select', 'div'=>array('class'=>'') ) );
		 echo $this->Form->input('id', array( 'label'=>'SLR Number', 'type'=>'text' ,'id'=>'id_field') ); ?>
		 <font size='1' color='red'>Please do not include "SLRW" in the SLR Number</font>
       <?php if(substr($this->data['id'],0) == 's' || substr($this->data['id'],0) == 'S')
					$this->data['id'] = Substr($this->data['id'],4);
			echo $this->Form->end('Submit');
       
       ?>

</html>