var awesomeChart;
var awesomeOptions;
$(document).ready(function() {
   awesomeOptions = {
      chart: {
         renderTo: 'rnc-graphical-overview',
         defaultSeriesType: 'column'
      },
      title: {
         text: 'RNC Integration Report'
      },
      subtitle: {
         text: 'Groups Overview'
      },
      colors: ['#89A54E', '#AA4643', '#4572A7', '#80699B'],
      xAxis: {
         categories: [
            'Group 1', 'Group 2', 'Group 3', 'Group 4', 'Group 5', 'Group 6', 'Group 7', 'Group 8', 'Group 9', 'Group 10', 'Group 11-PC'
         ],
         title: {
             text: "Groups"
         },
         offset: 15
      },
      yAxis: {
         title: {
            text: 'Count'
         }
      },
      credits: {
          enabled: false
      },
      legend: {
         layout: 'vertical',
         backgroundColor: '#FFFFFF',
         align: 'right',
         verticalAlign: 'top',
         x: -100,
         y: 50,
         floating: true,
         shadow: true
      },
      tooltip: {
         formatter: function() {
            return ''+
               this.series.name + ": " +this.y;
         }
      },
      plotOptions: {
         column: {
            dataLabels:{
                enabled: true
            }
         }
      },
      series: [{
         name: 'Yes',
         data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      }, {
         name: 'No',
         data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      }, {
         name: 'NA',
         data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      }, {
         name: 'No Answer',
         data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      }]
   };
   getGroupData();
});

function getGroupData(){
 if(jQuery("#OverviewReportId").val() !== "NYA"){
    jQuery.getJSON(groupDataUrl, null, function(returnText) {
            awesomeOptions.series[0].data = returnText.yes;
            awesomeOptions.series[1].data = returnText.no;
            awesomeOptions.series[2].data = returnText.na;
            awesomeOptions.series[3].data = returnText.noAnswer;
            awesomeChart = new Highcharts.Chart(awesomeOptions);
     });
 }
}

function updateGroupData(){
 if(jQuery("#OverviewReportId").val() !== "NYA"){
    jQuery.getJSON(groupDataUrl, null, function(returnText) {
            $.each(returnText.yes, function(index, value){
                awesomeChart.series[0].data[index].update(y=parseInt(returnText.yes[index]));
                awesomeChart.series[1].data[index].update(y=parseInt(returnText.no[index]));
                awesomeChart.series[2].data[index].update(y=parseInt(returnText.na[index]));
                awesomeChart.series[3].data[index].update(y=parseInt(returnText.noAnswer[index]));
            });
     });
 }
}

