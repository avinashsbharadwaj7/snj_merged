	var j = jQuery.noConflict();
        
             
        
        j(document).ready(function() {

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

                switch(jQuery.trim(j('#csb_check').val()))
				{
					case 'No':
							j('#CSB_container').show();
							break;
					default:
							j('#CSB_container').hide();
				}


                 switch(jQuery.trim(j('#rnc_oss_script_load_complete').val()))
				{
					case 'No':
							j('#script_container').show();
							break;
					default:
							j('#script_container').hide();
				}

                  switch(jQuery.trim(j('#rnc_oss_scripts_released').val()))
				{
					case 'Yes':
							j('#script_release_container').show();
							break;
					default:
							j('#script_release_container').hide();
				}
				
				switch(jQuery.trim(j('#rnc_frequency_check').val()))
				{
					case 'No':
							j('#rnc_freq_container').show();
							break;
					default:
							j('#rnc_freq_container').hide();
				}
				
				switch(jQuery.trim(j('#vswr_check').val()))
				{
					case 'No':
							j('#vswr_container').show();
							break;
					default:
							j('#vswr_container').hide();
				}
				
				switch(jQuery.trim(j('#rssi_check').val()))
				{
					case 'No':
							j('#rssi_container').show();
							break;
					default:
							j('#rssi_container').hide();
				}
				
				switch(jQuery.trim(j('#alarm_check').val()))
				{
					case 'Yes':
							j('#alarms_container').show();
							break;
					default:
							j('#alarms_container').hide();
				}
				
				switch(jQuery.trim(j('#kpi_check').val()))
				{
					case 'No':
							j('#kpis_container').show();
							break;
					default:
							j('#kpis_container').hide();
				}
				
				switch(jQuery.trim(j('#ntp_pingable').val()))
				{
					case 'No':
							j('#ntp_container').show();
							break;
					default:
							j('#ntp_container').hide();
				}
				
				switch(jQuery.trim(j('#ftp_pingable').val()))
				{
					case 'No':
							j('#ftp_container').show();
							break;
					default:
							j('#ftp_container').hide();
				}
				
				switch(jQuery.trim(j('#final_results').val()))
				{
					case 'Passed With Issues':
							j('#results_container').show();
							break;
					case 'Did Not Pass':
							j('#results_container').show();
							break;
					default:
							j('#results_container').hide();
				}


            });




             j(window).load(function(){
                 
				
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


                 j('#csb_check').change(function() {
                    switch(jQuery.trim(j('#csb_check').val()))
					{
						case 'No':
								j('#CSB_container').show();
								break;
						default:
								j('#CSB_container').hide();
					}
                });


                 j('#rnc_oss_script_load_complete').change(function() {
                    switch(jQuery.trim(j('#rnc_oss_script_load_complete').val()))
				{
					case 'No':
							j('#script_container').show();
							break;
					default:
							j('#script_container').hide();
				}
                });

                 j('#rnc_oss_scripts_released').change(function() {
                   switch(jQuery.trim(j('#rnc_oss_scripts_released').val()))
				{
					case 'Yes':
							j('#script_release_container').show();
							break;
					default:
							j('#script_release_container').hide();
				}
                });
				
				
				j('#rnc_frequency_check').change(function() {
                   switch(jQuery.trim(j('#rnc_frequency_check').val()))
				{
					case 'No':
							j('#rnc_freq_container').show();
							break;
					default:
							j('#rnc_freq_container').hide();
				}
                });
				
				j('#vswr_check').change(function() {
                   switch(jQuery.trim(j('#vswr_check').val()))
				{
					case 'No':
							j('#vswr_container').show();
							break;
					default:
							j('#vswr_container').hide();
				}
                });
				
				j('#rssi_check').change(function() {
                  switch(jQuery.trim(j('#rssi_check').val()))
				{
					case 'No':
							j('#rssi_container').show();
							break;
					default:
							j('#rssi_container').hide();
				}
                });
				
				j('#alarm_check').change(function() {
                 switch(jQuery.trim(j('#alarm_check').val()))
				{
					case 'Yes':
							j('#alarms_container').show();
							break;
					default:
							j('#alarms_container').hide();
				}
                });
				
				j('#kpi_check').change(function() {
                 switch(jQuery.trim(j('#kpi_check').val()))
				{
					case 'No':
							j('#kpis_container').show();
							break;
					default:
							j('#kpis_container').hide();
				}
                });
				
				j('#ntp_pingable').change(function() {
                switch(jQuery.trim(j('#ntp_pingable').val()))
				{
					case 'No':
							j('#ntp_container').show();
							break;
					default:
							j('#ntp_container').hide();
				}
                });
				
				j('#ftp_pingable').change(function() {
                switch(jQuery.trim(j('#ftp_pingable').val()))
				{
					case 'No':
							j('#ftp_container').show();
							break;
					default:
							j('#ftp_container').hide();
				}
                });
				
				j('#final_results').change(function() {
               switch(jQuery.trim(j('#final_results').val()))
				{
					case 'Passed With Issues':
							j('#results_container').show();
							break;
					case 'Did Not Pass':
							j('#results_container').show();
							break;
					default:
							j('#results_container').hide();
				}
                });
               

             });











