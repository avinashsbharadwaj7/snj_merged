<?php
/*
 * id: emoibhu
 * Name: Moiz Bhukhiya
 */
?>
<?php
echo $html->css(array('rnc/style','rnc/jquery-ui','rnc/view','rnc/css_menu'));
echo $html->css('rnc/jquery.fastconfirm');
echo $html->css('rnc/jquery.jgrowl');
echo $html->css('rnc/bcp');
echo $html->css('rnc/colorbox');
e($javascript->link('rnc/jquery-1.4.1.min'));
e($javascript->link('rnc/jquery-ui.min'));
e($javascript->link('rnc/jquery.fastconfirm'));
e($javascript->link('rnc/jquery.colorbox-min'));
e($javascript->link('rnc/rnc-custom'));
e($javascript->link('rnc/view'));
e($javascript->link('rnc/jquery.jgrowl'));
e($javascript->link('rnc/jquery.form'));
e($javascript->link('rnc/jquery.blockUI'));
echo $javascript->link('rnc/ajaxValidation');
echo $javascript->link('rnc/jquery.base64.min');
?>


    <div id="flashMessage" class="message" style="display:none"></div>
    <div id="tabs">
        <ul>
            <li><a href="#fragment-0"><span>Overview</span></a></li>
            <li><a href="#fragment-1"><span>General Info</span></a></li>
            <li><a href="#fragment-2"><span>Group 1</span></a></li>
            <li><a href="#fragment-3"><span>2</span></a></li>
            <li><a href="#fragment-4"><span>3</span></a></li>
            <li><a href="#fragment-5"><span>4</span></a></li>
            <li><a href="#fragment-6"><span>5</span></a></li>
            <li><a href="#fragment-7"><span>6</span></a></li>
            <li><a href="#fragment-8"><span>7</span></a></li>
            <li><a href="#fragment-9"><span>8</span></a></li>
            <li><a href="#fragment-10"><span>9</span></a></li>
            <li><a href="#fragment-11"><span>10</span></a></li>
            <li><a href="#fragment-12"><span>11-PC</span></a></li>
            <?php if($readyForQa):?>
            <li><a href="#fragment-13"><span>QA 1</span></a></li>
            <li><a href="#fragment-14"><span>2</span></a></li>
            <li><a href="#fragment-15"><span>3</span></a></li>
            <li><a href="#fragment-16"><span>4</span></a></li>
            <?php endif;?>
            <li><a href="#fragment-17"><span>Files</span></a></li>
        </ul>
        <div id="fragment-0">
            <?php echo $this->element("overview"); ?>
        </div>
        <div id="fragment-1">
            <div class="reports form">
                <?php include_once 'add_form.php'; ?>
            </div>
        </div>
        <div id="fragment-2">
            <?php echo $this->element("first_groups/add"); ?>
        </div>
        <div id="fragment-3">
            <?php echo $this->element("second_groups/add"); ?>
        </div>
        <div id="fragment-4">
            <?php echo $this->element("third_groups/add"); ?>
        </div>
        <div id="fragment-5">
            <?php echo $this->element("fourth_groups/add"); ?>
        </div>
        <div id="fragment-6">
            <?php echo $this->element("fifth_groups/add"); ?>
        </div>
        <div id="fragment-7">
            <?php echo $this->element("sixth_groups/add"); ?>
        </div>
        <div id="fragment-8">
            <?php echo $this->element("seventh_groups/add"); ?>
        </div>
        <div id="fragment-9">
            <?php echo $this->element("eighth_groups/add"); ?>
        </div>
        <div id="fragment-10">
            <?php echo $this->element("ninth_groups/add"); ?>
        </div>
        <div id="fragment-11">
            <?php echo $this->element("tenth_groups/add"); ?>
        </div>
        <div id="fragment-12">
            <?php echo $this->element("eleventh_groups/add"); ?>
        </div>
        <?php if($readyForQa):?>
        <div id="fragment-13">
            <?php echo $this->element("first_qas/add"); ?>
        </div>
        <div id="fragment-14">
            <?php echo $this->element("second_qas/add"); ?>
        </div>
        <div id="fragment-15">
            <?php echo $this->element("third_qas/add"); ?>
        </div>
        <div id="fragment-16">
            <?php echo $this->element("fourth_qas/add"); ?>
        </div>
        <?php endif;?>
        <div id="fragment-17">
            <?php echo $this->element("files"); ?>
        </div>
    </div>

    <fieldset>
        <legend>Legends</legend>
        <?php echo $html->image('up_alt.png');?> : Upload Logs
        <?php echo $html->image('down_alt.png');?> : Download Logs
    </fieldset>
    <script type="text/javascript">
        var issueUrl = '<?php echo $this->Html->url(array("controller" => "rnc_issues", "action" => "add"));?>';
    </script>
    <?php echo $this->element("rnc_stuff/email");?>