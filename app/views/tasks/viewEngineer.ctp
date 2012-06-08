<?php echo $this->Form->create('Task');?>
<h1>Self Assignment for LDO</h1>
<dl>		
    <dt class="altrow">Job:<?php echo $job['Task']['job_id']?></dt>
    <dt>Task:<?php echo $job['Task']['task_id']?></dt>
<dt class="altrow">Start Date:<?php echo $job['Task']['start_date']?></dt>
<dt>End Date:<?php echo $job['Task']['end_date']?></dt>
<dt class="altrow">Modifier Name:<?php echo $job['Task']['modifier_name']?></dt>
<dt>Node Name:<?php echo $job['Task']['node_name']?></dt>
<dt class="altrow">

<?php echo $this->Form->input('ticket_status', array('type'=>'select', 'label'=>'Select Ticket Status',
                'options'=>array('0'=>'Started',
                                 '1' => 'Partially Completed',
                                 '2' => 'Completed')) );?></dt>

                                 <dt>
<?php echo $this->Form->end('Save'); ?></dt>
</dl>		


