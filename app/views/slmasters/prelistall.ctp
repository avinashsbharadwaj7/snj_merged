<li>
    <?PHP 
    echo $html->link("Back",array('controller'=>'slmasters','action' => 'index') ); 
    ?>    
 </li>  
<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
    <ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/slmasters/listall')) {
                echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'listall')));
                echo __('List AT&T Reports');
            }
        ?>       
        <?php
            if (Authsome::check('/tmobile_slmasters/listall')) {
                echo "<li>";
                echo $html->image('/img/index32.png', array("alt" => "List Reports", "title" => "List Reports",'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'tmobile_slmasters', 'action' => 'listall')));
                echo __('List T-Mobile Reports');
            }
        ?> 

    </ul>
</ol>