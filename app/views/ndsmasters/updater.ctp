<?php
    if(isset($this->data['Ndsmaster'])) {
        $key = key($this->data['Ndsmaster']);
        switch($showFields->display($key, $this->data['Ndsmaster'][$key])) {
            case 1:
                switch($key){
                    case "engineer_work_location":
                        echo $this->Form->input('Ndsmaster.work_location_remote', array('label'=>'-Please Specify'));
                        break;
                }
                break;
        }   
    }
    else if(isset($this->data['Ndssite'])) {
        // used for edits on site parameters
        $key = key($this->data['Ndssite']);
        echo $ndsComparison->display($this->data['Ndssite'][$key]);
    }
?>
