<?php
class DatabaseFieldsHelper extends Helper{
        public $helpers = array('Html', 'Session','Form','Javascript','Ajax');
	private $__type = null;
	private $__id = null;
	private $__name = null;
        
        
         var $array_titles = array(
                 'Rnc Script1'=>'Sitename_02_RNC_UtranCell_2nd_carrier_West_baseline_10_1',
                 'Rnc Script2'=>'Sitename_01_RNC_IMA_Modify_VC41',
                 'Rnc Script3'=>'Sitename_02_RNC_UtranCell_2nd_Carrier_West_V10-2-4',
                 'Rnc Script4'=>'Sitename_02b_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower',
                 'Rnc Script5'=>'D_02_RNCname_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo',
                 'Rnc Script6'=>'02_RNC_PUREIPMOS_Sitename_RNCname',
                 'Rnc Script7'=>'04C_RNC_CLEANUP_Sitename_RNCname',
                 'Rnc Script8'=>'Sitename_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower',
                 'Rnc Script9'=>'No Scripts provided',
                 'Rnc Script10'=>'RNC_Aal2_Iub.mo',
                 'Rnc Script11'=>'RNC_UtranCell.mo',
                  'Rnc Script1 Status'=>'Sitename_02_RNC_UtranCell_2nd_carrier_West_baseline_10_1 Status',
                 'Rnc Script2 Status'=>'Sitename_01_RNC_IMA_Modify_VC41 Status',
                 'Rnc Script3 Status'=>'Sitename_02_RNC_UtranCell_2nd_Carrier_West_V10-2-4 Status',
                 'Rnc Script4 Status'=>'Sitename_02b_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower Status',
                 'Rnc Script5 Status'=>'D_02_RNCname_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo Status',
                 'Rnc Script6 Status'=>'02_RNC_PUREIPMOS_Sitename_RNCname Status',
                 'Rnc Script7 Status'=>'04C_RNC_CLEANUP_Sitename_RNCname Status',
                 'Rnc Script8 Status'=>'Sitename_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower Status',
                 'Rnc Script10 Status'=>'RNC_Aal2_Iub.mo Status',
                 'Rnc Script11 Status'=>'RNC_UtranCell.mo Status',
				 'Rnc Script1 Tcm'=>'Sitename_02_RNC_UtranCell_2nd_carrier_West_baseline_10_1 Tcm',
                 'Rnc Script2 Tcm'=>'Sitename_01_RNC_IMA_Modify_VC41 Tcm',
                 'Rnc Script3 Tcm'=>'Sitename_02_RNC_UtranCell_2nd_Carrier_West_V10-2-4 Tcm',
                 'Rnc Script4 Tcm'=>'Sitename_02b_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower Tcm',
                 'Rnc Script5 Tcm'=>'D_02_RNCname_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo Tcm',
                 'Rnc Script6 Tcm'=>'02_RNC_PUREIPMOS_Sitename_RNCname Tcm',
                 'Rnc Script7 Tcm'=>'04C_RNC_CLEANUP_Sitename_RNCname Tcm',
                 'Rnc Script8 Tcm'=>'Sitename_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower Tcm',
                 'Rnc Script9 Tcm'=>'No Scripts provided Tcm',
                 'Rnc Script10 Tcm'=>'RNC_Aal2_Iub.mo Tcm',
                 'Rnc Script11 Tcm'=>'RNC_UtranCell.mo Tcm',
                 'Rbs Script1'=>'Sitename_RBS_2ndCarrier_modifySector',
                 'Rbs Script2'=>'Sitename_external_hw_1C_2C',
                 'Rbs Script3'=>'Sitename_RBS_AddPSU',
                 'Rbs Script4'=>'B_01_Sitename_RBSId_RBS_ETMFX_Date.mo',
                 'Rbs Script5'=>'B_02_Sitename_RBSId_RBS_EthernetPort_Date.mo',
                 'Rbs Script6' => 'C_01_Sitename_RBSId_RBS_UserPlane_ON_SITE_Date.mo',
                'Rbs Script7' => 'C_02_Sitename_RBSId_RBS_Sync_Add_ON_SITE_Date.mo',
                'Rbs Script8' => 'D_01_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo',
                'Rbs Script9' => '02_RBS_PUREIPMOS_Sitename',
                'Rbs Script10' => '03A_RBS_OAMMOS_Sitename',
                'Rbs Script11' => '03B_RBS_OAMMOS_Sitename',
                 'Rbs Script12' => '03C_RBS_OAMMOS_Sitename',
                    'Rbs Script13' => '04A_RBS_CLEANUP_Sitename',
                    'Rbs Script14' => '04B_RBS_CLEANUP_Sitename',
                    'Rbs Script15' => 'Sitename_01_oam_access',
                    'Rbs Script16' => 'Sitename_03_SiteComplete_IP/ATM',
                    'Rbs Script17' => 'External_hw.xml',
                    'Rbs Script18' => 'oam_access.xml',
                    'Rbs Script19' => 'RBS_SiteComplete.mo',
					'Rbs Script1 Status'=>'Sitename_RBS_2ndCarrier_modifySector Status',
                 'Rbs Script2 Status'=>'Sitename_external_hw_1C_2C Status',
                 'Rbs Script3 Status'=>'Sitename_RBS_AddPSU Status',
                 'Rbs Script4 Status'=>'B_01_Sitename_RBSId_RBS_ETMFX_Date.mo Status',
                 'Rbs Script5 Status'=>'B_02_Sitename_RBSId_RBS_EthernetPort_Date.mo Status',
                 'Rbs Script6 Status' => 'C_01_Sitename_RBSId_RBS_UserPlane_ON_SITE_Date.mo Status',
                'Rbs Script7 Status' => 'C_02_Sitename_RBSId_RBS_Sync_Add_ON_SITE_Date.mo Status',
                'Rbs Script8 Status' => 'D_01_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo Status',
                'Rbs Script9 Status' => '02_RBS_PUREIPMOS_Sitename Status',
                'Rbs Script10 Status' => '03A_RBS_OAMMOS_Sitename Status',
                'Rbs Script11 Status' => '03B_RBS_OAMMOS_Sitename Status',
                 'Rbs Script12 Status' => '03C_RBS_OAMMOS_Sitename Status',
                    'Rbs Script13 Status' => '04A_RBS_CLEANUP_Sitename Status',
                    'Rbs Script14 Status' => '04B_RBS_CLEANUP_Sitename Status',
                    'Rbs Script15 Status' => 'Sitename_01_oam_access Status',
                    'Rbs Script16 Status' => 'Sitename_03_SiteComplete_IP/ATM Status',
                    'Rbs Script17 Status' => 'External_hw.xml Status',
                    'Rbs Script18 Status' => 'oam_access.xml Status',
                    'Rbs Script19 Status' => 'RBS_SiteComplete.mo Status',
							       'Rbs Script1 Tcm'=>'Sitename_RBS_2ndCarrier_modifySector Tcm',
                 'Rbs Script2 Tcm'=>'Sitename_external_hw_1C_2C Tcm',
                 'Rbs Script3 Tcm'=>'Sitename_RBS_AddPSU Tcm',
                 'Rbs Script4 Tcm'=>'B_01_Sitename_RBSId_RBS_ETMFX_Date.mo Tcm',
                 'Rbs Script5 Tcm'=>'B_02_Sitename_RBSId_RBS_EthernetPort_Date.mo Tcm',
                 'Rbs Script6 Tcm' => 'C_01_Sitename_RBSId_RBS_UserPlane_ON_SITE_Date.mo Tcm',
                'Rbs Script7 Tcm' => 'C_02_Sitename_RBSId_RBS_Sync_Add_ON_SITE_Date.mo Tcm',
                'Rbs Script8 Tcm' => 'D_01_Sitename_RBSId_ATM_Switch_to_IPv4_Date.mo Tcm',
                'Rbs Script9 Tcm' => '02_RBS_PUREIPMOS_Sitename Tcm',
                'Rbs Script10 Tcm' => '03A_RBS_OAMMOS_Sitename Tcm',
                'Rbs Script11 Tcm' => '03B_RBS_OAMMOS_Sitename Tcm',
                 'Rbs Script12 Tcm' => '03C_RBS_OAMMOS_Sitename Tcm',
                    'Rbs Script13 Tcm' => '04A_RBS_CLEANUP_Sitename Tcm',
                    'Rbs Script14 Tcm' => '04B_RBS_CLEANUP_Sitename Tcm',
                    'Rbs Script15 Tcm' => 'Sitename_01_oam_access Tcm',
                    'Rbs Script16 Tcm' => 'Sitename_03_SiteComplete_IP/ATM Tcm',
                    'Rbs Script17 Tcm' => 'External_hw.xml Tcm',
                    'Rbs Script18 Tcm' => 'oam_access.xml Tcm',
                    'Rbs Script19 Tcm' => 'RBS_SiteComplete.mo Tcm',
                    'Fback Script1'=>'Sitename_Fallback_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower',
                    'Fback Script2'=>'B_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo',
                    'Fback Script3'=>'B_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo',
                    'Fback Script4'=>'C_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo',
                    'Fback Script5'=>'C_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo',
                    'Fback Script6'=>'D_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo',
                    'Fback Script7'=>'D_02_Fback_RNCname_Sitename_RBSId_Hybrid_Scripts_Date.mo',
                    'Fback Script8'=>'FALLBACK_02_RBS_PUREIPMOS_Sitename',
                    'Fback Script9'=>'FALLBACK_02_RNC_PUREIPMOS_Sitename_RNCname',
                    'Fback Script10'=>'FALLBACK_03A_RBS_OAMMOS_Sitename',
                    'Fback Script11'=>'FALLBACK_03B_RBS_OAMMOS_Sitename',
                    'Fback Script12'=>'FALLBACK_04A_RBS_CLEANUP_Sitename',
                    'Fback Script13'=>'FALLBACK_04B_RBS_CLEANUP_Sitename',
                    'Fback Script14'=>'FALLBACK_04C_RNC_CLEANUP_Sitename_RNCname',
                    'Fback Script15'=>'Sitename_Fallback_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower',
		    'Fback Script1 Status'=>'Sitename_Fallback_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower Status',
                    'Fback Script2 Status'=>'B_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Status',
                    'Fback Script3 Status'=>'B_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Status',
                    'Fback Script4 Status'=>'C_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Status',
                    'Fback Script5 Status'=>'C_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Status',
                    'Fback Script6 Status'=>'D_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Status',
                    'Fback Script7 Status'=>'D_02_Fback_RNCname_Sitename_RBSId_Hybrid_Scripts_Date.mo Status',
                    'Fback Script8 Status'=>'FALLBACK_02_RBS_PUREIPMOS_Sitename Status',
                    'Fback Script9 Status'=>'FALLBACK_02_RNC_PUREIPMOS_Sitename_RNCname Status',
                    'Fback Script10 Status'=>'FALLBACK_03A_RBS_OAMMOS_Sitename Status',
                    'Fback Script11 Status'=>'FALLBACK_03B_RBS_OAMMOS_Sitename Status',
                    'Fback Script12 Status'=>'FALLBACK_04A_RBS_CLEANUP_Sitename Status',
                    'Fback Script13 Status'=>'FALLBACK_04B_RBS_CLEANUP_Sitename Status',
                    'Fback Script14 Status'=>'FALLBACK_04C_RNC_CLEANUP_Sitename_RNCname Status',
                    'Fback Script15 Status'=>'Sitename_Fallback_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower Status',
		    'Fback Script1 Tcm'=>'Sitename_Fallback_RNC_UtranCell_1stC_West_RBSType_Setting_maxTransmissionPower Tcm',
                    'Fback Script2 Tcm'=>'B_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Tcm',
                    'Fback Script3 Tcm'=>'B_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Tcm',
                    'Fback Script4 Tcm'=>'C_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Tcm',
                    'Fback Script5 Tcm'=>'C_02_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Tcm',
                    'Fback Script6 Tcm'=>'D_01_Fback_Sitename_RBSId_Hybrid_Scripts_Date.mo Tcm',
                    'Fback Script7 Tcm'=>'D_02_Fback_RNCname_Sitename_RBSId_Hybrid_Scripts_Date.mo Tcm',
                    'Fback Script8 Tcm'=>'FALLBACK_02_RBS_PUREIPMOS_Sitename Tcm',
                    'Fback Script9 Tcm'=>'FALLBACK_02_RNC_PUREIPMOS_Sitename_RNCname Tcm',
                    'Fback Script10 Tcm'=>'FALLBACK_03A_RBS_OAMMOS_Sitename Tcm',
                    'Fback Script11 Tcm'=>'FALLBACK_03B_RBS_OAMMOS_Sitename Tcm',
                    'Fback Script12 Tcm'=>'FALLBACK_04A_RBS_CLEANUP_Sitename Tcm',
                    'Fback Script13 Tcm'=>'FALLBACK_04B_RBS_CLEANUP_Sitename Tcm',
                    'Fback Script14 Tcm'=>'FALLBACK_04C_RNC_CLEANUP_Sitename_RNCname Tcm',
                    'Fback Script15 Tcm'=>'Sitename_Fallback_RNC_UtranCell_West_Setting_PrimaryCPICH_maxTransmissionPower Tcm',  
                    'Oss Script1'=>'GSMcells.Xml',
                    'Oss Script2'=>'GSMRelations.Xml',
                    'Oss Script3'=>'UtranRelations.Xml',
                    'Oss Script4'=>'OSS_RBS_tmobile.xml',
                    'Oss Script5'=>'OSS_Site_tmobile.xml',
		    'Oss Script1 Status'=>'GSMcells.Xml Status',
                    'Oss Script2 Status'=>'GSMRelations.Xml Status',
                    'Oss Script3 Status'=>'UtranRelations.Xml Status',
                    'Oss Script4 Status'=>'OSS_RBS_tmobile.xml Status',
                    'Oss Script5 Status'=>'OSS_Site_tmobile.xml Status',
					'Oss Script1 Tcm'=>'GSMcells.Xml Tcm',
                    'Oss Script2 Tcm'=>'GSMRelations.Xml Tcm',
                    'Oss Script3 Tcm'=>'UtranRelations.Xml Tcm',
                    'Oss Script4 Tcm'=>'OSS_RBS_tmobile.xml Tcm',
                    'Oss Script5 Tcm'=>'OSS_Site_tmobile.xml Tcm',
					'Oss Script1 Complete'=>'GSMcells.Xml Complete',
                    'Oss Script2 Complete'=>'GSMRelations.Xml Complete',
                    'Oss Script3 Complete'=>'UtranRelations.Xml Complete',
                    'Oss Script4 Complete'=>'OSS_RBS_tmobile.xml Complete',
                    'Oss Script5 Complete'=>'OSS_Site_tmobile.xml Complete',
					'Oss Script1 Activation'=>'GSMcells.Xml Activation',
                    'Oss Script2 Activation'=>'GSMRelations.Xml Activation',
                    'Oss Script3 Activation'=>'UtranRelations.Xml Activation',
                    'Oss Script4 Activation'=>'OSS_RBS_tmobile.xml Activation',
                    'Oss Script5 Activation'=>'OSS_Site_tmobile.xml Activation',
                    'Oss Script1 Total'=>'GSMcells.Xml Total',
                    'Oss Script2 Total'=>'GSMRelations.Xml Total',
                    'Oss Script3 Total'=>'UtranRelations.Xml Total',
                    'Oss Script4 Total'=>'OSS_RBS_tmobile.xml Total',
                    'Oss Script5 Total'=>'OSS_Site_tmobile.xml Total'
                );
         
        function makeFields($fields){
            $result = "";
            foreach($fields as $field){
                if($field['Field']['dependent'] == 1){
                    $result .= "<div class='placeholders' id='{$field['Field']['name']}Placeholder'></div>";
                }else{
                    $options = (in_array($field['Field']['input_type'], array('radio', 'select'))) ? $this->getOptions($field['Field']['name'], $field['Field']['module_id']) : null;
                    $result .= $this->Form->input($field['Field']['name'],
                                array(
                                    'options' => $options,
                                    'label'=>$field['Field']['label'],
                                    'type'=> $field['Field']['input_type'],
                                    'div'=> array('class'=>$field['Field']['class'])
                                    )
                                );
                }
            }
            return $result;
        }
   var $ShActivities = array("New Integration (lub over ATM)",
                          "New Integration (lub over IP)",
                          "RU/RRU swaps",
                          "Software Upgrade",
                          "2nd Carrier Add",
                          "3rd Carrier Add",
                          "4C OBIF Split-power Integration",
                          "3rd carrier add cabinet reconfiguration",                      
                          "3rd carrier add split power config",
                          "3rd carrier add using OBIF & RRUW",
                          "4th carrier add using OBIF & RRUW",                         
                          "Add Sector",
                          "Delete Sector",
                          "Cabinet Swap",
                          "LKF",
                          "T1 Add",
                          "TX60-Board Add/Swap",
                          "ET-MFX Board Add ( Node-B )",
                          "TX/RAX Board Add"
        
    );

        function getOptions($for, $module_id, $blank=TRUE){
            App::import('model','Dropdown');
            $dropdowns = new Dropdown();
            $options = $dropdowns->options($for, $module_id);
            if($blank) {
                $results = array(""=>"");
            }
            foreach($options as $option){
                $results[$option['Dropdown']['value']] = $option['Dropdown']['label'];
            }
            return $results;
        }

        function generateConditions($fields){
            foreach($fields as $field){

            }
        }

        function displayActivityTypeDependency($data,$key, $prefix){
            switch($data[$key]){
                case "IuCS Expansion/Add/Rehome": echo $this->Form->input("{$prefix}concerned_nodes");
                    break;
                case "Iur Expansion/Add": echo $this->Form->input("{$prefix}concerned_nodes");
                    break;
                case "NodeB Rehome": echo $this->Form->input("{$prefix}target_rnc");
                    echo $this->Form->input("{$prefix}source_rnc");
                    echo $this->Form->input("{$prefix}time_deleting_relations");
                    echo $this->Form->input("{$prefix}time_creating_relations");
                    echo $this->Form->input("{$prefix}total_added_mo");
                    break;
                case "Post MW Checks": echo $this->Form->input("{$prefix}original_ir_number");
                    break;
                case "IUCS Activation - New RNC":
                case "IUPS Activation - New RNC": echo $this->Form->input("{$prefix}call_test", array("label"=>"Call test performed?", "options"=>array(""=>"","Yes"=>"Yes","No"=>"No","NA"=>"NA")));
                    break;
                case "NDS - Pre Launch tuning UTRAN support(UTRAN related activities to help RF)":
                    echo $this->Form->input("{$prefix}sub_activities", array("type"=>"select", "options"=>$this->getOptions("nds_pre_utran_rf", 1),"multiple"=>true, "size"=>10));
                    echo $this->Form->input("{$prefix}last_status_utrancells", array("label"=>"Last Status of the Utrancells"));
                    break;
                case "NDS - Market Launch (Site / sector / cluster put in service)":
                    echo $this->Form->input("{$prefix}last_status_utrancells", array("label"=>"Last Status of the Utrancells"));
                    break;
                case "NDS -Post Launch UTRAN support(UTRAN related activities to help RF once sites placed into service)":
                    echo $this->Form->input("{$prefix}sub_activities", array("type"=>"select", "options"=>$this->getOptions("nds_post_utran_rf", 1),"size"=>7, "multiple"=>true));
                    echo $this->Form->input("{$prefix}last_status_utrancells", array("label"=>"Last Status of the Utrancells"));
                    break;
                case "NDS - Post Activity Checks":
                    echo $this->Form->input("{$prefix}sub_activities", array("type"=>"select", "options"=>$this->getOptions("nds_post_activity", 1),"size"=>2, "multiple"=>true));
                    echo $this->Form->input("{$prefix}last_status_utrancells", array("label"=>"Last Status of the Utrancells"));
                    break;
                case "NDS - Other": echo $this->Form->input("{$prefix}nds_activity",array("label"=>"Please Specify NDS Activity"));
                    echo $this->Form->input("{$prefix}last_status_utrancells", array("label"=>"Last Status of the Utrancells"));
                    break;
                case "Other": echo $this->Form->input("{$prefix}activity_type_other",array("label"=>"Please Specify the Other Activity"));
                    break;
                case "RNC Integration - FSE Report": $this->displayFSEReport($prefix);
                    break;

            }
        }

            function displayIssues($num){
                
                for($i=0;$i<$num;$i++){
                    $this->_renderIssue($i);
                }
            }

            function _renderIssue($num){
                
                echo "<fieldset style='margin-left:20px;'><legend>Issue#".($num+1)."</legend>";
                echo $this->Form->input("IrIssue.$num.id");
                echo $this->Form->input("IrIssue.$num.type", array("label"=>"Issue Type", "type"=>"select", "options"=>$this->_getIssuesType()));
                        //echo $this->Ajax->div('issue_types_placeholder', array('class'=>'placeholders'));
                        //echo $this->Ajax->divEnd('issue_types_placeholder');
                echo $this->Ajax->observeField('IrIssue'.$num.'Type', array('update'=>'issue_types_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater', $num),'frequency'=>0.2));                    
                echo $this->Ajax->div("script_type_$num"."_placeholder", array('class'=>'placeholders'));
                echo $this->Ajax->divEnd("script_type_{$num}placeholder");
                echo $this->Ajax->observeField("IrIssue{$num}Type", array("update"=>"script_type_$num"."_placeholder",
                                        "url"=>array("controller"=>"ir_modules","action"=>"updater",$num), "frequency"=>0.2));
		echo $this->Form->input("IrIssue.$num.owner",array("label"=>"Issue owner","options"=>$this->getOptions("issue_owner", 1),"type"=>"select"));
                echo $this->Ajax->div("ericsson_contact_$num"."_placeholder", array('class'=>'placeholders'));
                echo $this->Ajax->divEnd("ericsson_contact_{$num}placeholder");
                echo $this->Ajax->observeField("IrIssue{$num}Owner", array("update"=>"ericsson_contact_$num"."_placeholder",
                                        "url"=>array("controller"=>"ir_modules","action"=>"updater",$num), "frequency"=>0.2));

		echo $this->Form->input("IrIssue.$num.escalation_engineer_contacted", array("label"=>"Did you Contact the Escalation Engineer?", "type"=>"select", "options"=>array(""=>"","Yes"=>"Yes","No"=>"No")));
                echo $this->Ajax->div("escalation_engineer_contacted_{$num}placeholder", array('class'=>'placeholders'));
                echo $this->Ajax->divEnd("escalation_engineer_contacted_{$num}placeholder");                
                echo $this->Ajax->observeField('IrIssue'.$num.'EscalationEngineerContacted', array('update'=>"escalation_engineer_contacted_{$num}placeholder", 'url'=>array('controller'=>'ir_modules','action'=>'updater', $num),'frequency'=>0.2));                                    
		echo $this->Form->input("IrIssue.$num.issue_summary");
		echo $this->Form->input("IrIssue.$num.impact", array("options"=>$this->getOptions("issue_impact", 1)));
                echo "</fieldset>";
            }

            function _getIssuesType(){
                $issueType = $this->getOptions("issue_type", 1);
                $distinctGroup = array_unique($issueType);
                $issues = array(""=>"");
                foreach($distinctGroup as $group){
                    foreach($issueType as $key => $value){
                        if($value == $group)
                            $issues[$group][$key] = $key;
                    }
                }
                return $issues;
            }

            function displayFSEReport($prefix){
                echo "<fieldset><legend>1. Project Information</legend>";
                echo $this->Form->input("{$prefix}country");
                echo $this->Form->input("{$prefix}location");
                echo $this->Form->input("{$prefix}site_name");
                echo $this->Form->input("{$prefix}node_name");
                echo $this->Form->input("{$prefix}software_level", array("label"=>"Release/SW Level"));
                echo $this->Form->input("{$prefix}hardware_level");
                echo $this->Form->label("RNC Info");
                echo $this->Form->input("{$prefix}rnc_ip_address");
                echo $this->Form->input("{$prefix}rnc_username");
                echo $this->Form->input("{$prefix}rnc_password");
                echo $this->Form->label("NodeB Info");
                echo $this->Form->input("{$prefix}nodeb_ip_address");
                echo $this->Form->input("{$prefix}nodeb_username");
                echo $this->Form->input("{$prefix}nodeb_password");
                echo $this->Form->input("{$prefix}target_status", array("label"=> "2. Target and Status for reported period"));
                echo $this->Form->input("{$prefix}happen_next", array("label"=>"3. What will happen next"));
                echo $this->Form->input("{$prefix}reported_period_details", array("label"=>"4. Details for reported period"));
                echo $this->Form->input("{$prefix}problems_list", array("label"=>"5. List of Issues/Experienced Problems"));
                echo $this->Form->input("{$prefix}hours_worked", array("label"=>"6. Hours Worked"));
                echo $this->Form->input("{$prefix}deviation_reasons", array("label"=>"7. Reasons for Deviations from Budget/Cost Estimate"));
                echo $this->Form->input("{$prefix}lead_generation", array("label"=>"8. Lead Generation"));
                echo $this->Form->input("{$prefix}knowledge_sharing", array("label"=>"9. Knowledge Sharing"));
                echo $this->Form->input("{$prefix}contacts", array("label"=>"10. Contacts"));
                echo "</fieldset>";
            }

            function displayActivityTypeDependencySh()
            {
                
            }
            
            function addEngineer($nextNumber){
                echo $this->Form->input('IrAdditionalEngineer.'.$nextNumber.'.id');
                echo $this->Form->input('IrAdditionalEngineer.'.$nextNumber.'.engineer_signum', array('label'=>'Additional Engineer'));
            }

            function addEngineers($count){			
                for($i=0;$i<$count;$i++){
                    $this->addEngineer($i);
                }
            }

            function getLabel($field){
                $htm = $this->Form->label($field);
                preg_match('/">(.*?)<\/label>/', $htm,$label);
                return $label[1];
            }
            
            function getLabelTmob($field){
                
                $htm = $this->Form->label($field);
                preg_match('/">(.*?)<\/label>/', $htm,$label);

                if(in_array($label[1],array_keys($this->array_titles))){
                    return $this->array_titles[$label[1]];
               }
                else
                return $label[1];
            }

            function removeSpecialCharacters($field){

                $remove = array("\n", "\r\n", "\r", "<p>", "</p>", "<h1>", "</h1>", "\t");
                $field = str_replace($remove, ' ', $field);
                return $field;
                
            }
			
			//30th
			function addFileSl($nextNumber){
				echo "<fieldset>"; 
                echo $this->Form->hidden('Slfile.'.$nextNumber.'.id');
				if(isset($this->data['Slfile'][$nextNumber]['file']['error']) && is_array($this->data['Slfile'][$nextNumber]['file']) && $this->data['Slfile'][$nextNumber]['file']['error'] == 0) {					
					$pos = strpos($this->data['Slfile'][$nextNumber]['file']['name'], "_", 3) + 2;
					if(($pos != false || $pos == "") && !array_key_exists('file_tag', $this->data['Slfile'][$nextNumber]))
					{
						$name = substr($this->data['Slfile'][$nextNumber]['file']['name'],$pos);										
					}
					else
						$name = $this->data['Slfile'][$nextNumber]['file']['name'];										
					echo $this->Form->input('Slfile.'.$nextNumber.'.file', array('type'=>'text', 'readonly'=>'readonly', 'label'=>'File', 'value'=>$name, 'after'=>$this->Html->link(__('Change', true), "javascript:void(0)", array('id'=>'upload'.$nextNumber.'Click', 'onClick'=>"showUploader('#upload".$nextNumber."Click', '#Slfile".$nextNumber."File', ".$nextNumber.", 'Slfile'); return false"))));
				}
				else {
					echo $this->Form->input('Slfile.'.$nextNumber.'.file', array('type'=>'file', 'label'=>'File'));
				}												
				echo "</fieldset>";
			}

            function addFilesSl($count){
                for($i=0;$i<$count;$i++){
                    $this->addFileSl($i);
                }
            }
			
						
			function  addNoteLink($field = null) {
                 $html = $this->Form->button('add_note',array('div'=>false, 'class'=>'add_note', 'value'=>'+', 'alt'=>'Add Note'));
                 if(empty($field))
                    return $html;
                 $html .= $this->Html->image('up_alt.png', array('class'=>'upload_file_img', 'title'=>'Upload Files', 'alt'=>$field));
                 $html .= $this->Html->image('down_alt.png', array('class'=>'download_file_img', 'title'=>'Download Files', 'alt'=>$field));
                 return $html;
            }


}

?>
