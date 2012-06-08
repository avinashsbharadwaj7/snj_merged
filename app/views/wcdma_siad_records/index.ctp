<h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
    <ul class="bcp_home">
        <?php
            if (Authsome::check('/wcdma_siad_records/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add Excel File", "title" => "Add Excel File", 'url' => array('plugin'=>'','controller' => 'wcdma_siad_records', 'action' => 'add')));
                echo __('Add Excel File');
            }
            if(Authsome::check('/wcdma_siad_records/search')) {
                echo "<li>";
                echo $html->image('/img/view32.png', array("alt" => "Search Report", "title" => "Search Report", 'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'wcdma_siad_records', 'action' => 'search')));
                echo __('Search Report');
            }            
        ?>
    </ul>
</ol>

