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

                switch(jQuery.trim(j('#nic_or_tac').val()))
				{
					case 'TAC':
							j('#nic_engineer_signum_container').show();
							j('#tac_nic_engineer_signum_container').hide();
							break;
					case 'NIC':
							j('#tac_nic_engineer_signum_container').show();
							j('#nic_engineer_signum_container').hide();
							break;
					default:
							j('#nic_engineer_signum_container').hide();
							j('#tac_nic_engineer_signum_container').hide();
				}


                 switch(jQuery.trim(j('#issue_resolved').val()))
				{
					case 'No':
							j('#issue_not_resolved_container').show();
							break;
					default:
							j('#issue_not_resolved_container').hide();
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


                 j('#nic_or_tac').change(function() {
                    switch(jQuery.trim(j('#nic_or_tac').val()))
					{
						case 'TAC':
							j('#nic_engineer_signum_container').show();
							j('#tac_nic_engineer_signum_container').hide();
							break;
						case 'NIC':
								j('#tac_nic_engineer_signum_container').show();
								j('#nic_engineer_signum_container').hide();
								break;
						default:
								j('#nic_engineer_signum_container').hide();
								j('#tac_nic_engineer_signum_container').hide();
					}
                });


                 j('#issue_resolved').change(function() {
                    switch(jQuery.trim(j('#issue_resolved').val()))
					{
						case 'No':
								j('#issue_not_resolved_container').show();
								break;
						default:
								j('#issue_not_resolved_container').hide();
					}
                });

               
             });











