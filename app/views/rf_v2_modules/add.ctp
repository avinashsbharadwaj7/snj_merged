<?php
include_once 'dependencyMap.php';
$myJsHtml->init("RfV2Module", $dependencyMap);
echo $html->css(array('rnc/style', 'rnc/jquery-ui', 'rnc/view', 'rnc/css_menu'));
echo $html->css('rnc/bcp');
e($javascript->link('rnc/jquery-1.4.1.min'));
e($javascript->link('rnc/jquery-ui.min'));
echo $this->Javascript->codeBlock("var auto_complete_url = '". $this->Html->url(array("action"=>"autoComplete")) . "';var j = jQuery.noConflict();");
echo $javascript->link("vtip-min");
echo $javascript->link("helpbox");
echo $javascript->link("rnc/rf_v2");
echo $html->css('rnc/rf');
$indicator = '<span id="autoindicator" style="display: none">' . $this->Html->image("spinner.gif", array("alt"=>"Working...")) . '</span>';
$username = Authsome::get("username");
$person_completing = isset($this->data['RfV2Module']['person_completing']) ? $this->data['RfV2Module']['person_completing'] : $username;
?>
<div class="rfV2Modules form">
    <?php echo $this->Form->create('RfV2Module'); ?>
    <fieldset>
        <legend><?php __('Project Definition'); ?></legend>
        <?php
        include_once 'general_fields.inc';
        include_once 'additional_engineer_fields.inc';
        include_once 'implementation_fields.inc';
        include_once 'adjustment_fields.inc';
        include_once 'post_pre_fields.inc';
        include_once 'qa_fields.inc';
        echo $this->Form->input('last_modified_by',
                array('after' => $helpBox->display('last_modified_by'),"value"=> $username, "div"=>array("style"=>"display:none")));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
    </div>
<?php echo $myJsHtml->observeFields(); ?>