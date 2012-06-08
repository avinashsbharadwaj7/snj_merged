<li>
    <?PHP 
    echo $html->link("Back",array('controller'=>'slmasters','action' => 'index') ); 
    ?>    
 </li>  
<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
    <ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/slmasters/premodify')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit AT&T Report", "title" => "Edit AT&T Report", 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'premodify')));
                echo __('Edit AT&T Report');
            }
        ?>       
        <?php
            if (Authsome::check('/tmobile_slmasters/premodify')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit T-Mobile Report", "title" => "Edit T-Mobile Report", 'url' => array('plugin'=>'','controller' => 'tmobile_slmasters', 'action' => 'premodify')));
                echo __('Edit T-Mobile Report');
            }
        ?> 

    </ul>
</ol>