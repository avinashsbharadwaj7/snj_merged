<?php
var_dump($params);
if(file_exists($params['path'])){
    header("Content-Type: {$params['mimeType']}");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename={$params['name']}");
    header("Content-Transfer-Encoding: binary ");
    header('Content-Length: ' . $params['fileSize']);
    ob_clean();
    flush();
    readfile($param['path']);
    exit;
}

?>