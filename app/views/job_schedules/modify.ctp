<?php
echo $html->css("lte-lit");
echo $this->Html->script(array('jquery'));
echo $this->Javascript->codeBlock(
        "var manageResourceLink = '" . 
        $this->Html->link("[+] Add Resources", array('controller'=>'job_schedules', 'action'=>'add_resource')) . "';"
    );
echo $javascript->link('snt_resources');
echo $javascript->link('add_requirements.js');

$signum = Authsome::get('username');
$name_concat = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
$readonly = true;
?>
<?php 
if(!$isId) {
//if(empty($this->data['JobSchedule']['modifyId'])) { ?>
    <fieldset>
    <legend><?php __('Modify Schedule'); ?></legend>
    <?php
    echo $this->Form->create('JobSchedule');
    echo $this->Form->input('modifyId', array('label' => 'Id'));
    echo $this->Form->end($options = array('name' => 'Submit','label' => 'Submit'));
    ?>
    </fieldset>
<?php 
}
if($isId) {
?>
<fieldset>
    <legend><?php __('Modify Schedule'); ?></legend>
    <?php
    echo $this->Form->create('JobSchedule', array('onLoad'=>"datePickerRemover()"));
    echo $this->Form->hidden('job_id');                  /*You want to store the job_id of the modified record. Therefore make it hidden*/
    echo $this->Form->hidden('revision_number');    
    ?>
    <fieldset>
        <legend><?php __('History'); ?></legend>
        <?php 
            App::import('model', 'JobSchedule');
            $history = new JobSchedule();                    
            $jobIdDetails = $history->find('all', array('conditions'=>array('JobSchedule.job_id'=>$this->data['JobSchedule']['job_id'])));            
            foreach($jobIdDetails as $details){
                echo $this->Html->link("Report #SCHID" . $details['JobSchedule']['id'] . " - Created on " . $this->data['JobSchedule']['created'], array('controller'=>'job_schedules' ,'action' => 'view', $details['JobSchedule']['id']));                 
                echo "</br>";
            }
        ?>
    </fieldset>
    <fieldset>
        <legend><?php __('Modifier Information'); ?></legend>
        <?php
        echo $this->Form->input('modifier_info_signum', array('label' => 'Signum', 'readonly' => true, 'value'=>$signum));
        echo $this->Form->input('modifier_info_name', array('label' => 'Name', 'readonly' => true, 'value'=>$name_concat));
        echo $this->Form->input('modifier_info_comments', array('label' => 'Comments'));
        ?>
    </fieldset>
    <fieldset>
        <legend><?php __('Sender Information'); ?></legend>
        <?php
        echo $this->Form->input('sender_info_signum', array('label' => 'Signum', 'readonly' => true));
        echo $this->Form->input('sender_info_name', array('label' => 'Name', 'readonly' => true));
        echo $this->Form->input('sender_info_comments', array('label' => 'Comments', 'readonly' => $readonly));
        ?>
    </fieldset>
    <?php
    include_once('project_information.inc');
    include_once('general_information.inc');
    //include_once('personal_options.inc');
    include_once('add_requirements.inc');
    //include_once('classifications.inc');    
    ?>
    <div id="add_resource_link">
        
    </div>

        <fieldset>
        <div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   }?>
        </fieldset>
    <div id="workingPlaceholder" style="width:0px;"></div>
</fieldset>
