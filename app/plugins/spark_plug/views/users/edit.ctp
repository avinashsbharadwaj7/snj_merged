<?php
$usernameOptions = (Authsome::get("user_group_id") == 1) ? array("readonly"=>"readonly") : array("readonly"=>"readonly", "value"=>  Authsome::get("username"));
?>
<?php echo $html->link('Back to list','/users/index'); ?> | <?php echo $html->link('Log in as this User','/users/login_as_user/'.$this->data['User']['id']); ?>
<h2>Edit User</h2>
<?php echo $form->create('User',array('action'=>'edit')); ?>
<table class="formTable" width="100%">
<?php //echo (Authsome::get("user_group_id") == 1) ? $form->input('user_group_id',array('type'=>'select','options'=>$userGroups)): null; ?>
<?php echo $form->input('username', $usernameOptions); ?>
<?php echo $form->input('email'); ?>
<?php echo $form->input('phone'); ?>
<?php //echo (Authsome::get("user_group_id") == 1) ? $form->input('active') : null; ?>
<?php echo $form->input('first_name',array("readonly"=>"readonly")); ?>
<?php echo $form->input('last_name',array("readonly"=>"readonly")); ?>
<?php echo $form->input('country'); ?>
<?php echo $form->input('city'); ?>
<?php echo $form->input('state'); ?>
<?php echo $form->input('zip_code'); ?>
<?php echo $form->input('title'); ?>
<?php //echo $form->input('company'); ?>
<?php echo $form->input('department'); ?>
<?php echo $form->input('office'); ?>
<?php //echo $form->input('designation'); ?>
<?php echo $form->input("designation", array( 'options' => $dropdown_designation,'empty' => '','type'=>'select') );  ?>
<?php echo $form->input('manager'); ?>
<?php echo $form->input('dob',array( 
                'type' => 'datetime', 
                'empty' => true, 
                'dateFormat' => 'MDY', 
                'timeFormat' => '', 
                'minYear' => ( 
                        date('Y') - 150 
                ), 
                'maxYear' => ( 
                        date('Y') 
                ) 
        ) ); ?>
<?php //echo (Authsome::get("user_group_id") == 1) ? $form->input('belongs_to') : null; ?>
<?php //echo (Authsome::get("user_group_id") == 1) ? $form->input('tcm_region') : null; ?>
<?php //echo (Authsome::get("user_group_id") == 1) ? $form->input('tcm_rights') : null; ?>
<?php echo $form->input('id'); ?>
<?php echo $form->submit(); ?>
<?php echo $form->end(); ?>
</table>