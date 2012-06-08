<body bgcolor='#2B547E'>
	
	
<li><?php echo $html->link("Back",array('action' => 'pregraphs') ); ?></li>

           <h3><u><b>Graphical Analysis - Site Handler (Data until May 5th 2011 only)</b></u></h3><br><br>
<table border="4" bgcolor='red'>
		<?php //var_dump($color); ?>
		<script type="text/javascript">
			var j = jQuery.noConflict();				
			var chart;
			j(document).ready(function() {
				getChartSuccessRate('container1', <?php echo $jquerySuccessGraph ?>, <?php echo $total ?>, '<?php echo $region ?>');											
				getChartCases('container2', <?php echo $jqueryCasesGraph ?>, <?php echo $total_complete ?>, '<?php echo $region ?>');											
				getChartIssues('container3', <?php echo $jqueryIssuesGraph ?>, <?php echo $total_incomplete ?>, '<?php echo $region ?>');											
					
			});
			
			
			function getChartSuccessRate(id, data, total, region){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Integration Complete vs Incomplete For Region - ' + region
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
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
						'green','red'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Success Percentage',
							 data: data
					
					}]
				});
			}		
			
			
			function getChartCases(id, data, total, region){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Number of Attempts for Integrations For Region - ' + region
					},
					subtitle: {
						text: '(Total Reports - ' + total + ' )'
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
						'blue','yellow','#990099','green'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Attempts Percentage',
							 data: data
					
					}]
				});
			}		
			
			function getChartIssues(id, data, total, region){
					chart = new Highcharts.Chart({
					chart: {
						renderTo: id,
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Reasons For Integration Incomplete For Region - ' + region
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
					 y: 20,
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
						'red','#00FF00','yellow','#990099','green','#66CC99','#6699CC','#648CA0','blue','#CC0099','#64FF8C','orange ','pink','#FF784B','#FFCCCC','#999999','#999900','#FFFFCC','#FFFF66','#996666','#99FFCC','aquamarine','#993300','#7395b0','#336699','chartreuse','#339999','maroon','springgreen','deepskyblue','salmon','goldenrod','brown','#CCFFCC','#FFCC00','#666666'
					],
					series: [{							 
							 
						type: 'pie',
							 name: 'Issues Percentage',
							 data: data
					
					}]
				});
			}		
			
		</script>
		
		<!-- 3. Add the container -->
		<div id="container1" style="width: 800px; height: 450px; margin: 0 auto"></div>
		<div id="container2" style="width: 800px; height: 450px; margin: 0 auto; margin-top:50px;"></div>
		<div id="container3" style="width: 800px; height: 450px; margin: 0 auto; margin-top:50px;"></div>

	</table>
</body>		
