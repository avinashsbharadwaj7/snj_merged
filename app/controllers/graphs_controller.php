<?php
class GraphsController extends AppController {
    
		var $name = 'Graphs';
		var $uses = array('Graph','IrModule','Dropdown','Slmaster');		
        var $helpers = array('Html', 'Session', 'Form', 'Js', 'DatePicker','databaseFields','javascript','dropdownLogics');
        var $components = array('Session', 'Email', 'RequestHandler');
		
		function beforeFilter()
		{
			parent::beforeFilter();
			$this->layout = "graph";
		}
  
		function pregraphs()
		{
			$this->set("dropdown_fields_slr", $this->Dropdown->find("all",array('order' => array('weight ASC','value'),'conditions'=>array('module_id'=>2))));
			$this->set("dropdown_fields_ir", $this->Dropdown->find("all",array('order' => array('weight ASC','value'),'conditions'=>array('module_id'=>array(1,10,1134,1135,1136,1137,1138,1139),'field'=>array('year','market','customer','new_activities','region','activity')))));
		}
		
		function generate()
		{
			ini_set('memory_limit','-1');
			//$this->layout = 'ajax';	
			$start;
			$end;
			$month;
			$week;
			$condition_sh = array();
			$condition_slr = array();
			$condition_wl = "";
			//$condition_ir = array();
			
			
			//*****************Year/Quarter/Date Range********************
			if($this->data['Graph']['search'] == "D")
			{
				$start = $this->data['Graph']['From'];
				$end = $this->data['Graph']['To'];
				$start_year = intVal(substr($start,0,4));
				$end_year = intVal(substr($end,0,4));
				
				
				$month_start = intVal(substr($start,5,2));
				$month_end = intVal(substr($end,5,2));
				$week_start = intVal(date("W", strtotime($start)));
				if($week_start == 52)
					$week_start = 0;
				$week_end = intVal(date("W", strtotime($end)));				
				
				if($start_year == $end_year)
				{
					$week = $week_end - $week_start + 1;
					//$week = $week_end - $week_start;
					$month = ($month_end - $month_start) + 1;
				}
				else
				{
					$week = (52 - $week_start) + $week_end + 1;
					$month = (12 - $month_start) + $month_end + 1;
				}
				
				if($month > 13 || $week > 53)
				{
					$this->Session->setFlash(__('Graphs are generated for a duration of maximum 12 months', true));
					$this->redirect(array('action' => 'pregraphs'));
				}
				//if($week_start == 0)
				//	$week = $week+1;				
				
				//$condition_sh['STR_TO_DATE(date_activity_performed, "%Y-%m-%d") BETWEEN ? AND ?'] = array($start,$end);
				$condition_slr['STR_TO_DATE(date_activity_performed, "%Y-%m-%d") BETWEEN ? AND ?'] = array($start,$end);
				$condition_ir_issues['STR_TO_DATE(date_activity_performed, "%Y-%m-%d") BETWEEN ? AND ?'] = array($start,$end);
				
				$condition_ir = "STR_TO_DATE(date_activity_performed, '%Y-%m-%d') BETWEEN '".$start."' AND '".$end."'";
				$condition_sh = "STR_TO_DATE(Date, '%Y-%m-%d') BETWEEN '".$start."' AND '".$end."'";
				$title = "Date range - ".$start." to ".$end;
			}
			else if($this->data['Graph']['search'] == "Q")
			{
				$current_year = intVal(date('Y'));
				if($this->data['Graph']['quarter'] == 1)
				{
					$start = $current_year."-01-01";
					$end = $current_year."-03-31";
				}
				else if($this->data['Graph']['quarter'] == 2)
				{
					$start = $current_year."-04-01";
					$end = $current_year."-06-30";
				}
				else if($this->data['Graph']['quarter'] == 3)
				{
					$start = $current_year."-07-01";
					$end = $current_year."-09-30";
				}
				else if($this->data['Graph']['quarter'] == 4)
				{
					$start = $current_year."-10-01";
					$end = $current_year."-12-31";
				}
				
				$month_start = intVal(substr($start,5,2));
				$month_end = intVal(substr($end,5,2));
				$month = 3;
				
				$week_start = intVal(date("W", strtotime($start)));
				if($week_start == 52)
					$week_start = 0;
				$week_end = intVal(date("W", strtotime($end)));
				$week = $week_end - $week_start + 1;
				//$condition_sh['STR_TO_DATE(date_activity_performed, "%Y-%m-%d") BETWEEN ? AND ?'] = array($start,$end);
				$condition_slr['STR_TO_DATE(date_activity_performed, "%Y-%m-%d") BETWEEN ? AND ?'] = array($start,$end);
				$condition_ir_issues['STR_TO_DATE(date_activity_performed, "%Y-%m-%d") BETWEEN ? AND ?'] = array($start,$end);
				
				$condition_ir = "STR_TO_DATE(date_activity_performed, '%Y-%m-%d') BETWEEN '".$start."' AND '".$end."'";
				$condition_sh = "STR_TO_DATE(Date, '%Y-%m-%d') BETWEEN '".$start."' AND '".$end."'";
				$title = "Quarter - ".$this->data['Graph']['quarter'];
			}
			else if($this->data['Graph']['search'] == "Y")
			{
				//$condition_sh['SUBSTR(date_activity_performed,1,4)'] = $this->data['Graph']['year'];
				$condition_slr['SUBSTR(date_activity_performed,1,4)'] = $this->data['Graph']['year'];
				$condition_ir_issues['SUBSTR(date_activity_performed,1,4)'] = $this->data['Graph']['year'];
				
				
				$condition_ir = "SUBSTR(date_activity_performed,1,4) = ".$this->data['Graph']['year'];
				$condition_sh = "SUBSTR(Date,1,4) = ".$this->data['Graph']['year'];
				
				//$end = date("Y-m-d", mktime(0, 0, 0, date("m"),date("d")-1,date("Y")));
				
				$month_start = 1;
				$month_end = intVal(date('m'));
				$month = $month_end;
				
				$week_start = 0;
				//$week_end = intVal(date("W", strtotime($end)));
				$week_end = intVal(date("W"));
				
				//$week = intVal(date("W", strtotime($end)));
				//$start = 0;
				$week = $week_end + 1;
				$title = "Year - ".$this->data['Graph']['year'];
			}
			
			//************************************************************
			
			
						
			if($this->data['Graph']['matrix'] == "Performance Matrix")
			{
				if($this->data['Graph']['sh'] == "1")
				{				
					if($this->data['Graph']['region_sh'] != "%")
						$region_sh = $this->data['Graph']['region_sh']."%";
					else
						$region_sh = "%";
					//$condition_sh['region'] = $this->data['Graph']['region'];
					//$condition_slr['region'] = $this->data['Graph']['region'];
					//$condition_ir['region'] = $this->data['Graph']['region'];					
					$condition_sh_issues = $condition_sh." AND Region LIKE '".$region_sh."'";
					$condition_sh .= " AND Region LIKE '".$region_sh.
									"' AND (Activity = 'New Integration' OR Activity = 'New Integration (Iub over ATM)' OR Activity = 'New Integration (Iub over IP)' OR Activity = '2nd Carrier Add' OR Activity = '3rd Carrier Add' OR Activity = '3rd Carrier Add Cabinet Reconfiguration' OR Activity = '3rd Carrier Add Cable Crossover Solution' OR Activity = '3rd Carrier Add Split Power Configuration' OR Activity = '3rd Carrier Add using OBIF & RRUW' OR Activity = '4th Carrier Add Using OBIF & RRUW' OR Activity = '4th Carrier Add in 2nd Cabinet' OR Activity = 'Add Sector' OR Activity = 'Alarm / Status Check' OR Activity = 'Call Testing' OR Activity = 'Delete Sector' OR Activity = 'Troubleshooting') AND Activity <> '' AND Site <> ''";
				}
				
				/*if($this->data['Graph']['slr'] == "1" && $this->data['Graph']['ir'] != "1")
				{
					$conditionslr = array(
										'customer LIKE' => $this->data['Graph']['customer_all'],
										'region LIKE' => $this->data['Graph']['region'],
										'work_location LIKE' => $this->data['Graph']['work_location'],
										'activity_type LIKE' => $this->data['Graph']['activity_type_slr']
									);
					$condition_slr = array_merge($condition_slr,$conditionslr);
				}*/
				//if($this->data['Graph']['ir'] == "1" && $this->data['Graph']['slr'] != "1")
				if($this->data['Graph']['ir'] == "1")
				{
					if(in_array("%", $this->data['Graph']['market']))
					{
						$market_query_vars = "(market LIKE '%' or market is null)";						
					}
					else
					{
						$market_query_vars = "market IN (";
						foreach($this->data['Graph']['market'] as $key=>$temp_market):
							$market_query_vars = $market_query_vars."'".$temp_market."',";
						endforeach;
						$market_query_vars = substr($market_query_vars, 0, -1);
						$market_query_vars = $market_query_vars . ")";
						
						$market_query_vars_cake =  array();
						foreach($this->data['Graph']['market'] as $key=>$temp_market):
							array_push($market_query_vars_cake, $temp_market);
						endforeach;	
					}
					
					
					if($this->data['Graph']['work_location'] == "%")
					{
						$condition_wl = " AND customer LIKE '".$this->data['Graph']['customer_ir'].
										"' AND region LIKE '".$this->data['Graph']['region'].
										"' AND ".$market_query_vars.
										" AND access_method LIKE '".$this->data['Graph']['access_method'].
										"' AND activity_type LIKE '".$this->data['Graph']['activity_type_ir']."%' GROUP BY engineer_work_location";
						
						$condition_wl = $condition_ir.''.$condition_wl;
					}
					
					$conditionir = " AND customer LIKE '".$this->data['Graph']['customer_ir'].
									"' AND region LIKE '".$this->data['Graph']['region'].
									"' AND ".$market_query_vars.
									" AND access_method LIKE '".$this->data['Graph']['access_method'].
									"' AND engineer_work_location LIKE '".$this->data['Graph']['work_location'].
									"' AND activity_type LIKE '".$this->data['Graph']['activity_type_ir']."%'";
					$condition_ir = $condition_ir.''.$conditionir;
					
					$conditionir_cake = array(
										'customer LIKE' => $this->data['Graph']['customer_ir'],
										'region LIKE' => $this->data['Graph']['region'],
										'access_method LIKE' => $this->data['Graph']['access_method'],
										'engineer_work_location LIKE' => $this->data['Graph']['work_location'],
										'activity_type LIKE' => $this->data['Graph']['activity_type_ir']."%"
									);
					$condition_ir_cake = array_merge($condition_ir_issues,$conditionir_cake); //condition_ir_issues is used just because its in the cake format
					
					$conditionir_issues = array(
										'customer LIKE' => $this->data['Graph']['customer_ir'],
										'region LIKE' => $this->data['Graph']['region'],
										'access_method LIKE' => $this->data['Graph']['access_method'],
										'engineer_work_location LIKE' => $this->data['Graph']['work_location'],
										//'activity_result NOT IN' => array('Successful','Canceled/Rescheduled'),
										'NOT' => array('activity_result' => array('Successful','Canceled/Rescheduled')),
										'activity_type LIKE' => $this->data['Graph']['activity_type_ir']."%"
									);
					$condition_ir_issues = array_merge($condition_ir_issues,$conditionir_issues);
					
					if(in_array("%", $this->data['Graph']['market']))
					{
						array_push($condition_ir_cake, array("OR"=> array("market LIKE"=>"%", "market IS NULL")));
						array_push($condition_ir_issues, array("OR"=> array("market LIKE"=>"%", "market IS NULL")));
					}
					else
					{	
						$condition_ir_cake['market'] = $market_query_vars_cake;
						$condition_ir_issues['market'] = $market_query_vars_cake;
					}
				}
				/*if($this->data['Graph']['ir'] == "1" && $this->data['Graph']['slr'] == "1")
				{
					$conditionir = array(
										'customer LIKE' => $this->data['Graph']['customer_all'],
										'region LIKE' => $this->data['Graph']['region'],
										'engineer_work_location LIKE' => $this->data['Graph']['work_location']
									);
					$condition_ir = array_merge($condition_ir,$conditionir);
					
					$conditionslr = array(
										'customer LIKE' => $this->data['Graph']['customer_all'],
										'region LIKE' => $this->data['Graph']['region'],
										'work_location LIKE' => $this->data['Graph']['work_location']
									);
					$condition_slr = array_merge($condition_slr,$conditionslr);
				}*/
			}
				
				if($this->data['Graph']['view'] == 'Week View')
				{
					$arr_count = $week;
					$i = 0;
					for($m=$week-1; $m>=0; $m--)
					{	
						if($week_end-$m == 0 && $this->data['Graph']['search'] == 'Y')
						{
							//$dataX[$i] = "wk" . ($week_end-$m );						
							$dataX[$i] = $week_end-$m;						
						}	
						else if($week_end-$m == 0)
						{
							//$dataX[$i] = "wk" . ($week_end-$m ) . " - wk" . (52-$m+$week_end );
							$dataX[$i] = ($week_end-$m ) ." - ". (52-$m+$week_end );
						}	
						else if($week_end-$m < 1)
						{
							//$dataX[$i] = "wk" . (52-$m+$week_end ); 
							$dataX[$i] = 52-$m+$week_end; 
						}
						else
						{
							//$dataX[$i] = "wk" . ($week_end-$m );						
							$dataX[$i] = $week_end-$m;						
						}
						$i++;
					}
				}
				else
				{
					$mon_graph['1']="Jan";
					$mon_graph['2']="Feb";
					$mon_graph['3']="Mar";
					$mon_graph['4']="Apr";
					$mon_graph['5']="May";
					$mon_graph['6']="Jun";
					$mon_graph['7']="Jul";
					$mon_graph['8']="Aug";
					$mon_graph['9']="Sep";
					$mon_graph['10']="Oct";
					$mon_graph['11']="Nov";
					$mon_graph['12']="Dec";
					$arr_count = $month;
					if($this->data['Graph']['search'] == "D")
					{
						if($start_year == $end_year)
						{
							$j = 0;
							for($i=$month_start;$i<=$month_end;$i++)
							{
								$dataX[$j] = $mon_graph[$i];
								$j++;
							}
						}
						else
						{
							$j = 0;
							for($i=$month_start;$i<=12;$i++)
							{
								$dataX[$j] = $mon_graph[$i];
								$j++;
							}
							for($i=1;$i<=$month_end;$i++)
							{
								$dataX[$j] = $mon_graph[$i];
								$j++;
							}
						}
					}
					else
					{
						$j = 0;
						for($i=$month_start;$i<=$month_end;$i++)
						{
							$dataX[$j] = $mon_graph[$i];
							$j++;
						}
					}
				}
				
				if($this->data['Graph']['ir'] == 1)
				{
				$list = $this->Dropdown->find("all",array('fields'=>array('field','value'),'conditions'=>array('field'=>array('issue_type','work_loc'), 'module_id'=>1),'order' => array('weight ASC','value')));
				foreach($list as $temp_list):
					if($temp_list['Dropdown']['field'] == 'issue_type'){
						$issues_list_final[$temp_list['Dropdown']['value']] = 0;
						$issues_list_UnsuccessfulFallback[$temp_list['Dropdown']['value']] = 0;
					}
					else
						$dataYTotalWorkLocReports[$temp_list['Dropdown']['value']] = 0;
				endforeach;
				
				$dataYTotalReports = array();
				$dataYTotalReports = array_pad($dataYTotalReports, $arr_count, 0);		
				$dataYTotalSuccessReports = array();
				$dataYTotalSuccessReports = array_pad($dataYTotalSuccessReports, $arr_count, 0);
				$dataYTotalUnsuccessfulFallbackReports = array();
				$dataYTotalUnsuccessfulFallbackReports = array_pad($dataYTotalUnsuccessfulFallbackReports, $arr_count, 0);	
				$dataYTotalCanceledRescheduledReports = array();
				$dataYTotalCanceledRescheduledReports = array_pad($dataYTotalCanceledRescheduledReports, $arr_count, 0);

				$temp_array = array();
				$temp_array = array_pad($temp_array, $arr_count, 0);
				$dataYTotalIssuesLimited_temp = array();
				$dataYTotalIssuesLimited_temp = array_pad($dataYTotalIssuesLimited_temp, 36, $temp_array);				
				$dataYTotalIssues_temp = array();
				$dataYTotalIssues_temp = array_pad($dataYTotalIssues_temp, 36, $temp_array);
				
				$dataYPercentage = array();
				$dataYPercentage = array_pad($dataYPercentage, $arr_count, 0);
				
				$issue_i = 0;
				foreach($issues_list_UnsuccessfulFallback as $key=>$val):
					$dataYTotalIssuesLimited[$key] = $dataYTotalIssuesLimited_temp[$issue_i];
					$issue_i++;
				endforeach;
				$issue_i = 0;
				foreach($issues_list_final as $key=>$val):
					$dataYTotalIssues[$key] = $dataYTotalIssuesLimited_temp[$issue_i];
					$issue_i++;
				endforeach;
				//**********************************************************SLR**************************************************
				//$all = $this->Slmaster->find("all",array('fields'=>array('work_location','region','date_activity_performed','activity_result','slr_report_status'),'conditions'=>$condition_slr));
				//var_dump($all);
				
				
				//**********************************************************IR**************************************************
								
				if($this->data['Graph']['view'] == 'Week View')
				{
					$condition_ir_total = $condition_ir.' GROUP BY Week(date_activity_performed)';
					$selection = 'Week(date_activity_performed) as week,count(Week(date_activity_performed)) as week_total, SUBSTR(date_activity_performed,1,4) as year';
				}
				else
				{
					$condition_ir_total = $condition_ir.' GROUP BY SUBSTR(date_activity_performed,6,2)';
					$selection = 'SUBSTR(date_activity_performed,6,2) as month,count(SUBSTR(date_activity_performed,6,2)) as month_total, SUBSTR(date_activity_performed,1,4) as year';
				} 
				
				$current_year = date('Y');
				$querySucc = "Select ".$selection." from ir_modules where activity_result = 'Successful' AND ".$condition_ir_total;
				$succesful_results = $this->IrModule->query($querySucc);
								
				$querySucc_iss = "Select ".$selection." from ir_modules where (activity_result = 'Successful_With_Issues' OR activity_result = 'Partially_Executed_Follow_up_Required' OR activity_result = 'Successful_With_Issues_Follow_Up_Required') AND ".$condition_ir_total;
				$succesful_with_issues_results = $this->IrModule->query($querySucc_iss);	
				
				$queryCanc_resc = "Select ".$selection." from ir_modules where activity_result = 'Canceled/Rescheduled' AND ".$condition_ir_total;
				$canc_resc_results = $this->IrModule->query($queryCanc_resc);	
				
				$queryUnsucc_fallb = "Select ".$selection." from ir_modules where activity_result = 'Unsuccessful/Fallback' AND ".$condition_ir_total;
				$unsucc_fallb_results = $this->IrModule->query($queryUnsucc_fallb);
				
				//********Issues*********
							
				$options['joins'] = array(
						array('table' => 'ir_issues',
							'alias' => 'IrIssue',
							'type' => 'left',
							'foreignKey' => false,
							'conditions' => array(
								'IrIssue.irmodule_id = IrModule.id'
							)
						)						
					);
				$options['conditions'] = $condition_ir_issues;				
				
				
				$flag_iss = 0;
				if($this->data['Graph']['view'] == 'Week View')
				{
					$options['fields'] = array('Year(date_activity_performed) as year','Week(date_activity_performed) as week_iss','IrIssue.type','activity_result','Count(*) as count');
					$options['group'] = array('activity_result','Week(date_activity_performed)','IrIssue.type');
					
					$issues = $this->IrModule->find("all",$options);
					
					if(($this->data['Graph']['search'] == 'D') && ($start_year < $current_year))
					{ 
						foreach($issues as $iss):
							if($iss['IrIssue']['type'] != null)
							{					
								if($iss['IrModule']['activity_result'] == 'Unsuccessful/Fallback')
								{
									if($current_year > $iss[0]['year'])
									{
										$temp_week = ($arr_count - $week_end) - (52 - intVal($iss[0]['week_iss'])) - 1;									
									}
									else
									{
										$temp_week = intVal($iss[0]['week_iss']) + ($arr_count - $week_end) - 1;
									}
									
									$dataYTotalIssuesLimited[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
									$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
									$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
									$issues_list_UnsuccessfulFallback[$iss['IrIssue']['type']] += $iss[0]['count'];
								}
								else 
								{
									if($current_year > $iss[0]['year'])
									{
										$temp_week = ($arr_count - $week_end) - (52 - intVal($iss[0]['week_iss'])) - 1;									
									}
									else
									{
										$temp_week = intVal($iss[0]['week_iss']) + ($arr_count - $week_end) - 1;
									}									
									$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
									$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
								}
							}
						endforeach;
					}
					else
					{
						if(!empty($succesful_results) && $succesful_results[0][0]['week'] == 0)
							$flag_iss = 1;
						if($flag_iss == 1)
						{
							foreach($issues as $iss):
								if($iss['IrIssue']['type'] != null)
								{					
									if($iss['IrModule']['activity_result'] == 'Unsuccessful/Fallback')
									{
										$temp_week = intVal($iss[0]['week_iss']);										
										$dataYTotalIssuesLimited[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
										$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
										$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
										$issues_list_UnsuccessfulFallback[$iss['IrIssue']['type']] += $iss[0]['count'];
									}
									else 
									{
										$temp_week = intVal($iss[0]['week_iss']);										
										$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
										$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
									}
								}
							endforeach;
						}
						else
						{
							foreach($issues as $iss):								
								if($iss['IrIssue']['type'] != null)
								{					
									if($iss['IrModule']['activity_result'] == 'Unsuccessful/Fallback')
									{
										$temp_week = intVal($iss[0]['week_iss']) + ($arr_count - $week_end) - 1;								
										$dataYTotalIssuesLimited[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
										$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];
										$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
										$issues_list_UnsuccessfulFallback[$iss['IrIssue']['type']] += $iss[0]['count'];
									}
									else 
									{
										$temp_week = intVal($iss[0]['week_iss']) + ($arr_count - $week_end) - 1;
										$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_week)] += $iss[0]['count'];	
										$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
									}
								}
							endforeach;
						}
					}
				}
				else
				{
					$options['fields'] = array('Year(date_activity_performed) as year','Substr(date_activity_performed,6,2) as month_iss','IrIssue.type','activity_result','Count(*) as count');
					$options['group'] = array('activity_result','Substr(date_activity_performed,6,2)','IrIssue.type');
					
					$issues = $this->IrModule->find("all",$options);
					if(($this->data['Graph']['search'] == 'D') && ($start_year < $current_year))
					{ 
							foreach($issues as $iss):
								if($iss['IrIssue']['type'] != null)
								{										
									if($iss['IrModule']['activity_result'] == 'Unsuccessful/Fallback')
									{
										if($current_year > $iss[0]['year'])
										{
											$temp_month = ($arr_count - $month_end) - (12 - intVal($iss[0]['month_iss'])) - 1;							
										}
										else
										{
											$temp_month = intVal($iss[0]['month_iss']) + ($arr_count - $month_end) - 1;
										}																	
										$dataYTotalIssuesLimited[$iss['IrIssue']['type']][intval($temp_month)] += $iss[0]['count'];	
										$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_month)] += $iss[0]['count'];
										$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
										$issues_list_UnsuccessfulFallback[$iss['IrIssue']['type']] += $iss[0]['count'];
									}
									else
									{
										if($current_year > $iss[0]['year'])
										{
											$temp_month = ($arr_count - $month_end) - (12 - intVal($iss[0]['month_iss'])) - 1;							
										}
										else
										{
											$temp_month = intVal($iss[0]['month_iss']) + ($arr_count - $month_end) - 1;
										}													
										$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_month)] += $iss[0]['count'];
										$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
									}
								}
							endforeach;
					}
					else
					{		
							foreach($issues as $iss):
									if($iss['IrIssue']['type'] != null)
									{	
										if($iss['IrModule']['activity_result'] == 'Unsuccessful/Fallback')
										{
											$temp_month = intVal($iss[0]['month_iss']) + ($arr_count - $month_end) - 1;																	
											$dataYTotalIssuesLimited[$iss['IrIssue']['type']][intval($temp_month)] += $iss[0]['count'];												
											$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_month)] += $iss[0]['count'];
											$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
											$issues_list_UnsuccessfulFallback[$iss['IrIssue']['type']] += $iss[0]['count'];
										}
										else
										{				
											$temp_month = intVal($iss[0]['month_iss']) + ($arr_count - $month_end) - 1;
											$dataYTotalIssues[$iss['IrIssue']['type']][intval($temp_month)] += $iss[0]['count'];
											$issues_list_final[$iss['IrIssue']['type']] += $iss[0]['count'];
										}
									}
								endforeach;
					}
				}
				//*************************
				
				
				
				//****************************Total Reports/HeadCount per CU************************
				
				if($this->data['Graph']['customer_ir'] == "%")
				{
				
					//*************Total Report Count****************
					$opt1['fields'] = array('Count(*) as count','customer');
					$opt1['group'] = array('customer');
					$opt1['join'] = array('');
					$opt1['recursive'] = -1;
					$opt1['conditions'] = $condition_ir_cake;
					
					$totalcount = $this->IrModule->find("all",$opt1);	
					foreach($totalcount as $totalcount_temp):
						$totalcount_array[$totalcount_temp['IrModule']['customer']] = $totalcount_temp[0]['count'];
					endforeach;
					//***********************************************
					
					
					//*************Total Head Count****************
					$opt2['fields'] = array('Count(Distinct(engineer_signum)) as count','customer');
					$opt2['group'] = array('customer');
					$opt2['join'] = array('');
					$opt2['recursive'] = -1;
					$opt2['conditions'] = $condition_ir_cake;
					
					$headcount = $this->IrModule->find("all",$opt2);	
					foreach($headcount as $headcount_temp):
						$headcount_array[$headcount_temp['IrModule']['customer']] = $headcount_temp[0]['count'];
					endforeach;				
					//***********************************************
				}
				
				//**********************************************************************************
				
				
				if($condition_wl != "")
				{
					$queryWork_loc = "Select count(engineer_work_location) as count, engineer_work_location from ir_modules where ".$condition_wl;
					$work_loc_results = $this->IrModule->query($queryWork_loc);
					foreach($work_loc_results as $workloc_temp):
						$dataYTotalWorkLocReports[$workloc_temp['ir_modules']['engineer_work_location']] = $workloc_temp[0]['count'];
					endforeach;
				}
						
				$flag = 0;
				if($this->data['Graph']['view'] == 'Week View')
				{
					if(($this->data['Graph']['search'] == 'D') && ($start_year < $current_year))
					{ 
							foreach($succesful_results as $temp):
								$temp = $temp[0];
								if($current_year > $temp['year'])
								{
									$temp_week = ($arr_count - $week_end) - (52 - $temp['week']) - 1;									
								}
								else
								{
									$temp_week = $temp['week'] + ($arr_count - $week_end) - 1;
								}				
								$dataYTotalReports[intval($temp_week)] += $temp['week_total'];	
								$dataYTotalSuccessReports[intval($temp_week)] += $temp['week_total'];
							endforeach;
							
							foreach($succesful_with_issues_results as $temp1):
								$temp1 = $temp1[0];
								if($current_year > $temp1['year'])
								{
									$temp_week = ($arr_count - $week_end) - (52 - $temp1['week']) - 1;									
								}
								else
								{
									$temp_week = $temp1['week'] + ($arr_count - $week_end) - 1;
								}
								$dataYTotalReports[intval($temp_week)] += $temp1['week_total'];	
								$dataYTotalSuccessReports[intval($temp_week)] += $temp1['week_total'];	
							endforeach;
							
							foreach($canc_resc_results as $temp2):
								$temp2 = $temp2[0];
								if($current_year > $temp2['year'])
								{
									$temp_week = ($arr_count - $week_end) - (52 - $temp2['week']) - 1;									
								}
								else
								{
									$temp_week = $temp2['week'] + ($arr_count - $week_end) - 1;
								}								
								$dataYTotalReports[intval($temp_week)] += $temp2['week_total'];	
								$dataYTotalCanceledRescheduledReports[intval($temp_week)] = $temp2['week_total'];	
							endforeach;
							
							foreach($unsucc_fallb_results as $temp3):
								$temp3 = $temp3[0];
								if($current_year > $temp3['year'])
								{
									$temp_week = ($arr_count - $week_end) - (52 - $temp3['week']) - 1;									
								}
								else
								{
									$temp_week = $temp3['week'] + ($arr_count - $week_end) - 1;
								}
								$dataYTotalReports[intval($temp_week)] += $temp3['week_total'];	
								$dataYTotalUnsuccessfulFallbackReports[intval($temp_week)] = $temp3['week_total'];	
							endforeach;					
							
					}
					else
					{
						if(!empty($succesful_results) && $succesful_results[0][0]['week'] == 0)
							$flag = 1;
						if($flag == 1)
						{
							foreach($succesful_results as $temp):
								$temp = $temp[0];	
								$temp_week = $temp['week'];
								$dataYTotalReports[intval($temp_week)] += $temp['week_total'];	
								$dataYTotalSuccessReports[intval($temp_week)] += $temp['week_total'];
							endforeach;
							
							foreach($succesful_with_issues_results as $temp1):
								$temp1 = $temp1[0];
								$temp_week = $temp1['week'];
								$dataYTotalReports[intval($temp_week)] += $temp1['week_total'];	
									$dataYTotalSuccessReports[intval($temp_week)] += $temp1['week_total'];
							endforeach;
							
							foreach($canc_resc_results as $temp2):
								$temp2 = $temp2[0];
								$temp_week = $temp2['week'];
								$dataYTotalReports[intval($temp_week)] += $temp2['week_total'];	
								$dataYTotalCanceledRescheduledReports[intval($temp_week)] = $temp2['week_total'];	
							endforeach;
							
							foreach($unsucc_fallb_results as $temp3):
								$temp3 = $temp3[0];
								$temp_week = $temp3['week'];
								$dataYTotalReports[intval($temp_week)] += $temp3['week_total'];	
								$dataYTotalUnsuccessfulFallbackReports[intval($temp_week)] = $temp3['week_total'];	
							endforeach;
						}
						else
						{
							foreach($succesful_results as $temp):
								$temp = $temp[0];	
								$temp_week = $temp['week'] + ($arr_count - $week_end) - 1;
								$dataYTotalReports[intval($temp_week)] += $temp['week_total'];	
								$dataYTotalSuccessReports[intval($temp_week)] += $temp['week_total'];
							endforeach;
							
							foreach($succesful_with_issues_results as $temp1):
								$temp1 = $temp1[0];
								$temp_week = $temp1['week'] + ($arr_count - $week_end) - 1;
								$dataYTotalReports[intval($temp_week)] += $temp1['week_total'];	
									$dataYTotalSuccessReports[intval($temp_week)] += $temp1['week_total'];
							endforeach;
							
							foreach($canc_resc_results as $temp2):
								$temp2 = $temp2[0];
								$temp_week = $temp2['week'] + ($arr_count - $week_end) - 1;
								$dataYTotalReports[intval($temp_week)] += $temp2['week_total'];	
								$dataYTotalCanceledRescheduledReports[intval($temp_week)] = $temp2['week_total'];	
							endforeach;
							
							foreach($unsucc_fallb_results as $temp3):
								$temp3 = $temp3[0];
								$temp_week = $temp3['week'] + ($arr_count - $week_end) - 1;
								$dataYTotalReports[intval($temp_week)] += $temp3['week_total'];	
								$dataYTotalUnsuccessfulFallbackReports[intval($temp_week)] = $temp3['week_total'];	
							endforeach;
						}
					}
				}
				else
				{
					if(($this->data['Graph']['search'] == 'D') && ($start_year < $current_year))
					{ 
							foreach($succesful_results as $temp):
								$temp = $temp[0];
								if($current_year > $temp['year'])
								{
									$temp_month = ($arr_count - $month_end) - (12 - $temp['month']) - 1;
								}
								else
								{
									$temp_month = $temp['month'] + ($arr_count - $month_end) - 1;
								}								
								$dataYTotalReports[intval($temp_month)] += $temp['month_total'];	
								$dataYTotalSuccessReports[intval($temp_month)] += $temp['month_total'];
							endforeach;
							
							foreach($succesful_with_issues_results as $temp1):
								$temp1 = $temp1[0];
								if($current_year > $temp1['year'])
								{
									$temp_month = ($arr_count - $month_end) - (12 - $temp1['month']) - 1;
								}
								else
								{
									$temp_month = $temp1['month'] + ($arr_count - $month_end) - 1;
								}
								$dataYTotalReports[intval($temp_month)] += $temp1['month_total'];	
								$dataYTotalSuccessReports[intval($temp_month)] += $temp1['month_total'];
							endforeach;
							
							foreach($canc_resc_results as $temp2):
								$temp2 = $temp2[0];
								if($current_year > $temp2['year'])
								{
									$temp_month = ($arr_count - $month_end) - (12 - $temp2['month']) - 1;
								}
								else
								{
									$temp_month = $temp2['month'] + ($arr_count - $month_end) - 1;
								}
								$dataYTotalReports[intval($temp_month)] += $temp2['month_total'];	
								$dataYTotalCanceledRescheduledReports[intval($temp_month)] = $temp2['month_total'];
							endforeach;
							
							foreach($unsucc_fallb_results as $temp3):
								$temp3 = $temp3[0];
								if($current_year > $temp3['year'])
								{
									$temp_month = ($arr_count - $month_end) - (12 - $temp3['month']) - 1;
								}
								else
								{
									$temp_month = $temp3['month'] + ($arr_count - $month_end) - 1;
								}
								$dataYTotalReports[intval($temp_month)] += $temp3['month_total'];	
								$dataYTotalUnsuccessfulFallbackReports[intval($temp_month)] = $temp3['month_total'];	
							endforeach;	
					}
					else
					{
						foreach($succesful_results as $temp):
							$temp = $temp[0]; 
							$temp_month = intVal($temp['month']) + ($arr_count - $month_end) - 1; 
							$dataYTotalReports[intval($temp_month)] += $temp['month_total'];	
							$dataYTotalSuccessReports[intval($temp_month)] += $temp['month_total'];
						endforeach;
						
						foreach($succesful_with_issues_results as $temp1):
							$temp1 = $temp1[0];
							$temp_month = intVal($temp1['month']) + ($arr_count - $month_end) - 1;
							$dataYTotalReports[intval($temp_month)] += $temp1['month_total'];	
							$dataYTotalSuccessReports[intval($temp_month)] += $temp1['month_total'];
						endforeach;
						
						foreach($canc_resc_results as $temp2):
							$temp2 = $temp2[0];
							$temp_month = intVal($temp2['month']) + ($arr_count - $month_end) - 1;
							$dataYTotalReports[intval($temp_month)] += $temp2['month_total'];	
							$dataYTotalCanceledRescheduledReports[intval($temp_month)] = $temp2['month_total'];
						endforeach;
						
						foreach($unsucc_fallb_results as $temp3):
							$temp3 = $temp3[0];
							$temp_month = intVal($temp3['month']) + ($arr_count - $month_end) - 1;
							$dataYTotalReports[intval($temp_month)] += $temp3['month_total'];	
							$dataYTotalUnsuccessfulFallbackReports[intval($temp_month)] = $temp3['month_total'];
						endforeach;						
					}
				}
				
				
				
				
				
				
				/*	echo "dataYTotalReports";
					var_dump($dataYTotalReports);
					echo "<br>";
					echo "dataYTotalSuccessReports";
					var_dump($dataYTotalSuccessReports);
					echo "<br>";
					echo "dataYTotalCanceledRescheduledReports";
					var_dump($dataYTotalCanceledRescheduledReports);
					echo "<br>";
					echo "dataYTotalUnsuccessfulFallbackReports";
					var_dump($dataYTotalUnsuccessfulFallbackReports);*/
				
			
				for($iterator=0;$iterator<$arr_count; $iterator++)
				{
				  if($dataYPercentage[$iterator] != 0 || $dataYTotalReports[$iterator] != 0)
				  {
					$dataYPercentage[$iterator] = $dataYTotalSuccessReports[$iterator] / $dataYTotalReports[$iterator];
					$dataYPercentage[$iterator] = number_format($dataYPercentage[$iterator]*100, 2, '.', '');
				  }
				}
				
				
				
				//***********************
					
					$dataYPercentage =  $this->php_to_js($dataYPercentage);	
		
					$total = $this->graph_add($dataYTotalReports);
					$dataYTotalReports =  $this->php_to_js($dataYTotalReports);	
					$dataYTotalSuccessReports =  $this->php_to_js($dataYTotalSuccessReports);	
					$dataYTotalUnsuccessfulFallbackReports =  $this->php_to_js($dataYTotalUnsuccessfulFallbackReports);	
					$dataYTotalCanceledRescheduledReports =  $this->php_to_js($dataYTotalCanceledRescheduledReports);
					
					$dataX =  $this->php_to_js_xaxis($dataX);	
									
					arsort($issues_list_UnsuccessfulFallback);					
					$dataYTotalIssuesLimited = $this->sortArrayByArray($dataYTotalIssuesLimited,$issues_list_UnsuccessfulFallback);
					$i=0;
					foreach($dataYTotalIssuesLimited as $total_temp):	
						$dataYTotalIssuesLimited_final[$i] =  $this->php_to_js_issues($total_temp);	
						$i++;
					endforeach;							
					$dataYTotalIssuesLimited_final =  $this->php_to_js_issues($dataYTotalIssuesLimited_final);
					$issues_list_UnsuccessfulFallback_pie =  $this->php_to_js_issues_piechart($issues_list_UnsuccessfulFallback);					
					
					$issues_list_UnsuccessfulFallback =  $this->php_to_js_issues_xaxis($issues_list_UnsuccessfulFallback);					
					$issues_list_UnsuccessfulFallback = $this->php_to_js_xaxis($issues_list_UnsuccessfulFallback);
					
					arsort($issues_list_final);	
					$dataYTotalIssues = $this->sortArrayByArray($dataYTotalIssues,$issues_list_final);				
					$i=0;
					foreach($dataYTotalIssues as $key=>$total_temp_full):
						$dataYTotalIssues_final[$i] =  $this->php_to_js_issues($total_temp_full);	
						$i++;
					endforeach;	
					$dataYTotalIssues_final =  $this->php_to_js_issues($dataYTotalIssues_final);
					$issues_list_final_pie =  $this->php_to_js_issues_piechart($issues_list_final);
					
					$issues_list_final =  $this->php_to_js_issues_xaxis($issues_list_final);
					$issues_list_final = $this->php_to_js_xaxis($issues_list_final);
					
					
					if($condition_wl != "")
					{
						$dataXWorkLoc =  $this->php_to_js_xaxis(array_keys($dataYTotalWorkLocReports));	
						$dataYTotalWorkLocReports =  $this->php_to_js($dataYTotalWorkLocReports);		
					}
					
					if($this->data['Graph']['customer_ir'] == '%')
					{
						arsort($totalcount_array);	
						$totalcount_array_pie =  $this->php_to_js_issues_piechart($totalcount_array);
						arsort($headcount_array);
						$headcount_array_pie =  $this->php_to_js_issues_piechart($headcount_array);
					}
			
				//***********************
				
				$this->set('dataYPercentage',$dataYPercentage);
				
				$this->set('dataYTotalReports',$dataYTotalReports);
				$this->set('dataYTotalSuccessReports',$dataYTotalSuccessReports);
				
				$this->set('dataYTotalUnsuccessfulFallbackReports',$dataYTotalUnsuccessfulFallbackReports);
				$this->set('dataYTotalCanceledRescheduledReports',$dataYTotalCanceledRescheduledReports);		
				
				
				$this->set('dataYTotalIssuesLimited_final',$dataYTotalIssuesLimited_final);
				$this->set('issues_list_UnsuccessfulFallback',$issues_list_UnsuccessfulFallback);
				$this->set('issues_list_UnsuccessfulFallback_pie',$issues_list_UnsuccessfulFallback_pie);
				
				$this->set('dataYTotalIssues_final',$dataYTotalIssues_final);	
				$this->set('issues_list_final',$issues_list_final);
				$this->set('issues_list_final_pie',$issues_list_final_pie);
					
				if($this->data['Graph']['customer_ir'] == '%')
				{
					$this->set('totalcount_array_pie',$totalcount_array_pie);
					$this->set('headcount_array_pie',$headcount_array_pie);
				}
				$this->set('dataX',$dataX);	
				
				
				
				$this->set('condition_wl',$condition_wl);				
				if($condition_wl != "")
				{
					$this->set('dataYTotalWorkLocReports',$dataYTotalWorkLocReports);
					$this->set('dataXWorkLoc',$dataXWorkLoc);
				}
				
						
				$this->set('total',$total);				
				$this->set('title',$title);				
				$this->set('customer',$this->data['Graph']['customer_ir']);	
				
				$this->render('generate');
				
			}
			elseif($this->data['Graph']['sh'] == 1)
			{
			
				//**************Success Rate Graph********************
				$complete = 0;
				$incomplete = 0;
				$query = "SELECT count(*) as count, Integration_Complete FROM exceldb.nic_work  WHERE ".$condition_sh." GROUP BY Integration_Complete";
				$count_result = mysql_query($query);
				while($myrow=mysql_fetch_array($count_result, MYSQL_NUM))
				{
					if($myrow[1] == 0)
						$incomplete = $myrow[0];
					else
						$complete = $myrow[0];
				}
				
				$jquerySuccessGraph = "[['Integration Complete (".$complete.")', ".$complete."],['Integration Incomplete (".$incomplete.")', ".$incomplete."]]";
				$total = $complete + $incomplete;
				$this->set('jquerySuccessGraph',$jquerySuccessGraph);
				$this->set('total',$total);
				
				//**************End of Success Rate Graph********************
				
				//**************Cases Graph********************
				$arr1 = array();
				$arr2 = array();
				$count1 = 0;
				$count2 = 0;
				$count3 = 0;
				$count4 = 0;
				$ActiSite = "(";
				$query1 = "SELECT Site,Activity FROM exceldb.nic_work WHERE Integration_Complete = 1 AND ".$condition_sh;							
				$count_result1 = mysql_query($query1);
				while($myrow1=mysql_fetch_array($count_result1, MYSQL_NUM))
				{
					$ActiSite .= "'".$myrow1[0]."-".$myrow1[1]."',";	
					array_push($arr1,$myrow1[0]."-".$myrow1[1]);
				}
				$ActiSite = substr($ActiSite, 0, strlen($ActiSite)-1);
				$ActiSite .= ")";
				
				$query2 = "SELECT CONCAT(Site,'-',Activity), count(*) as case_count FROM exceldb.nic_work WHERE ".$condition_sh." AND Integration_Complete = 0 and CONCAT(Site,'-',Activity) IN ".$ActiSite." GROUP BY Site";							
				$count_result2 = mysql_query($query2);	
				if($count_result2 != false)
				{
					while($myrow2=mysql_fetch_array($count_result2, MYSQL_NUM))
					{
						array_push($arr2,$myrow2[0]);
						if($myrow2[1] == 1)
							$count2++;
						elseif($myrow2[1] == 2)
							$count3++;
						elseif($myrow2[1] > 2)
							$count4++;
					}
				}
				$res = array_diff($arr1, $arr2);
				$count1 = count($res);
				
				$jqueryCasesGraph = "[['Best Case (".$count1.")', ".$count1."],['2 Attempts (".$count2.")', ".$count2."],['3 Attempts (".$count3.")', ".$count3."],['Worst Case (".$count4.")', ".$count4."]]";
				$this->set('jqueryCasesGraph',$jqueryCasesGraph);
				$this->set('total_complete',count($arr1));
				
				//**************End of Cases Graph********************
				
				
				/**************RSSI******************/
				
				$RSSI_Issues1 = 0;				
				$query3 = "SELECT COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh_issues." AND Integration_Complete = '0' AND (Activity = 'New Integration' OR Activity = 'New Integration (Iub over ATM)' OR Activity = 'New Integration (Iub over IP)')
				AND ((RSSI_Reading_Alpha_1st_Carrier <> '' AND RSSI_Reading_Alpha_1st_Carrier <> '0' AND RSSI_Reading_Alpha_1st_Carrier NOT BETWEEN '-101' AND '-108') OR  (RSSI_Reading_Beta_1st_Carrier <> '' AND RSSI_Reading_Beta_1st_Carrier <> '0' AND RSSI_Reading_Beta_1st_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Gamma_1st_Carrier <> '' AND RSSI_Reading_Gamma_1st_Carrier <> '0' AND RSSI_Reading_Gamma_1st_Carrier NOT BETWEEN '-101' AND '-108'))";
				$result3 = mysql_query($query3);				
				while($myrow3=mysql_fetch_array($result3, MYSQL_NUM))
				{
					$RSSI_Issues1 = $myrow3[0];
				}
				
				$RSSI_Issues2 = 0;
				$query4 = "SELECT COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh_issues." AND Integration_Complete = '0' AND (Activity = '2nd Carrier Add' OR Activity = '4th Carrier Add in 2nd Cabinet')
				AND ((RSSI_Reading_Alpha_1st_Carrier <> '' AND RSSI_Reading_Alpha_1st_Carrier <> '0' AND RSSI_Reading_Alpha_1st_Carrier NOT BETWEEN '-101' AND '-108') OR  (RSSI_Reading_Alpha_2nd_Carrier <> '' AND RSSI_Reading_Alpha_2nd_Carrier <> '0' AND RSSI_Reading_Alpha_2nd_Carrier NOT BETWEEN '-101' AND '-108'))
				OR ((RSSI_Reading_Beta_1st_Carrier <> '' AND RSSI_Reading_Beta_1st_Carrier <> '0' AND RSSI_Reading_Beta_1st_Carrier NOT BETWEEN '-101' AND '-108') OR  (RSSI_Reading_Beta_2nd_Carrier <> '' AND RSSI_Reading_Beta_2nd_Carrier <> '0' AND RSSI_Reading_Beta_2nd_Carrier NOT BETWEEN '-101' AND '-108'))
				OR ((RSSI_Reading_Gamma_1st_Carrier <> '' AND RSSI_Reading_Gamma_1st_Carrier <> '0' AND RSSI_Reading_Gamma_1st_Carrier NOT BETWEEN '-101' AND '-108') OR  (RSSI_Reading_Gamma_2nd_Carrier <> '' AND RSSI_Reading_Gamma_2nd_Carrier <> '0' AND RSSI_Reading_Gamma_2nd_Carrier NOT BETWEEN '-101' AND '-108'))";
				$result4 = mysql_query($query4);		
				while($myrow4=mysql_fetch_array($result4, MYSQL_NUM))
				{
					$RSSI_Issues2 = $myrow4[0];
				}
				
				
				$RSSI_Issues3 = 0;
				$query5 = "SELECT COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh_issues." AND Integration_Complete = '0' AND (Activity = '3rd Carrier Add' OR Activity = '3rd Carrier Add Cabinet Reconfiguration' OR Activity = '3rd Carrier Add Cable Crossover Solution' OR Activity = '3rd Carrier Add Split Power Configuration' OR Activity = '3rd Carrier Add using OBIF & RRUW' OR Activity = 'Add Sector' OR Activity = '4th Carrier Add Using OBIF & RRUW' OR Activity = '4th Carrier Add in 2nd Cabinet' OR Activity = 'Alarm / Status Check' OR Activity = 'Call Testing' OR Activity = 'Delete Sector' OR Activity = 'Troubleshooting')
				AND ((RSSI_Reading_Alpha_1st_Carrier <> '' AND RSSI_Reading_Alpha_1st_Carrier <> '0' AND RSSI_Reading_Alpha_1st_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Alpha_2nd_Carrier <> '' AND RSSI_Reading_Alpha_2nd_Carrier <> '0' AND RSSI_Reading_Alpha_2nd_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Alpha_3rd_Carrier <> '' AND RSSI_Reading_Alpha_3rd_Carrier <> '0' AND RSSI_Reading_Alpha_3rd_Carrier NOT BETWEEN '-101' AND '-108') 
				OR (RSSI_Reading_Beta_1st_Carrier <> '' AND RSSI_Reading_Beta_1st_Carrier <> '0' AND RSSI_Reading_Beta_1st_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Beta_2nd_Carrier <> '' AND RSSI_Reading_Beta_2nd_Carrier <> '0' AND RSSI_Reading_Beta_2nd_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Beta_3rd_Carrier <> '' AND RSSI_Reading_Beta_3rd_Carrier <> '0' AND RSSI_Reading_Beta_3rd_Carrier NOT BETWEEN '-101' AND '-108')
				OR (RSSI_Reading_Gamma_1st_Carrier <> '' AND RSSI_Reading_Gamma_1st_Carrier <> '0' AND RSSI_Reading_Gamma_1st_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Gamma_2nd_Carrier <> '' AND RSSI_Reading_Gamma_2nd_Carrier <> '0' AND RSSI_Reading_Gamma_2nd_Carrier NOT BETWEEN '-101' AND '-108') OR (RSSI_Reading_Gamma_3rd_Carrier <> '' AND RSSI_Reading_Gamma_3rd_Carrier <> '0' AND RSSI_Reading_Gamma_3rd_Carrier NOT BETWEEN '-101' AND '-108'))";
				$result5 = mysql_query($query5);		
				while($myrow5=mysql_fetch_array($result5, MYSQL_NUM))
				{
					$RSSI_Issues3 = $myrow5[0];
				}
				
				$Reason1_RSSI_Issues = $RSSI_Issues1 + $RSSI_Issues2 + $RSSI_Issues3;
				
				/**************End Of RSSI******************/
				
				$Alarms = 0;
				$query6 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh."
				AND (Antenna_System_Alarm_Alpha_1st_Carrier = 'Yes' OR Antenna_System_Alarm_Alpha_2nd_Carrier = 'Yes' OR Antenna_System_Alarm_Alpha_3rd_Carrier = 'Yes' 
				OR Antenna_System_Alarm_Beta_1st_Carrier = 'Yes' OR Antenna_System_Alarm_Beta_2nd_Carrier = 'Yes' OR Antenna_System_Alarm_Beta_3rd_Carrier = 'Yes'
				OR Antenna_System_Alarm_Gamma_1st_Carrier = 'Yes' OR Antenna_System_Alarm_Gamma_2nd_Carrier = 'Yes' OR Antenna_System_Alarm_Gamma_3rd_Carrier = 'Yes' OR Alarms = 'Yes')";
				$result6 = mysql_query($query6);		
				while($myrow6=mysql_fetch_array($result6, MYSQL_NUM))
				{
					$Alarms = $myrow6[0];
				}
				
				$TMA = 0;
				$query7 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh." 
				AND (TMA_Defined_System_Alpha_1st_Carrier = 'No' OR TMA_Defined_System_Alpha_2nd_Carrier = 'No' OR TMA_Defined_System_Alpha_3rd_Carrier = 'No' 
				OR TMA_Defined_System_Beta_1st_Carrier = 'No' OR TMA_Defined_System_Beta_2nd_Carrier = 'No' OR TMA_Defined_System_Beta_3rd_Carrier = 'No'
				OR TMA_Defined_System_Gamma_1st_Carrier = 'No' OR TMA_Defined_System_Gamma_2nd_Carrier = 'No' OR TMA_Defined_System_Gamma_3rd_Carrier = 'No')";
				$result7 = mysql_query($query7);		
				while($myrow7=mysql_fetch_array($result7, MYSQL_NUM))
				{
					$TMA = $myrow7[0];
				}
				
				/*******************Call Testing***************/
				$CallTesting = 0;
				$CallTesting_Incomplete = 0;
				$CallTesting_Various = 0;
				$query8 = "Select COUNT(*),Integration_Complete FROM exceldb.nic_work WHERE ".$condition_sh." 
				AND Method_of_Testing = 'Dummy Load' GROUP BY Integration_Complete";
				$result8 = mysql_query($query8);
				while($myrow8=mysql_fetch_array($result8, MYSQL_NUM))
				{
					if($myrow8[1] == 0)
						$CallTesting = $myrow8[0];
					else
						$CallTesting_Incomplete = $myrow8[0];
				}
				
				$query9 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh."  AND Integration_Complete = '0' 
				AND (Call_Test_Voice <> 'Yes' OR Call_Test_CS_Data <> 'Yes' OR Call_Test_PS_Data <> 'Yes' OR Call_Test_E911 <> 'Yes' OR Call_Test_611 <> 'Yes' OR Call_Test_411 <> 'Yes')";
				$result9 = mysql_query($query9);
				while($myrow9=mysql_fetch_array($result9, MYSQL_NUM))
				{					
					$CallTesting_Various = $myrow9[0];				
				}
				/*******************End of Call Testing***************/
				
				$IP_Connectivity = 0;
				$query10 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh." AND Integration_Complete = '0' 
			    AND IP_Connectivity = 'No'";
				$result10 = mysql_query($query10);
				while($myrow10=mysql_fetch_array($result10, MYSQL_NUM))
				{					
					$IP_Connectivity = $myrow10[0];				
				}
				
				$NTP = 0;
				$query11 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh." AND Integration_Complete = '0' 
			    AND NTP_Server_Ping = 'Not Pingable'";
				$result11 = mysql_query($query11);
				while($myrow11=mysql_fetch_array($result11, MYSQL_NUM))
				{					
					$NTP = $myrow11[0];				
				}
				
				$Baseline = 0;
				$query12 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh." AND Integration_Complete = '0' 
			    AND Baseline_Loaded = 'No'";
				$result12 = mysql_query($query12);
				while($myrow12=mysql_fetch_array($result12, MYSQL_NUM))
				{					
					$Baseline = $myrow12[0];				
				}
				
				$FTP = 0;
				$query13 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh." AND Integration_Complete = '0' 
			    AND FTP_Server_Ping = 'Not Pingable'";
				$result13 = mysql_query($query13);
				while($myrow13=mysql_fetch_array($result13, MYSQL_NUM))
				{					
					$FTP = $myrow13[0];				
				}
				
				$LKF = 0;
				$query14 = "Select COUNT(*) FROM exceldb.nic_work WHERE ".$condition_sh." AND Integration_Complete = '0' 
			    AND LKF_Loaded = 'No'";
				$result14 = mysql_query($query14);
				while($myrow14=mysql_fetch_array($result14, MYSQL_NUM))
				{					
					$LKF = $myrow14[0];				
				}		
				
				$issues = array(
						'RSSI Issues' => $Reason1_RSSI_Issues,
						'Alamrs' => $Alarms,
						'TMA Not Defined' => $TMA,
						'Call Testing on Dummy Load for Int Complete' => $CallTesting,
						'Call Testing on Dummy Load for Int Incomplete' => $CallTesting_Incomplete,
						'Call Testing Incomplete' => $CallTesting_Various,
						'No IP Connectivity' => $IP_Connectivity,
						'NTP Not Pingable' => $NTP,
						'FTP Not Pingable' => $FTP,
						'Baseline Not Loaded' => $Baseline,
						'LKF Not Loaded' => $LKF				
						);
				
				arsort($issues);
				$jqueryIssuesGraph = $this->php_to_js_issues_piechart($issues);
				$this->set('jqueryIssuesGraph',$jqueryIssuesGraph);
				$this->set('total_incomplete',$incomplete);				

				if($this->data['Graph']['region_sh'] == "%")
					$reg = "All";
				else
					$reg = $this->data['Graph']['region_sh'];
				
				$this->set('region',$reg);					
				$this->render('generate_sh');
				
				
			}
				
		}
		
		
		
			function php_to_js($input){
				$ret = "[";
				foreach($input as $element){
					$ret .= $element . ",";
				}
				$ret = substr($ret, 0, strlen($ret)-1);
				$ret .= "]";
				return $ret;
			}
			
			function php_to_js_xaxis($input){
				$ret = "['";
				foreach($input as $element){
					$ret .= $element . "','";
				}
				$ret = substr($ret, 0, strlen($ret)-3);
				$ret .= "']";
				return $ret;
			}
			
			function php_to_js_issues($input){				
				$ret = "[";
				foreach($input as $key=>$element){	
					$ret .= $element . ",";
				}
				$ret = substr($ret, 0, strlen($ret)-1);
				$ret .= "]";
				return $ret;
			}
			
			function php_to_js_issues_xaxis($input){
				$i=0;
				foreach($input as $element=>$value){
					$ret[$i] = $element."(".$value.")";
					$i++;
				}							
				return $ret;
			}
			
					
			function graph_add($input){
				$ret = "";
				foreach($input as $element){
					$ret += $element;
				}
				return $ret;
			}
			
			function sortArrayByArray($array,$orderArray) {
				$ordered = array();
				foreach($orderArray as $key=>$value) 
				{
					$ordered[$key] = $array[$key];
					unset($array[$key]);
				}
				return $ordered;
			}
			
			/*function php_to_js_piechart($input,$xaxis){
				$ret = "[";
				while ((list($key1, $val1) = each($input)) && (list($key2, $val2) = each($xaxis))){
					$ret .= "['".$val2."',".$val1."],";
				}
				$ret = substr($ret, 0, strlen($ret)-1);
				$ret .= "]";
				return $ret;
			}*/
			
			function php_to_js_issues_piechart($input){
				$ret = "[";
				foreach($input as $element=>$value){
					$ret .= "['".$element."(".$value.")',".$value."],";
				}		
				$ret = substr($ret, 0, strlen($ret)-1);
				$ret .= "]";
				return $ret;
			}
		
		

}
?>