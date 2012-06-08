<?PHP
    echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
    echo $html->css('jscal2', 'stylesheet');
    echo $html->css('border-radius', 'stylesheet');
    echo $html->css('steel/steel', 'stylesheet');
    echo $html->css("lte-lit");
    
    $class = " class=\"paginator_col_inner\"";
    $class_alt = " class=\"paginator_col_inner_alt\"";
?>

<?PHP if(isset($conditions_entered) && !$conditions_entered) { ?>
    <li><?php echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index')); ?> </li>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Criteria'); ?></legend>
            <div style="padding-bottom: 12px; font-style: italic;">*Leave all fields blank to list SIAD records</div>
            <?PHP echo $this->Form->create('Siadmaster');
                echo $datePicker->picker('date_created_entered',array('label'=>'Date','id'=>'date_created'));
                echo $this->Form->input('siadId', array('label'=>'SIAD Record ID', 'type'=>'text'));
                echo $this->Form->input('siteId', array('label'=>'Site Record ID', 'type'=>'text'));
                echo $this->Form->input('site_name_entered', array('label'=>'Site Name (Node ID)'));
                echo $this->Form->input('engineer_signum_entered', array('label'=>'Engineer Signum', 'type'=>'text'));
                echo $this->Form->input('engineer_work_location_entered', array('label'=>'Engineer Work Location', 'options'=>$databaseFields->getOptions('engineer_work_location',4)));
                echo $this->Form->input('lte_customer_entered', array('label'=>'LTE Customer', 'options'=>$databaseFields->getOptions('customer_lte',4)));
                echo $this->Form->input('region_entered', array('label'=>'Region', 'options'=>$databaseFields->getOptions('lte_region',4)));
                echo $this->Form->input('activity_type_entered', array('label'=>'Activity Type', 'options'=>$databaseFields->getOptions('siad_activity_type',4)));
                echo $this->Form->input('activity_status_entered', array('label'=>'Activity Result', 'options'=>$databaseFields->getOptions('siad_activity_status',4)));
            ?>
            <?PHP echo $this->Form->end(__('Search', true));?>
        </fieldset>
    </div>
<?PHP }
    else {
        /* else block */
?>
<li><?php echo $this->Html->link(__('Back', true), array('action' => 'search', 'fromSearchResults')); ?></li>
<h2>Search</h2>
<div class="lte_container">
    <fieldset>
        <legend><?PHP __('Search Results'); ?></legend>
        <div class="paging">
            <div class="paginator_nav_left">
                <?PHP if(Authsome::check('/siadmasters/export')) {
                    echo $this->Html->link(__('[Excel Export]', true), array('action' => 'siadexcel', 0, 'search'));
                } ?>
            </div>
            <div class="paginator_nav_left">
                <?PHP echo $this->Paginator->first('<< ' . __('First', true), array(), null, array('class' => 'disabled'));
                if($this->Paginator->hasPrev()) {
                        echo "&nbsp;|&nbsp;";
                }
                echo $this->Paginator->prev('< ' . __('Prev', true), array(), null, array('class' => 'disabled')); ?>
                &nbsp;[&nbsp;<?PHP echo $paginator->numbers(); ?>&nbsp;]&nbsp;
                <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled'));
                if($this->Paginator->hasNext()) {
                    echo "&nbsp;|&nbsp;";
                }
                echo $this->Paginator->last(__('Last', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
            </div>
           
            <div class="paginator_table">
                <div class="paginator_row">
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('SIAD ID', 'siadmaster_id'); ?></div></div>
                    <div class="paginator_col_header_date"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Date Created', 'date_initiated'); ?></div></div>
                    <div class="paginator_col_header_name"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Created By', 'engineer_name'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Site ID', 'id'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Site Name', 'site_name'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Region', 'lte_region'); ?></div></div>
                    <div style="width: 0px; clear: both;"></div>
                </div>
                <?PHP 
                    $i = 0;
                ?>
                <?PHP foreach($siadQuery as $result): ?>
                    <div class="paginator_row">
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['Siadmaster']['id'], array('action' => 'view', $result['Siadmaster']['id'], 'search', 'fromView')); ?></div></div>
                        <div class="paginator_col_date"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Siadmaster']['date_created']; ?></div></div>
                        <div class="paginator_col_name"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Siadmaster']['engineer_name']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['Siadsite']['id'], array('action' => 'viewsite', $result['Siadsite']['id'], 'search', 'fromView')); ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Siadsite']['site_name']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Siadsite']['lte_region']; ?></div></div>
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