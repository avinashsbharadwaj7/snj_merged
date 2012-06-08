<?PHP
    $class = 'class="altrow"';
?>
<?PHP
    echo $html->css("lte-lit"); 
    $class = 'class="altrow"';
    echo $this->Html->script(array('jquery.js', 'lte_add_modify.js'));
    //debug($thisDataView);
?>
<li>
    <?PHP 
           echo $this->Html->link(__('Back', true), array('action' => 'index'));
    ?>
</li>

<h2><?php  __('Report Number: ');
    echo $thisDataView['JobSchedule']['id'];?></h2>
<div class="lte_container">
    <fieldset>
    <div class="lte_view"><?PHP $i = 0; ?>
        <fieldset>
        <legend><?php __('Sender Information') ?></legend>
        <?php if(isset($thisDataView['JobSchedule']['sender_info_signum'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Signum'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['sender_info_signum']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['sender_info_name'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Name'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['sender_info_name']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        <?php if(isset($thisDataView['JobSchedule']['sender_info_comments'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Comments'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['sender_info_comments']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        </fieldset>
        <fieldset>
        <legend><?php __('Project Information') ?></legend>
        <?php if(isset($thisDataView['JobSchedule']['project_name'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Name'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_name']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_date_start'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Start Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_date_start']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_date_end'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project End Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_date_end']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_location'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Location'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_location']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_pool'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Pool'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_pool']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_product_area'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Product Area'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_product_area']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_client'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Client'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_client']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_position_name'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Project Position Name'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_position_name']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_position_date_start'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Position Start Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_position_date_start']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_position_date_end'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Position End Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_position_date_end']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['project_job_title'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Job Title'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['project_job_title']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 
        </fieldset>
        <fieldset>
        <legend><?php __('General Information') ?></legend>
        <?php if(isset($thisDataView['JobSchedule']['priority'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Priority'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['priority']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>      
        <?php if(isset($thisDataView['JobSchedule']['expiration_date'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Expiration Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['expiration_date']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>        
        <?php if(isset($thisDataView['JobSchedule']['date_requested_start'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Requested Start Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['date_requested_start']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>                
        <?php if(isset($thisDataView['JobSchedule']['date_requested_end'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Requested End Date'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['date_requested_end']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 
        </fieldset>
        <fieldset>
        <legend><?php __('Personal Options'); ?></legend>
        <?php if(isset($thisDataView['JobSchedule']['follow_up_priority'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Follow-up Priority'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['follow_up_priority']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 
        <?php if(isset($thisDataView['JobSchedule']['filed'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Filed'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['filed']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 
        <?php if(isset($thisDataView['JobSchedule']['notifications'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Notifications'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['notifications']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 
        </fieldset>
        <fieldset>
        <legend><?php __('Position Qualifications'); ?></legend>
        <?php if(isset($thisDataView['JobSchedule']['position_qualifications'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Required'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['position_qualifications']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?> 
        </fieldset>
        <fieldset>
        <legend><?php __('Classifications'); ?></legend>
        <?php if(isset($thisDataView['JobSchedule']['delivery_source'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Delivery Source'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['delivery_source']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        <?php if(isset($thisDataView['JobSchedule']['sap_mus_id'])) {?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('SAP-MUS ID (Project)'); ?></div>
            <div class="view_col_right"><?php echo $thisDataView['JobSchedule']['sap_mus_id']; ?></div>
            <div style="clear: both;"></div>
        </div>  
        <?php } ?>
        </fieldset>
    </div>    
    </fieldset>
</div>    
