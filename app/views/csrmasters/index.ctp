<h2>CSR Portal</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if(Authsome::check('/csrmasters/add')) {
                echo "<li>";
                echo $html->image('/img/db_add-2.png', array("alt" => "Add CSR", "title" => "Add CSR", 'url' => array('plugin'=>'','controller' => 'csrmasters', 'action' => 'add')));
                echo __('Add CSR');
            }

           if(Authsome::check('/csrmasters/edit')) {
                echo "<li>";
                echo $html->image('/img/db_comit-2.png', array("alt" => "Edit CSR", "title" => "Edit CSR", 'url' => array('plugin'=>'','controller' => 'csrmasters', 'action' => 'edit')));
                echo __('Edit CSR');
            }
            
            if(Authsome::check('/csrmasters/search')) {
                echo "<li>";
                echo $html->image('/img/view32.png', array("alt" => "Search CSRs", "title" => "Search CSRs", 'style'=>'width:64px;', 'url' => array('plugin'=>'','controller' => 'csrmasters', 'action' => 'search')));
                echo __('Search CSRs');
            }
            
        ?>
 </ul>
</ol>