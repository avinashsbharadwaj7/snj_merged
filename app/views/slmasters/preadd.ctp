<li>
    <?PHP 
    echo $html->link("Back",array('controller'=>'slmasters','action' => 'index') ); 
    ?>
    
 </li>
<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/slmasters/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add AT&T Report", "title" => "Add AT&T Report", 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'add')));
                echo __('Add AT&T Report');
            }
        ?>       
        <?php
            if (Authsome::check('/tmobile_slmasters/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add T-Mobile Report", "title" => "Add T-Mobile Report", 'url' => array('plugin'=>'','controller' => 'tmobile_slmasters', 'action' => 'add')));
                echo __('Add T-Mobile Report');
            }
        ?> 

    </ul>
</ol>