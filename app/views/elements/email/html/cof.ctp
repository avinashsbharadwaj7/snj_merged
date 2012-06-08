<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
<?php
echo $this->Html->css('lte-lit');
$class = 'class="altrow"';
$dataValues = $dataValues['Cofmaster'];

?>

<h2><b><u>View - COF Number
            <?php echo $dataValues['id']; ?></u></b></h2>
<div class="lte_container">
    <fieldset>
        <legend>Project Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div <?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['signum']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Engineer Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['first_name'] . " " . $dataValues['last_name']; ?></div>
                <div style="clear: both;"></div>
            </div>

            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Project Name'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['proj_name']; ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Group'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['group']; ?>
                </div>
                <div style="clear: both;"></div>
            </div>     
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Change Initiated By'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['change_initiatedby']; ?>
                </div>
                <div style="clear: both;"></div>
            </div>    
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Reason of Change'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['change_reason']; ?>
                </div>
                <div style="clear: both;"></div>
            </div> 
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Network Number'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['network_num']; ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Estimated Time(Hour)'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['time_estimate']; ?>
                </div>
                <div style="clear: both;"></div>
            </div>   

        </div>
    </fieldset>
    <fieldset>
    <legend><?php __('Activity Information'); ?></legend>
    <div class="lte_view"><?PHP $i = 0; ?>
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Activity Type'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['activity_type']; ?></div>
                <div style="clear: both;"></div>
            </div> 
    </div>
    </fieldset>
    <fieldset>
        <legend>Network Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Operator'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['operator_name']; ?></div>
                <div style="clear: both;"></div>
            </div>        
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Market'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['market']; ?></div>
                <div style="clear: both;"></div>
            </div>      
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Mobile Core Network'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['mobile_core_network']; ?></div>
                <div style="clear: both;"></div>
            </div>       
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('OSS Network'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['oss_network']; ?></div>
                <div style="clear: both;"></div>
            </div>  
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Transport Network'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['transport_network']; ?></div>
                <div style="clear: both;"></div>
            </div>     
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('IP Networking'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['ipnetwork']; ?></div>
                <div style="clear: both;"></div>
            </div>     
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Radio Access Network'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['ran']; ?></div>
                <div style="clear: both;"></div>
            </div>    
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <div class="view_col_left"><?php __('Multimedia Service'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['multimdeia_service']; ?></div>
                <div style="clear: both;"></div>
            </div>      
        </div>
    </fieldset>   

    <fieldset>
        <legend>Additional Information</legend>
        <div class="lte_view"><?PHP $i = 0; ?>
            <div <?php if ($i++ % 2 == 0)
                    echo $class; ?>>    
                <div class="view_col_left_pd"><?php __('Additional Notes'); ?></div>
                <?php $dataValues['description'] = str_replace(' ', '&nbsp;', $dataValues['description']);
                $dataValues['description'] = nl2br($dataValues['description']); ?>
                <div class="view_col_right_pd"><?php echo $dataValues['description']; ?></div>
                <div style="clear: both;"></div>
            </div> 
        </div>
    </fieldset>      
</div>