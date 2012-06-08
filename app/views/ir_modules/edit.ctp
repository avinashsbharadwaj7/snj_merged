<?php echo $html->css("lte-lit"); 
$file_no = array("","1"=>"1","2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15");
$fc = 1;

?>

<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>

<?PHP
    $file_count = (isset($this->data['IrFile']) && count($this->data['IrFile']) > 0) ? count($this->data['IrFile']) : 1;
?>

<?php if(empty($irId)) { ?> 
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2>Edit</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?php __('IR ID Entry'); ?></legend>
            <?php
                echo $this->Form->create('IrModule');
                //include_once('add_dropdown_logic.inc');
                
                echo $form->input('enteredId', array("label" => "Enter the IR id:"));
                echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </div>
    <?php } 
 else {
?>
    
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'edit')); ?> </li>
        <h2>Edit - IR ID: <?PHP echo $irId; ?></h2>
        
        <?php
            $signum = Authsome::get('username');
            $name = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
            $modelNameField = 'IrModule';
            $controllerNameField = "'ir_modules'";
            echo $this->Form->create('IrModule', array('type' => 'file'));
        ?>
        <fieldset>
            
		<legend><?php __('Add Integration Report'); ?></legend>
                <?php
                echo $form->input('id');
                include_once('add_dropdown_logic.inc');   
                include_once('project_information.inc');
                include_once('information.inc');
		echo $this->Form->input('additional_notes');
	
                ?>    
        </fieldset>
        
        <fieldset>
        <legend>File Uploads</legend>
                   <?php if (!isset($this->data['IrModule']['no_of_files']))
                        echo $this->Form->input('IrModule.no_of_files', array('value'=> '1', "label"=>"Number of Files to be uploaded", 'options'=>$file_no, 'type'=>'select'));
                            else 
                                echo $this->Form->input('IrModule.no_of_files', array("label"=>"Number of Files to be uploaded", 'options'=>$file_no, 'type'=>'select'));
                        echo $ajax->div('no_of_filess_placeholder', array('class'=>'placeholders'));
                for ($fc=1; $fc <= $this->data['IrModule']['no_of_files']+1; $fc++)
                {
                      if(isset($this->data['IrFile'][$fc]['file']['error']) && is_array($this->data['IrFile'][$fc]['file']) && $this->data['IrFile'][$fc]['file']['error'] == 0) {
                            if(isset($this->data['IrFile'][$fc]['origFileName']) && is_array($this->data['IrFile'][$fc])) {
                                echo $this->Form->input('IrFile.'.$fc.'.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File '. $fc, 'value'=>$this->data['IrFile'][$fc]['file']['name']));
                            }
                            else {
                                echo $this->Form->input('IrFile.'.$fc.'.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File '. $fc, 'value'=>$this->data['IrFile'][$fc]['file']['name']));
                            }
                        }
                        else {
                            echo $this->Form->input('IrFile.'.$fc.'.file', array('type'=>'file', 'label'=>'File '. $fc));

                }  }   
                        echo $ajax->divEnd('no_of_filess_placeholder');
                        echo $ajax->observeField('IrModuleNoOfFiles', array('update'=>'no_of_filess_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));

                 
                     ?>
 

     </fieldset>   



        <fieldset>
		<div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   ?>
        </fieldset>

   <?php } 
  ?>
