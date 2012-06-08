<?php
/**
 * Description of logs
 *
 * @author emoibhu
 * @name Moiz Bhukhiya
 */
class LogsHelper extends Helper {

    public $helpers = array('Html', 'Session', 'Form', 'Javascript', 'Ajax');
    private $__type = null;
    private $__id = null;
    private $__name = null;


    function makeUploadedFilesHtml($report_id, $category, $belongsTo){
        if($report_id == 'NYA' || empty ($report_id)){
            return;
        }
        if(!empty($report_id)){
            $retHtml = null;
            App::import('model', 'LogFile');
            $logFiles = new LogFile();
            $files = $logFiles->getFiles($report_id, $category, $belongsTo);
            if(!$files || empty($files)){
                $retHtml .= $this->Html->div('no_files', 'No Files uploaded Yet');
            }else{
                foreach($files as $file){
                    $retHtml .= $this->Html->div('files_list', 
                            $this->Html->link($file['LogFile']['file_name'], '/log_files/view/'.$file['LogFile']['id']).
                            $this->Html->link('delete', '/log_files/delete/'.$file['LogFile']['id'], array("class"=>"delete_file")));
                }
            }
            return $retHtml;
        }
    }
}
?>
