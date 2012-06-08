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
    $search_action = 'searchsite';
    $search_action_arg = 'loadSites';
    $siad_id = $dataValues['Siadmaster']['id'];
?>
    <?PHP
    /* Sort the uploads according to file_tag.
     * We only need to display the filename, so the resulting array
     * will be one-dimensional associative.
     */
    $uploadValues = array();
    if(isset($dataValues['Siadfile'])) {
        foreach($dataValues['Siadfile'] as $upload=>$arr) {
            foreach($arr as $key=>$value) {
                if($key == 'file_tag') {
                    $uploadValues[$value] = $arr['file_name'];
                    break;
                }
            }
        }
    }
    ?>
<h2><?php  __('View - SIAD ID: ');
    echo $dataValues['Siadmaster']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Basic Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Last Modified'); ?></div>
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
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>
<fieldset>
    <legend>Master Record Comments</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Record Comments'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Siadmaster']['record_comments']; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Records File</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('File'); ?></div>
            <div class="view_col_right"><?php echo (isset($uploadValues[3])) ? $uploadValues[3] : "No file uploaded (<i>possibly due to a failed edit attempt</i>)"; ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Site Summary</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Total Sites Touched'); ?></div>
            <div class="view_col_right"><?php echo (!isset($dataValues['Siadsite'])) ? 0 : count($dataValues['Siadsite']); ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site List'); ?></div>
            <div class="view_col_right"><?php
                if(isset($dataValues['Siadsite'])) {
                    $num_sites = count($dataValues['Siadsite']);
                    for($i = 0; $i < $num_sites; $i++) {
                        echo $dataValues['Siadsite'][$i]['site_name'];
                        if($i < $num_sites - 1) {
                            echo ", ";
                        }
                    }
                }
            ?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</fieldset>
</div>