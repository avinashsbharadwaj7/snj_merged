<?php
echo $html->css(array('rnc/style','rnc/jquery-ui','rnc/view','rnc/css_menu'));
echo $html->css('rnc/jquery.fastconfirm');
echo $html->css('rnc/jquery.jgrowl');
echo $html->css('rnc/bcp');
?>
<h2><?php echo __('Welcome!'); ?></h2>
<ol>
       <ul class="bcp_home">
        <?php
            echo "<li>";
            echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'add')));
            echo __('Add Report');
        ?>
        <?php
            echo "<li>";
            echo $html->image('/img/db_comit-2.png', array("alt" => "Edit Report", "title" => "Edit Report", 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'edit')));
            echo __('Edit Report');
        ?>
        <?php
            echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'listAll')));
                echo __('List Reports');
        ?>
        <?php
            echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List My Reports", "title" => "List My Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'listMyReports')));
                echo __('List My Reports');
        ?>
        <?php
            echo "<li>";
                echo $html->image('/img/view-pim-tasks64.png', array("alt" => "QA Pool", "title" => "QA Pool",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'qaPool')));
                echo __('QA Pool');
        ?>
        <?php
            echo "<li>";
                echo $html->image('/img/view-pim-tasks64.png', array("alt" => "My QA Pool", "title" => "My QA Pool",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'myQaPool')));
                echo __('MY QA Pool');
        ?>
        <?php
            echo "<li>";
                echo $html->image('/img/warning.png', array("alt" => "Issues", "title" => "Issues",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_issues', 'action' => 'index')));
                echo __('RNC Integration Issues');
        ?>
         <?php
            echo "<li>";
                echo $html->image('/img/graphs.png', array("alt" => "Graphical Overview", "title" => "Graphical Overview",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'graphicalOverview')));
                echo __('Graphical Overview');
        ?>
    </ul>
</ol>