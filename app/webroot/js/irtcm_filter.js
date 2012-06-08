
			var j = jQuery.noConflict();

			function showUploader(triggerID, destID, associationIndex, model) {
				j(destID).replaceWith("<input type='file' name='data[" + model + "][" + associationIndex + "][file]' id='" + destID +"' />");
				j(triggerID).remove();
			}

            j(document).ready(function() {

            //Add and Modify

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
});