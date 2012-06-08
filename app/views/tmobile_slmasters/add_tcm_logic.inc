<?php
$tcm_temp_C = null;
$tcm_temp_E = null;
$tcm_temp_W = null;

foreach ($tcm_fields as $tcm):
    $tcm_region = $tcm['TcmTmobileUser'];
    $tcm = $tcm['User'];    
    
    $tcm['last_name'] = trim($tcm['last_name']);
    $tcm['first_name'] = trim($tcm['first_name']);
    if (empty($tcm['last_name']))
        $display = $tcm['first_name'] . '(' . $tcm['username'] . ')';
    else
        $display = $tcm['first_name'] . ' ' . $tcm['last_name'] . '(' . $tcm['username'] . ')';
    
    if ($tcm_region['region'] == 'South' || $tcm_region['region'] == 'India' || $tcm_region['region'] == 'Mexico') {
    $tcm_temp_C[$display] = $display;
    }
    if ($tcm_region['region'] == 'East' || $tcm_region['region'] == 'India' || $tcm_region['region'] == 'Mexico') {
        $tcm_temp_E[$display] = $display;
    }
    if ($tcm_region['region'] == 'West' || $tcm_region['region'] == 'India' || $tcm_region['region'] == 'Mexico') {
        $tcm_temp_W[$display] = $display;
    }
endforeach;
?>