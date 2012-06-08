<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/noc_reports/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'url' => array('plugin'=>'','controller' => 'noc_reports', 'action' => 'add')));
                echo __('Add Report');
            }
        ?>       
        <?php
           /* if (Authsome::check('/noc_reports/modify')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit Report", "title" => "Edit Report", 'url' => array('plugin'=>'','controller' => 'noc_reports', 'action' => 'premodify')));
                echo __('Edit Report');
            }*/
        ?>
		 <?php
            if (Authsome::check('/noc_reports/search')) {
                echo "<li>";
                echo $html->image('/img/search.png', array("alt" => "Search Report", "title" => "Search Report", 'style'=>'width:64px;','url' => array('plugin'=>'','controller' => 'noc_reports', 'action' => 'presearch')));
                echo __('Search Report');
            }
        ?>
		 <?php
            if (Authsome::check('/noc_reports/listall')) {
                echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'noc_reports', 'action' => 'listall')));
                echo __('List Reports');
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