			
			var j = jQuery.noConflict();
			
			
			
			//Feedback Add 
			
			function validateFormFB()
            {
                var x=jQuery.trim(j('#category').val());
                var y=jQuery.trim(j('#notes_fb').val());
                var z=jQuery.trim(j('#notes_req').val());
				if(x==null || x == "")
				{
					alert("Please select the category.");
					return false;
				}
                else if (x=="Feedback" && (y=="" || y == null))
                {
                  alert("Please enter the feedback.");
                  return false;
                } 
				else if (x=="Request" && (z=="" || z == null))
                {
                  alert("Please enter the request.");
                  return false;
                } 
            }
			
			//End
			
					
			
            j(document).ready(function() {
		
							
				switch(jQuery.trim(j('#category').val()))
				{					
					case 'Feedback':
							j('#Div_feedback').show();
							j('#Div_request').hide();
							break;
					case 'Request':
							j('#Div_feedback').hide();
							j('#Div_request').show();
							break;
					default:
							j('#Div_feedback').hide();
							j('#Div_request').hide();
				}
				
                 
            //End
			

            });



             j(window).load(function(){

				
				j('#category').change(function() {  
					switch(jQuery.trim(j('#category').val()))
					{					
						case 'Feedback':
								j('#Div_feedback').show();
								j('#Div_request').hide();
								break;
						case 'Request':
								j('#Div_feedback').hide();
								j('#Div_request').show();
								break;
						default:
								j('#Div_feedback').hide();
								j('#Div_request').hide();
					}
                });
                
				
				

             });











