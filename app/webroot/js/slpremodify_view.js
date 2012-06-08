	var j = jQuery.noConflict();
function validateForm()
            {				
                var x=jQuery.trim(j('#id_field').val());
                if (x==null || x=="")
                  {
                  alert("SLR Number is not selected.");
                  return false;
                  }              
            }
