var awesomeChart;
var awesomeOptions;
$(document).ready(function() {
   var awesomeOptions = {
      chart: {
         renderTo: 'rnc-graphical-overview',
         defaultSeriesType: 'column'
      },
      title: {
         text: 'RNC Integration Reporting'
      },
      subtitle: {
         text: 'Region Wise: Graphical Overview'
      },
      xAxis: {
         categories: [
            'North Central', 'South Central', 'North East', 'South East', 'North West', 'South West'
         ]
      },
      yAxis: {
         min: 0,
         title: {
            text: 'Count'
         }
      },
      colors: [
        '#24CBE5' , '#058DC7', '#ED561B', '#50B432', "RED"
      ],
      legend: {
         backgroundColor: '#FFFFFF',
         align: 'left',
         verticalAlign: 'top',
         x: 100,
         y: 50,
         floating: true,
         shadow: true
      },
      tooltip: {
         formatter: function() {
            return ''+
               this.x +': '+ this.y;
         }
      },
      plotOptions: {
         column: {
            pointPadding: 0.2,
            borderWidth: 0
         }
      },
           series: [{
         name: 'Started',
         data: [0, 0, 0, 0, 0, 0]
      }, {
         name: 'In Progress',
         data: [0, 0, 0, 0, 0, 0]
      }, {
         name: 'On Hold',
         data: [0, 0, 0, 0, 0, 0]
      }, {
         name: 'Completed',
         data: [0, 0, 0, 0, 0, 0]
      }, {
         name: 'Cannot Completed',
         data: [0, 0, 0, 0, 0, 0]
      }]
   };

    jQuery.getJSON('getChartData', null, function(returnText) {
        console.log(returnText.started);
        awesomeOptions.series[0].data = returnText.started;
        awesomeOptions.series[1].data = returnText.inProgress;
        awesomeOptions.series[2].data = returnText.onHold;
        awesomeOptions.series[3].data = returnText.completed;
        awesomeOptions.series[4].data = returnText.cannotComplete;
        awesomeChart = new Highcharts.Chart(awesomeOptions);
    });
});

