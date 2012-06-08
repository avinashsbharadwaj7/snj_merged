<?php
/*
 * id: emoibhu
 * Name: Moiz Bhukhiya
 */
?>
<?php
global $rncFields;
echo $html->css(array('rnc/style','rnc/jquery-ui','rnc/view','rnc/css_menu'));
echo $html->css('rnc/bcp');
echo $html->css('rnc/jquery.jgrowl');
e($javascript->link('rnc/jquery-1.4.1.min'));
e($javascript->link('rnc/jquery-ui.min'));
e($javascript->link('rnc/rnc-custom'));
e($javascript->link('rnc/view'));
e($javascript->link('rnc/jquery.jgrowl'));
e($javascript->link('rnc/jquery.form'));
e($javascript->link('rnc/jquery.blockUI'));
echo $javascript->link('rnc/ajaxValidation');
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
                <?php echo $this->element("rnc_stuff/general_view"); ?>
            </div>
        </div>
        <?php echo $this->element("rnc_stuff/view"); ?>
        <div id="fragment-17">
            <div class="reports form">
                <?php include_once 'view_files.php'; ?>
            </div>
        </div>
    </div>
<?php
echo $this->Javascript->codeBlock("$('dt:even').addClass('altrow');$('dd:even').addClass('altrow');$('dd').css('float','right');");
echo $this->element("rnc_stuff/email");
?>
