

<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('View Comments/Feedback', true), array('controller'=>'feedbacks','action' => 'listall')); ?> </li>
    </ul>
</div>


<div class="RfModules view">

<fieldset>
    <legend>Feedback Details</legend>
    
    

        <dl><?php $i = 0; $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $feedbacks['Feedback']['comments']; ?>
            &nbsp;
        </dd>
        </dl>
    
        
        </fieldset>
        </div>


