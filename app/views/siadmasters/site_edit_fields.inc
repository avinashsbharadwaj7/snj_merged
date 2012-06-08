<fieldset>
    <legend><?php __('Project Information'); ?></legend>
    <?php
    echo $this->Form->input('Siadsite.site_name');
    echo $this->Form->input('Siadsite.siad_clli', array('label'=>'SIAD CLLI'));
    echo $this->Form->input('Siadsite.oam_loopback_ip_address', array('label'=>'SIAD OAM Loopback IP Address'));
    echo $this->Form->input('Siadsite.oam_default_ip_address', array('label'=>'SIAD OAM Default IP Address'));
    echo $this->Form->input('Siadsite.bearer_default_ip_address', array('label'=>'Bearer Default IP Address'));
    echo $this->Form->input('Siadsite.siad_activity_type', array('label'=>'Activity Type', "options"=>$databaseFields->getOptions('siad_activity_type',4)));
    echo $this->Form->input('Siadsite.siad_activity_status', array('label'=>'Final Result', "options"=>$databaseFields->getOptions('siad_activity_status',4)));
    ?>
</fieldset>