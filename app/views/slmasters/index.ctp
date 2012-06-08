<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/slmasters/preadd')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'preadd')));
                echo __('Add Report');
            }
        ?>       
        <?php
            if (Authsome::check('/slmasters/preedit')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit Report", "title" => "Edit Report", 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'preedit')));
                echo __('Edit Report');
            }
        ?>
		 <?php
//            if (Authsome::check('/slmasters/search')) {
//                echo "<li>";
//                echo $html->image('/img/search.png', array("alt" => "Search Report", "title" => "Search Report", 'style'=>'width:64px;','url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'presearch')));
//                echo __('Search Report');
//            }
        ?>
            <?php
         /*   if (Authsome::check('/slmasters/view')) {
                echo "<li>";
                echo $html->image('/img/view32.png', array("alt" => "View Report", "title" => "View Report", 'style'=>'width:64px;','url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'preview')));
                echo __('View Report');
            }*/
        ?>
		 <?php
            if (Authsome::check('/slmasters/prelistall')) {
                echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'prelistall')));
                echo __('List Reports');
            }
        ?>
		<?php
            if (Authsome::check('/slmasters/excel')) {
                echo "<li>";
                echo $html->image('/img/excel.png', array("alt" => "Excel Report", "title" => "Excel Report", 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'slform')));
                echo __('Excel Report');
            }
        ?>
        <?php
            if (Authsome::check('/users/logout')) {
                echo "<li>";
                echo $html->image('/img/system-log-out-3.png', array("alt" => "Logout", "title" => "Logout", 'url' => array('controller' => 'users', 'action' => 'logout')));
                echo __('Logout');
            }
        ?>

    </ul>
</ol>