<?php  echo $html->css("lte-lit"); ?>
<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<li><?php echo $this->Html->link(__('Back',true),array('action'=>'index')); ?></li>
<h2><u><b>Edit</b></u></h2>
    
<div class="lte_container">
        <fieldset>
            <legend><?php __('COF ID Entry'); ?></legend>
            <?php
                echo $this->Form->create('Cofmaster',array('action'=>'edit'));
                echo $form->input('enteredId', array("label" => "Enter the COF id:"));
                echo $this->Form->end(__('Submit', true));
            ?>
        </fieldset>
    </div>