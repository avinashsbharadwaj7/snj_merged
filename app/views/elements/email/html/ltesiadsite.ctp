<style>
root { 
    display: block;
}

div.lte-link {
    padding: 5px;
    margin: 2px;
    margin-left: 245px;
}

div.lte_view {
   
}

div.lte_container {
    margin-left: 60px;
}

div.altrow {
    background: #E4E8EF;
}

div.view_col_left {
    font-size: 12px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 46%;
    float: left;
    clear: none;
    
}

div.view_col_right {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 53%;
    line-height: 2em;
}

div.ndscomp_table {
   margin: 0px;
   padding: 0px;
   width: 100%;
}

div.ndssummary_row {
    padding: 0px;
    margin: 0px;
    height: 38px;
    width: 675px;
}

div.ndscomp_col_header_inner {
    padding: 6px;
    line-height: 1.5em;
    background-color: #c7e2cc;
}

div.ndscomp_col_header_inner_metric {
    padding: 6px;
    line-height: 1.5em;
    font-size: 12px;
    background-color: #c7e2cc;
    height: 20px;
}

div.ndscomp_col_header_inner_comparison {
    padding: 6px;
    line-height: 1.5em;
    background-color: #c7e2cc;
    text-align: center;
}

div.ndscomp_col_header {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;  
    width: 83px;
}

div.ndscomp_col_header_metric {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;
    width: 185px;
    height: 32px;
}

div.ndscomp_col_inner {
    padding: 0px;
    margin: 0px;
    background: #FFF;
}

div.ndscomp_col_inner_alt {
    padding: 0px;
    margin: 0px;
    background: #E4E8EF;
}

div.ndscomp_col {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 83px;
    overflow: auto;
}

div.ndscomp_col_metric {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 185px;
}


div.ndscomp_nocomparison {
    padding: 6px;
    margin: 0px;
    line-height: 12px;
    font-size: 12px;
    height: 22px;
    vertical-align: middle;
}

div.ndscomp_comparison {
    padding: 2px;
    margin: 0px;
    line-height: 12px;
    font-size: 12px;
    height: 30px;
    text-align: center;
    vertical-align: middle;
}

div.ndscomp_notapplicable {
    padding: 4px;
    margin: 0px;
    background: #ffff00;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_success {
    padding: 4px;
    margin: 0px;
    background: #00ff00;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_notsuccess {
    padding: 4px;
    margin: 0px;
    background: #ff0000;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_nochange {
    padding: 4px;
    margin: 0px;
    background: #00ff00;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}

div.ndscomp_investigate {
    padding: 4px;
    margin: 0px;
    background: #ff9900;
    line-height: 12px;
    font-size: 12px;
    text-align: center;
    vertical-align: middle;
    height: 12px;
}
</style>

<?PHP 
    echo $html->css("lte-lit");
    echo $html->css("lte-siad"); 
    $class = ' class="altrow"';
    
    $class_comp = " class=\"siad_col_inner\"";
    $class_comp_alt = " class=\"siad_col_inner_alt\"";
?>
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