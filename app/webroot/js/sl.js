		var j = jQuery.noConflict();
            function validateForm()
            {
                var x=jQuery.trim(j('#search').val());
                if (x==null || x=="")
                  {
                  alert("Search Criteria is not selected.");
                  return false;
                  }

                var y=jQuery.trim(j('#year').val());
                if (x=="Y" && (y==null || y==""))
                  {
                  alert("Year is not selected.");
                  return false;
                  }

                var z1=jQuery.trim(j('#From_temp').val());
                var z2=jQuery.trim(j('#To_temp').val());
                if (x=="D" && (z1==null || z1=="" || z2==null || z2==""))
                  {
                  alert("Date Range is not selected.");
                  return false;
                  }
                  else
                  {
                         j('#From').val(z1);
                         j('#To').val(z2);
                  }
            }

            j(document).ready(function() {
                hideElements();
				switch(jQuery.trim(j('#search').val()))
				{
					case 'Y':
							j('#div_year').show();
                                                        j('#div_date_range').hide();
							break;
					case 'D':
							j('#div_year').hide();
                                                        j('#div_date_range').show();
							break;
					default:
							j('#div_year').hide();
                                                        j('#div_date_range').hide();
				}
            });

            // Load JQuery Functions After the page has been loaded
            j(window).load(function(){

				j('#search').change(function() {

				switch(jQuery.trim(j('#search').val()))
				{
					case 'Y':
							j('#div_year').show();
                                                        j('#div_date_range').hide();
							break;
					case 'D':
							j('#div_year').hide();
                                                        j('#div_date_range').show();
							break;
					default:
							j('#div_year').hide();
                                                        j('#div_date_range').hide();
				}
			});

			

			
        });

function customerSelectionchanged()
{
    
     
     switch(jQuery.trim(j('#customerSelect').val()))
				{
					case 'AT&T':
							hideElements();
                                                        j('#Divactivity_att').show();
							break;
					case 'T-Mobile':
							hideElements();
                                                        j('#Divactivity_tmo').show();
							break;
//                                         case '%':
//                                                       hideElements();
//                                                        j('#Divactivity_all').show();
//                                                        break;
					default:
                                                        hideElements();
							break;
				}
}

function hideElements()
{
                j('#Divactivity_att').hide();
                j('#Divactivity_tmo').hide();
               // j('#Divactivity_all').hide();
}