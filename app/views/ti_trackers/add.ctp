<div class="tiTrackers form">
<?php echo $this->Form->create('TiTracker');?>
	<fieldset>
		<legend><?php __('MPI TI Tracker Add'); ?></legend>
	<?php
		echo $this->Form->input('signum', array('value'=> $signum,'readonly'=> 'readonly'));
		echo $this->Form->input('name', array('value'=> $name,'readonly'=> 'readonly'));
                echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));                        
		echo $this->Form->input('project_manager');
		echo $this->Form->input('project');
		echo $this->Form->input('technical_coordinator');
                ?>
                <fieldset>
                    <legend>Test Instructions</legend>
                    <div id="test_instructions_div">
                <?php
                if(!isset($data)){
                    echo $this->Form->input('TiTrackerTitle.0.title');
                    echo $this->Form->input('TiTrackerTitle.0.description');
                }else{
                    for($i = 0; $i<count($data['TiTrackerTitle']); $i++){
                        echo $this->Form->input("TiTrackerTitle.$i.title");
                        echo $this->Form->input("TiTrackerTitle.$i.description");
                    }
                }
                ?>
                    </div>
                    <?php echo $ajax->link("Add more title", array('action'=>'addTitle'), array('update'=>'test_instructions_div', 'position'=>'bottom'));?>
                </fieldset>
                <?php
                echo $this->Form->input('link');
	?>
	</fieldset>
<fieldset>
		<?php	echo $this->Form->input("email", array( 'label'=>'Email Addresses', 'type'=>'textarea' ) );?>
		<font color='red' size='1'>The email ids have to be separated with a semi-colon(;)</font>
		<div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
        </div>
        <?php //echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit without Email'));   ?>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   ?>
        </fieldset>
</div>