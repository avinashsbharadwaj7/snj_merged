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

                switch(jQuery.trim(j('#ntp_validated').val()))
				{
					case 'Yes':
							j('#ntp_not_validated_container').show();
							break;					
					default:
							j('#ntp_not_validated_container').hide();
				}
				
				switch(jQuery.trim(j('#ntp_issues_encountered').val()))
				{
					case 'Yes':
							j('#ntp_issues_encountered_container').show();
							break;					
					default:
							j('#ntp_issues_encountered_container').hide();
				}
				
				switch(jQuery.trim(j('#csb_issues_encountered').val()))
				{
					case 'Yes':
							j('#csb_issues_container').show();
							break;					
					default:
							j('#csb_issues_container').hide();
				}
				
				switch(jQuery.trim(j('#asp_mop').val()))
				{
					case 'Yes':
							j('#asp_mop_container').show();
							break;					
					default:
							j('#asp_mop_container').hide();
				}


                 switch(jQuery.trim(j('#building_access').val()))
				{
					case 'No':
							j('#building_access_container').show();
							break;
					default:
							j('#building_access_container').hide();
				}

				switch(jQuery.trim(j('#site_location_known').val()))
				{
					case 'No':
							j('#site_location_known_container').show();
							break;
					default:
							j('#site_location_known_container').hide();
				}
				
				switch(jQuery.trim(j('#hdwr_delivered').val()))
				{
					case 'No':
							j('#hdwr_delivered_container').show();
							break;
					default:
							j('#hdwr_delivered_container').hide();
				}
				
				switch(jQuery.trim(j('#asp_has_tools_spares').val()))
				{
					case 'No':
							j('#asp_has_tools_spares_container').show();
							break;
					default:
							j('#asp_has_tools_spares_container').hide();
				}
				
				switch(jQuery.trim(j('#asp_has_nodeb_tma_scripts').val()))
				{
					case 'No':
							j('#asp_has_nodeb_tma_scripts_container').show();
							break;
					default:
							j('#asp_has_nodeb_tma_scripts_container').hide();
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


                 j('#ntp_validated').change(function() {
                    switch(jQuery.trim(j('#ntp_validated').val()))
				{
					case 'Yes':
							j('#ntp_not_validated_container').show();
							break;					
					default:
							j('#ntp_not_validated_container').hide();
				}
                });


                 j('#ntp_issues_encountered').change(function() {
                    switch(jQuery.trim(j('#ntp_issues_encountered').val()))
				{
					case 'Yes':
							j('#ntp_issues_encountered_container').show();
							break;					
					default:
							j('#ntp_issues_encountered_container').hide();
				}
                });
				
				j('#csb_issues_encountered').change(function() {
                   switch(jQuery.trim(j('#csb_issues_encountered').val()))
				{
					case 'Yes':
							j('#csb_issues_container').show();
							break;					
					default:
							j('#csb_issues_container').hide();
				}
				});
				
				j('#asp_mop').change(function() {
                  switch(jQuery.trim(j('#asp_mop').val()))
				{
					case 'Yes':
							j('#asp_mop_container').show();
							break;					
					default:
							j('#asp_mop_container').hide();
				}
                });
				
				j('#building_access').change(function() {
                   switch(jQuery.trim(j('#building_access').val()))
				{
					case 'No':
							j('#building_access_container').show();
							break;
					default:
							j('#building_access_container').hide();
				}
                });
				
				j('#site_location_known').change(function() {
                  switch(jQuery.trim(j('#site_location_known').val()))
				{
					case 'No':
							j('#site_location_known_container').show();
							break;
					default:
							j('#site_location_known_container').hide();
				}
                });
				
				j('#hdwr_delivered').change(function() {
                  switch(jQuery.trim(j('#hdwr_delivered').val()))
				{
					case 'No':
							j('#hdwr_delivered_container').show();
							break;
					default:
							j('#hdwr_delivered_container').hide();
				}
                });
				
				j('#asp_has_tools_spares').change(function() {
                  switch(jQuery.trim(j('#asp_has_tools_spares').val()))
				{
					case 'No':
							j('#asp_has_tools_spares_container').show();
							break;
					default:
							j('#asp_has_tools_spares_container').hide();
				}
                });
				
				j('#asp_has_nodeb_tma_scripts').change(function() {
                  switch(jQuery.trim(j('#asp_has_nodeb_tma_scripts').val()))
				{
					case 'No':
							j('#asp_has_nodeb_tma_scripts_container').show();
							break;
					default:
							j('#asp_has_nodeb_tma_scripts_container').hide();
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











