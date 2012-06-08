	var j = jQuery.noConflict();
        
        //START T-mobile additions
        //************************
        var activityClone;
        //***********************
        //END T-mobile additions

	function showUploader(triggerID, destID, associationIndex, model) {
		j(destID).replaceWith("<input type='file' name='data[" + model + "][" + associationIndex + "][file]' id='" + destID +"' />");
		j(triggerID).remove();
	}

        
        
        j(document).ready(function() {

                           
                
                var reg=jQuery.trim(j('#region').val());                
                if(reg == 'North West' || reg == 'South West')
                {
                       j('#tcm_west').show();
                       j('#tcm_east').hide();
                       j('#tcm_central').hide();
                }
                else if(reg == 'North East' || reg == 'South East')
                {
                       j('#tcm_west').hide();
                       j('#tcm_east').show();
                       j('#tcm_central').hide();
                }
                else if(reg == 'North Central' || reg == 'South Central')
                {
                       j('#tcm_west').hide();
                       j('#tcm_east').hide();
                       j('#tcm_central').show();
                }
                else
                {
                       j('#tcm_west').hide();
                       j('#tcm_east').hide();
                       j('#tcm_central').hide();
                }
				
				
				
				
                        var tempC=jQuery.trim(j('#tcm_name_signum_C').val());
						var tempE=jQuery.trim(j('#tcm_name_signum_E').val());
						var tempW=jQuery.trim(j('#tcm_name_signum_W').val());
					if(tempC != "")
                          j('#tcm_name_signum').val(tempC);  				
					else if(tempE != "")                        
                         j('#tcm_name_signum').val(tempE);  
                    else if(tempW != "")    
                         j('#tcm_name_signum').val(tempW);

                switch(jQuery.trim(j('#work_location_tmobile').val()))
				{
					case 'Remote':
							j('#Div_WorkLocation_Other').show();
							break;
					case 'Onsite(Customer)':
							j('#Div_WorkLocation_Other').show();
							break;
					case 'Other':
							j('#Div_WorkLocation_Other').show();
							break;
					default:
							j('#Div_WorkLocation_Other').hide();
				}

                 switch(jQuery.trim(j('#access_method').val()))
				{
					case 'Sonar':
							j('#Div_AccessMethod_Sonar').show();
							break;
					default:
							j('#Div_AccessMethod_Sonar').hide();
				}


                 switch(jQuery.trim(j('#mop_used').val()))
				{
					case 'Yes':
							j('#Div_MOPUsed_Version').show();
							break;
					default:
							j('#Div_MOPUsed_Version').hide();
				}

                  switch(jQuery.trim(j('#mop_problem').val()))
				{
					case 'Yes':
							j('#Div_MOPProblem_Desc').show();
							break;
					default:
							j('#Div_MOPProblem_Desc').hide();
				}

                  var act_type_temp = false;
                  switch(jQuery.trim(j('#activity_type').val()))
				{
                                        case 'New Site Build - 1st Carrier Add':
                                                        j('#NewInt1').show();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').show();
                                                        j('#Div_AlarmReport').show();
                                                        j('#Div_RBS_Scripts').show();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case 'New Site Build - 1st & 2nd Carrier Add':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').show();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').show();
                                                        j('#Div_AlarmReport').show();
                                                        j('#Div_RBS_Scripts').show();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case 'New Site Build - 1st, 2nd & 3rd Carrier Add':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').show();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').show();
                                                        j('#Div_AlarmReport').show();
                                                        j('#Div_RBS_Scripts').show();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '2nd Carrier Add':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').show();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '3rd Carrier Add - OBIF Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').show();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '3rd Carrier Add - 2nd Cabinet Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').show();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '4th Carrier Add - OBIF Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').show();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '4th Carrier Add - 2nd Cabinet Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').show();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
					case 'Other':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - RNC Transport Network':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - RNC Radio Network':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - OSS Relations':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - Complete(RNC + OSS)':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Post Check':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').show();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
					default:
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();
				}



                                var act_res=jQuery.trim(j('#activity_result').val());
                                if(act_type_temp == 'Yes')
                                    {
                                        if(act_res != 'Successful' && act_res != 'Successful with issues - Follow-up Required' && act_res != '')
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').show();
                                        }
                                        else if(act_res == 'Successful with issues - Follow-up Required')
                                        {
                                            j('#Div_IssueOwner').show();
                                            j('#Div_ActivityResult_Fail').show();
                                        }
                                        else
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                    }
                                 else
                                     {
                                        if(act_res == 'Successful with issues - Follow-up Required')
                                        {
                                            j('#Div_IssueOwner').show();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                        else
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                     }
                                
							

                                if(j('input[id=alarms]').is(':checked'))
				{
					j('#Div_AlarmsComments').show();
				}
				else
				{
					j('#Div_AlarmsComments').hide();
				}

                                if(j('input[id=pre_check]').is(':checked'))
				{
					j('#Div_PreCheck').show();
				}
				else
				{
					j('#Div_PreCheck').hide();
				}

                                if(j('input[id=post_check]').is(':checked'))
				{
					j('#Div_PostCheck').show();
				}
				else
				{
					j('#Div_PostCheck').hide();
				}



                                if(j('input[id=transport_script]').is(':checked'))
				{
					j('#Div_RNC_Transport_Status').show();
				}
				else
				{
					j('#Div_RNC_Transport_Status').hide();
				}
                                switch(jQuery.trim(j('#transport_script_status').val()))
				{
					case 'Not Loaded Successfully':
							j('#Div_RNC_Transport_Status_Fail').show();
							break;
					default:
							j('#Div_RNC_Transport_Status_Fail').hide();
				}


                                if(j('input[id=radio_script]').is(':checked'))
				{
					j('#Div_RNC_Radio_Status').show();
				}
				else
				{
					j('#Div_RNC_Radio_Status').hide();
				}
                                switch(jQuery.trim(j('#radio_script_status').val()))
				{
					case 'Not Loaded Successfully':
							j('#Div_RNC_Radio_Status_Fail').show();
							break;
					default:
							j('#Div_RNC_Radio_Status_Fail').hide();
				}



                                if(j('input[id=rbs_site_file]').is(':checked'))
				{
					j('#Div_RBS_Scripts_Status').show();
				}
				else
				{
					j('#Div_RBS_Scripts_Status').hide();
				}
                                switch(jQuery.trim(j('#rbs_site_file_status').val()))
				{
					case 'Not Loaded Successfully':
							j('#Div_RBS_Scripts_Status_Fail').show();
							break;
					default:
							j('#Div_RBS_Scripts_Status_Fail').hide();
				}



                                if(j('input[id=gsm_cells]').is(':checked'))
				{
					j('#Div_GSM_Scripts_Status').show();
				}
				else
				{
					j('#Div_GSM_Scripts_Status').hide();
				}
				switch(jQuery.trim(j('#gsm_cells_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
					default:
							j('#Div_GSM_Scripts_Status_Fail').hide();
				}



                                if(j('input[id=gsm_relations]').is(':checked'))
				{
					j('#Div_GSMRelations_Status').show();
				}
				else
				{
					j('#Div_GSMRelations_Status').hide();
				}
				switch(jQuery.trim(j('#gsm_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
					default:
							j('#Div_GSMRelations_Status_Fail').hide();
				}




				if(j('input[id=utran_relations]').is(':checked'))
				{
					j('#Div_UtranRelations_Status').show();
				}
				else
				{
					j('#Div_UtranRelations_Status').hide();
				}
				 switch(jQuery.trim(j('#utran_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
					default:
							j('#Div_UtranRelations_Status_Fail').hide();
				}





				if(j('input[id=interfrequency_relations]').is(':checked'))
				{
					j('#Div_IFRelations_Status').show();
				}
				else
				{
					j('#Div_IFRelations_Status').hide();
				}
				 switch(jQuery.trim(j('#interfrequency_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_IFRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_IFRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_IFRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_IFRelations_Status_Fail').show();
							break;
					default:
							j('#Div_IFRelations_Status_Fail').hide();
				}



				if(j('input[id=femto_relations]').is(':checked'))
				{
					j('#Div_FemtoRelations_Status').show();
				}
				else
				{
					j('#Div_FemtoRelations_Status').hide();
				}
				switch(jQuery.trim(j('#femto_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
					default:
							j('#Div_FemtoRelations_Status_Fail').hide();
				}

                //End

            });














             j(window).load(function(){
                 j('#Div_Region').change(function() {
                        var reg=jQuery.trim(j('#region').val());
                            if(reg == 'North West' || reg == 'South West')
                            {
                                   j('#tcm_west').show();
                                   j('#tcm_east').hide();
                                   j('#tcm_central').hide();
                            }
                            else if(reg == 'North East' || reg == 'South East')
                            {
                                   j('#tcm_west').hide();
                                   j('#tcm_east').show();
                                   j('#tcm_central').hide();
                            }
                            else if(reg == 'North Central' || reg == 'South Central')
                            {
                                   j('#tcm_west').hide();
                                   j('#tcm_east').hide();
                                   j('#tcm_central').show();
                            }
                            else
                            {
                                   j('#tcm_west').hide();
                                   j('#tcm_east').hide();
                                   j('#tcm_central').hide();
                            }
                });
				
				j('#tcm_central').change(function() {
                        var temp=jQuery.trim(j('#tcm_name_signum_C').val());
                          j('#tcm_name_signum').val(temp);  
                });
				j('#tcm_east').change(function() {
                        var temp=jQuery.trim(j('#tcm_name_signum_E').val());
                         j('#tcm_name_signum').val(temp);   
                });
				j('#tcm_west').change(function() {
                        var temp=jQuery.trim(j('#tcm_name_signum_W').val());
                         j('#tcm_name_signum').val(temp);
                });

                 
                j('#work_location').change(function() {
                    switch(jQuery.trim(j('#work_location').val()))
                                    {
                                            case 'Remote':
                                                            j('#Div_WorkLocation_Other').show();
                                                            break;
                                            case 'Onsite(Customer)':
                                                            j('#Div_WorkLocation_Other').show();
                                                            break;
                                            case 'Other':
                                                            j('#Div_WorkLocation_Other').show();
                                                            break;
                                            default:
                                                            j('#Div_WorkLocation_Other').hide();
                                    }
                });


                 j('#access_method').change(function() {
                    switch(jQuery.trim(j('#access_method').val()))
                                    {
                                            case 'Sonar':
                                                            j('#Div_AccessMethod_Sonar').show();
                                                            break;
                                            default:
                                                            j('#Div_AccessMethod_Sonar').hide();
                                    }
                });


                 j('#mop_used').change(function() {
                    switch(jQuery.trim(j('#mop_used').val()))
				{
					case 'Yes':
							j('#Div_MOPUsed_Version').show();
							break;
					default:
							j('#Div_MOPUsed_Version').hide();
				}
                });

                 j('#mop_problem').change(function() {
                    switch(jQuery.trim(j('#mop_problem').val()))
				{
					case 'Yes':
							j('#Div_MOPProblem_Desc').show();
							break;
					default:
							j('#Div_MOPProblem_Desc').hide();
				}
                });
                
                var act_type_temp;
                j('#activity_type').change(function() {
                    act_type_temp = "";
                    switch(jQuery.trim(j('#activity_type').val()))
				{
                                        case 'New Site Build - 1st Carrier Add':
                                                        j('#NewInt1').show();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').show();
                                                        j('#Div_AlarmReport').show();
                                                        j('#Div_RBS_Scripts').show();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case 'New Site Build - 1st & 2nd Carrier Add':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').show();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').show();
                                                        j('#Div_AlarmReport').show();
                                                        j('#Div_RBS_Scripts').show();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case 'New Site Build - 1st, 2nd & 3rd Carrier Add':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').show();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').show();
                                                        j('#Div_AlarmReport').show();
                                                        j('#Div_RBS_Scripts').show();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '2nd Carrier Add':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').show();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '3rd Carrier Add - OBIF Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').show();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '3rd Carrier Add - 2nd Cabinet Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').show();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').show();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '4th Carrier Add - OBIF Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').show();
                                                        j('#4Cb').hide();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
                                        case '4th Carrier Add - 2nd Cabinet Solution':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').show();
                                                        j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').show();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').show();
                                                        j('#Div_Sectors_Locked').show();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').show();
                                                        break;
					case 'Other':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - RNC Transport Network':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - RNC Radio Network':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - OSS Relations':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Node(Site) - Complete(RNC + OSS)':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').show();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
                                        case 'Post Check':
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').show();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();

                                                        act_type_temp = 'Yes';
							break;
					default:
                                                        j('#NewInt1').hide();
                                                        j('#NewInt12').hide();
                                                        j('#NewInt123').hide();
                                                        j('#2C').hide();
                                                        j('#3Ca').hide();
                                                        j('#3Cb').hide();
                                                        j('#4Ca').hide();
                                                        j('#4Cb').hide();
							j('#Div_Activity_Other').hide();
                                                        j('#Div_Activity_OriginalSLR').hide();

                                                        j('#Div_RNC').hide();
                                                        j('#Div_RNC_Transport').hide();
                                                        j('#Div_RNC_Radio').hide();
                                                        j('#Div_Sectors_Locked').hide();
                                                        j('#Div_ContCheck').hide();
                                                        j('#Div_AlarmReport').hide();
                                                        j('#Div_RBS_Scripts').hide();
                                                        j('#Div_OSS_Scripts').hide();
				}


                                var act_res=jQuery.trim(j('#activity_result').val());
                                if(act_type_temp == 'Yes')
                                    {                                        
                                        if(act_res != 'Successful' && act_res != 'Successful with issues - Follow-up Required' && act_res != '')
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').show();
                                        }
                                        else if(act_res == 'Successful with issues - Follow-up Required')
                                        {
                                            j('#Div_IssueOwner').show();
                                            j('#Div_ActivityResult_Fail').show();
                                        }
                                        else
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                    }
                                 else
                                     {
                                        if(act_res == 'Successful with issues - Follow-up Required')
                                        {
                                            j('#Div_IssueOwner').show();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                        else
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                     }


                });


                j('#activity_result').change(function() {
                                var act_res=jQuery.trim(j('#activity_result').val());
                                if(act_type_temp == 'Yes')
                                    {
                                        if(act_res != 'Successful' && act_res != 'Successful with issues - Follow-up Required' && act_res != '')
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').show();
                                        }
                                        else if(act_res == 'Successful with issues - Follow-up Required')
                                        {
                                            j('#Div_IssueOwner').show();
                                            j('#Div_ActivityResult_Fail').show();
                                        }
                                        else
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                    }
                                 else
                                     {
                                        if(act_res == 'Successful with issues - Follow-up Required')
                                        {
                                            j('#Div_IssueOwner').show();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                        else
                                        {
                                            j('#Div_IssueOwner').hide();
                                            j('#Div_ActivityResult_Fail').hide();
                                        }
                                     }
                });



                j('#Div_Alarms_Container').click(function() {
                    if(j('input[id=alarms]').is(':checked'))
				{
					j('#Div_AlarmsComments').show();
				}
				else
				{
					j('#Div_AlarmsComments').hide();
				}
                });
                
                j('#Div_PreCheck_Container').click(function() {
                    if(j('input[id=pre_check]').is(':checked'))
				{
					j('#Div_PreCheck').show();
				}
				else
				{
					j('#Div_PreCheck').hide();
				}
                });

                j('#Div_PostCheck_Container').click(function() {
                    if(j('input[id=post_check]').is(':checked'))
				{
					j('#Div_PostCheck').show();
				}
				else
				{
					j('#Div_PostCheck').hide();
				}
                });




                 j('#Div_RNC_Transport_Container').click(function() {
                    if(j('input[id=transport_script]').is(':checked'))
				{
					j('#Div_RNC_Transport_Status').show();
				}
				else
				{
					j('#Div_RNC_Transport_Status').hide();
				}
                });
                j('#transport_script_status').change(function() {
                    switch(jQuery.trim(j('#transport_script_status').val()))
				{
					case 'Not Loaded Successfully':
							j('#Div_RNC_Transport_Status_Fail').show();
							break;
					default:
							j('#Div_RNC_Transport_Status_Fail').hide();
				}
                });



                 j('#Div_RNC_Radio_Container').click(function() {
                    if(j('input[id=radio_script]').is(':checked'))
				{
					j('#Div_RNC_Radio_Status').show();
				}
				else
				{
					j('#Div_RNC_Radio_Status').hide();
				}
                });
                j('#radio_script_status').change(function() {
                    switch(jQuery.trim(j('#radio_script_status').val()))
				{
					case 'Not Loaded Successfully':
							j('#Div_RNC_Radio_Status_Fail').show();
							break;
					default:
							j('#Div_RNC_Radio_Status_Fail').hide();
				}
                });



                j('#Div_RBS_Scripts_Container').click(function() {
                    if(j('input[id=rbs_site_file]').is(':checked'))
				{
					j('#Div_RBS_Scripts_Status').show();
				}
				else
				{
					j('#Div_RBS_Scripts_Status').hide();
				}
                });
                j('#rbs_site_file_status').change(function() {
                    switch(jQuery.trim(j('#rbs_site_file_status').val()))
				{
					case 'Not Loaded Successfully':
							j('#Div_RBS_Scripts_Status_Fail').show();
							break;
					default:
							j('#Div_RBS_Scripts_Status_Fail').hide();
				}
                });



                j('#Div_GSM_Scripts_Container').click(function() {
                    if(j('input[id=gsm_cells]').is(':checked'))
				{
					j('#Div_GSM_Scripts_Status').show();
				}
				else
				{
					j('#Div_GSM_Scripts_Status').hide();
				}
                });
                j('#gsm_cells_status').change(function() {
                    switch(jQuery.trim(j('#gsm_cells_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_GSM_Scripts_Status_Fail').show();
							break;
					default:
							j('#Div_GSM_Scripts_Status_Fail').hide();
				}
                });




                 j('#Div_GSMRelations_Container').click(function() {
                    if(j('input[id=gsm_relations]').is(':checked'))
				{
					j('#Div_GSMRelations_Status').show();
				}
				else
				{
					j('#Div_GSMRelations_Status').hide();
				}
                });
                j('#gsm_relations_status').change(function() {
                    switch(jQuery.trim(j('#gsm_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_GSMRelations_Status_Fail').show();
							break;
					default:
							j('#Div_GSMRelations_Status_Fail').hide();
				}
                });




                 j('#Div_UtranRelations_Container').click(function() {
                    if(j('input[id=utran_relations]').is(':checked'))
				{
					j('#Div_UtranRelations_Status').show();
				}
				else
				{
					j('#Div_UtranRelations_Status').hide();
				}
                });
                j('#utran_relations_status').change(function() {
                    switch(jQuery.trim(j('#utran_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_UtranRelations_Status_Fail').show();
							break;
					default:
							j('#Div_UtranRelations_Status_Fail').hide();
				}
                });



                 j('#Div_IFRelations_Container').click(function() {
                    if(j('input[id=interfrequency_relations]').is(':checked'))
				{
					j('#Div_IFRelations_Status').show();
				}
				else
				{
					j('#Div_IFRelations_Status').hide();
				}
                });
                j('#interfrequency_relations_status').change(function() {
                    switch(jQuery.trim(j('#interfrequency_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_IFRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_IFRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_IFRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_IFRelations_Status_Fail').show();
							break;
					default:
							j('#Div_IFRelations_Status_Fail').hide();
				}
                });




                 j('#Div_FemtoRelations_Container').click(function() {
                    if(j('input[id=femto_relations]').is(':checked'))
				{
					j('#Div_FemtoRelations_Status').show();
				}
				else
				{
					j('#Div_FemtoRelations_Status').hide();
				}
                });
                j('#femto_relations_status').change(function() {
                    switch(jQuery.trim(j('#femto_relations_status').val()))
				{
					case 'Partially Imported and Activation Successful':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
                                        case 'Imported Successfully and Activation Not Successful':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
                                        case 'Partially Imported and Activation Not Successful':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
                                        case 'Not Imported Successfully and No Activation':
							j('#Div_FemtoRelations_Status_Fail').show();
							break;
					default:
							j('#Div_FemtoRelations_Status_Fail').hide();
				}
                });

             });











