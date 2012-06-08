<?php
    if(isset($uploaderUpdate) && $uploaderUpdate) {
        echo $this->Form->input('LitfileSupplementary.' . $nextUploaderNumber . '.file', array('type'=>'file', 'label'=>'File'));
    }
    else {
    $key = key($this->data['Litmaster']);
    switch($showFields->display($key, $this->data['Litmaster'][$key])) {
        case 1:
            switch($key){
                case "ct_dummyload":
                    echo $this->Form->input('Litmaster.ct_dummyload_reason', array('label'=>'-Reason'));
                    break;
                case "node_part_pool":
                    echo $this->Form->input('Litmaster.node_part_pool_explain', array('label'=>'-Please Explain'));
                    break;
                case "soft_upgrade_performed":
                    echo $this->Form->input('Litmaster.soft_upload', array("label"=>"-Software Upgrade Package", "options" => $databaseFields->getOptions('soft_basic',4), 'onChange'=>"triggerUpdater(LitmasterSoftUpload, 'SoftUploadPlaceholder', 'litmasters')"));
                    echo $this->Html->div('', null, array('id'=>'SoftUploadPlaceholder'));
                    echo "</div>";
                    break;
                case "ip_connectivity":
                    echo $this->Form->input('Litmaster.ip_connectivity_explain', array('label'=>'-Please Explain'));
                    break;
                case "default_pingable":
                    echo $this->Form->input('Litmaster.default_pingable_reason', array('label'=>'-Reason'));
                    break;
                case "ntp_pingable":
                    echo $this->Form->input('Litmaster.ntp_pingable_reason', array('label'=>'-Reason'));
                    break;
                case "oss_pingable":
                    echo $this->Form->input('Litmaster.oss_pingable_reason', array('label'=>'-Reason'));
                    break;
                case "term_mme":
                    echo $this->Form->input('Litmaster.term_mme_reason', array('label'=>'-Reason'));
                    break;
                case "ct_cell_sector_locked":
                    echo $this->Form->input('Litmaster.ct_cell_sector_locked_explain', array('label'=>'-Reason'));
                    break;
                case "antenna_alarms":
                    echo $this->Form->input('Litmaster.antenna_alarms_count', array('label'=>'-Number Of Issues/Alarms'));
                    echo $this->Form->input('Litmaster.antenna_alarms_count_info', array('label'=>'-Issues/Alarm Information'));
                    break;
                case "engineer_work_location":
                    echo $this->Form->input('Litmaster.work_location_remote', array('label'=>'-Please Specify'));
                    break;
                case "team_name":
                    /* NDS */
                    include_once('nds.inc');
                    break;
                case "system_constants_loaded":   
                    if((isset($this->data['Litfile'][2]['file']['error']) && is_array($this->data['Litfile'][2]['file'])) && $this->data['Litfile'][2]['file']['error'] == 0) {
                        echo $this->Form->input('Litfile.2.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'-File Name', 'value'=>$this->data['Litfile'][2]['file']['name'], 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload2Click', 'onClick'=>"showUploader('upload2Click', 'Litfile2File', 2, 'Litfile'); return false"))));
                    }
                    else {
                        echo $this->Form->input('Litfile.2.file', array('type'=>'file', 'label'=>'-File Name'));
                    }
                    break;
                case "soft_basic":
                    echo $this->Form->input('Litmaster.soft_basic_package', array('label'=>'-Package', 'options' =>$databaseFields->getOptions('soft_basic_package_a',4)));
                    break;
                case "soft_upload":
                    echo $this->Form->input('Litmaster.soft_upload_package', array('label'=>'-Package', 'options' =>$databaseFields->getOptions('soft_upload_package_a',4)));
                    break;
                case "lte_nic_mop_name":
                   echo $this->Html->div('lte-link', null);
                   echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-10:001151Uen&objectId=09004cff839cabb5&action=current&format=msw8", array('target'=>'_blank'));
                   echo "</div>";
                   break;
                case "onsite_mop_name":
                   echo $this->Html->div('lte-link', null);
                   echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-10:004603Uen&objectId=09004cff83c04ca5&action=current&format=msw8", array('target'=>'_blank'));
                   echo "</div>";
                   break;
            }
            break;
        case 2:
            switch($key){
                case "team_name":
                    /* NI */
                    /* Site Information pane */
                    include_once('site_information.inc');
                    /* Activity Information pane */
                    include_once('activity_information.inc');
                    /* Alarm Reporting pane */
                    include_once('alarm_reporting.inc');
                    /* Antenna Information pane */
                    include_once('antenna.inc');
                    /* Call Testing pane */
                    include_once('call_testing.inc');
                    /* Data Test Result pane */
                    include_once('data_test_result.inc');
                    /* Site Integration Status pane */
                    include_once('site_integration_status.inc');
                    /* Additional Comments pane */
                    include_once('comments.inc');
                    break;
                case "soft_upload":
                    echo $this->Form->input('Litmaster.soft_upload_package', array('label'=>'-Package', 'options' =>$databaseFields->getOptions('soft_upload_package_b',4)));
                    break;
                case "onsite_mop_name":
                   echo $this->Html->div('lte-link', null);
                   echo $this->Html->link(__('MOP Link', true), "http://anon.ericsson.se/eridoc/component/eriurl?docno=EUS-11:002845Uen&objectId=09004cff8478df34&action=current&format=msw8", array('target'=>'_blank'));
                   echo "</div>";
                   break;
            }
        break;
    }
    }
?>
