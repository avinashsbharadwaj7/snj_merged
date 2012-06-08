


<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>

<fieldset>
    <legend>Feedback</legend>
<?php
echo $this->Form->create('Feedback', array("class"=>"form"));

echo $this->Form->input('comments',
                                array(
                                    //'options' => '',
                                    'label'=>'Comments',
                                    //'type'=>'date',
                                   // 'div'=>array('style'=>'display:none'),

                                   // 'legend'=>'Project Description'
                                    )
                                );
echo $this->Form->end(__('Submit', true));

?>
</fieldset>