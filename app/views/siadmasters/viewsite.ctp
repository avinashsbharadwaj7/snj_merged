<?php
//LTE-SIAD (Site view)
?>
<?PHP 
    echo $html->css("lte-lit");
    echo $html->css("lte-siad"); 
    $class = ' class="altrow"';
    
    $class_comp = " class=\"siad_col_inner\"";
    $class_comp_alt = " class=\"siad_col_inner_alt\"";
?>
<li>
    <?PHP if($action_link == 'search' || $action_link == 'export' || $action_link == 'searchsite') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1));
        }
        else if($action_link == 'view' || $action_arg_2 == 'search') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1, $action_arg_2, $action_arg_3));
        }
        else if($action_link == 'view') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1, $action_arg_2));
        }
        else {
           echo $this->Html->link(__('Back', true), array('controller' => 'litmasters', 'action' => 'index'));
        }
        if($dataValues['Siadmaster']['engineer_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Edit', true), array('action' => 'editsite', $dataValues['Siadsite']['id']));
        }
        if(Authsome::check('/siadmasters/export')) {
            echo '&nbsp;|&nbsp;';
            echo $this->Html->link(__('Download Excel', true), array('action' => 'siadexcel', $dataValues['Siadsite']['id'], 'viewsite'));
        }
    ?>
</li>
<h2><?php  __('View - SIAD ID: ');
    echo $dataValues['Siadsite']['siadmaster_id'];?></h2>
<h2><?php  __('--Site Record ID: ');
    echo $dataValues['Siadsite']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Basic Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Last Modified (Master Record)'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['date_created']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Engineer Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>
<fieldset>
    <legend>Project Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('LTE Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['lte_customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Region'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['lte_region']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['site_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('SIAD CLLI'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['siad_clli']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('SIAD OAM Loopback IP Address'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['oam_loopback_ip_address']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('SIAD OAM Default IP Address'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['oam_default_ip_address']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Bearer Default IP Address'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['bearer_default_ip_address']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Activity Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['siad_activity_type']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Final Result'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['siad_activity_status']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
    <fieldset>
    <legend>Comments</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Additional Commments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadsite']['additional_comments']; ?></div>
            <div style="clear: both;"></div>
        </div>                        
    </div>
</fieldset>
</div>