<?php
echo $html->css("lte-lit");
$designation = $databaseFields->getOptions("designation", 100);
//$count = 0;
debug($count);
?>

<fieldset>
    <legend>Positional Qualifications</legend>
    <div id="resource_options"> </div>
    <?php 
        if(!empty($this->data['AddRequirement'])){           
           for($i=0; $i < count($this->data['AddRequirement']); $i++){ ?>           
           <fieldset>
           <legend><h2>Requirements #<?php echo $i+1 ?></h2></legend>
           <?php
                echo $this->Form->input("AddRequirement.$i.designation", array('type'=>'text'));
                echo $this->Form->input("AddRequirement.$i.certifications", array('type'=>'textarea'));
                echo $this->Form->input("AddRequirement.$i.other_requirements", array('type'=>'textarea'));?>
           </fieldset>
            <?php }
        }?>                   
    <?php
    echo $this->Html->link("[+] Add Requirements", "javascript:addreqmts()");
    echo $this->Javascript->codeBlock("var addRequirement_count = $count;");
    ?>
</fieldset> 

<?php
echo $this->Javascript->codeBlock(
        "var complete_html = '" .
        "<div id=\"requirements\">" .
        "<fieldset>".
        "<legend><h2>Requirements #requirement_label_count</h2></legend>" .
        $this->Form->input("AddRequirement.requirement_count.designation", array(
            "label" => "Designation",
            "type" => "text"
                )
        ) ."".                        
        $this->Form->input("AddRequirement.requirement_count.certifications", array(
            "label" => "Certifications",
            "type" => "textarea"
                )
        ) ."".                
        $this->Form->input("AddRequirement.requirement_count.other_requirements", array(
            "label" => "Other Requirements",
            "type" => "textarea"
                )
        ) ."".
        "</fieldset>".
       "</div>'"
);
?>
