<?php echo $html->script('tmobile');?>
<li><?php echo $html->link("Back",array('controller'=>'slmasters','action' => 'preadd') ); ?></li>
 
           <h3><u><b>Script Load Reporting - Add</b></u></h3>

        <?php
            echo $this->Form->create('TmobileSlmaster',array("class"=>"form",'type'=>'file'));
            $date_created = date("Y-m-d");
             include_once('add_tcm_logic.inc');
        ?>
           <?php echo $this->Form->hidden ("doc_type" ,array( 'id'=>'doc_type','value'=>'addsl'));?>
        <div class='freetext'><?php echo "Date : ".$date_created; ?></div>
        <?php include_once('add_engineer_details.inc'); ?>
        <?php include_once('add_project_information_tmobile.inc'); ?>
        <?php include_once('add_activity_information_tmobile.inc'); ?>
         <?php include_once('file_upload.inc'); ?>
        
        <fieldset>
            <div class="submit">
                <input name="Email" type="submit" value="Submit without Email" />
            </div>
        <?php echo $this->Form->end($options = array('name' => 'Email','label' => 'Submit with Email'));   ?>
        </fieldset>
