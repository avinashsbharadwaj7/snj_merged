
<?php
/* Courtesy: Moiz Bhukhiya */

echo $javascript->link('snt_resources.js');
echo $html->css("lte-lit"); 
$class = ' class="altrow"';
?>

<fieldset>
    <legend><?php __('SnT: Manage Resources'); ?></legend>
    <?php echo $this->Form->create("JobResource", array("url"=> array("controller" => "job_schedules", "action" => "add_resource"))); ?>
    <div id="resource_options">
        <?php
        $count = 1;
        if (count($this->data['JobResource']) > 1) {
            $count = 0;
            foreach ($this->data['JobResource'] as $opt) {
                ?>
                <fieldset>
                <div id="additional_engineer">
                    <legend><?php __("Engineer #" . (intval($count) + 1)); ?></legend>
                    <?php
                    echo $form->hidden("JobResource.$count.s_id");
                    echo $form->input("JobResource.$count.name", array('label' => "Name"));
                    echo $form->input("JobResource.$count.job_schedule_id", array('label' => "Job Id", 'type' => 'hidden'));
                    echo $form->input("JobResource.$count.signum", array('label' => "Signum"));
                    echo $form->input("JobResource.$count.active", array('label' => "Active"));
                    echo $form->input("JobResource.$count.resource_pool", array('label' => "Pool"));
                    echo $form->input("JobResource.$count.resource_product_area", array('label' => "Product Area"));
                    $count++;
                    ?>
                </div>
                </fieldset>
                <?php
            }
        } else {
            ?>
            <fieldset>
            <div id="additional_engineer">
                <legend><?php __('Engineer #1'); ?></legend>
                <?php
                echo $form->hidden("JobResource.0.s_id");
                echo $form->input("JobResource.0.name", array('label' => "Name"));
                echo $form->input("JobResource.0.job_schedule_id", array('label' => "Job Id", 'type' => 'hidden'));
                echo $form->input("JobResource.0.signum", array('label' => "Signum"));
                echo $form->input("JobResource.0.active", array('label' => "Active"));
                echo $form->input("JobResource.0.resource_pool", array('label' => "Pool"));
                echo $form->input("JobResource.0.resource_product_area", array('label' => "Product Area"));
                ?>
            </div>
            </fieldset>
            <?php
        }
        ?>

    </div>
    <?php 
    echo $this->Html->link("[+] Add More Engineers", "javascript:addEngineer()");
    if($approve){
        echo $this->Form->input("approve", array("type"=>"select", "options"=>array("Yes"=>"Yes", "No"=>"No")));
    }
    echo $this->Form->end($options = array('name' => 'Submit', 'label' => 'Submit'));
    echo $this->Javascript->codeBlock("var additional_engineer_count = $count;");
    ?>
</fieldset>

<?php
echo $this->Javascript->codeBlock(
        "var additional_engineer_html = '" .
        "<fieldset>" .
        "<div id=\"additional_engineer\">" .
        "<legend>Engineer #engineer_label_count</legend>" .
        $this->Form->hidden("JobResource.engineer_count.id", array(
//            "label" => "Name# engineer_label_count",
            "type" => "hidden"
                )
        ) .
        "" .
        $this->Form->input("JobResource.engineer_count.name", array(
            "label" => "Name",
            "type" => "text"
                )
        ) .
        "" .
        $this->Form->input("JobResource.engineer_count.job_schedule_id", array(
            "label" => "Job Id",
            "type" => "hidden"           
                )
        ) .
        "" .
        $this->Form->input("JobResource.engineer_count.signum", array(
            "label" => "Signum",
            "type" => "text"
                )
        ) .
        "" .
        $this->Form->input("JobResource.engineer_count.active", array(
            "label" => "Active",
            "type" => "text"
                )
        ) .
        "" .
        $this->Form->input("JobResource.engineer_count.resource_pool", array(
            "label" => "Pool",
            "type" => "text"
                )
        ) .
        "" .
        $this->Form->input("JobResource.engineer_count.resource_product_area", array(
            "label" => "Product Area",
            "type" => "text"
                )
        ) .
        "" .
        "</div>" . 
        "</fieldset>'"
);
?>
