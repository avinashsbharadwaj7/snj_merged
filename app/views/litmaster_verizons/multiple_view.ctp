<?PHP 
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
?>

<li>
    <?PHP 
           echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index'));
    ?>

</li>
<?php 

?>
<h2><?php  __('Multiple Site Reports ');?></h2>
    
    <?php
    $listOfSavedSites = $this->Session->read('listOfSavedSites');
    $listOfUnsavedSites = $this->Session->read('listOfUnsavedSites');
//    echo "<b>" . $listOfSavedSites . "<br>" . $listOfUnsavedSites . "</b>";
    ?>
<div class="lte_container">
    <fieldset>
        <legend>Report Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div<?php if ($i++ % 2 == 0)
        echo $class; ?>>    
                <div class="view_col_right"><?php echo "<b>" . $listOfSavedSites . "<br>" . $listOfUnsavedSites . "</b>" ?></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </fieldset>
</div>