<?php
/* SVN FILE: $Id$ */
/**
 * Permarinus blue layout
 *
 * PHP version 5
 *
 * (C) Copyright 2009, Valerij Bancer (http://bancer.sourceforge.net)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Valerij Bancer
 * @link          http://www.bancer.net
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>	
        <?php
            e ($javascript -> link('prototype'));
            e ($javascript -> link('scriptaculous'));
        ?>
	<?php
		// If the user is logged in then create meta tags forbidding browser cache
		if($session->read('Auth.User.username') != 'anonymous'){
			echo $html->meta(array('http-equiv' => 'Cache-Control', 'content' => 'no-cache'));
			echo $html->meta(array('http-equiv' => 'Pragma', 'content' => 'no-cache'));
			echo $html->meta(array('http-equiv' => 'Expires', 'content' => 'Sat, 01-Jan-2000 00:00:00 GMT'));
		}
		echo $html->meta('icon');

		if(is_file(APP.'.htaccess')){
			echo $html->css(array(
				'css_menu',
				'bcp',
				'permarinus_blue'
			));
		}else{
			echo $html->css(array(
				'../../plugins/bcp/vendors/css/css_menu',
				'../../plugins/bcp/vendors/css/bcp',
				'../../plugins/bcp/vendors/css/permarinus_blue'
			));
		}

		// Hide left column if 'oneColumnLayout' was set in the controller action for specific view
		if(isset($oneColumnLayout)){ ?>
			<style type="text/css">
				#left {display: none}
				#content {width: 95%;}
			</style>
		<?php }
		if(is_file(APP.'.htaccess')){
			echo $javascript->link('bcp.js', true);
		}else{
			echo $javascript->link('../../plugins/bcp/vendors/js/bcp.js', true);
		}
		echo $scripts_for_layout;
	?>
</head>
<body>
<div id="container">
	<div id="inner_container">
		<div id="bcpMainMenuContainer">
		</div>
		<div id="content_container">
			<div id="content">				
				<?php echo $content_for_layout; ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
