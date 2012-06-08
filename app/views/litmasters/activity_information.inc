<?php
$yes_no = $databaseFields->getOptions('yes_no_only', '4');
?>

<fieldset>
    <legend><?php __('Activity Information'); ?></legend>
    <?php
    if ($this->params['action'] != "add") {
        echo $this->Form->input('Litmaster.activity_type', array('readonly'=>true));
    } else {
        echo $this->Form->input('Litmaster.activity_type', array("options" => $databaseFields->getOptions('activity_type', 4)));
    }
    echo $this->Form->input('Litmaster.activity_status', array("options" => $databaseFields->getOptions('activity_status', 4)));
    echo $this->Form->input('Litmaster.time_taken_for_activity', array('label'=>'Time Taken For Activity', 'placeholder'=>'HH:MM'));
    echo $this->Form->input('Litmaster.activity_type_comments', array('label' => 'Activity Comments'));
    echo $this->Form->input('Litmaster.password_set');
    echo $this->Form->input('Litmaster.no_dul', array("label" => "No of DULs", "options" => $databaseFields->getOptions("number_dul", 4)));
    echo $this->Form->input('Litmaster.onsite_engineer_name');
    echo $this->Form->input('Litmaster.onsite_engineer_phone', array("label" => "Onsite Engineer Phone Number"));
    echo $this->Form->input('Litmaster.stepin_mop', array("label" => "Step In MOP At Which ASP Called In"));
    ?>

    <fieldset style="min-width: 500px;">
        <legend><?php __('MOP Information'); ?></legend>
        <?php
        // Dropdown if other give box
        echo $this->Form->input('Litmaster.lte_nic_mop_name', array("label" => "LTE NIC MOP Name", "options" => $databaseFields->getOptions('lte_nic_mop_name', 4), 'onChange' => "triggerUpdater(LitmasterLteNicMopName, 'LteNicMopNamePlaceholder' , 'litmasters')"));

        echo $this->Html->div('', null, array('id' => 'LteNicMopNamePlaceholder'));
        if (isset($this->data['Litmaster']['lte_nic_mop_name'])) {
            switch ($showFields->display('lte_nic_mop_name', $this->data['Litmaster']['lte_nic_mop_name'])) {
                case 1:
                    echo $this->Html->div('lte-link', null);
                    echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-10:001151Uen&objectId=09004cff839cabb5&action=current&format=msw8", array('target' => '_blank'));
                    echo "</div>";
                    break;
            }
        }
        echo "</div>";
        echo $this->Form->input('Litmaster.lte_nic_mop_version', array("label" => "LTE NIC MOP Version"));
        // Dropdown if other give box
        echo $this->Form->input('Litmaster.onsite_mop_name', array("label" => "On Site MOP Name", "options" => $databaseFields->getOptions('onsite_mop_name', 4), 'onChange' => "triggerUpdater(LitmasterOnsiteMopName, 'OnsiteMopNamePlaceholder', 'litmasters')"));
        echo $this->Form->input('Litmaster.problem_in_mop', array('label'=>'Problem in MOP', 'options'=> $databaseFields->getOptions('yes_no_only', 4, false)));
        echo $this->Form->input('Litmaster.reason_for_problem_in_mop', array('label'=>'Reason for Problem', 'type'=>'textarea'));
        echo $this->Html->div('', null, array('id' => 'OnsiteMopNamePlaceholder'));
        if (isset($this->data['Litmaster']['onsite_mop_name'])) {
            switch ($showFields->display('onsite_mop_name', $this->data['Litmaster']['onsite_mop_name'])) {
                case 1:
                    echo $this->Html->div('lte-link', null);
                    echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-10:004603Uen&objectId=09004cff83c04ca5&action=current&format=msw8", array('target' => '_blank'));
                    echo "</div>";
                    break;
                case 2:
                    echo $this->Html->div('lte-link', null);
                    echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-11:002845Uen&objectId=09004cff8478df34&action=current&format=msw8", array('target' => '_blank'));
                    echo "</div>";
                    break;
            }
        }
        echo "</div>";

        echo $this->Form->input('Litmaster.onsite_mop_version', array("label" => "On Site MOP Version"));
        echo $this->Form->input('Litmaster.sync_source', array("label" => "Synchronization Source", "options" => $databaseFields->getOptions("sync_source", 4)));
        echo $this->Form->input('Litmaster.lkf_oss', array("label" => "LKF Uploaded To OSS", "options" => $yes_no));
        echo $this->Form->input('Litmaster.lkf_enodeb', array("label" => "LKF Installed on eNodeB", "options" => $yes_no));
        echo $this->Form->input('Litmaster.ip_connectivity', array("label" => "IP Connectivity", "options" => $yes_no, 'onChange' => "triggerUpdater(LitmasterIpConnectivity, 'IpConnectivityPlaceholder', 'litmasters')"));

        /* Only if the answer is NO show the Please Explain box */
        echo $this->Html->div('', null, array('id' => 'IpConnectivityPlaceholder'));
        echo (isset($this->data['Litmaster']['ip_connectivity']) && $showFields->display('ip_connectivity', $this->data['Litmaster']['ip_connectivity'])) ? $this->Form->input('Litmaster.ip_connectivity_explain', array('label' => '-Please Explain')) : "";
        echo "</div>";

        echo $this->Form->input('Litmaster.cell_status', array("label" => "Cell/Sector Status"));
        echo $this->Form->input('Litmaster.soft_basic', array("label" => "Software Basic Package", "options" => $databaseFields->getOptions('soft_basic', 4), 'onChange' => "triggerUpdater(LitmasterSoftBasic, 'SoftBasicPlaceholder', 'litmasters')"));

        echo $this->Html->div('', null, array('id' => 'SoftBasicPlaceholder'));
        if (isset($this->data['Litmaster']['soft_basic'])) {
            switch ($showFields->display('soft_basic', $this->data['Litmaster']['soft_basic'])) {
                case 1:
                    echo $this->Form->input('soft_basic_package', array('label' => '-Package', 'options' => $databaseFields->getOptions('soft_basic_package_a', 4)));
                    break;
            }
        }
        echo "</div>";

        echo $this->Form->input('Litmaster.soft_upgrade_performed', array("label" => "Software Upgrade Performed", "options" => $yes_no, 'onChange' => "triggerUpdater(LitmasterSoftUpgradePerformed, 'SoftUpgradePerformedPlaceholder', 'litmasters')"));

        /* Only if the answer is YES show the Please Explain box */
        echo $this->Html->div('', null, array('id' => 'SoftUpgradePerformedPlaceholder'));
        if (isset($this->data['Litmaster']['soft_upgrade_performed']) && $showFields->display('soft_upgrade_performed', $this->data['Litmaster']['soft_upgrade_performed'])) {
            echo $this->Form->input('Litmaster.soft_upload', array("label" => "-Software Upgrade Package", "options" => $databaseFields->getOptions('soft_basic', 4), 'onChange' => "triggerUpdater(LitmasterSoftUpload, 'SoftUploadPlaceholder', 'litmasters')"));
        }


        echo $this->Html->div('', null, array('id' => 'SoftUploadPlaceholder'));
        if (isset($this->data['Litmaster']['soft_upload']) && $this->data['Litmaster']['soft_upgrade_performed']) {
            switch ($showFields->display('soft_upload', $this->data['Litmaster']['soft_upload']) && $showFields->display('soft_upgrade_performed', $this->data['Litmaster']['soft_upgrade_performed'])) {
                case 1:
                    echo $this->Form->input('Litmaster.soft_upload_package', array("label" => "-Package", "options" => $databaseFields->getOptions('soft_upload_package_a', 4)));
                    break;
                case 2:
                    echo $this->Form->input('Litmaster.soft_upload_package', array("label" => "-Package", "options" => $databaseFields->getOptions('soft_upload_package_b', 4)));
                    break;
            }
        }
        echo "</div>";
        echo "</div>";

        echo $this->Form->input('Litmaster.cv_rollback', array("label" => "Basic CV Removed from Rollback list", "options" => $yes_no));
        echo $this->Form->input('Litmaster.cv_uploaded_oss', array("label" => "CV Uploaded to OSS FTP Server", "options" => $yes_no));
        echo $this->Form->input('Litmaster.system_constants_loaded', array("options" => $databaseFields->getOptions("yes_no_only", 4), 'onChange' => "triggerUpdater(LitmasterSystemConstantsLoaded, 'SystemConstantsLoadedPlaceholder', 'litmasters')"));

        /* Only if the answer is YES show the File Name box */
        echo $this->Html->div('', null, array('id' => 'SystemConstantsLoadedPlaceholder'));
        if (isset($this->data['Litmaster']['system_constants_loaded']) && $showFields->display('system_constants_loaded', $this->data['Litmaster']['system_constants_loaded'])) {
            if ((isset($this->data['Litfile'][2]['file']['error']) && is_array($this->data['Litfile'][2]['file'])) && $this->data['Litfile'][2]['file']['error'] == 0) {
                if (isset($this->data['Litfile'][2]['origFileName']) && is_array($this->data['Litfile'][2])) {
                    echo $this->Form->input('Litfile.2.file', array('type' => 'text', 'readonly' => 'readonly', 'label' => '-File Name', 'value' => $this->data['Litfile'][2]['file']['name'], 'after' => $this->Html->link(__('Change', true), "javascript:void(0)", array('id' => 'upload2ClickSys', 'onClick' => "showUploaderWithUndo('upload2ClickSys', 'Litfile2File', 2, 'Litfile', '" . $this->data['Litfile'][2]['origFileName'] . "'); return false"))));
                } else {
                    echo $this->Form->input('Litfile.2.file', array('type' => 'text', 'readonly' => 'readonly', 'label' => '-File Name', 'value' => $this->data['Litfile'][2]['file']['name'], 'after' => $this->Html->link(__('Change', true), "javascript:void(0)", array('id' => 'upload2ClickSys', 'onClick' => "showUploader('upload2ClickSys', 'Litfile2File', 2, 'Litfile'); return false"))));
                }
            } else {
                echo $this->Form->input('Litfile.2.file', array('type' => 'file', 'label' => '-File Name'));
            }
        }
        echo "</div>";

        echo $this->Form->input('Litmaster.baseline_loaded', array("options" => $yes_no));
        echo $this->Form->input('Litmaster.osr_info', array("label" => "OnSite Router Information(OSR)", "options" => $databaseFields->getOptions("site_router_information", 4)));
        echo $this->Form->input('Litmaster.3pp_name', array("label" => "3PP Name"));
        echo $this->Form->input('Litmaster.osr_softlevel', array("label" => "OnSite Router(OSR) Software Level"));
        echo $this->Form->input('Litmaster.osr_pingable', array("label" => "OnSite Router(OSR) Pingable"));
        echo $this->Form->input('Litmaster.osr_alarm', array("label" => "OnSite Router(OSR) Alarm"));
        echo $this->Form->input('Litmaster.osr_version', array("label" => "OnSite Router(OSR) Version"));
        echo $this->Form->input('Litmaster.osr_password', array("OnSite Router(OSR) Password"));
        echo $this->Form->input('Litmaster.default_pingable', array("label" => "Default Router Pingable(SIU/SIAD/Site Router)", "options" => $yes_no, 'onChange' => "triggerUpdater(LitmasterDefaultPingable, 'DefaultPingablePlaceholder', 'litmasters')"));

        /* Only if the answer is NO show the Reason box */
        echo $this->Html->div('', null, array('id' => 'DefaultPingablePlaceholder'));
        echo (isset($this->data['Litmaster']['default_pingable']) && $showFields->display('default_pingable', $this->data['Litmaster']['default_pingable'])) ? $this->Form->input('Litmaster.default_pingable_reason', array('label' => '-Reason')) : "";
        echo "</div>";

        echo $this->Form->input('Litmaster.ntp_pingable', array("label" => "NTP Pingable", "options" => $yes_no, 'onChange' => "triggerUpdater(LitmasterNtpPingable, 'NtpPingablePlaceholder', 'litmasters')"));

        /* Only if the answer is NO show the Reason box */
        echo $this->Html->div('', null, array('id' => 'NtpPingablePlaceholder'));
        echo (isset($this->data['Litmaster']['ntp_pingable']) && $showFields->display('ntp_pingable', $this->data['Litmaster']['ntp_pingable'])) ? $this->Form->input('Litmaster.ntp_pingable_reason', array('label' => '-Reason')) : "";
        echo "</div>";

        echo $this->Form->input('Litmaster.oss_pingable', array("label" => "OSS FTP Server Pingable", "options" => $yes_no, 'onChange' => "triggerUpdater(LitmasterOssPingable, 'OssPingablePlaceholder', 'litmasters')"));

        /* Only if the answer is NO show the Reason box */
        echo $this->Html->div('', null, array('id' => 'OssPingablePlaceholder'));
        echo (isset($this->data['Litmaster']['oss_pingable']) && $showFields->display('oss_pingable', $this->data['Litmaster']['oss_pingable'])) ? $this->Form->input('Litmaster.oss_pingable_reason', array('label' => '-Reason')) : "";
        echo "</div>";

        echo $this->Form->input('Litmaster.term_mme', array("label" => "Term Point To MME", "options" => $yes_no, 'onChange' => "triggerUpdater(LitmasterTermMme, 'TermMmePlaceholder', 'litmasters')"));

        /* Only if the answer is NO show the Reason box */
        echo $this->Html->div('', null, array('id' => 'TermMmePlaceholder'));
        echo (isset($this->data['Litmaster']['term_mme']) && $showFields->display('term_mme', $this->data['Litmaster']['term_mme'])) ? $this->Form->input('Litmaster.term_mme_reason', array('label' => '-Reason')) : "";
        echo "</div>";
        ?>
    </fieldset>
</fieldset>
