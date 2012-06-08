<h2>CDMA Report Functions</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if(Authsome::check('/cdmamasters/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'url' => array('plugin'=>'','controller' => 'cdmamasters', 'action' => 'add')));
                echo __('Add Report');
            }

           if(Authsome::check('/cdmamasters/edit')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit Report", "title" => "Edit Report", 'url' => array('plugin'=>'','controller' => 'cdmamasters', 'action' => 'edit')));
                echo __('Edit Report');
            }
            
            if(Authsome::check('/cdmamasters/search')) {
                echo "<li>";
                echo $html->image('/img/view32.png', array("alt" => "Search Report", "title" => "Search Report", 'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'cdmamasters', 'action' => 'search')));
                echo __('Search Report');
            }
            
        ?>
 </ul>
</ol>