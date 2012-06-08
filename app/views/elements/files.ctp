<?php
/* 
 * To upload all logs
 * Upload Logs
 */

?>
<fieldset>
<legend><?php __('Upload Log Files'); ?></legend>
<?php
echo $form->create('LogFile', array('type'=>'file', 'action'=>'add', 'id'=>'LogFileAddFormLog'));
echo $ajax->div('log_file_placeholder');
echo $logs->makeUploadedFilesHtml($report_id, 'log', 'general');
echo $ajax->divEnd('log_file_placeholder');
echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
echo $form->input('file_category', array("value"=>"log","div"=>array("style"=>"display:none;")));
echo $form->input('belongs_to', array("value"=>"general","div"=>array("style"=>"display:none;")));
echo $form->input('file',array('type'=>'file', 'label'=>'Upload File'));
echo $form->submit('Upload');
echo $form->end();
?>
</fieldset>
<fieldset>
<legend><?php __('Upload Kget Files'); ?></legend>
<?php
echo $form->create('LogFile', array('type'=>'file', 'action'=>'add', 'id'=>'LogFileAddFormKget'));
echo $ajax->div('kget_file_placeholder');
echo $logs->makeUploadedFilesHtml($report_id, 'kget', 'general');
echo $ajax->divEnd('kget_file_placeholder');
echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
echo $form->input('file_category', array("value"=>"kget","div"=>array("style"=>"display:none;")));
echo $form->input('belongs_to', array("value"=>"general","div"=>array("style"=>"display:none;")));
echo $form->input('file',array('type'=>'file', 'label'=>'Upload File'));
echo $form->submit('Upload');
echo $form->end();
?>
</fieldset>
<fieldset>
<legend><?php __('Upload Image Files'); ?></legend>
<?php
echo $form->create('LogFile', array('type'=>'file', 'action'=>'add', 'id'=>'LogFileAddFormImage'));
echo $ajax->div('image_file_placeholder');
echo $logs->makeUploadedFilesHtml($report_id, 'image', 'general');
echo $ajax->divEnd('image_file_placeholder');
echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
echo $form->input('file_category', array("value"=>"image","div"=>array("style"=>"display:none;")));
echo $form->input('belongs_to', array("value"=>"general","div"=>array("style"=>"display:none;")));
echo $form->input('file',array('type'=>'file', 'label'=>'Upload File'));
echo $form->submit('Upload');
echo $form->end();
?>
</fieldset>

<fieldset>
<legend><?php __('Upload QA Log Files'); ?></legend>
<?php
echo $form->create('LogFile', array('type'=>'file', 'action'=>'add', 'id'=>'LogFileAddFormQALog'));
echo $ajax->div('qa_log_file_placeholder');
echo $logs->makeUploadedFilesHtml($report_id, 'qa_log', 'general');
echo $ajax->divEnd('qa_log_file_placeholder');
echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
echo $form->input('file_category', array("value"=>"qa_log","div"=>array("style"=>"display:none;")));
echo $form->input('belongs_to', array("value"=>"general","div"=>array("style"=>"display:none;")));
echo $form->input('file',array('type'=>'file', 'label'=>'Upload File'));
echo $form->submit('Upload');
echo $form->end();
?>
</fieldset>

<?php
echo $ajax->div('upload_files_generic_placeholder', array('style'=>'display:none;'));
echo $form->create('LogFile', array('type'=>'file', 'action'=>'add', 'id'=>'LogFileAddFormGeneric'));
echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
echo $form->input('file_category', array("options"=>array("kget"=>"kget", "image"=>"image", "log"=>"log", "qa_log"=> "QA Logs"), "label"=>array("style"=>"width:150px", "text"=>"File Category")));
echo $form->input('belongs_to', array("value"=>"","div"=>array("style"=>"display:none;"), "id"=>"belongs_to_generic"));
echo $form->input('file',array('type'=>'file', "label"=>array("style"=>"width:150px", "text"=>"Upload File")));
echo $form->submit('Upload', array("div"=>array("style"=>"margin-left:0em;width:10px;")));
echo $form->end();
echo $ajax->divEnd('upload_files_generic_placeholder');
?>

<?php
echo $ajax->div('download_files_generic_placeholder', array('style'=>'display:none;'));
echo $form->create('LogFile', array('action'=>'list_files', 'id'=>'LogFileDownloadFormGeneric'));
echo $form->input('report_id', array("type"=>"text","class"=>"groups_report_id", "value"=>$report_id,"div"=>array("style"=>"display:none;")));
echo $form->input('belongs_to', array("value"=>"","div"=>array("style"=>"display:none;"), "id"=>"belongs_to_for_download"));
echo $form->end();
echo $ajax->div('download_files_content_placeholder');
echo $ajax->divEnd('download_files_content_placeholder');
echo $ajax->divEnd('download_files_generic_placeholder');
?>

