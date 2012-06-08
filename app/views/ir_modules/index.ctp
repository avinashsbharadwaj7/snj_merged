<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/ir_modules/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'add')));
                echo __('Add Report');
            }
        ?>
        <?php
            if (Authsome::check('/ir_modules/listall')) {
                echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'listall')));
                echo __('List Reports');
            }
        ?>
        <?php 
            if (Authsome::check('/ir_modules/search')) {
                echo "<li>";
                echo $html->image('/img/view32.png', array("alt" => "Search Reports", "title" => "Search Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'search')));
                echo __('Search Reports');
            }
        ?>
           
        <?php
        
            if (Authsome::check('/ir_modules/edit')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit Report", "title" => "Edit Report", 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'edit')));
                echo __('Edit Report');
                
            }
        ?>
           
        <?php
        
            if (Authsome::check('/ir_modules/uploadexcelrecords')) {
                echo "<li>";
                echo $html->image('/img/Actions-arrow-up-top-icon.png', array("alt" => "Upload Excel Records", "title" => "Upload Excel Records", 'url' => array('plugin'=>'','controller' => 'uploadexcelrecords', 'action' => 'uploadrecords')));
                echo __('Upload Excel<br>Records');
            }
        ?>
           
        <?php
          /*  if (Authsome::check('/ir_modules/delete')) {
                echo "<li>"; 9722344473
                echo $html->image('/img/db_remove-2.png', array("alt" => "Delete Report", "title" => "Delete Report", 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'delete')));
                echo __('Delete Report');
            }*/
        ?>
        <?php
           if (Authsome::check('/users/logout')) {
                echo "<li>";
                echo $html->image('/img/system-log-out-3.png', array("alt" => "Logout", "title" => "Logout", 'url' => array('controller' => 'users', 'action' => 'logout')));
                echo __('Logout');
            } 
        ?>
           
        <?php
           /* if (Authsome::check('/ir_modules/irexcel')) {
                echo "<li>";
                echo $html->image('/img/excel.png', array("alt" => "Excel Report", "title" => "Excel Report", 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'irexcel')));
                echo __('Excel Report');
            }*/
        ?>


    </ul>
</ol>