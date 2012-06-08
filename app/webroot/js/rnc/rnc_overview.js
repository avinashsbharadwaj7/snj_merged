var awesomeChart;
var awesomeOptions;
$(document).ready(function() {
   awesomeOptions = {
      chart: {
         renderTo: 'container',
         defaultSeriesType: 'bar'
      },
      title: {
         text: 'Stacked bar chart'
      },
      xAxis: {
         categories: ['Group 1', 'Group 2', 'Group 3', 'Group 4', 'Group 5', 'Group 6', 'Group 7', 'Group 8', 'Group 9', 'Group 10', 'Group 11-PC']
      },
      yAxis: {
         min: 0,
         title: {
            text: 'Total fruit consumption'
         }
      },
      legend: {
         backgroundColor: Highcharts.theme.legendBackgroundColorSolid || '#FFFFFF',
         reversed: true
      },
      tooltip: {
         formatter: function() {
            return ''+
                this.series.name +': '+ this.y +'';
         }
      },
      plotOptions: {
         series: {
            stacking: 'normal'
         }
      },
           series: [{
         name: 'John',
         data: [5, 3, 4, 7, 2]
      }, {
         name: 'Jane',
         data: [2, 2, 3, 2, 1]
      }, {
         name: 'Joe',
         data: [3, 4, 4, 2, 5]
      }]
   };
   jQuery.getJSON('getOverviewData', null, function(returnText) {
        console.log(returnText.started);
        awesomeOptions.series[0].data = returnText.started;
        awesomeOptions.series[1].data = returnText.inProgress;
        awesomeOptions.series[2].data = returnText.onHold;
        awesomeOptions.series[3].data = returnText.completed;
        awesomeOptions.series[4].data = returnText.cannotComplete;
        awesomeChart = new Highcharts.Chart(awesomeOptions);
    });
});