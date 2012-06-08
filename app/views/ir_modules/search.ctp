<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?PHP
    echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en'));
    echo $html->css('jscal2', 'stylesheet');
    echo $html->css('border-radius', 'stylesheet');
    echo $html->css('steel/steel', 'stylesheet');
    echo $html->css("lte-lit");    
    $class = " class=\"paginator_col_inner\"";
    $class_alt = " class=\"paginator_col_inner_alt\"";
    $baselinevalues = array("2nd Carrier Add"=>"2nd Carrier Add","3rd Carrier Add"=>"3rd Carrier Add", "3rd carrier add cable crossover solution"=>"3rd carrier add cable crossover solution", "4th carrier add in 2nd cabinet"=>"4th carrier add in 2nd cabinet", "3rd carrier add using OBIF & RRUW"=>"3rd carrier add using OBIF & RRUW", "4th carrier add using OBIF & RRUW"=>"4th carrier add using OBIF & RRUW", "New Integration (lub over ATM)"=>"New Integration (lub over ATM)", "New Integration (lub over IP)"=>"New Integration (lub over IP)");
    $activityOptionsNIC = $databaseFields->getOptions("new_activities",1);
    $activityOptionsNDS = $databaseFields->getOptions("activity",10);        
?>

<?PHP if(!$conditions_entered) { ?>
    <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
    <h2>Search</h2>
    <div class="lte_container">
        <fieldset>
            <legend><?PHP __('Search Criteria'); ?></legend>
            <div style="padding-bottom: 12px; font-style: italic;">*Leave all fields blank to list all IR reports</div>
            <?PHP 
                echo $this->Form->create('IrModule');
                echo $this->Form->input('irid', array('label'=>'IR Report Number'));
               // echo $datePicker->picker('date_initiated', array('label'=>'Date Initiated'));
                ?>
            <legend>Date Range</legend>
          <?php echo $datePicker->picker('From');
                echo $datePicker->picker('To');

                echo $this->Form->input('region', array('label'=>'Region', "options"=>$databaseFields->getOptions("region",1), 'type'=>'select'));
                echo $ajax->div('region_placeholder', array('class'=>'placeholders'));
                echo $ajax->divEnd('region_placeholder');
                echo $ajax->observeField('IrModuleRegion', array('update'=>'region_placeholder', 'url'=>array('controller'=>'ir_modules','action'=>'updater'),'frequency'=>0.2));                        

                echo $this->Form->input('engineer_work_location', array('label'=>'Engineer Work Location', "options"=>$databaseFields->getOptions("work_loc",1)));
                echo $this->Form->input('engineer_signum', array('label'=>'Engineer Signum'));
                echo $this->Form->input('customer', array('label'=>'Customer', "options"=>$databaseFields->getOptions("customer",1)));
                echo $this->Form->input('network_number', array('label'=>'Network Number'));
                echo $this->Form->input('access_method', array("label"=>"Access Method used ?", "options"=>array("","OSS"=>"OSS","Sonar"=>"Sonar", "Smart Laptop"=>"Smart Laptop")));
                echo $this->Form->input('activity_type', array('options'=>array("NIC"=>$activityOptionsNIC, "NDS"=>$activityOptionsNDS, "Baseline"=>"BASELINE", "Smart Laptop"=>"Smart Laptop", "NIC-Day Time Activities"=>"NIC-Day Time Activities", "VOC"=>"VOC")));                                
                //echo $this->Form->input('voc_activities', array('label' => 'VOC Activities', 'options'=>$databaseFields->getOptions("voc_activities", 1)));                                                
            ?>
            <?PHP echo $this->Form->end(__('Search', true));?>
        </fieldset>
    </div>
<?PHP }
    else {
        /* else block */
?>
<li><?php echo $this->Html->link(__('Back', true), array('action' => 'search', 'fromSearchResults')); ?> </li>
<h2>SEARCH RESULTS</h2>
<div class="lte_container">
   
       
       <?php //var_dump($irQuery);?>
        <div class="paging">
            <div class="paginator_nav_left">
                <?PHP if(Authsome::check('/ir_modules/export')) {
                    echo $this->Html->link(__('[Excel Export]', true), array('action' => 'irexcel'));
                } ?>
            </div>
            
            <div class="paginator_nav_left">
                <?php echo $paginator->first(); ?>
                <?PHP echo $this->Paginator->prev('<< ' . __('Prev', true), array(), null, array('class' => 'disabled')); ?>
                &nbsp;[<?php echo $this->Paginator->counter(array('format' => __('%page% of %pages%', true))); ?>]&nbsp;
                <?php echo $this->Paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
				<?php echo $paginator->last();	?>
            </div>
            
            <div class="paginator_table_cdma">
                <div class="paginator_row_cdma">
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('IR ID', 'id'); ?></div></div>          
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Engineer Name', 'engineer_name'); ?></div></div>                    
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Customer', 'customer'); ?></div></div>                    
                    <div class="paginator_col_header_id"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Region', 'region'); ?></div></div>
                    <div class="paginator_col_header_cdma"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Activity Type', 'activity_type'); ?></div></div>
                    <div class="paginator_col_header_ir"><div class="paginator_col_header_inner"><?PHP echo $this->Paginator->sort('Activity Result', 'activity_result'); ?></div></div>
                   
                    <div style="width: 0px; clear: both;"></div>
                </div>
                
                <?PHP 
                    $i = 0;
                    $j = 0;
                ?>
                <?PHP foreach($irQuery as $result): 
                    ?>
                    <div class="paginator_row_cdma">
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $this->Html->link($result['IrModule']['id'], array('action' => 'view', $result['IrModule']['id'], 'search', 'fromView'),array('target' => '_blank')); ?></div></div>
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['IrModule']['engineer_name']; ?></div></div>
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['IrModule']['customer']; ?></div></div>
                        <div class="paginator_col_id"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['IrModule']['region']; ?></div></div>
                        <div class="paginator_col_cdma"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['IrModule']['activity_type']; ?></div></div>
                        <div class="paginator_col_ir"><div<?PHP echo ($i == 0) ? $class : $class_alt; ?>><?php echo $result['IrModule']['activity_result']; ?></div></div>
                        
                        <div style="width: 0px; clear: both;"></div>
                        <?PHP $i = (++$i % 2 == 0) ? 0 : 1 ?>
                    </div>
                <?PHP endforeach; ?>
            </div>
            
            <div class="paginator_nav_left">
                <?php echo $this->Paginator->counter(array('format' => __('Page %page% of %pages% | Showing %current% Records | %count% Total', true))); ?>
            </div>
            
        </div>
 
</div>
<?PHP } ?>