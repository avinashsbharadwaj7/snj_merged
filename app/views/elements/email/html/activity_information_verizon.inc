<?php
$yes_no = $databaseFields->getOptions('yes_no_only', '4',true);
$yes_no_only = $databaseFields->getOptions('yes_no_only', '4',false);
?>

<fieldset>
    <legend><?php __('Activity Information'); ?></legend>
    <?php
    echo $this->Form->input('LitmasterVerizon.activity', array("options" => $databaseFields->getOptions('activity_type',5)));
//    echo '<div>';
//    echo $this->Form->input('Litmaster_verizon.activity_type_comments');
//    echo '</div>';
//    echo $this->Form->input('Litmaster_verizon.activity_status');
//    echo $this->Form->input('Litmaster_verizon.password_set');
//    echo $this->Form->input('Litmaster_verizon.no_dul', array("label"=>"No of DULs","options" => $databaseFields->getOptions("number_dul",4)));
    echo $this->Form->input('LitmasterVerizon.asp_engineer_name', array('label'=> 'ASP Engineer Name'));
//    echo $this->Form->input('Litmaster_verizon.onsite_engineer_phone', array("label"=>"Onsite Engineer Phone Number"));
//    echo $this->Form->input('Litmaster_verizon.stepin_mop',array("label"=>"Step In MOP At Which ASP Called In"));
    echo $this->Form->input('LitmasterVerizon.sonar_updated', array('label'=>'Sonar Updated', 'options'=>$yes_no));
    ?>
    
    <fieldset style="min-width: 500px;">
        <legend><?php __('MOP Information'); ?></legend>
        <?php
        // Dropdown if other give box
//        echo $this->Form->input('Litmaster_verizon.lte_nic_mop_name',array("label"=>"LTE NIC MOP Name", "options" => $databaseFields->getOptions('lte_nic_mop_name',4), 'onChange'=>"triggerUpdater(LitmasterLteNicMopName, 'LteNicMopNamePlaceholder' , 'litmasters')"));
        
//        echo $this->Html->div('', null, array('id'=>'LteNicMopNamePlaceholder'));
//        if(isset($this->data['Litmaster']['lte_nic_mop_name'])) {
//            switch($showFields->display('lte_nic_mop_name', $this->data['Litmaster']['lte_nic_mop_name'])) {
//               case 1:
////                   echo $this->Html->div('lte-link', null);
////                   echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-10:001151Uen&objectId=09004cff839cabb5&action=current&format=msw8", array('target'=>'_blank'));
//                   echo "</div>";
//                   break;
//            }
//        }
//        echo "</div>";
//        echo $this->Form->input('Litmaster_verizon.lte_nic_mop_version',array("label"=>"LTE NIC MOP Version"));  
        // Dropdown if other give box
//        echo $this->Form->input('Litmaster_verizon.onsite_mop_name', array("label"=>"On Site MOP Name", "options" => $databaseFields->getOptions('onsite_mop_name',4), 'onChange'=>"triggerUpdater(LitmasterOnsiteMopName, 'OnsiteMopNamePlaceholder', 'litmasters')"));
        
//        echo $this->Html->div('', null, array('id'=>'OnsiteMopNamePlaceholder'));
//        if(isset($this->data['Litmaster']['onsite_mop_name'])) {
//            switch($showFields->display('onsite_mop_name', $this->data['Litmaster']['onsite_mop_name'])) {
//               case 1:
////                   echo $this->Html->div('lte-link', null);
////                   echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-10:004603Uen&objectId=09004cff83c04ca5&action=current&format=msw8", array('target'=>'_blank'));
//                   echo "</div>";
//                   break;
//               case 2:
////                   echo $this->Html->div('lte-link', null);
////                   echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-11:002845Uen&objectId=09004cff8478df34&action=current&format=msw8", array('target'=>'_blank'));
//                   echo "</div>";
//                   break;
//            }
//        }
//        echo "</div>";
        
//        echo $this->Form->input('Litmaster_verizon.onsite_mop_version', array("label"=>"On Site MOP Version"));
//        echo $this->Form->input('Litmaster_verizon.sync_source', array("label"=>"Synchronization Source","options"=>$databaseFields->getOptions("sync_source",4)));
//        echo $this->Form->input('Litmaster_verizon.lkf_oss', array("label"=>"LKF Uploaded To OSS", "options"=>$yes_no));
//        echo $this->Form->input('Litmaster_verizon.lkf_enodeb', array("label"=>"LKF Installed on eNodeB","options"=>$yes_no));
        echo $this->Form->input('LitmasterVerizon.ip_connectivity',array("label"=> "IP Connectivity", "options"=>$yes_no));
        
        /* Only if the answer is NO show the Please Explain box*/
//        echo $this->Html->div('', null, array('id'=>'IpConnectivityPlaceholder'));
//        echo (isset($this->data['Litmaster_verizon']['ip_connectivity']) && $showFields->display('ip_connectivity', $this->data['Litmaster']['ip_connectivity'])) ? $this->Form->input('Litmaster.ip_connectivity_explain', array('label'=>'-Please Explain')): "";
//        echo "</div>";
        
//        echo $this->Form->input('Litmaster_verizon.cell_status', array("label"=>"Cell/Sector Status"));
//        echo $this->Form->input('Litmaster_verizon.soft_basic', array("label"=>"Software Basic Package", "options" =>$databaseFields->getOptions('soft_basic',4), 'onChange'=>"triggerUpdater(LitmasterSoftBasic, 'SoftBasicPlaceholder', 'litmasters')"));
        
//        echo $this->Html->div('', null, array('id'=>'SoftBasicPlaceholder'));
//        if(isset($this->data['LitmasterVerizon']['soft_basic'])) {
//            switch($showFields->display('soft_basic', $this->data['Litmaster']['soft_basic'])) {
//               case 1:
////                   echo $this->Form->input('soft_basic_package', array('label'=>'-Package', 'options' =>$databaseFields->getOptions('soft_basic_package_a',4)));  
//                   break;
//            }
//        }
//        echo "</div>";
        
//        echo $this->Form->input('Litmaster_verizon.soft_upgrade_performed', array("label"=>"Software Upgrade Performed", "options"=>$yes_no, 'onChange'=>"triggerUpdater(LitmasterSoftUpgradePerformed, 'SoftUpgradePerformedPlaceholder', 'litmasters')"));

        /* Only if the answer is YES show the Please Explain box*/
//        echo $this->Html->div('', null, array('id'=>'SoftUpgradePerformedPlaceholder'));
//        if(isset($this->data['Litmaster_verizon']['soft_upgrade_performed']) && $showFields->display('soft_upgrade_performed', $this->data['Litmaster']['soft_upgrade_performed']))
//            {
////            echo $this->Form->input('Litmaster_verizon.soft_upload', array("label"=>"-Software Upgrade Package", "options" =>$databaseFields->getOptions('soft_basic',4), 'onChange'=>"triggerUpdater(LitmasterSoftUpload, 'SoftUploadPlaceholder', 'litmasters')"));
//            }
        
        
//        echo $this->Html->div('', null, array('id'=>'SoftUploadPlaceholder'));
//        if(isset($this->data['Litmaster_verizon']['soft_upload']) && $this->data['Litmaster']['soft_upgrade_performed']) {
//            switch($showFields->display('soft_upload', $this->data['Litmaster']['soft_upload']) && $showFields->display('soft_upgrade_performed', $this->data['Litmaster']['soft_upgrade_performed'])) {
//                case 1:
////                    echo $this->Form->input('Litmaster_verizon.soft_upload_package', array("label"=>"-Package", "options" =>$databaseFields->getOptions('soft_upload_package_a',4)));
//                    break;
//                case 2:
////                    echo $this->Form->input('Litmaster_verizon.soft_upload_package', array("label"=>"-Package", "options" =>$databaseFields->getOptions('soft_upload_package_b',4)));
//                    break;
//            }
//        }
//        echo "</div>";
//        echo "</div>";
        
//        echo $this->Form->input('Litmaster_verizon.cv_rollback', array("label"=>"Basic CV Removed from Rollback list","options"=>$yes_no));
//        echo $this->Form->input('Litmaster_verizon.cv_uploaded_oss', array("label"=>"CV Uploaded to OSS FTP Server","options"=>$yes_no));
//        echo $this->Form->input('Litmaster_verizon.system_constants_loaded', array("options"=>$databaseFields->getOptions("yes_no_only",4), 'onChange'=>"triggerUpdater(LitmasterSystemConstantsLoaded, 'SystemConstantsLoadedPlaceholder', 'litmasters')"));

        /* Only if the answer is YES show the File Name box*/
//        echo $this->Html->div('', null, array('id'=>'SystemConstantsLoadedPlaceholder'));
//        if(isset($this->data['Litmaster_verizon']['system_constants_loaded']) && $showFields->display('system_constants_loaded', $this->data['Litmaster']['system_constants_loaded'])) { 
//            if((isset($this->data['Litfile'][2]['file']['error']) && is_array($this->data['Litfile'][2]['file'])) && $this->data['Litfile'][2]['file']['error'] == 0) {
//                if(isset($this->data['Litfile'][2]['origFileName']) && is_array($this->data['Litfile'][2])) {
////                    echo $this->Form->input('Litfile.2.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'-File Name', 'value'=>$this->data['Litfile'][2]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload2ClickSys', 'onClick'=>"showUploaderWithUndo('upload2ClickSys', 'Litfile2File', 2, 'Litfile', '" . $this->data['Litfile'][2]['origFileName'] . "'); return false"))));
//                }
//                else {
////                    echo $this->Form->input('Litfile.2.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'-File Name', 'value'=>$this->data['Litfile'][2]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload2ClickSys', 'onClick'=>"showUploader('upload2ClickSys', 'Litfile2File', 2, 'Litfile'); return false"))));
//                }
//            }
//            else {
////                echo $this->Form->input('Litfile.2.file', array('type'=>'file', 'label'=>'-File Name'));
//            }
//        }
//        echo "</div>";
        
        echo $this->Form->input('LitmasterVerizon.baseline_loaded', array("options"=>$yes_no));
//        echo $this->Form->input('Litmaster_verizon.osr_info', array("label"=>"OnSite Router Information(OSR)","options"=>$databaseFields->getOptions("site_router_information",4)));
//        echo $this->Form->input('Litmaster_verizon.3pp_name', array("label"=>"3PP Name"));
//        echo $this->Form->input('Litmaster_verizon.osr_softlevel', array("label"=>"OnSite Router(OSR) Software Level"));
//        echo $this->Form->input('Litmaster_verizon.ntp_pingable', array("label"=>"NTP Pingable"));
//        echo $this->Form->input('Litmaster_verizon.osr_alarm', array("label"=>"OnSite Router(OSR) Alarm"));
//        echo $this->Form->input('Litmaster_verizon.osr_version', array("label"=>"OnSite Router(OSR) Version"));
//        echo $this->Form->input('Litmaster_verizon.osr_password', array("OnSite Router(OSR) Password"));
//        echo $this->Form->input('Litmaster_verizon.default_pingable', array("label"=>"Default Router Pingable(SIU/SIAD/Site Router)","options"=>$yes_no, 'onChange'=>"triggerUpdater(LitmasterDefaultPingable, 'DefaultPingablePlaceholder', 'litmasters')"));

        /* Only if the answer is NO show the Reason box*/
//        echo $this->Html->div('', null, array('id'=>'DefaultPingablePlaceholder'));
//        echo (isset($this->data['Litmaster_verizon']['default_pingable']) && $showFields->display('default_pingable', $this->data['Litmaster']['default_pingable'])) ? $this->Form->input('Litmaster.default_pingable_reason', array('label'=>'-Reason')): "";
//        echo "</div>";
        
        echo $this->Form->input('LitmasterVerizon.ntp_pingable', array("label"=>"NTP Pingable","options"=>$yes_no));
        
        /* Only if the answer is NO show the Reason box*/
//        echo $this->Html->div('', null, array('id'=>'NtpPingablePlaceholder'));
//        echo (isset($this->data['Litmaster_verizon']['ntp_pingable']) && $showFields->display('ntp_pingable', $this->data['Litmaster']['ntp_pingable'])) ? $this->Form->input('Litmaster.ntp_pingable_reason', array('label'=>'-Reason')): "";
//        echo "</div>";
        
//        echo $this->Form->input('Litmaster_verizon.oss_pingable', array("label"=>"OSS FTP Server Pingable", "options"=>$yes_no, 'onChange'=>"triggerUpdater(LitmasterOssPingable, 'OssPingablePlaceholder', 'litmasters')"));
        
        /* Only if the answer is NO show the Reason box*/
//        echo $this->Html->div('', null, array('id'=>'OssPingablePlaceholder'));
//        echo (isset($this->data['Litmaster_verizon']['oss_pingable']) && $showFields->display('oss_pingable', $this->data['Litmaster']['oss_pingable'])) ? $this->Form->input('Litmaster.oss_pingable_reason', array('label'=>'-Reason')): "";
//        echo "</div>";
        
//        echo $this->Form->input('Litmaster_verizon.term_mme', array("label"=>"Term Point To MME","options"=>$yes_no, 'onChange'=>"triggerUpdater(LitmasterTermMme, 'TermMmePlaceholder', 'litmasters')"));
        
        /* Only if the answer is NO show the Reason box*/
//        echo $this->Html->div('', null, array('id'=>'TermMmePlaceholder'));
//        echo (isset($this->data['Litmaster_verizon']['term_mme']) && $showFields->display('term_mme', $this->data['Litmaster']['term_mme'])) ? $this->Form->input('Litmaster.term_mme_reason', array('label'=>'-Reason')): "";
//        echo "</div>";
    ?>
    </fieldset>
</fieldset>
