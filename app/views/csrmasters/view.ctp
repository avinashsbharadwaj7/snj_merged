<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//CSR
?>

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
    word-wrap: break-word;
}

div.view_col_left_pd {
    font-size: 12px;
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
    font-size: 12px;
    float: left;
    clear: right;
    width: 525px;
    line-height: 2em;
    word-wrap: break-word;
}

div.view_col_right_pd {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 400px;
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

</style>

<?PHP
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));      
?>

<li>
    <?PHP /*if($action_link == 'search') {
            echo $this->Html->link(__('Back', true), array('action' => $action_link, $action_arg_1));
        }
        else*/ {
           echo $this->Html->link(__('Back', true), array('action' => 'index'));
        }
    ?>
    <?PHP if($dataValues['Csrmaster']['nic_signum'] == Authsome::get('username')) {
            echo '&nbsp;|&nbsp; ';
            echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dataValues['Csrmaster']['id'], true));
    }
    ?>

</li>

<h2><?php  __('View - CSR Report Number: ');
    echo $dataValues['Csrmaster']['id'];?></h2>
<div class="lte_container">
<fieldset>
    <legend>Engineer Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <?php if (!($dataValues['Csrmaster']['nic_name']=="Rahul Marigowda"))?>
        <?php { ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['nic_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <?php } ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['nic_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['project_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSR Number'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['csr_number']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network Number'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['network_number']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Manager'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['project_manager']; ?></div>
            <div style="clear: both;"></div>
        </div>  

    </div>
</fieldset>  
    
<fieldset>
    <legend>Project Information</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('CSR Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['csr_type']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Customer'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['customer']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Network Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['network_type']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Node Type'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['node_type']; ?></div>
            <div style="clear: both;"></div>
        </div>  

        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Sub Product'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['sub_product']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Site Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['site_name']; ?></div>
            <div style="clear: both;"></div>
        </div> 
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Node Details'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['node_details']; ?></div>
            <div style="clear: both;"></div>
        </div>
  
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Software Level'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['software_level']; ?></div>
            <div style="clear: both;"></div>
        </div>  

    </div>
</fieldset>  
    
<fieldset>
    <legend>Problem Description</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left_pd"><?php __('Problem Description'); ?></div>
            <?php $dataValues['Csrmaster']['problem_decription'] = str_replace(' ', '&nbsp;',$dataValues['Csrmaster']['problem_decription']);
            $dataValues['Csrmaster']['problem_decription'] = nl2br($dataValues['Csrmaster']['problem_decription']); ?>
            <div class="view_col_right_pd"><?php echo $dataValues['Csrmaster']['problem_decription']; ?></div>
            <div style="clear: both;"></div>
        </div> 

    </div>
</fieldset>  
   
<fieldset>
    <legend>Email Addresses</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Email Addresses'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Csrmaster']['email']; ?></div>
            <div style="clear: both;"></div>
        </div> 

    </div>
</fieldset>  

 <fieldset>
    <legend>File Upload</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('File Name'); ?></div>
            <div class="view_col_right"><?php 
            if (isset($dataValues['Csrfile'][0]['file_name']))
            {
            echo $dataValues['Csrfile'][0]['file_name']; 
            }
            else 
            {
                echo "No files uploaded.";
            }?></div>
            <div style="clear: both;"></div>
        </div> 

    </div>
</fieldset>  


</div>