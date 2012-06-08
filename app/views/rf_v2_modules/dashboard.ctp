<?php echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp')); ?>
<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
    <ul class="bcp_home">
        <?php
        if (Authsome::check('/rf_v2_modules/add')) {
            echo "<li>";
            echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'add')));
            echo __('Add Report');
        }
        ?>
        <?php
        if (Authsome::check('/rf_v2_modules/edit')) {
            echo "<li>";
            echo $html->image('/img/db_comit-2.png', array("alt" => "Edit Report", "title" => "Edit Report", 'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'edit')));
            echo __('Edit Report');
        }
        ?>
        <?php
        if (Authsome::check('/rf_v2_modules/index')) {
            echo "<li>";
            echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports", 'style' => 'width:64px;', 'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'index')));
            echo __('List Reports');
        }
        ?>
        <?php
        if (Authsome::check('/rf_v2_modules/search')) {
            echo "<li>";
            echo $html->image('/img/view32.png', array("alt" => "Search (Export)", "title" => "Search (Export)", 'style' => 'width:64px;', 'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'search')));
            echo __('Search (Export)');
        }
        ?>
        <?php
        if (Authsome::check('/rf_v2_modules/import')) {
            echo "<li>";
            echo $html->image('/img/ingest64.png', array("alt" => "Import (Ingest)", "title" => "Import (Ingest)", 'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'import')));
            echo __('Import (Ingest)');
        }
        ?>
        <?php
        if (Authsome::check('/users/logout')) {
            echo "<li>";
            echo $html->image('/img/system-log-out-3.png', array("alt" => "Logout", "title" => "Logout", 'url' => array('controller' => 'users', 'action' => 'logout')));
            echo __('Logout');
        }
        ?>
        <?php
        if (Authsome::check('/rf_v2_modules/download_file')) {
            echo "<li>";
            echo $html->image('/img/helpabout64.png', array("alt" => "Help", "title" => "Help", 'style' => 'width:70px;',
                'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'download_file', "PQR_RF_Module_Starter_Guide.ppt")));
            echo __('Help (PPT)');
        }
        ?>
        <?php
        if (Authsome::check('/rf_v2_modules/download_file')) {
            echo "<li>";
            echo $html->image('/img/excel.png', array("alt" => "Template", "title" => "Template", 'style' => 'width:70px;',
                'url' => array('plugin' => '', 'controller' => 'rf_v2_modules', 'action' => 'templates')));
            echo __('Template (XLS)');
        }
        ?>
    </ul>
</ol>
