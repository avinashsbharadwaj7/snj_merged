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
            <div style="padding-bottom: 12px; font-style: italic;">*Leave all fields blank to list all CDMA reports</div>
            <?PHP 
                echo $this->Form->create('Cdmamaster');
                echo $this->Form->input('network_id', array('label'=>'Network Number', 'type'=>'text'));
                echo $this->Form->input('cdmaid', array('label'=>'CDMA Report Number'));
                echo $this->Form->input('nic_signum', array('label'=>'NIC Signum'));
                ?>
                <legend>Date Range</legend>
                <?php echo $datePicker->picker('From');
                      echo $datePicker->picker('To');
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
                <?PHP if(Authsome::check('/cdmamasters/export')) {
                    echo $this->Html->link(__('[Excel Export]', true), array('action' => 'cdmaexcel'));
                } ?>

            <div class="paginator_nav_left">
                <?PHP echo $this->Paginator->prev('<< ' . __('Prev', true), array(), null, array('class' => 'disabled')); ?>
                &nbsp;[<?php echo $this->Paginator->counter(array('format' => __('%page% of %pages%', true))); ?>]&nbsp;
                <?php echo $this->Paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
            </div>
            <div class="table_cdma">
            <div class="paginator_table_cdma">
                <div class="paginator_row_cdma">
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('CDMA ID', 'id'); ?></div></div>
                    <div class="paginator_col_header_date"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Date Created', 'date_initiated'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Created By', 'nic_name'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Network Number', 'network_id'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('TCM Engineer', 'tcm_engineer'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Customer', 'customer'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Work Location', 'work_location'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Region', 'region'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Site Zipcode', 'site_zipcode'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Activity Status', 'activity_status'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Number of RNCs scheduled', 'number_of_rncs_scheduled'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Number of RNCs attempted', 'number_of_rncs_attempted'); ?></div></div>
                    <div style="width: 0px; clear: both;"></div>
                </div>
                
                <?PHP 
                    $i = 0;
                    $j = 0;
                ?>
                <?PHP foreach($cdmaQuery as $result): ?>
                    <div class="paginator_row_cdma">
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['Cdmamaster']['id'], array('action' => 'view', $result['Cdmamaster']['id'], 'search', 'fromView')); ?></div></div>
                        <div class="paginator_col_date"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Cdmamaster']['date_initiated']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Cdmamaster']['nic_name']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['network_id'])) ? '-' : $result['Cdmamaster']['network_id']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['tcm_engineer'])) ? '-' : $result['Cdmamaster']['tcm_engineer']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['customer'])) ? '-' : $result['Cdmamaster']['customer']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['work_location'])) ? '-' : $result['Cdmamaster']['work_location']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['region'])) ? '-' : $result['Cdmamaster']['region']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['site_zipcode'])) ? '-' : $result['Cdmamaster']['site_zipcode']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['activity_status'])) ? '-' : $result['Cdmamaster']['activity_status']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['number_of_rncs_scheduled'])) ? '-' : $result['Cdmamaster']['number_of_rncs_scheduled']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cdmamaster']['number_of_rncs_attempted'])) ? '-' : $result['Cdmamaster']['number_of_rncs_attempted']; ?></div></div>
                        <div style="width: 0px; clear: both;"></div>
                        <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
                    </div>
                <?PHP endforeach; ?>
            </div>
            </div>
            <div class="paginator_nav_left">
                <?php echo $this->Paginator->counter(array('format' => __('Page %page% of %pages% | Showing %current% Records | %count% Total', true))); ?>
            </div>
            
        </div>
    </fieldset>
</div>
<?PHP } ?>