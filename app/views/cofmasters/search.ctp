
<?PHP
echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
echo $html->css('jscal2', 'stylesheet');
echo $html->css('border-radius', 'stylesheet');
echo $html->css('steel/steel', 'stylesheet');
echo $html->css("lte-lit");

$class = " class=\"paginator_col_inner\"";
$class_alt = " class=\"paginator_col_inner_alt\"";
?>

<?PHP if (!$conditions_entered) { ?>
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2><?php echo __('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Criteria'); ?></legend>
            <div style='padding-bottom: 12px; font-style: italic;'> *Leave all fields blank to list all COFs </div>
            <?PHP
            echo $this->Form->create('Cofmaster');
            echo $this->Form->input('network_number', array('label' => 'Network Number'));
            echo $this->Form->input('cofid', array('label' => 'COF Report Number'));
            echo $this->Form->input('signum_search', array('label' => 'Engineer Username'));
            echo $this->Form->input('activity_type_search', array('label' => 'Activity Type', "options" => $databaseFields->getOptions('activity_type', 9)));
            echo $datePicker->picker('from_date', array('label' => 'From', 'id' => 'from_date'));
            echo $datePicker->picker('to_date', array('label' => 'To', 'id' => 'to_date'));
            ?>
    <?PHP echo $this->Form->end(__('Search', true)); ?>
        </fieldset>
    </div>
<?PHP
} else {
    ?>
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'search', 'fromSearchResults')); ?> </li>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Results'); ?></legend>
            <div class="paging">
                <div class="paginator_nav_left">
                    <?PHP
                            echo $this->Html->link(__('[Excel Export]', true), array('action' => 'cofexcel'));
                    ?>
                </div>
                <div class="paginator_nav_left">
                    <?PHP echo $this->Paginator->first('<< ' . __('First', true), array(), null, array('class' => 'disabled')); ?>
                    <?PHP echo $this->Paginator->prev('<< ' . __('Prev', true), array(), null, array('class' => 'disabled')); ?>
                    &nbsp;[<?php echo $this->Paginator->counter(array('format' => __('%page% of %pages%', true))); ?>]&nbsp;
                    <?php echo $this->Paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); echo "&nbsp";
                          echo $this->Paginator->last(__('Last', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
                </div>

                <div class="paginator_table">
                    <div class="paginator_row">
                        <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('COF ID', 'id'); ?></div></div>
                        <div class="paginator_col_header_date"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Date Created', 'date_init'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Created By', 'signum'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Change Initiated By', 'change_initiatedby'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Network Number', 'network_num'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Operator', 'operator_name'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Activity', 'activity_status'); ?></div></div>
                        <div style="width: 0px; clear: both;"></div>
                    </div>

                    <?PHP
                    $i = 0;
                    $j = 0;
                    ?>
                    <?PHP foreach ($csrQuery as $result): ?>
                        <div class="paginator_row">
                            <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['Cofmaster']['id'], array('action' => 'view', $result['Cofmaster']['id'])); ?></div></div>
                            <div class="paginator_col_date"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Cofmaster']['date_init']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Cofmaster']['signum']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Cofmaster']['change_initiatedby']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cofmaster']['network_num'])) ? '-' : $result['Cofmaster']['network_num']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cofmaster']['operator_name'])) ? '-' : $result['Cofmaster']['operator_name']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result['Cofmaster']['activity_type'])) ? '-' : $result['Cofmaster']['activity_type']; ?></div></div>
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