<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?></h2>
<ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/cakefeedbacks/addfeedback')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add Feedback/Request", "title" => "Add Feedback/Request", 'url' => array('plugin'=>'','controller' => 'cakefeedbacks', 'action' => 'addfeedback')));
                echo __('Add Feedback/Request');
            }
        ?>              
		<?php
            if (Authsome::check('/cakefeedbacks/search')) {
                echo "<li>";
                echo $html->image('/img/view32.png', array("alt" => "Search Feedback/Request", "title" => "Search Feedback/Request", 'style'=>'width:64px;','url' => array('controller' => 'cakefeedbacks', 'action' => 'presearch')));
                echo __('Search Feedback/Request');
            }
        ?>
		 <?php
            if (Authsome::check('/cakefeedbacks/listall')) {
                echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Feedback/Request", "title" => "List Feedback/Request",'style'=>'width:64px;', 'url' => array('controller' => 'cakefeedbacks', 'action' => 'listall')));
                echo __('List Feedback/Request');
            }
        ?>	

	</ul>
</ol>