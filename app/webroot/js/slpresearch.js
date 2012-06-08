		var j = jQuery.noConflict();
            function validateForm()
            {
                var x=jQuery.trim(j('#search').val());
                if (x==null || x=="")
                  {
                  alert("Search Criteria is not selected.");
                  return false;
                  }

                var y1=jQuery.trim(j('#network_number').val());
                if (x=="network_number" && (y1==null || y1==""))
                  {
                  alert("Network Number is not selected.");
                  return false;
                  }

                var y2=jQuery.trim(j('#ids').val());
                if (x=="id" && (y2==null || y2==""))
                  {
                  alert("SLR Number is not selected.");
                  return false;
                  }

                var y3=jQuery.trim(j('#date_activity_performed').val());
                if (x=="date_activity_performed" && (y3==null || y3==""))
                  {
                  alert("Date Activity Performed is not selected.");
                  return false;
                  }

                var y4=jQuery.trim(j('#date_created').val());
                if (x=="date_created" && (y4==null || y4==""))
                  {
                  alert("Date Created is not selected.");
                  return false;
                  }

                var y5=jQuery.trim(j('#nic_signum').val());
                if (x=="nic_signum" && (y5==null || y5==""))
                  {
                  alert("NIC Engineer Signum is not selected.");
                  return false;
                  }

                 var y6=jQuery.trim(j('#region').val());
                if (x=="region" && (y6==null || y6==""))
                  {
                  alert("Region is not selected.");
                  return false;
                  }

                 var y7=jQuery.trim(j('#work_location').val());
                if (x=="work_location" && (y7==null || y7==""))
                  {
                  alert("NIC Engineer Work Location is not selected.");
                  return false;
                  }

                 var y8=jQuery.trim(j('#activity_type').val());
                if (x=="activity_type" && (y8==null || y8==""))
                  {
                  alert("Activity is not selected.");
                  return false;
                  }

                 var y9=jQuery.trim(j('#rnc').val());
                if (x=="rnc" && (y9==null || y9==""))
                  {
                  alert("RNC is not selected.");
                  return false;
                  }


                  var y9=jQuery.trim(j('#oss').val());
                if (x=="oss" && (y9==null || y9==""))
                  {
                  alert("OSS is not selected.");
                  return false;
                  }


                  var y10=jQuery.trim(j('#slr_report_status').val());
                if (x=="slr_report_status" && (y10==null || y10==""))
                  {
                  alert("SLR Reports Status is not selected.");
                  return false;
                  }

                  var y11=jQuery.trim(j('#issues').val());
                if (x=="issues_reports" && (y11==null || y11==""))
                  {
                  alert("Reports with Issues is not selected.");
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
				//Search Engine
                                switch(jQuery.trim(j('#search').val()))
                                {
                                        case 'network_number':
                                                        j('#Div_search_nn').show();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'id':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').show();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'date_activity_performed':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').show();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'date_created':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').show();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'nic_signum':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').show();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'region':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').show();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'work_location':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').show();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'activity_type':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').show();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'rnc':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').show();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'oss':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').show();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'slr_report_status':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').show();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'issues_reports':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').show();
							break;
                                        default:
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                }


                //End
            });

            // Load JQuery Functions After the page has been loaded
            j(window).load(function(){

				j('#search').change(function() {

				switch(jQuery.trim(j('#search').val()))
                                {
                                        case 'network_number':
                                                        j('#Div_search_nn').show();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'id':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').show();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'date_activity_performed':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').show();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'date_created':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').show();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'nic_signum':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').show();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'region':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').show();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'work_location':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').show();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'activity_type':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').show();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'rnc':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').show();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'oss':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').show();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'slr_report_status':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').show();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                        case 'issues_reports':
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').show();
							break;
                                        default:
                                                        j('#Div_search_nn').hide();
                                                        j('#Div_search_id').hide();
                                                        j('#Div_search_dateActivityPer').hide();
                                                        j('#Div_search_dateCreated').hide();
                                                        j('#Div_search_sig').hide();
                                                        j('#Div_search_reg').hide();
                                                        j('#Div_search_wl').hide();
                                                        j('#Div_search_act').hide();
                                                        j('#Div_search_rnc').hide();
                                                        j('#Div_search_oss').hide();
                                                        j('#Div_search_openReports').hide();
                                                        j('#Div_search_issuesReports').hide();
							break;
                                }
			});

			

			
        });
