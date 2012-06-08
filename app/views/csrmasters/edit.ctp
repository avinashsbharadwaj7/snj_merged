<?php
    echo $html->css("lte-lit");
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>

<?php if(empty($csrId)) { ?> 
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2>Edit</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?php __('CSR ID Entry'); ?></legend>
            <?php
                echo $this->Form->create('Csrmaster');
                echo $form->input('enteredId', array("label" => "Enter the CSR id:"));
                echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </div>
    <?php } 
 else {
?>
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'edit')); ?> </li>
        <h2>Edit - CSR ID: <?PHP echo $csrId; ?></h2>
        
        <?php
            $signum = Authsome::get('username');
            $name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
            echo $this->Form->create('Csrmaster', array('type' => 'file'));
        ?>
        <fieldset>
            <legend><?php __('Customer Service Request Form'); ?></legend>
            <?PHP
                echo $form->input('id'); //otherwise a new id will be assigned
                //echo $this->Form->input('date_initiated', array("label"=>"Date", "type"=>"text", "readonly"=>"readonly", "value"=>date("Y-m-d")));
                /* Engineer Information pane */
                include_once('basic_information.inc');
                /* Project Information pane */
                include_once('engineer_information.inc');
                /* Node Information pane */
                include_once('project_information.inc');
                /* Problem Description pane */ 
                include_once('problem_description.inc');
                /* Email address pane */
                include_once('email_address.inc');
                //echo $this->Form->end(__('Submit', true));
                
           ?>
        </fieldset>

<fieldset>
     <h4>File Upload</h4>
     <?php
   
   
   if((isset($this->data['Csrfile'][0]['file']['error']) && is_array($this->data['Csrfile'][0]['file'])) && $this->data['Csrfile'][0]['file']['error'] == 0)
   {
    echo $this->Form->input('Csrfile.0.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File Name', 'value'=>$this->data['Csrfile'][0]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload0Click', 'onClick'=>"showUploader('#upload0Click', '#Csrfile0File', 0, 'Csrfile'); return false"))));
   }
   else 
   {
    echo $this->Form->input('Csrfile.0.file', array('type'=>'file', 'label'=>'File Name'));
   }
        
        ?>
</fieldset>

  <?php 
            echo "<div>";
            echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));
            echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));
            echo "</div>";
 } 
  ?>