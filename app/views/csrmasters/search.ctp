<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?PHP
    echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
    echo $html->css('jscal2', 'stylesheet');
    echo $html->css('border-radius', 'stylesheet');
    echo $html->css('steel/steel', 'stylesheet');
    echo $html->css("lte-lit");
    
    $class = " class=\"paginator_col_inner\"";
    $class_alt = " class=\"paginator_col_inner_alt\"";
?>

<?PHP if(!$conditions_entered) { ?>
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Criteria'); ?></legend>
            <div style="padding-bottom: 12px; font-style: italic;">*Leave all fields blank to list CSRs</div>
            <?PHP echo $this->Form->create('Csrmaster');
                //echo $this->Form->input('csrId', array('label'=>'CSR ID', 'type'=>'text'));
                //echo $this->Form->input('date_created', array('label'=>'Date', 'type'=>'text', 'after'=>"(YYYY-MM-DD)"));
                echo $this->Form->input('network_number', array('label'=>'Network Number'));
                echo $this->Form->input('csrid', array('label'=>'CSR Report Number'));
                echo $datePicker->picker('date_initiated', array('label'=>'Date'));
            ?>
            <?PHP echo $this->Form->end(__('Search', true));?>
        </fieldset>
    </div>
<?PHP }
    else {
        /* else block */
?>
<li><?php echo $this->Html->link(__('Back', true), array('action' => 'search', 'fromSearchResults')); ?> </li>
<h2>Search</h2>
<div class="lte_container">
    <fieldset>
        <legend><?PHP __('Search Results'); ?></legend>
        <div class="paging">
            
            <div class="paginator_nav_left">
                <?PHP echo $this->Paginator->prev('<< ' . __('Prev', true), array(), null, array('class' => 'disabled')); ?>
                &nbsp;[<?php echo $this->Paginator->counter(array('format' => __('%page% of %pages%', true))); ?>]&nbsp;
                <?php echo $this->Paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
            </div>
           
            <div class="paginator_table">
                <div class="paginator_row">
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('CSR ID', 'id'); ?></div></div>
                    <div class="paginator_col_header_date"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Date Created', 'date_initiated'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Created By', 'nic_name'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Network Number', 'network_number'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('CSR Number', 'csr_number'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Site Name', 'site_name'); ?></div></div>
                    <div style="width: 0px; clear: both;"></div>
                </div>
                
                <?PHP 
                    $i = 0;
                    $j = 0;
                ?>
                <?PHP foreach($csrQuery as $result): ?>
                    <div class="paginator_row">
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['Csrmaster']['id'], array('action' => 'view', $result['Csrmaster']['id'], 'search', 'fromView')); ?></div></div>
                        <div class="paginator_col_date"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Csrmaster']['date_initiated']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Csrmaster']['nic_name']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Csrmaster']['network_number'])) ? '-' : $result['Csrmaster']['network_number']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Csrmaster']['csr_number'])) ? '-' : $result['Csrmaster']['csr_number']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Csrmaster']['site_name'])) ? '-' : $result['Csrmaster']['site_name']; ?></div></div>
                        <div style="width: 0px; clear: both;"></div>
                        <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
                    </div>
                <?PHP endforeach; ?>
            </div>
            
            <div class="paginator_nav_left">
                <?php echo $this->Paginator->counter(array('format' => __('Page %page% of %pages% | Showing %current% Records | %count% Total', true))); ?>
            </div>
            
        </div>
    </fieldset>
</div>
<?PHP } ?>