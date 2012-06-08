<body bgcolor='#2B547E'>
	
	
<li><?php echo $html->link("Back",array('action' => 'pregraphs') ); ?></li>

           <h3><u><b>Graphical Analysis</b></u></h3><br><br>
<?php
 //debug($headcount_array);
 //debug($headcount);

 ?>
<table border="4" bgcolor='red'>
		<?php //var_dump($color); ?>
		<script type="text/javascript">
			var j = jQuery.noConflict();				
			var chart;
			j(document).ready(function() {
				getChartSuccessRate('container1', <?php echo $dataYPercentage ?>, <?php echo $dataX ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');											
				getChartSuccessTrend('container2', <?php echo $dataYTotalReports ?>, <?php echo $dataYTotalSuccessReports ?>, <?php echo $dataYTotalUnsuccessfulFallbackReports ?>, <?php echo $dataYTotalCanceledRescheduledReports ?>, <?php echo $dataX ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');											
				getChartIssuesLimited('container3', <?php echo $issues_list_UnsuccessfulFallback ?>, <?php echo $dataYTotalIssuesLimited_final ?>,  <?php echo $dataX ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');										
				getChartIssuesLimitedPie('container6', <?php echo $issues_list_UnsuccessfulFallback_pie ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');										
				getChartIssuesTotal('container4', <?php echo $issues_list_final ?>, <?php echo $dataYTotalIssues_final ?>,  <?php echo $dataX ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');										
				getChartIssuesTotalPie('container7', <?php echo $issues_list_final_pie ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');										
				
				<?php if($condition_wl != "") { ?>
				getChartWorkLoc('container5', <?php echo $dataYTotalWorkLocReports ?>, <?php echo $dataXWorkLoc ?>, <?php echo $total ?>, '<?php echo $title ?>', '<?php if($customer == '%') echo "All Customers"; else echo $customer; ?>');											
				<?php } ?>
				
				<?php if($customer == "%") { ?>
				getChartTotalreportcountPie('container8', <?php echo $totalcount_array_pie ?>, <?php echo $total ?>, '<?php echo $title ?>');										
				getChartHeadcountPie('container9', <?php echo $headcount_array_pie ?>, <?php echo $total ?>, '<?php echo $title ?>');										
				<?php } ?>
			});
			
			
			function getChartSuccessRate(id, data, dataX, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						zoomType: 'y',
						spacingRight: 20,
						defaultSeriesType: 'column',
						shadow: true
					},
					title: {
						text: customer + ' - Success Rate For ' + title,
						margin: 60
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
						borderWidth: 1,
						backgroundColor: 'black'
					},
					 plotOptions: {
						series: {
							allowPointSelect: true,
							 borderColor: '#303030'
						}
					},	
					xAxis: {
						categories: dataX						
					},
					yAxis: {
						title: {
							text: 'Success Percentage'						
						},
						max: 100
					},
					tooltip: {
						formatter: function() {
				                return ''+
								this.x +': '+ this.y +' percent';
						}
					},
					credits: {
						enabled: false
					},
					colors: [
						'#00FF00'
					],		
					
					series: [{
						name: 'Success Percentage',
						data: data,
						dataLabels: {
								enabled: true,
								align: 'center',
								color: '#5CB3FF',
								rotation: -90,
								y: -20,
								style: {
										fontWeight:'bold',
										fontSize:'12px'
									},
								formatter: function() {
									if(this.y != 0)
										return this.y;
								}
							 }
					}]
				});
			}		
			
			
			
			function getChartSuccessTrend(id, data1, data2, data3, data4, dataX, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						zoomType: 'y',
						spacingRight: 20,
						defaultSeriesType: 'column',
						shadow: true
					},
					title: {
						text: customer + ' - Activity Result Trend For ' + title,
						margin: 30
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
						borderWidth: 1,
						backgroundColor: 'black'
					},
					 plotOptions: {
						series: {
							allowPointSelect: true,
							 borderColor: '#303030'
						}
					},					
					xAxis: {
						categories: dataX								
					},
					yAxis: {
						title: {
							text: 'Activity Result Trend'						
						}				
					},
					tooltip: {
						formatter: function() {
				                return ''+
								this.x +': '+ this.y +' reports';
						}
					},
					credits: {
						enabled: false
					},
					colors: [
						'#FF9900','#00FF00','#993399','red'
					],		
					
					series: [{
						name: 'Total Reports',
						data: data1,
						dataLabels: {
								enabled: true,
								rotation: -90,
								align: 'center',
								color: '#5CB3FF',
								y: -20,
								style: {
										fontWeight:'bold',
										fontSize:'8px'
									},
								formatter: function() {
									if(this.y != 0)
										return this.y;
								}
							 }
					},{
						name: 'Successful Reports',
						data: data2,
						dataLabels: {
								enabled: true,
								rotation: -90,
								align: 'center',
								color: '#5CB3FF',
								y: -20,
								style: {
										fontWeight:'bold',
										fontSize:'8px'
									},
								formatter: function() {
									if(this.y != 0)
										return this.y;
								}
							 }
					},{
						name: 'Unsuccessful/Fallback Reports',
						data: data3,
						dataLabels: {
								enabled: true,
								rotation: -90,
								align: 'center',
								color: '#5CB3FF',
								y: -20,
								style: {
										fontWeight:'bold',
										fontSize:'8px'
									},
								formatter: function() {
									if(this.y != 0)
										return this.y;
								}
							 }
					},{
						name: 'Canceled/Rescheduled Reports',
						data: data4,
						dataLabels: {
								enabled: true,
								rotation: -90,
								align: 'center',
								color: '#5CB3FF',
								y: -20,
								style: {
										fontWeight:'bold',
										fontSize:'8px'
									},
								formatter: function() {
									if(this.y != 0)
										return this.y;
								}
							 }
					}
					]
				});
			}		
	
			function getChartIssuesLimited(id, name_legend, data, dataX, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						zoomType: 'y',
						spacingRight: 20,
						defaultSeriesType: 'column'
					},
					title: {
						text: customer + ' - Issues Split-up for Fallbacks/Unsuccessful Activities ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
					layout: 'vertical',
					itemStyle: {
						color: 'white',
						fontSize: 7
					},
					 align: 'right',
					 x: -10,
					 verticalAlign: 'top',
					 y: 40,
					 floating: false,
					 backgroundColor: '#009999',
					 borderColor: '#CCC',
					 borderWidth: 1,
					 shadow: false,
					 itemHoverStyle: {
							color: '#000'
						}
				  },
					xAxis: {
						categories: dataX								
					},
					yAxis: {
						title: {
							text: 'Total issues'						
						},
						 stackLabels: {
							enabled: true,
							style: {
							   fontWeight: 'bold',
							   color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
							}
						 }
					},
					tooltip: {
						 formatter: function() {
							return '<b>'+ this.x +'</b><br/>'+
								this.series.name +': '+ this.y +'<br/>'+
								'Total: '+ this.point.stackTotal;
						 }
					  },
					 plotOptions: {
						 column: {
							stacking: 'normal'							
						 }
					  },
					 colors: [
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','orange','#64FF8C ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{
						name: name_legend[0],
						data: data[0]						
					},
					{
						name: name_legend[1],
						data: data[1]
					},
					{
						name: name_legend[2],
						data: data[2]						
					},
					{
						name: name_legend[3],
						data: data[3]
					},
					{
						name: name_legend[4],
						data: data[4]						
					},
					{
						name: name_legend[5],
						data: data[5]					
					},
					{
						name: name_legend[6],
						data: data[6]					
					},
					{
						name: name_legend[7],
						data: data[7]					
					},
					{
						name: name_legend[8],
						data: data[8]					
					},
					{
						name: name_legend[9],
						data: data[9]
					},
					{
						name: name_legend[10],
						data: data[10]
					},
					{
						name: name_legend[11],
						data: data[11]
					},
					{
						name: name_legend[12],
						data: data[12]
					},
					{
						name: name_legend[13],
						data: data[13]
					},
					{
						name: name_legend[14],
						data: data[14]
					},
					{
						name: name_legend[15],
						data: data[15]
					},
					{
						name: name_legend[16],
						data: data[16]
					},
					{
						name: name_legend[17],
						data: data[17]
					},
					{
						name: name_legend[18],
						data: data[18]
					},
					{
						name: name_legend[19],
						data: data[19]
					},
					{
						name: name_legend[20],
						data: data[20]
					},
					{
						name: name_legend[21],
						data: data[21]
					},
					{
						name: name_legend[22],
						data: data[22]
					},
					{
						name: name_legend[23],
						data: data[23]
					},
					{
						name: name_legend[24],
						data: data[24]
					},
					{
						name: name_legend[25],
						data: data[25]
					},
					{
						name: name_legend[26],
						data: data[26]
					},
					{
						name: name_legend[27],
						data: data[27]
					},
					{
						name: name_legend[28],
						data: data[28]
					},
					{
						name: name_legend[29],
						data: data[29]
					},
					{
						name: name_legend[30],
						data: data[30]
					},
					{
						name: name_legend[31],
						data: data[31]
					},
					{
						name: name_legend[32],
						data: data[32]
					},
					{
						name: name_legend[33],
						data: data[33]
					},
					{
						name: name_legend[34],
						data: data[34]
					},
					{
						name: name_legend[35],
						data: data[35]
					}			
					
					]
				});
			}
			
			function getChartIssuesLimitedPie(id, data, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: customer + ' - Issues Split-up for Fallbacks/Unsuccessful Activities ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
					layout: 'vertical',
					itemStyle: {
						color: 'white',
						fontSize: 7
					},
					 align: 'right',
					 x: -10,
					 verticalAlign: 'top',
					 y: 40,
					 floating: false,
					 backgroundColor: '#009999',
					 borderColor: '#CCC',
					 borderWidth: 1,
					 shadow: false,
					 itemHoverStyle: {
							color: '#000'
						}
				  },
					plotOptions: {
					 pie: {
						center: [350, 200],
						size: '60%',
						allowPointSelect: true,
						cursor: 'pointer',
						 dataLabels: {
							style: {
								fontSize:9
							},
						   enabled: true,
						   color: Highcharts.theme.textColor || '#000000',
						   connectorColor: Highcharts.theme.textColor || '#000000'
						},
						showInLegend: true
					 }
				  },					
					tooltip: {
						 formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
						 }
					  },
					 colors: [
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','orange','#64FF8C ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Issues Percentage',
							 data: data
					
					}]
				});
			}		
			
			
			
			
			function getChartIssuesTotal(id, name_legend, data, dataX, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						zoomType: 'y',
						spacingRight: 20,
						defaultSeriesType: 'column'
					},
					title: {
						text: customer + ' - Issues Split-up for All Unsuccessful Activities ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
					layout: 'vertical',
					itemStyle: {
						color: 'white',
						fontSize: 7
					},
					 align: 'right',
					 x: -10,
					 verticalAlign: 'top',
					 y: 40,
					 floating: false,
					 backgroundColor: '#009999',
					 borderColor: '#CCC',
					 borderWidth: 1,
					 shadow: false,
					 itemHoverStyle: {
							color: '#000'
						}
				  },
					xAxis: {
						categories: dataX								
					},
					yAxis: {
						title: {
							text: 'Total issues'						
						},
						 stackLabels: {
							enabled: true,
							style: {
							   fontWeight: 'bold',
							   color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
							}
						 }
					},
					tooltip: {
						 formatter: function() {
							return '<b>'+ this.x +'</b><br/>'+
								this.series.name +': '+ this.y +'<br/>'+
								'Total: '+ this.point.stackTotal;
						 }
					  },
					 plotOptions: {
						 column: {
							stacking: 'normal'							
						 }
					  },
					 colors: [
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','orange','#64FF8C ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{
						name: name_legend[0],
						data: data[0]						
					},
					{
						name: name_legend[1],
						data: data[1]
					},
					{
						name: name_legend[2],
						data: data[2]						
					},
					{
						name: name_legend[3],
						data: data[3]
					},
					{
						name: name_legend[4],
						data: data[4]						
					},
					{
						name: name_legend[5],
						data: data[5]					
					},
					{
						name: name_legend[6],
						data: data[6]					
					},
					{
						name: name_legend[7],
						data: data[7]					
					},
					{
						name: name_legend[8],
						data: data[8]					
					},
					{
						name: name_legend[9],
						data: data[9]
					},
					{
						name: name_legend[10],
						data: data[10]
					},
					{
						name: name_legend[11],
						data: data[11]
					},
					{
						name: name_legend[12],
						data: data[12]
					},
					{
						name: name_legend[13],
						data: data[13]
					},
					{
						name: name_legend[14],
						data: data[14]
					},
					{
						name: name_legend[15],
						data: data[15]
					},
					{
						name: name_legend[16],
						data: data[16]
					},
					{
						name: name_legend[17],
						data: data[17]
					},
					{
						name: name_legend[18],
						data: data[18]
					},
					{
						name: name_legend[19],
						data: data[19]
					},
					{
						name: name_legend[20],
						data: data[20]
					},
					{
						name: name_legend[21],
						data: data[21]
					},
					{
						name: name_legend[22],
						data: data[22]
					},
					{
						name: name_legend[23],
						data: data[23]
					},
					{
						name: name_legend[24],
						data: data[24]
					},
					{
						name: name_legend[25],
						data: data[25]
					},
					{
						name: name_legend[26],
						data: data[26]
					},
					{
						name: name_legend[27],
						data: data[27]
					},
					{
						name: name_legend[28],
						data: data[28]
					},
					{
						name: name_legend[29],
						data: data[29]
					},
					{
						name: name_legend[30],
						data: data[30]
					},
					{
						name: name_legend[31],
						data: data[31]
					},
					{
						name: name_legend[32],
						data: data[32]
					},
					{
						name: name_legend[33],
						data: data[33]
					},
					{
						name: name_legend[34],
						data: data[34]
					},
					{
						name: name_legend[35],
						data: data[35]
					}			
					
					]
				});
			}
			
			function getChartIssuesTotalPie(id, data, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: customer + ' - Issues Split-up for All Unsuccessful Activities ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
					layout: 'vertical',
					itemStyle: {
						color: 'white',
						fontSize: 7
					},
					 align: 'right',
					 x: -10,
					 verticalAlign: 'top',
					 y: 40,
					 floating: false,
					 backgroundColor: '#009999',
					 borderColor: '#CCC',
					 borderWidth: 1,
					 shadow: false,
					 itemHoverStyle: {
							color: '#000'
						}
				  },
					plotOptions: {
					 pie: {
						center: [390, 200],
						size: '60%',
						allowPointSelect: true,
						cursor: 'pointer',
						 dataLabels: {
							style: {
								fontSize:9
							},
						   enabled: true,
						   color: Highcharts.theme.textColor || '#000000',
						   connectorColor: Highcharts.theme.textColor || '#000000'
						},
						showInLegend: true
					 }
				  },					
					tooltip: {
						 formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
						 }
					  },
					 colors: [
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','orange','#64FF8C ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Issues Percentage',
							 data: data
					
					}]
				});
			}		

			function getChartWorkLoc(id, data, dataX, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						zoomType: 'y',
						spacingRight: 20,
						defaultSeriesType: 'column',
						shadow: true
					},
					title: {
						text: customer + ' - Work Location Split up For ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
						borderWidth: 1,
						backgroundColor: 'black'
					},
					 plotOptions: {
						series: {
							allowPointSelect: true,
							 borderColor: '#303030'
						}
					},		
					xAxis: {
						categories: dataX								
					},
					yAxis: {
						title: {
							text: 'Number of Reports'						
						}				
					},
					tooltip: {
						formatter: function() {
				                return ''+
								this.x +': '+ this.y +' reports';
						}
					},
					credits: {
						enabled: false
					},
					colors: [
						'#333366'
					],		
					
					series: [{
						name: 'Work Locations',
						data: data,
						dataLabels: {
								enabled: true,
								align: 'center',
								color: '#5CB3FF',
								style: {
										fontWeight:'bold',
										fontSize:'12px'
									},
								formatter: function() {
									if(this.y != 0)
										return this.y;
								}
							 }
					}]
				});
			}

			function getChartTotalreportcountPie(id, data, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Customer Split-up on Total reports for ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
					layout: 'vertical',
					itemStyle: {
						color: 'white',
						fontSize: 10
					},
					 align: 'right',
					 x: -10,
					 verticalAlign: 'top',
					 y: 40,
					 floating: false,
					 backgroundColor: '#009999',
					 borderColor: '#CCC',
					 borderWidth: 1,
					 shadow: false,
					 itemHoverStyle: {
							color: '#000'
						}
				  },
					plotOptions: {
					 pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						 dataLabels: {
						   enabled: true,
						   color: Highcharts.theme.textColor || '#000000',
						   connectorColor: Highcharts.theme.textColor || '#000000'
						},
						showInLegend: true
					 }
				  },					
					tooltip: {
						 formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
						 }
					  },
					 colors: [
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','orange','#64FF8C ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Report Count Percentage',
							 data: data
					
					}]
				});
			}		
			
			function getChartHeadcountPie(id, data, total, title, customer){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Customer Split-up on Total Resource Count for ' + title
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
					},
					legend: {
					layout: 'vertical',
					itemStyle: {
						color: 'white',
						fontSize: 10
					},
					 align: 'right',
					 x: -10,
					 verticalAlign: 'top',
					 y: 40,
					 floating: false,
					 backgroundColor: '#009999',
					 borderColor: '#CCC',
					 borderWidth: 1,
					 shadow: false,
					 itemHoverStyle: {
							color: '#000'
						}
				  },
					plotOptions: {
					 pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						 dataLabels: {
						   enabled: true,
						   color: Highcharts.theme.textColor || '#000000',
						   connectorColor: Highcharts.theme.textColor || '#000000'
						},
						showInLegend: true
					 }
				  },					
					tooltip: {
						 formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
						 }
					  },
					 colors: [
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','orange','#64FF8C ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Head Count Percentage',
							 data: data
					
					}]
				});
			}		
			
			
		</script>
		
		<!-- 3. Add the container -->
		<div id="container1" style="width: 900px; height: 550px; margin: 0 auto"></div>
		<div id="container2" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>
		<div id="container3" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>
		<div id="container6" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>
		<div id="container4" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>
		<div id="container7" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>		
		
		<?php if($condition_wl != "") { ?>
		<div id="container5" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div> 
		<?php } ?>
		
		<?php if($customer == "%") { ?>
		<div id="container8" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>
		<div id="container9" style="width: 900px; height: 550px; margin: 0 auto; margin-top:50px;"></div>
		<?php } ?>
		
	</table>
</body>		
