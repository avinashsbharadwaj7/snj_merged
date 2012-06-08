<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<fieldset>
    <legend><?php __('Site Integration Status'); ?></legend>
<?php
    echo $this->Form->input('Litmaster.site_integrated',
                                array(
                                    'options' => $databaseFields->getOptions('yes_no_only', '4', false),
                                    'type'=>'select','div' => array(
                                    'class'=>'input text required')
                                    )
                                );
?>
</fieldset>
