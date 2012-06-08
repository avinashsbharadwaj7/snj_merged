<h2><?php echo $trans->__("Login with your username and password"); ?></h2>
<?php echo $form->create('User', array('action' => 'login')); ?>
<?php echo $form->input("username", array('label' => $trans->__('username')))	?>
<?php echo $form->input("password",array("type"=>"password", 'label' => $trans->__('password'))) ?>
<?php echo $form->input('remember', array('label' => $trans->__('Remember me for 2 weeks'),'type' => 'checkbox')); ?>
<?php echo $form->submit($trans->__('Submit')); ?>
<?php echo $form->end(); ?>
<?php //if (Configure::read('SparkPlug.open_registration')): ?>
	<p><?php //echo $trans->__('Not registered yet?');?> <?php //echo $html->link($trans->__("Click Here"),"/users/register") ?></p>
<?php //endif;?>
<p><?php echo $html->link($trans->__("Forgot password?"), "/users/forgotPassword") ?></p>
<div class="qr-images"><?php echo $html->image('qr/pqr.png', array('style'=>'float:right;clear:both;width:130px'));?></div>