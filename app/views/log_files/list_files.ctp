<?php
if(!empty($files)){
    foreach($files as $file){
        echo $html->div('downloadable_links', $html->link($file['LogFile']['file_name'], array("action"=>"view", $file['LogFile']['id'])));
    }
}else{
    echo $html->div('status',"No Files uploaded");
}
?>