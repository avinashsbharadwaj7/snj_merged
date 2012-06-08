<?PHP
    echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
    echo $html->css('jscal2', 'stylesheet');
    echo $html->css('border-radius', 'stylesheet');
    echo $html->css('steel/steel', 'stylesheet');
    echo $html->css("lte-lit");
    
    $class = " class=\"paginator_col_inner\"";
    $class_alt = " class=\"paginator_col_inner_alt\"";
?>

<li><?php echo $this->Html->link(__('Back', true), array('action' => 'view', $recordID, 'loadSiteSearch', 'fromView')); ?></li>
<h2>Search<?php echo ' [NDS Record: ' . $recordID . ']';?></h2>
<div class="lte_container">
    <fieldset>
        <legend><?PHP __('Search Results'); ?></legend>
        <div class="paging">
            <div class="paginator_nav_left">
                <?PHP if(Authsome::check('/litmasters/export')) {
                    echo $this->Html->link(__('[Excel Export]', true), array('action' => 'ndsexcel', 0, 'searchsite'));
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
                    <div class="paginator_col_header_date"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Date Created', 'date_initiated'); ?></div></div>
                    <div class="paginator_col_header_name"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Created By', 'engineer_name'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Site ID', 'id'); ?></div></div>
                    <div class="paginator_col_header"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Site Name', 'site_name'); ?></div></div>
                    <div style="width: 0px; clear: both;"></div>
                </div>
                <?PHP 
                    $i = 0;
                ?>
                <?PHP foreach($ndsQuery as $result): ?>
                    <div class="paginator_row">
                        <div class="paginator_col_date"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Ndsmaster']['date_initiated']; ?></div></div>
                        <div class="paginator_col_name"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Ndsmaster']['engineer_name']; ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['Ndssite']['id'], array('action' => 'viewsite', $result['Ndssite']['id'], 'searchsite', 'fromViewSite')); ?></div></div>
                        <div class="paginator_col"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['Ndssite']['site_name']; ?></div></div>
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