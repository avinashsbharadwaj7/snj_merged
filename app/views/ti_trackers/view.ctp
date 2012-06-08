<li>
    <?PHP 
           echo $this->Html->link(__('Back', true), array('action' => 'index'));
    ?>
</li>

<?PHP
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>

<table>
        <tr>
                <th><?php
                         
                           // $view_fields = $view_fields[0]['TiTracker'];
                           
                    ?>
               </th>
        </tr>
</table>

<?PHP
    $class = 'class="altrow"';
?>

<style>
    /* 
    Document   : lte-lit
    Created on : Jun 2, 2011, 6:32:22 PM
    Author     : ebrrick
    Description:
        Purpose of the stylesheet follows.
*/

/* 
   TODO customize this sample style
   Syntax recommendation http://www.w3.org/TR/REC-CSS2/
*/

root { 
    display: block;
}

div.lte-link {
    padding: 5px;
    margin: 2px;
    margin-left: 245px;
}

div.div_rssi_table {
    width: 520px;
    height: 128px;
    padding: 0px;
    margin: 0px;
}

div.div_rssi_row {
    width: 100%;
    padding: 0px;
    margin: 0px;
}

div.div_rssi_column_header {
    width: 62%;
    clear: none;
    float: left;
    padding: 0px;
    padding-bottom: 6px;
    margin: 0px;
    text-align: center;
}

div.div_rssi_column {
    width: 31%;
    clear: none;
    float: left;
    padding: 0px;
    padding-bottom: 6px;
    margin: 0px;
    text-align: center;
}

label.div_rssi_column {
    width: 0px;
}

div.lte_view {
  
}

div.lte_container {
    margin-left: 0px;
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
    width: 300px;
    float: left;
    clear: none;
    word-wrap:break-word;
}

div.view_col_right {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 525px;
    line-height: 2em;
    word-wrap:break-word;
}

div.paginator_table {
   margin: 0px;
   padding: 0px;
   width: 100%;
}

div.paginator_row {
    padding: 0px;
    margin: 0px;
    width: 100%;
    min-width: 775px;
}

div.paginator_col_header_inner {
    padding: 6px;
    line-height: 1.5em;
    background-color: #c7e2cc;
}

div.paginator_col_header {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;  
    width: 16%;
}

div.paginator_col_header_id {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;
    width: 100px;
}

div.paginator_col_header_date {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;
    width: 90px;
}

div.paginator_col_inner {
    padding: 6px;
}

div.paginator_col_inner_alt {
    padding: 6px;
    background: #E4E8EF;
}

div.paginator_col {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 16%;
    overflow: auto;
}

div.paginator_col_id {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 100px;
}

div.paginator_col_date {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    width: 90px;
}

div.paginator_nav_left {
    text-align: left;
    margin: 0px;
    padding-bottom: 6px;
    padding-top: 6px;
    padding-left: 1px;
}

</style>

<h2><?php  __('NPI TI Number: ');
    echo "TI".$view_fields['TiTracker']['id'];?></h2>
<h2><?php  __('Date Created: ');
    echo $view_fields['TiTracker']['created'];?></h2>
<h2><?php  __('Date Modified ');
    echo $view_fields['TiTracker']['modified']; ?></h2>

<div class="lte_container">
<fieldset>
    <legend>Engineer Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['TiTracker']['signum'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['TiTracker']['name'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
    </div>
</fieldset>  
    
<fieldset>
    <legend>Project Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project'); ?></div>
			<?php $view_fields['TiTracker']['project'] = str_replace(' ', '&nbsp;',$view_fields['TiTracker']['project']);
            $view_fields['TiTracker']['project'] = nl2br($view_fields['TiTracker']['project']); ?>
            <div class="view_col_right"><?php echo $view_fields['TiTracker']['project']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
			<?php $view_fields['TiTracker']['project_manager'] = str_replace(' ', '&nbsp;',$view_fields['TiTracker']['project_manager']);
            $view_fields['TiTracker']['project_manager'] = nl2br($view_fields['TiTracker']['project_manager']); ?>
            <div class="view_col_right"><?php echo $view_fields['TiTracker']['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Technical Coordinator'); ?></div>
			<?php $view_fields['TiTracker']['technical_coordinator'] = str_replace(' ', '&nbsp;',$view_fields['TiTracker']['technical_coordinator']);
            $view_fields['TiTracker']['technical_coordinator'] = nl2br($view_fields['TiTracker']['technical_coordinator']); ?>
            <div class="view_col_right"><?php echo $view_fields['TiTracker']['technical_coordinator']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php for($k=0;$k<count($view_fields['TiTrackerTitle']);$k++){if($view_fields['TiTrackerTitle'][$k]['title'] != "" || $view_fields['TiTrackerTitle'][$k]['description'] != ""):?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Test Instruction Title# '.($k+1)); ?></div>
			<?php $view_fields['TiTrackerTitle'][$k]['title'] = str_replace(' ', '&nbsp;',$view_fields['TiTrackerTitle'][$k]['title']);
            $view_fields['TiTrackerTitle'][$k]['title'] = nl2br($view_fields['TiTrackerTitle'][$k]['title']); ?>
            <div class="view_col_right"><?php echo $view_fields['TiTrackerTitle'][$k]['title']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Test Instruction Description# '.($k+1)); ?></div>
			<?php $view_fields['TiTrackerTitle'][$k]['description'] = str_replace(' ', '&nbsp;',$view_fields['TiTrackerTitle'][$k]['description']);
            $view_fields['TiTrackerTitle'][$k]['description'] = nl2br($view_fields['TiTrackerTitle'][$k]['description']); ?>
            <div class="view_col_right"><?php echo $view_fields['TiTrackerTitle'][$k]['description']; ?></div>
            <div style="clear: both;"></div>
        </div>
	<?php endif;} ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Link'); ?></div>
			<?php $view_fields['TiTracker']['link'] = str_replace(' ', '&nbsp;',$view_fields['TiTracker']['link']);
            $view_fields['TiTracker']['link'] = nl2br($view_fields['TiTracker']['link']); ?>
            <div class="view_col_right"><?php echo $view_fields['TiTracker']['link']; ?></div>
            <div style="clear: both;"></div>
        </div>

    </div>
</fieldset>  

</div>



