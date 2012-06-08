<fieldset>
    <legend>Other Additional Engineers Involved</legend>
    <div id="div_additional_engineers">
        <?php
        $count = 1;
        if (isset($this->data['RfV2Module']['additional_engineers'])):
            foreach ($this->data['RfV2Module']['additional_engineers'] as $key => $engineer) {
                $options['after'] = $helpBox->display('additional_engineers');
                $options["label"] = "Additional Engineer# $count";
                $options["type"] = "text";
                echo $this->Form->input("RfV2Module.additional_engineers.$key", $options);
                $count++;
            }
            $count--;
        else:
            echo $this->Form->input("RfV2Module.additional_engineers.0",
                    array('after' => $helpBox->display('additional_engineers'), "label" => "Additional Engineer# $count", "type" => "text"));
        endif;
        ?>
    </div>
    <?php
        echo $this->Html->link("Add more engineers", "javascript:addEngineer()");
        echo $this->Javascript->codeBlock("var additional_engineer_count = $count;");
    ?>
</fieldset>
<?php
echo $this->Javascript->codeBlock(
        "var additional_engineer_html = '".
        $this->Form->input("RfV2Module.additional_engineers.engineer_count",
                    array(
                        'after' => $helpBox->display('additional_engineers'),
                        "label" => "Additional Engineer# engineer_label_count",
                        "type" => "text"
                        )
                ) .
        "';");
?>