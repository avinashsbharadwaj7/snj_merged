 <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <fieldset>
    <h4>Problem Description</h4>
    <?php
      echo $this->Form->input('problem_decription', array( "label"=>"Problem Description", "type"=>"textarea", "div"=>array('class'=>'') ) );
    ?>
 </fieldset>
