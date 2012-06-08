 <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <fieldset>
    <h4>Email Addresses</h4>
    <?php
    echo $this->Form->input('email', array( "label"=>"Email Addresses", "type"=>"textarea", "div"=>array('class'=>'') ) );
    ?>
    <div>
      <?php  echo "NOTE:Please seperate the email addresses with a semicolon"; ?>
    </div>
 </fieldset>
