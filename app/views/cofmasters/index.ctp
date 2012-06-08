<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
    <ul class="bcp_home">
        <?php
        if (Authsome::check('/cofmasters/add')) {
            echo "<li>";
            echo $html->image('/img/db_add-2.png', array("alt" => "Add", "title" => "Add", 'url' => array('plugin' => '', 'controller' => 'cofmasters', 'action' => 'add')));
            echo __('Add');
        }
        ?>      
         <?php
        if (Authsome::check('/cofmasters/preedit')) {
            echo "<li>";
            echo $html->image('/img/db_comit-2.png', array("alt" => "Edit", "title" => "Edit", 'url' => array('plugin' => '', 'controller' => 'cofmasters', 'action' => 'preedit')));
            echo __('Edit');
        }
        ?>      
         <?php
        if (Authsome::check('/cofmasters/search')) {
            echo "<li>";
            echo $html->image('/img/search.png', array("alt" => "Search", "title" => "Search", 'url' => array('plugin' => '', 'controller' => 'cofmasters', 'action' => 'search')));
            echo __('Search');
        }
        ?>      
    </ul>
</ol>
