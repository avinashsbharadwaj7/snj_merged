
            function validateForm()
            {
                var x=jQuery.trim($('#search').val());
                if (x==null || x=="")
                  {
                  alert("Search Criteria is not selected.");
                  return false;
                  }

                var y=jQuery.trim($('#year').val());
                if (x=="Y" && (y==null || y==""))
                  {
                  alert("Year is not selected.");
                  return false;
                  }

                var z1=jQuery.trim($('#From_temp').val());
                var z2=jQuery.trim($('#To_temp').val());
                if (x=="D" && (z1==null || z1=="" || z2==null || z2==""))
                  {
                  alert("Date Range is not selected.");
                  return false;
                  }
                  else
                  {
                         $('#From').val(z1);
                         $('#To').val(z2);
                  }
            }

            $(document).ready(function() {
				switch(jQuery.trim($('#search').val()))
				{
					case 'Y':
							$('#div_year').show();
                                                        $('#div_date_range').hide();
							break;
					case 'D':
							$('#div_year').hide();
                                                        $('#div_date_range').show();
							break;
					default:
							$('#div_year').hide();
                                                        $('#div_date_range').hide();
				}
            });

            // Load JQuery Functions After the page has been loaded
            $(window).load(function(){

				$('#search').change(function() {

				switch(jQuery.trim($('#search').val()))
				{
					case 'Y':
							$('#div_year').show();
                                                        $('#div_date_range').hide();
							break;
					case 'D':
							$('#div_year').hide();
                                                        $('#div_date_range').show();
							break;
					default:
							$('#div_year').hide();
                                                        $('#div_date_range').hide();
				}
			});

			

			
        });
