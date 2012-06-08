<fieldset>
    <h4>Project Information</h4>
    <?php    
    echo $this->Form->input('project_manager');
    echo $this->Form->input('organization', array('type'=>'select', 'options'=>array(""=>"", "LDO NIC"=>"LDO NIC", "RAN E&O Integration"=>"RAN E&O Integration", "RAN E&O NDS"=>"RAN E&O NDS")));   
    echo $this->Form->input('project');
    echo $this->Form->input('technical_coordinator');
    ?>
    <fieldset>
                    <legend>Test Instructions</legend>
                    <div id="test_instructions_div">
                <?php
                for($i = 0; $i<count($this->data['TiTrackerTitle']); $i++){
                        echo $this->Form->input("TiTrackerTitle.$i.id");
                        echo $this->Form->input("TiTrackerTitle.$i.title");
                        echo $this->Form->input("TiTrackerTitle.$i.description");
                }
                ?>
                    </div>
                    <?php echo $ajax->link("Add more title", array('action'=>'addTitle'), array('update'=>'test_instructions_div', 'position'=>'bottom'));?>
    </fieldset>
    <?php echo $this->Form->input('link');?>
	
</fieldset>