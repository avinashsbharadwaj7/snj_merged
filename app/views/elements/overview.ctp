<?php
/*
 * id: emoibhu
 * Name: Moiz Bhukhiya
 */
?>
<?php
echo $html->scriptStart();
?>
var groupDataUrl = "<?php echo $html->url(array("action"=>"getGroupData", $report_id));?>"
<?php
echo $html->scriptEnd();
e($javascript->link('Highcharts/js/highcharts.src'));
e($javascript->link('rnc/rnc-groups-overview'));
?>

    <?php
        echo $form->create("Overview");
        echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
        echo $form->input('report_number', array("type"=>"text", "readonly"=>"readonly", "value"=>displayField($thisData['RncReport']['report_number'])));
        echo $form->input('version', array("type"=>"text", "readonly"=>"readonly", "value"=>displayField($thisData['RncReport']['version'])));
    ?>
    <?php echo $form->end();?>

<div id="rnc-graphical-overview"></div>

<?php
function displayField($field){
    return (empty($field)) ? "NA" : $field;
}