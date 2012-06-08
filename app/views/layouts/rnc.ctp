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
	<title>
		<?php __('RNAM Operations - PQR | '); ?>
		<?php echo $title_for_layout; ?>
	</title>
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
				'permarinus_blue'
			));
		}else{
			echo $html->css(array(
				'../../plugins/bcp/vendors/css/permarinus_blue'
			));
		}
                ?>
            <!--[if lte IE 8]>
                    <style type="text/css">
                        #header {
                            background: #000033 url('');
                            border: 5px solid #fff;
                        }
                        #outer_header {
                            padding-right: 8px;
                        }
                        #footer {
                            background: #000033 url('');
                            border: 5px solid #fff;
                            height: 40px;
                        }
                        #outer_footer {
                            padding-right: 8px;
                        }
                        select {
                            width: auto;
                        }
                    </style>
                <![endif]-->
</head>
<body>
<div id="container">
    <div id="inner_container">
        <div id="outer_header">
            <div id="header">
                <div id="sitename"><?php echo 'RNAM Operations - PQR'; ?></div>
		<div id="mast"><?php
                                    if (Authsome::get()) {
					echo Authsome::get('username');
                                        echo $html->image('/img/dashboard.png', array("alt" => "Dashboard", "title" => "Dashboard", 'url' => array('controller' => 'users', 'action' => 'dashboard')));
					echo $html->image('/img/logoff.png', array("alt" => "Logout", "title" => "Logout", 'url' => array('controller' => 'users', 'action' => 'logout')));
                                    }else{
					echo $html->image('/img/login.png', array("alt" => "Login", "title" => "Login", 'url' => array('controller' => 'users', 'action' => 'login')));
                                    }
				?>
		</div>
            </div>
        </div>
	<div id="bcpMainMenuContainer"><?php //echo $databaseMenus->makeMenu($mainMenu); ?></div>
        <div id="content_container"><?php //echo $databaseMenus->breadcrumbs($breadcrumbs); ?>
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
        <div id="outer_footer">
            <div id="footer">
                <div id="footerbox"></div>
                <?php //echo $databaseMenus->makeMenu($mainMenu, 'up'); ?>
            </div>
        </div>
        <div id="page_exec_time">
            <?php
                printf(__('Page generated in %s seconds.', true), round(getMicrotime() - $GLOBALS['TIME_START'], 2));
            ?>
        </div>
    </div>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
