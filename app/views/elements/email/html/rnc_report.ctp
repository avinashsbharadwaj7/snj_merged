<?php
/*
 * id: emoibhu
 * Name: Moiz Bhukhiya
 */
?>
<style type="text/css">
    <?php
    $path = APP."webroot".DS."css".DS;
    echo file_get_contents($path."rnc".DS."style.css");
    echo file_get_contents($path."rnc".DS."view.css");
    echo file_get_contents($path."permarinus_blue.css");
    ?>
    #container{width: 98% !important;}
    #content{width: 98% !important;}
</style>
<fieldset>
    <legend><?php __('Report #'.$report_number); ?></legend>
    <dl>
        <dt>Report Number:</dt><dd><?php echo $this->data['RncReport']['report_number'];?></dd>
        <dt>Status:</dt><dd><?php echo $this->data['RncReport']['status'];?>&nbsp;</dd>
        <dt>Date:</dt><dd><?php echo $this->data['RncReport']['date'];?>&nbsp;</dd>
        <dt>RNC Name:</dt><dd><?php echo $this->data['RncReport']['rnc_name'];?>&nbsp;</dd>
        <dt>IP Address:</dt><dd><?php echo $this->data['RncReport']['ip_address'];?>&nbsp;</dd>
        <dt>Engineer Signum:</dt><dd><?php echo $this->data['RncReport']['engineer_signum'];?>&nbsp;</dd>
        <dt>Engineer Name:</dt><dd><?php echo $this->data['RncReport']['engineer_name'];?>&nbsp;</dd>
        <dt>Customer:</dt><dd><?php echo $this->data['RncReport']['customer'];?>&nbsp;</dd>
        <dt>Project Manager:</dt><dd><?php echo $this->data['RncReport']['project_manager'];?>&nbsp;</dd>
        <dt>Network Number:</dt><dd><?php echo $this->data['RncReport']['network_number'];?>&nbsp;</dd>
        <dt>SDM:</dt><dd><?php echo $this->data['RncReport']['sdm'];?>&nbsp;</dd>
        <dt>Engineer Work Location:</dt><dd><?php echo $this->data['RncReport']['engineer_work_location'];?>&nbsp;</dd>
        <dt>Date Activity Performed:</dt><dd><?php echo $this->data['RncReport']['dateActivityPerformed'];?>&nbsp;</dd>
        <dt>Region:</dt><dd><?php echo $this->data['RncReport']['region'];?>&nbsp;</dd>
        <dt>TCM Engineer:</dt><dd><?php echo $this->data['RncReport']['tcm_engineer'];?>&nbsp;</dd>
        <dt>CSR Reference:</dt><dd><?php echo $this->data['RncReport']['csr_reference'];?>&nbsp;</dd>
        <dt>CCB Ticket:</dt><dd><?php echo $this->data['RncReport']['ccb_ticket'];?>&nbsp;</dd>
        <dt>MOP Used?:</dt><dd><?php echo $this->data['RncReport']['mop_used'];?>&nbsp;</dd>
        <dt>Problem With MOP:</dt><dd><?php echo $this->data['RncReport']['problem_with_mop'];?>&nbsp;</dd>
        <dt>Hardware Type:</dt><dd><?php echo $this->data['RncReport']['hardware_type'];?>&nbsp;</dd>
        <dt>Software Version:</dt><dd><?php echo $this->data['RncReport']['software_version'];?>&nbsp;</dd>
        <dt>Delivery Package:</dt><dd><?php echo $this->data['RncReport']['delivery_package'];?>&nbsp;</dd>
        <dt>Upgrade Package:</dt><dd><?php echo $this->data['RncReport']['upgrade_package'];?>&nbsp;</dd>
        <dt>Upgrade Path:</dt><dd><?php echo $this->data['RncReport']['upgrade_path'];?>&nbsp;</dd>
        <dt>Factory Software:</dt><dd><?php echo $this->data['RncReport']['factory_software'];?>&nbsp;</dd>
        <dt>Current Software:</dt><dd><?php echo $this->data['RncReport']['current_software'];?>&nbsp;</dd>
        <dt>Customer Level:</dt><dd><?php echo $this->data['RncReport']['customer_level'];?>&nbsp;</dd>
        <dt>CSR Status Check:</dt><dd><?php echo $this->data['RncReport']['csr_status_check'];?>&nbsp;</dd>
        <dt>MOP Version:</dt><dd><?php echo $this->data['RncReport']['mop_version'];?>&nbsp;</dd>
        <dt>Report Status:</dt><dd><?php echo $this->data['RncReport']['report_status'];?>&nbsp;</dd>
        <dt>Report Comments:</dt><dd><?php echo $this->data['RncReport']['report_comments'];?>&nbsp;</dd>
    </dl>
    <fieldset>
        <legend><?php __('Toycell Info'); ?></legend>
        <dl>
            <dt>Toycell Hardware Type:</dt><dd><?php echo $this->data['RncReport']['toycell_hardware_type'];?></dd>
            <dt>Toycell Software Level:</dt><dd><?php echo $this->data['RncReport']['toycell_software_level'];?></dd>
            <dt>Toycell IUB ATM IP:</dt><dd><?php echo $this->data['RncReport']['toycell_iub_atm_ip'];?>&nbsp;</dd>
            <dt>Toycell Name:</dt><dd><?php echo $this->data['RncReport']['toycell_name'];?>&nbsp;</dd>
            <dt>Toycell IP Address:</dt><dd><?php echo $this->data['RncReport']['toycell_ip_address'];?>&nbsp;</dd>
       </dl>
    </fieldset>
    <?php if($readyForQa):?>
    <fieldset>
        <legend><?php __('QA Completion'); ?></legend>
        <dl>
            <dt>QA Engineer Signum:</dt><dd><?php echo $this->data['RncReport']['qa_engineer_signum'];?>&nbsp;</dd>
            <dt>QA Engineer Name:</dt><dd><?php echo $this->data['RncReport']['qa_engineer_name'];?>&nbsp;</dd>
            <dt>QA Status:</dt><dd><?php echo $this->data['RncReport']['qa_status'];?>&nbsp;</dd>
            <dt>QA Exceptions:</dt><dd><?php echo $this->data['RncReport']['qa_exceptions'];?>&nbsp;</dd>
            <dt>QA Comments:</dt><dd><?php echo $this->data['RncReport']['qa_comments'];?>&nbsp;</dd>
        </dl>
    </fieldset>
    <?php endif;?>
</fieldset>
<div>
    <div>Color Indication:</div>
    <div class="completed-task" style="font-size: 14px; text-decoration: underline;font-weight: bold;">Completed</div>
    <div class="incomplete-task" style="font-size: 14px; text-decoration: underline;font-weight: bold;">Not Completed</div>
    <div class="not-applicable-task" style="font-size: 14px; text-decoration: underline;font-weight: bold;">Not Applicable</div>
    <div style="font-size: 14px; text-decoration: underline;font-weight: bold;">No Answer</div>
</div>
<?php foreach($groups as $groupName => $groupIndex): if(!(preg_match("/Qa$/", $groupName) > 0) || $readyForQa):?>
    <div id="fragment-<?php echo ($groupIndex + 2)?>">
        <div class="reports form">
            <fieldset>
                <legend>RNC Group#<?php echo ($groupIndex + 1);?></legend>
                <dl>
                    <?php
                    foreach ($rncFields[$groupIndex] as $field => $label): if(!in_array($field, array("report_id", "date"))):
                    ?>
                        <dt class="<?php echo (isset($this->data[$groupName][$field])) ? $rncDatabaseFields->getClass($this->data[$groupName][$field]) : "";?>">
                            <?php echo $label ?>
                        </dt>
                        <dd style ="margin-right: 1em">
                            &nbsp;
                        </dd>
                    <?php endif;endforeach; ?>
                </dl>
            </fieldset>
        </div>
    </div>
<?php endif; endforeach;?>