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
    margin-left: 60px;
	background: #E4E8EF;
}

div.altrow {
    background: #E4E8EF;
}

div.view_col_left {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    word-wrap: break-word;
}

div.view_col_right {
    margin: 0px;
    font-size: 14px;
    float: left;
    clear: right;
    width: 940px;
    line-height: 2em;
    word-wrap: break-word;
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

div.view_col_left_orange {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:orange;
    word-wrap: break-word;
}

div.view_col_right_orange {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:orange;
    word-wrap: break-word;
}

div.view_col_left_green {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:green;
    word-wrap: break-word;
}

div.view_col_right_green {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:green;
    word-wrap: break-word;
}

div.view_col_left_red {
    font-size: 14px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 300px;
    float: left;
    clear: none;
    background-color:red;
    word-wrap: break-word;
}

div.view_col_right_red {
    font-size: 14px;
    margin: 0px;
    line-height: 2.5em;
    width: 940px;
    float: left;
    clear: right;
    background-color:red;
    word-wrap: break-word;
}

</style>
<?php $view_fields = $view_fields['TiTracker']; ?>
<h2><font size='3'; color='blue';><?php  __('NPI TI Number: '); ?></font>
    <font size='3';><?php echo "TI".$id;?></font></h2>
<h2><font size='3'; color='blue';><?php  __('Date Created: '); ?></font>
    <font size='3';><?php echo $view_fields['created'];?></font></h2>
<h2><font size='3'; color='blue';><?php  __('Date Modified ');  ?></font>
    <font size='3';><?php echo $view_fields['modified']; ?></font></h2>
	

<div class="lte_container">
<fieldset>
    <legend>Engineer Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['signum'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $view_fields['name'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
    </div>
</fieldset>  
    
<fieldset>
    <legend>Project Information</legend>

    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Project'); ?></div>
			<?php $view_fields['project'] = str_replace(' ', '&nbsp;',$view_fields['project']);
            $view_fields['project'] = nl2br($view_fields['project']); ?>
            <div class="view_col_right"><?php echo $view_fields['project']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
			<?php $view_fields['project_manager'] = str_replace(' ', '&nbsp;',$view_fields['project_manager']);
            $view_fields['project_manager'] = nl2br($view_fields['project_manager']); ?>
            <div class="view_col_right"><?php echo $view_fields['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Technical Coordinator'); ?></div>
			<?php $view_fields['technical_coordinator'] = str_replace(' ', '&nbsp;',$view_fields['technical_coordinator']);
            $view_fields['technical_coordinator'] = nl2br($view_fields['technical_coordinator']); ?>
            <div class="view_col_right"><?php echo $view_fields['technical_coordinator']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php for($k=1;$k<6;$k++){if($view_fields['title_'.$k] != ""):?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Test Instruction Title '.$k); ?></div>
			<?php $view_fields['title_'.$k] = str_replace(' ', '&nbsp;',$view_fields['title_'.$k]);
            $view_fields['title_'.$k] = nl2br($view_fields['title_'.$k]); ?>
            <div class="view_col_right"><?php echo $view_fields['title_'.$k]; ?></div>
            <div style="clear: both;"></div>
        </div>

        <div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Test Instruction Description'); ?></div>
			<?php $view_fields['title_'.$k.'_description'] = str_replace(' ', '&nbsp;',$view_fields['title_'.$k.'_description']);
            $view_fields['title_'.$k.'_description'] = nl2br($view_fields['title_'.$k.'_description']); ?>
            <div class="view_col_right"><?php echo $view_fields['title_'.$k.'_description']; ?></div>
            <div style="clear: both;"></div>
        </div>
	<?php endif;} ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>
            <div class="view_col_left"><?php __('Link'); ?></div>
			<?php $view_fields['link'] = str_replace(' ', '&nbsp;',$view_fields['link']);
            $view_fields['link'] = nl2br($view_fields['link']); ?>
            <div class="view_col_right"><?php echo $view_fields['link']; ?></div>
            <div style="clear: both;"></div>
        </div>

    </div>
</fieldset>
</div>
 



