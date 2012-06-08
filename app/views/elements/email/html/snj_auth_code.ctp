<?PHP
    $class = 'class="alt row"';
    //pr($data);
?>

<style>


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

<div class="lte_container">
<?php if($data['Authcode']['show']){ ?>
<h2>Authorization Code</h2>
<?php }else{ ?>
<h2>Request Authorization Code</h2>
<?php } ?>

<?php if(isset($data['Authcode']['engineer_name'])){?>
<fieldset>
    <legend>Requested By</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['Signum'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['engineer_name'];  ?></div>
            <div style="clear: both;"></div>
        </div>
                
    </div>
</fieldset>
<?php } ?>

<fieldset>
    <legend>Job Details</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Job ID'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['job_id'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Task ID'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['task_id'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager Signum'); ?></div>
            <div class="view_col_right"><?php echo $data['Job']['Signum'];  ?></div>
            <div style="clear: both;"></div>
        </div>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager Name'); ?></div>
            <div class="view_col_right"><?php echo $data['Job']['Name'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
    </div>
</fieldset>

<fieldset>
    <legend>Node Details</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Name'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['node_name'];  ?></div>
            <div style="clear: both;"></div>
        </div>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Type'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['node_type'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
    </div>
</fieldset>
<?php if($data['Authcode']['show']){ ?>
<fieldset>
    <legend>Authorization Code</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Authorization Code'); ?></div>
            <div class="view_col_right"><?php echo $data['Authcode']['auth_code'];  ?></div>
            <div style="clear: both;"></div>
        </div>
        
    </div>
</fieldset>
<?php } ?>