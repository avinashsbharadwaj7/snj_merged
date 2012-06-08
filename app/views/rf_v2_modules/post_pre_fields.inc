<fieldset id="rf_precheck_fields">
    <legend>Pre Launch Data</legend>
    <?php
    echo $this->Form->input('pre_launch_number_of_drives',
            array('after' => $helpBox->display('pre_launch_number_of_drives'),));
    echo $this->Form->input('pre_launch_drive1_fail_reason',
            array('after' => $helpBox->display('pre_launch_drive1_fail_reason'),
                'options'=> ($databaseFields->getOptions('reason', 3)),));
    echo $this->Form->input('pre_launch_drive1_fail_description',
            array('after' => $helpBox->display('pre_launch_drive1_fail_description'),
                'label' => 'Please Describe',));
    echo $this->Form->input('pre_launch_drive2_fail_reason',
            array('after' => $helpBox->display('pre_launch_drive2_fail_reason'),
                'options'=> ($databaseFields->getOptions('reason', 3)),));
    echo $this->Form->input('pre_launch_drive2_fail_description',
            array('after' => $helpBox->display('pre_launch_drive2_fail_description'),
                'label' => 'Please Describe',));
    echo $this->Form->input('pre_launch_drive3_fail_reason',
            array('after' => $helpBox->display('pre_launch_drive3_fail_reason'),
                'options'=> ($databaseFields->getOptions('reason', 3)),));
    echo $this->Form->input('pre_launch_drive3_fail_description',
            array('after' => $helpBox->display('pre_launch_drive3_fail_description'),
                'label' => 'Please Describe',));
    ?>
</fieldset>
<fieldset id="rf_postcheck_fields">
    <legend>Post Launch Data</legend>
    <?php
    echo $this->Form->input('post_launch_carrier_tuned',
            array('after' => $helpBox->display('post_launch_carrier_tuned'),));
    echo $this->Form->input('post_launch_complete_closeout_package',
            array('after' => $helpBox->display('post_launch_complete_closeout_package'),
                'options' => ($databaseFields->getOptions('yes_no', '3'))));
    echo $this->Form->input('post_launch_expedited_tuning',
            array('after' => $helpBox->display('post_launch_expedited_tuning'),
                'options' => ($databaseFields->getOptions('yes_no', '3'))));
    echo $this->Form->input('post_launch_frequency_band',
            array('after' => $helpBox->display('post_launch_frequency_band'),));
    echo $this->Form->input('post_launch_daily_report_delivered',
            array('after' => $helpBox->display('post_launch_daily_report_delivered'),
                'options' => ($databaseFields->getOptions('yes_no', '3'))));
    echo $this->Form->input('post_launch_kick_off_slides_delivered',
            array('after' => $helpBox->display('post_launch_kick_off_slides_delivered'),
                'options' => ($databaseFields->getOptions('yes_no', '3'))));
    echo $this->Form->input('post_launch_tracked_delivered',
            array('after' => $helpBox->display('post_launch_tracked_delivered'),
                'options' => ($databaseFields->getOptions('yes_no', '3'))));
    echo $this->Form->input('post_launch_market_folder',
            array('after' => $helpBox->display('post_launch_market_folder'),));
    ?>
</fieldset>