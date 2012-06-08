	var j = jQuery.noConflict();
              
			  
		function validateFormGraph()
            {
                var x=jQuery.trim(j('#search').val());
                if (x==null || x=="")
                  {
                  alert("Search Criteria is not selected.");
                  return false;
                  }
				  
				var z1=jQuery.trim(j('#From').val());
                var z2=jQuery.trim(j('#To').val());
                var z3=jQuery.trim(j('#year').val());
                var z4=jQuery.trim(j('#quarter').val());
                if (x=="D" && (z1==null || z1=="" || z2==null || z2==""))
                  {
					  alert("Date Range is not selected.");
					  return false;
                  }
                  else if(x=="Y" && (z3==null || z3==""))
                  {
                       alert("Year is not selected.");
					   return false;
                  }
				  else if(x=="Q" && (z4==null || z4==""))
                  {
                       alert("Quarter is not selected.");
					   return false;
                  }
				  
				 var view=jQuery.trim(j('#view').val());
				 var sh=jQuery.trim(j('#sh').val());
                if ((view==null || view=="") && sh != 1)
                  {
                  alert("View is not selected.");
                  return false;
                  }
            }
			  
			  
        
        j(document).ready(function() {

					j('#customerIR_container').hide();					
					j('#customerRest_container').hide();	
					j('#workloc_container').hide();	
					j('#reg_container').hide();
					j('#actTypeSLR_container').hide();	
					j('#actTypeIR_container').hide();
					j('#options_container').hide();	
					j('#div_date_range').hide();
                    j('#div_year').hide();
                    j('#div_quarter').hide(); 
				

            });

        j(window).load(function(){
                		
				j('#matrix_container').change(function() {
							var mat=jQuery.trim(j('#matrix').val());
                            if(mat == 'Service Assurance Matrix')
                            {
                                   j('#mod_container').hide();
								   j('#options_container').show();	   
								   j('#customerIR_container').show();
								   
								   j('input[id=slr]').attr('checked',false);
								   j('input[id=sh]').attr('checked',false);
								   j('input[id=ir]').attr('checked',false);
								   
								   j('#reg_container').hide();		   
								   j('#workloc_container').hide();			   
								   j('#customerRest_container').hide();	
								   j('#actTypeSLR_container').hide();	
								   j('#actTypeIR_container').hide();
                            }
							else
                            {
                                   j('#mod_container').show();
								   j('#options_container').hide();
                            }
					});
				
				
				j('#mod_container').click(function() {						
						if((j('input[id=sh]').is(':checked')) || (j('input[id=ir]').is(':checked')))
						{
							j('#reg_container').show();							
							j('#options_container').show();							
						}
						else
						{
							j('#options_container').hide();
						}
						
						if(j('input[id=ir]').is(':checked'))
						{
							j('#customerIR_container').show();
							j('#reg_container_all').show();
							j('#not_sh').show();
							j('#customerRest_container').hide();
							j('#workloc_container').show();
							j('#actTypeIR_container').show();
							j('#actTypeSLR_container').hide();
							j('#reg_container_sh').hide();
							j('input[id=sh]').attr('disabled', true);
						}
						else						
						{
							j('input[id=sh]').attr('disabled', false);
						}
						if(j('input[id=sh]').is(':checked'))
						{
							j('#customerRest_container').show();
							j('#reg_container_sh').show();
							j('#customerIR_container').hide();
							j('#not_sh').hide();
							j('#workloc_container').hide();
							j('#actTypeSLR_container').hide();
							j('#actTypeIR_container').hide();
							j('#reg_container_all').hide();
							j('input[id=ir]').attr('disabled', true);
						}
						else
						{
							j('input[id=ir]').attr('disabled', false);
						}
						
						
						if(j('input[id=ir]').is(':checked') && j('input[id=slr]').is(':checked'))
						{
							j('#customerRest_container').show();
							j('#customerIR_container').hide();
							j('#workloc_container').show();
							j('#actTypeSLR_container').hide();
							j('#actTypeIR_container').hide();
						}
						
				
				});
				
				
				j('#search').change(function() {
							var search=jQuery.trim(j('#search').val());
                            if(search == 'D')
                            {
                                  j('#div_date_range').show();
                                  j('#div_year').hide();
                                  j('#div_quarter').hide();
                            }
							else if(search == 'Y')
                            {
                                  j('#div_date_range').hide();
                                  j('#div_year').show();
                                  j('#div_quarter').hide();
                            }
							else if(search == 'Q')
                            {
                                  j('#div_date_range').hide();
                                  j('#div_year').hide();
                                  j('#div_quarter').show();
                            }
					});
			 
             });











