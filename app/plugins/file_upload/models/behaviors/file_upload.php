<?php
/**
  * Behavior for file uploads
  * 
  * Example Usage:
  *
  * @example 
  *   var $actsAs = array('FileUpload.FileUpload');
  *
  * @example 
  *   var $actsAs = array(
  *     'FileUpload.FileUpload' => array(
  *       'uploadDir'    => WEB_ROOT . DS . 'files',
  *       'fields'       => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size'),
  *       'allowedTypes' => array('pdf' => array('application/pdf')),
  *       'required'    => false,
  *       'unique' => false //filenames will overwrite existing files of the same name. (default true)
  *       'fileNameFunction' => 'sha1' //execute the Sha1 function on a filename before saving it (default false)
  *     )
  *    )
  *
  *
  * @note: Please review the plugins/file_upload/config/file_upload_settings.php file for details on each setting.
  * @version: since 6.1.0
  * @author: Nick Baker
  * @link: http://www.webtechnick.com
  */
App::import('Vendor', 'FileUpload.uploader');
require_once(dirname(__FILE__) . DS . '..' . DS . '..' . DS . 'config' . DS . 'file_upload_settings.php');
class FileUploadBehavior extends ModelBehavior {
  
  /**
    * Uploader is the uploader instance of class Uploader. This will handle the actual file saving.
    */
  var $Uploader = array();
  
  function setFileUploadOption(&$Model, $key, $value) {
    $this->options[$Model->alias][$key] = $value;
    $this->Uploader[$Model->alias]->setOption($key, $value);
  }
  
  /**
    * Setup the behavior
    */
  function setUp(&$Model, $options = array()){
    $FileUploadSettings = new FileUploadSettings();
    if(!is_array($options)){
      $options = array();
    }
    $this->options[$Model->alias] = array_merge($FileUploadSettings->defaults, $options);
        
    $uploader_settings = $this->options[$Model->alias];
    $uploader_settings['uploadDir'] = $this->options[$Model->alias]['forceWebroot'] ? WWW_ROOT . $uploader_settings['uploadDir'] : $uploader_settings['uploadDir']; 
    $uploader_settings['fileModel'] = $Model->alias;
    $this->Uploader[$Model->alias] = new Uploader($uploader_settings);
  }
 
  /**
    * beforeSave if a file is found, upload it, and then save the filename according to the settings
    *
    */
  function beforeSave(&$Model){
      //echo "ENTER save: " . $Model->data[$Model->alias] . "<br>";
    if(isset($Model->data[$Model->alias]['isCommitted'])) {
        //echo "beforeSave<BR>";
        return true;
    }
    if(isset($Model->data[$Model->alias][$this->options[$Model->alias]['fileVar']])){
      $file = $Model->data[$Model->alias][$this->options[$Model->alias]['fileVar']];
      $this->Uploader[$Model->alias]->file = $file;
      
      if($this->Uploader[$Model->alias]->hasUpload()){
        $fileName = $this->Uploader[$Model->alias]->processFile();
        if($fileName){
          $Model->data[$Model->alias][$this->options[$Model->alias]['fields']['name']] = $fileName;
          $Model->data[$Model->alias][$this->options[$Model->alias]['fields']['size']] = $file['size'];
          $Model->data[$Model->alias][$this->options[$Model->alias]['fields']['type']] = $file['type'];
          // delete the former upload if it exists
          if(isset($Model->data[$Model->alias]['origFileName'])) {
              @unlink($this->options[$Model->alias]['uploadDir'] . DS . $Model->data[$Model->alias]['origFileName']);
          }
        } else {
            //echo "Fail.. leaving save [0]<br><br>";
            $this->__clearTempFiles($file);
            return false; // we couldn't save the file, return false
        }
        unset($Model->data[$Model->alias][$this->options[$Model->alias]['fileVar']]);
      }
      else {
        unset($Model->data[$Model->alias]);
      }
    }
    //echo "Success.. leaving save<br><br>";
    return $Model->beforeSave();
  }
  
  
  
  /**
    * Updates validation errors if there was an error uploading the file.
    * presents the user the errors.
    */
  function beforeValidate(&$Model){
    //echo "ENTER validation: " . $Model->data[$Model->alias] . "<br>";
    // If a file has already been uploaded during a previous add, then the format will be
    // different, so account for it
    //var_dump($Model->data);
    if(isset($Model->data[$Model->alias]['isCommitted'])) {
        //echo "beforeValidate <BR>";
        return true;
    }
    if(isset($Model->data[$Model->alias][$this->options[$Model->alias]['fileVar']])){
      $file = $Model->data[$Model->alias][$this->options[$Model->alias]['fileVar']];
      $this->Uploader[$Model->alias]->file = $file;
      if($this->Uploader[$Model->alias]->hasUpload()){
        if($this->Uploader[$Model->alias]->checkFile() && $this->Uploader[$Model->alias]->checkType() && $this->Uploader[$Model->alias]->checkSize()){
          $Model->beforeValidate();
        }
        else {
           //echo "Fail.. leaving validation [0]<br>";
          $Model->validationErrors[$this->options[$Model->alias]['fileVar']] = $this->Uploader[$Model->alias]->showErrors();
        }
      }
      else {
        if(isset($this->options[$Model->alias]['required']) && $this->options[$Model->alias]['required']){
            //echo "Fail.. leaving validation [1]<br>";
            $Model->validationErrors[$this->options[$Model->alias]['fileVar']] = 'Select file to upload';
        }
      }
    }
    elseif(isset($this->options[$Model->alias]['required']) && $this->options[$Model->alias]['required']){
        //echo "Fail.. leaving validation [2]<br>";
        $Model->validationErrors[$this->options[$Model->alias]['fileVar']] = 'No File';
    }
    //echo "END.. leaving validation<br><br>";
    if(isset($file['tmp_name_prev'])) {
       $this->__clearTempFiles($file['tmp_name_prev']);
    }
    return $Model->beforeValidate();
  }
  
  /**
    * Automatically remove the uploaded file.
    */
  function beforeDelete(&$Model, $cascade){
    $Model->recursive = -1;
    $data = $Model->read();
    
    $this->Uploader[$Model->alias]->removeFile($data[$Model->alias][$this->options[$Model->alias]['fields']['name']]);
    return $Model->beforeDelete($cascade);
  }
  
  private function __clearTempFiles($src) {
      if(file_exists($src) && unlink($src)) {
          return true;
      }
      return false;
    }
  
}
?>