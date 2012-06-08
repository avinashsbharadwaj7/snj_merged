<html>
    <head>
            <li><?php echo $html->link("Back",array('action' => 'index') ); ?>
           <h3><u><b>Script Load Reporting - View</b></u></h3>
    </head>
        <?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en', 'jquery-ui-1.7.2.custom.min.js' , 'jquery-1.3.2.min.js' ,'slpremodify_view.js')); ?>
        <?php echo $html->css('jscal2', 'stylesheet')."\n"; ?>
        <?php echo $html->css('border-radius', 'stylesheet')."\n"; ?>
        <?php echo $html->css('steel/steel', 'stylesheet')."\n"; ?>


       <?php

        foreach($ids as $foreach_ids):
            $temp[$foreach_ids['Slmaster']['id']] = 'SLRW'.$foreach_ids['Slmaster']['id'];
        endforeach;
       echo $this->Form->create('Slmaster',array('action' => 'view',onsubmit=>'return validateForm()'));
       echo $this->Form->input("id", array( 'options' => array($temp),'empty' => '', 'label'=>'SLR Number', 'id'=>'id_field', 'type'=>'select', 'div'=>array('class'=>'') ) );
       $this->data['id'] = Substr($this->data['id'],4);
       echo $this->Form->end('Submit');
       
       ?>

</html>