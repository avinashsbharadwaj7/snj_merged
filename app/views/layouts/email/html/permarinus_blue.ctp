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
		<link rel="stylesheet" type="text/css" href="/JSCal2/css/jscal2.css" />
		<link rel="stylesheet" type="text/css" href="/JSCal2/css/border-radius.css" />
		<link rel="stylesheet" type="text/css" href="/JSCal2/css/gold/gold.css" />
		<script type="text/javascript" src="/JSCal2/js/jscal2.js"></script>
		<script type="text/javascript" src="/JSCal2/js/lang/en.js"></script>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Ericsson\'s IRT | '); ?>
		<?php echo $title_for_layout; ?>
	</title>
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
		<div id="header">
			<div id="sitename">
				<?php
				echo $html->link(__('Ericsson\'s IRT', true), '');
				?>
			</div>
			<div id="mast"><?php //echo $databaseMenus->auth_links('no_guest_login'); ?></div>
		</div>
		<div id="bcpMainMenuContainer">
			<?php //echo $databaseMenus->makeMenu($mainMenu); ?>
		</div>
		<div id="content_container">
			<?php //echo $databaseMenus->breadcrumbs($breadcrumbs); ?>
			<div id="content">
				<div class="bcp_act"><?php //echo $databaseMenus->makeMenu($extraMenu, 'extra'); ?></div>
				<?php
				echo $session->flash();
				echo $session->flash('auth');
				// multiple messages
				// TODO: make a helper or an element for multiple messages
				if($messages = $session->read('Message.multiFlash')){
					foreach($messages as $k => $v){
						echo $session->flash('multiFlash.'.$k);
					}
				}
				?>
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		<div id="footer">

			<div id="footerbox">
			</div>
			<?php //echo $databaseMenus->makeMenu($mainMenu, 'up'); ?>
		</div>
		<div id="page_exec_time">
			<?php
			printf(__('Page generated in %s seconds.', true), round(getMicrotime() - $GLOBALS['TIME_START'], 2));
			?>
		</div>
	</div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
