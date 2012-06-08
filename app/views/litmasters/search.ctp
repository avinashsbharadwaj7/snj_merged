<?PHP
echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
echo $html->css('jscal2', 'stylesheet');
echo $html->css('border-radius', 'stylesheet');
echo $html->css('steel/steel', 'stylesheet');
echo $html->css("lte-lit");

$class = " class=\"paginator_col_inner\"";
$class_alt = " class=\"paginator_col_inner_alt\"";
?>

<?PHP
if (!$conditions_entered) {
//echo "<script type=text/javascript>alert('conditions NOT entered')</script>";
    ?>
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Criteria'); ?></legend>
            <!-- <div style="padding-bottom: 12px; font-style: italic;">*Leave all fields blank to list LITs</div> -->
            <?PHP
            echo $this->Form->create('Litmaster');
            echo $this->Form->input('lte_customer', array('label' => 'LTE Customer', 'options' => $databaseFields->getOptions('customer_lte', 4)));
            echo $this->Form->input('litId', array('label' => 'LIT ID', 'type' => 'text'));
            echo $this->Form->input('site_name_search', array('label'=>'Site Name', 'type'=>'text', 'div'=>array('class'=>'input text')));
            echo $this->Form->input('engineer_signum_entered', array('label' => 'Engineer Signum', 'type' => 'text'));
            echo $this->Form->input('engineer_work_location_entered', array('label' => 'Engineer Work Location', 'options' => $databaseFields->getOptions('work_loc', 1)));
            echo $this->Form->input('region', array('options' => $databaseFields->getOptions('region', 1)));
            echo $this->Form->input('activity_type_entered', array('label' => 'Activity Type', 'options' => $databaseFields->getOptions('activity_type', 4)));
            echo $this->Form->input('activity_status_entered', array('label' => 'Activity Status', 'options' => $databaseFields->getOptions('activity_status', 4)));
            ?>
            <div class="date_pickers">
                <fieldset>
                    <legend><?PHP __('Creation Date'); ?></legend>
                    <div style="padding-bottom: 12px; font-style: italic;">*For reports of a particular day, enter the same date in From and To.</div>
            <?php
            echo $datePicker->picker('from_date', array('label' => 'From', 'id' => 'from_date'));
            echo $datePicker->picker('to_date', array('label' => 'To', 'id' => 'to_date'));
            ?>
                </fieldset>
            </div>
    <?PHP echo $this->Form->end(__('Search', true)); ?>
        </fieldset>
    </div>
<?PHP
} else {
    /* else block */
//        var_dump($this->data);
//        echo "<script type=text/javascript>alert('conditions entered')</script>";
    ?>

    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'search', 'fromSearchResults')); ?></li>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Results'); ?></legend>
            <div class="paging">
                <div class="paginator_nav_left">
                    <?PHP
                    if (Authsome::check('/litmasters/export')) {
                        if($this->data['Litmaster']['lte_customer'] == "Verizon") {
                        echo $this->Html->link(__('[Excel Export]', true), array('controller'=>'litmaster_verizons','action' => 'litexcel'));
                        } else {
                            echo $this->Html->link(__('[Excel Export]', true), array('action' => 'litexcel'));
                        }
                    }
                    ?>
                </div>
                <div class="paginator_nav_left">
                    <?PHP
                    echo $this->Paginator->first('<< ' . __('First', true), array(), null, array('class' => 'disabled'));
                    if ($this->Paginator->hasPrev()) {
                        echo "&nbsp;|&nbsp;";
                    }
                    echo $this->Paginator->prev('< ' . __('Prev', true), array(), null, array('class' => 'disabled'));
                    ?>
                    &nbsp;[&nbsp;<?PHP echo $paginator->numbers(); ?>&nbsp;]&nbsp;
    <?php
    echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled'));
    if ($this->Paginator->hasNext()) {
        echo "&nbsp;|&nbsp;";
    }
    echo $this->Paginator->last(__('Last', true) . ' >>', array(), null, array('class' => 'disabled'));
    ?>
                </div>

                <div class="paginator_table">
                    <div class="paginator_row">
                        <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('LIT ID', 'id'); ?></div></div>
                        <div class="paginator_col_header_date"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Date Created', 'date_initiated'); ?></div></div>
                        <div class="paginator_col_header_name"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Created By', 'engineer_name'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('LTE Customer', 'lte_customer'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Region', 'region'); ?></div></div>
                        <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Team Name', 'team_name'); ?></div></div>
                        <div style="width: 0px; clear: both;"></div>
                    </div>

    <?PHP
    $i = 0;
    ?>
                        <?PHP foreach ($litQuery as $result): ?>
                        <div class="paginator_row">
                            <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result[$modelName]['id'], array('controller'=>$controllerName, 'action' => 'view', $result[$modelName]['id'], 'search', 'fromView')); ?></div></div>
                            <div class="paginator_col_date"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result[$modelName]['date_initiated']; ?></div></div>
                            <div class="paginator_col_name"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result[$modelName]['engineer_name']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result[$modelName]['lte_customer'])) ? '-' : $result[$modelName]['lte_customer']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result[$modelName]['region'])) ? '-' : $result[$modelName]['region']; ?></div></div>
                            <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo (empty($result[$modelName]['team_name'])) ? '-' : $result[$modelName]['team_name']; ?></div></div>
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

