<?php
echo $html->css(array('rnc/style','rnc/jquery-ui','rnc/view','rnc/css_menu'));
echo $html->css('rnc/bcp');
e($javascript->link('rnc/jquery-1.4.1.min'));
e($javascript->link('Highcharts/js/highcharts.src'));
e($javascript->link('rnc/jquery.blockUI'));
?>
<style>
    .container{
        margin: 20px;
    }
</style>
<script type="text/javascript">
var markets = <?php echo json_encode($returnJSON);?>;
var marketCharts = [];
var results = <?php echo json_encode($results); ?>;
function getOptions(container, titleText){
   return {
      chart: {
         renderTo: container,
         defaultSeriesType: 'column',
         spacingRight: 20,
         shadow: true
      },
      title: {
         text: titleText
      },
      subtitle: {
         text: 'Source: PQR Tool'
      },
      xAxis: {
          categories: ['<?php echo implode("','",$activities);?>'],
          labels: {
              enabled: false
          }
      },
      yAxis: {
         min: 0,
         title: {
            text: 'Count'
         }
      },
      stackLabels: {
          enabled: true,
          style: {
              color : 'black'
          }
      },
      colors: ['#89A54E', '#AA4643', '#4572A7', '#80699B'],
      legend: {
         backgroundColor: 'white',
         align: 'right',
         x: -100,
         verticalAlign: true,
         y: 20,
         floating: true,
         borderColor: '#CCC',
         borderWidth: 1,
         shadow: false
      },
      tooltip: {
         formatter: function() {
            return 'SOW:'+ this.x+'<br/>'+
                this.series.name +': '+ this.y +'<br/>'+
                'Total: ' + this.point.stackTotal;
         }
      },
      plotOptions: {
         column: {
             stacking: 'normal',
             dataLabels: {
                enabled: true,
                color: 'white'
             }
         }
      },
      credits:{
          enabled: false
      },
      exporting:{
          enabled: true
      },
      series: [
          <?php
          foreach($results as $result){
              $out[] = "{name:'".$result."'}";
          }
          echo implode(",", $out);
          ?>]
   }
}

function loadChart(){
    $.each(markets, function(index, market){
        paintChart(index, market)
    });
}

function paintChart(index, market){
    if(market == null){
        market = markets[index];
    }
    try{
            var options = getOptions("div_"+index, "Market: "+ market.name);
            for(i = 0; i < results.length; i++){
                options.series[i].data = market[i];
            }
            new Highcharts.Chart(options);
        }
        catch(error){
            console.log(error);
            alert("Following error occurred: " + error.description);
        }
}

function cleanString(inputString){
    return inputString.replace(/[^A-Za-z0-9]/g, '');
}
$(document).ready(function(){
    $.blockUI({
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        },
        message:'Painting in progress...It may take upto one minute..'
    });
    if($.browser.msie){
        $.unblockUI();
        var links = "<div>Please click on the following links to generate the graph.</div>";
        $.each(markets, function(index, market){
            links += "<div><a href='javascript:paintChart(\""+index+"\")'>"+market.name+"</a></div>";
        });
        $("#div_ie_links").html(links);
    }else{
        setTimeout("loadChart()", 200);
        setTimeout("$.unblockUI()", 10000);
    }
});
</script>
<?php
echo $this->Html->div('container', '', array('id' => 'div_ie_links'));
foreach($returnJSON as $key => $data){
  echo $this->Html->div('container', '', array('id' => 'div_'.$key));
}
?>
