<?php
/*
 * id: emoibhu
 * Name: Moiz Bhukhiya
 */
?>
<?php echo $javascript->link('ajaxValidation'); ?>
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
            <li><a href="#fragment-13"><span>QA1</span></a></li>
            <li><a href="#fragment-14"><span>QA2</span></a></li>
            <li><a href="#fragment-15"><span>QA3</span></a></li>
            <li><a href="#fragment-16"><span>Files</span></a></li>
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
            <?php echo $this->element("first_groups/view"); ?>
        </div>
        <div id="fragment-3">
            <?php echo $this->element("second_groups/view"); ?>
        </div>
        <div id="fragment-4">
            <?php echo $this->element("third_groups/view"); ?>
        </div>
        <div id="fragment-5">
            <?php echo $this->element("fourth_groups/view"); ?>
        </div>
        <div id="fragment-6">
            <?php echo $this->element("fifth_groups/view"); ?>
        </div>
        <div id="fragment-7">
            <?php echo $this->element("sixth_groups/view"); ?>
        </div>
        <div id="fragment-8">
            <?php echo $this->element("seventh_groups/view"); ?>
        </div>
        <div id="fragment-9">
            <?php echo $this->element("eighth_groups/view"); ?>
        </div>
        <div id="fragment-10">
            <?php echo $this->element("ninth_groups/view"); ?>
        </div>
        <div id="fragment-11">
            <?php echo $this->element("tenth_groups/view"); ?>
        </div>
        <div id="fragment-12">
            <?php echo $this->element("eleventh_groups/view"); ?>
        </div>
        <div id="fragment-13">
            <?php echo $this->element("second_qas/add"); ?>
        </div>
        <div id="fragment-14">
            <?php echo $this->element("third_qas/add"); ?>
        </div>
        <div id="fragment-15">
            <?php echo $this->element("fourth_qas/add"); ?>
        </div>
        <div id="fragment-16">
            <?php echo $this->element("files"); ?>
        </div>
    </div>