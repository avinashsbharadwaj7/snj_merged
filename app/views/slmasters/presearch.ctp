<html>
    <head>
            <li><?php echo $html->link("Back",array('action' => 'index') ); ?>
           <h2><u><b>Script Load Reporting - Search.</b></u></h2>
    </head>
        <?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en', 'jquery-ui-1.7.2.custom.min.js' , 'jquery-1.3.2.min.js' ,'slpresearch.js')); ?>
        <?php echo $html->css('jscal2', 'stylesheet')."\n"; ?>
        <?php echo $html->css('border-radius', 'stylesheet')."\n"; ?>
        <?php echo $html->css('steel/steel', 'stylesheet')."\n"; ?>

        <?php
            echo $this->Form->create('Slmaster', array('action' => 'search',onsubmit=>'return validateForm()'));

          /*  foreach($net_nums as $foreach_net_nums):
                $temp_nn[$foreach_net_nums['Slmaster']['network_number']] = $foreach_net_nums['Slmaster']['network_number'];
            endforeach;

            foreach($ids as $foreach_ids):
                $temp_id[$foreach_ids['Slmaster']['id']] = 'SLRW'.$foreach_ids['Slmaster']['id'];
            endforeach;

            foreach($signums as $foreach_sig):
                $temp_sig[$foreach_sig['Slmaster']['nic_signum']] = $foreach_sig['Slmaster']['nic_signum'];
            endforeach;

            foreach($rncs as $foreach_rnc):
                $temp_rnc[$foreach_rnc['Slmaster']['rnc']] = $foreach_rnc['Slmaster']['rnc'];
            endforeach;

            foreach($osss as $foreach_oss):
                $temp_oss[$foreach_oss['Slmaster']['oss']] = $foreach_oss['Slmaster']['oss'];
            endforeach;*/

            $flag = 0;
            $optgrp;
            foreach($dropdown_fields as $dd):
                $dd = $dd['Dropdown'];
                    if($dd['field']=='region')
                        $temp_reg[$dd['value']] = $dd['label'];
                    else if($dd['field']=='work_location')
                        $temp_wl[$dd['value']] = $dd['label'];
                    else if($dd['field']=='activity_type')
                    {                        
                        if($dd['value'] == "")
                        {
                            $optgrp[$flag] = $dd['label'];
                            $flag++;
                        }
                        else
                        {
                            if($flag > 0)
                                $temp_act[$optgrp[$flag-1]][$dd['value']] = $dd['label'];
                            else
                                $temp_act[$dd['value']] = $dd['label'];
                        }
                    }
            endforeach;

            //var_dump($dropdown_fields);

            echo $this->Form->input('search', array('options' => array(
                                                                'network_number'=>'Network Number',
                                                                'id'=>'SLR Number',                                                                
                                                                'date_activity_performed'=>'Date Activity Performed',
                                                                'date_created'=>'Date Created',
                                                                'nic_signum'=>'NIC Engineer Signum',
                                                                'region'=>'Region',
                                                                'work_location'=>'NIC Engineer Work Location',                                                                
                                                                'activity_type'=>'Activity',
                                                                'rnc'=>'RNC',
                                                                'oss'=>'OSS',
                                                                'slr_report_status'=>'SLR Report Status',
                                                                'issues_reports'=>'Reports with issues',
                                                                ),
                                                    'empty' => 'Select Search Type','id' => 'search'));
           
            ?>
    
            <span id='Div_search_nn'><?php echo $this->Form->input('network_number', array( 'label'=>'Network Number', 'type'=>'text', 'id'=>'network_number' ) ); ?></span>
            <span id='Div_search_id'><?php echo $this->Form->input('id', array( 'label'=>'SLR Number', 'type'=>'text','id'=>'ids' ) ); ?></span>
            <span id='Div_search_dateActivityPer'><?php echo $datePicker->picker('date_activity_performed',array('id'=>'date_activity_performed','label'=>'Date Activity Performed', 'READONLY' => true)); ?></span>
            <span id='Div_search_dateCreated'><?php echo $datePicker->picker('date_created',array('id'=>'date_created','label'=>'Date Created', 'READONLY' => true)); ?></span>
            <span id='Div_search_sig'><?php echo $this->Form->input('nic_signum', array( 'label'=>'NIC Engineer Signum', 'type'=>'text', 'id'=>'nic_signum' ) ); ?></span>
            <span id='Div_search_reg'><?php echo $this->Form->input('region', array('options' => array($temp_reg), 'empty' => '', 'id'=>'region','label'=> 'Region')); ?></span>
            <span id='Div_search_wl'><?php echo $this->Form->input('work_location', array('options' => array($temp_wl), 'empty' => '', 'id'=>'work_location', 'label'=> 'NIC Engineer Work Location')); ?></span>
            <span id='Div_search_act'><?php echo $this->Form->input('activity_type', array('options' => $temp_act, 'empty' => '', 'id'=>'activity_type', 'label'=> 'Activity Type')); ?></span>
            <span id='Div_search_rnc'><?php echo $this->Form->input('rnc', array( 'label'=>'RNC', 'type'=>'text','id'=>'rnc' ) ); ?></span>
            <span id='Div_search_oss'><?php echo $this->Form->input('oss', array( 'label'=>'OSS', 'type'=>'text','id'=>'oss' ) ); ?></span>
            <span id='Div_search_openReports'><?php echo $this->Form->input('slr_report_status', array('options' => array('1'=>'Closed Reports','0'=>'Open Reports'), 'empty' => '','id'=>'slr_report_status', 'label'=> 'SLR Report Status')); ?></span>
            <span id='Div_search_issuesReports'><?php echo $this->Form->input('issues', array('options' => array('Y'=>'Yes','N'=>'No'), 'empty' => '','id'=>'issues', 'label'=> 'Reports with Issues')); ?></span>

            

           
            <?php echo $form->submit('Submit'); ?>

</html>