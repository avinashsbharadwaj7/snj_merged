<html>
    <head>
            <li><?php echo $html->link("Back",array('action' => 'index') ); ?>
           <h3><u><b>NPI TI Tracker - Modify</b></u></h3>
    </head>
       
       <?php
	   
	   echo $this->Form->create('TiTracker',array('action' => 'modify','type' => 'get'));
       echo $this->Form->input('id', array( 'label'=>'NPI TI Number', 'type'=>'text' ,'id'=>'id_field') ); ?>
	   <font size='1' color='red'>Please do not include "TI" in the NPI TI Number</font>
       <?php echo $this->Form->end('Submit');  ?>
</html>