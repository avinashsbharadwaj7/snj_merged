<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?PHP 
    echo $html->css("lte-lit"); 
    $class = ' class="altrow"';
?>

<div class="irModules view">
<h2><?php  __('LIT - Submitted Fields [');
    echo $dataValues['Litmaster']['id'] . ']';?></h2>
    <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['date_initiated']; ?></div>
            <div style="clear: both;"></div>
    </div>
<fieldset>
    <legend>Engineer Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>

<fieldset>
    <legend>Engineer Information</legend>
    <div class="lte_view"><?PHP $i = 0; ?>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Signum'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_name']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Engineer Work Location'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['engineer_work_location']; ?></div>
            <div style="clear: both;"></div>
        </div>
        <div<?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Team Name'); ?></div>
            <div class="view_col_right"><?php echo $dataValues['Litmaster']['team_name']; ?></div>
            <div style="clear: both;"></div>
        </div>                         
    </div>
</fieldset>    
                
             
                
                
                
                
		
     
    <fieldset>
         <legend>Antenna Information</legend>
         <div class="lte_view"><?PHP $i = 0; ?>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Any Alarms/Issues Related To Antenna'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['antenna_alarms']; ?></div>
                <div style="clear: both;"></div>
             </div>
             
             <?PHP if(!empty($dataValues['Litmaster']['antenna_alarms_count']) || !empty($dataValues['Litmaster']['antenna_alarms_count_info'])) { ?>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Number Of Issues/Alarms'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['antenna_alarms_count'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
                <div<?php if ($i++ % 2 == 0) echo $class;?>>
                    <div class="view_col_left"><?PHP __('-Issues/Alarms Information'); ?></div>
                    <div class="view_col_right"><?PHP echo $dataValues['Litmaster']['antenna_alarms_count_info'] . ' '; ?></div>
                    <div style="clear: both;"></div>
                </div>
             <?PHP } ?>
             
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Antenna Work Seems Complete'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['antenna_complete']; ?></div>
                <div style="clear: both;"></div>
             </div>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Location of RRU'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['rru_loc']; ?></div>
                <div style="clear: both;"></div>
             </div>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Connectors/Jumpers'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['conn_jump']; ?></div>
                <div style="clear: both;"></div>
             </div>
             <div<?php if ($i++ % 2 == 0) echo $class;?>>
		<div class="view_col_left"><?php __('Type of Cable (Fiber, Coax etc)'); ?></div>
                <div class="view_col_right"><?php echo $dataValues['Litmaster']['cable_type']; ?></div>
                <div style="clear: both;"></div>
             </div>
         </div>
    </fieldset>
