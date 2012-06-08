<fieldset class="short-labels">
    <legend>Project Description</legend>
    <?php
    echo $this->Form->input("id");
    echo $this->Form->input('project_name',
            array('after' => $helpBox->display('project_name'),));
    echo $this->Form->input('customer_unit',
            array('after' => $helpBox->display('customer_unit'),
                'options' => ($databaseFields->getOptions('customer_unit', '3')),));
    echo $this->Form->input('region',
            array('after' => $helpBox->display('region'),
                'options' => ($databaseFields->getOptions('region', '3')),));
    echo $this->Form->input('state',
            array('after' => $helpBox->display('state'),
                'label' => 'State/Province'));
    echo $this->Form->input('technology',
            array('after' => $helpBox->display('technology'),
                'options' => ($databaseFields->getOptions('technology', '3')),));
    echo $this->Form->input('project_type',
            array('after' => $helpBox->display('project_type'),
                'options' => ($databaseFields->getOptions('project_type', '3')),));
    echo $this->Form->input('market',
            array('after' => $helpBox->display('market'),));
    echo $this->Form->input('market_lead',
            array('after' => $helpBox->display('market_lead'),));
    echo $this->Form->input('project_manager',
            array('after' => $helpBox->display('project_manager'),));
    echo $this->Form->input('work_location',
            array('after' => $helpBox->display('work_location'),
                'options' => ($databaseFields->getOptions('work_location', '3')),));
    echo $this->Form->input('person_completing',
            array('after' => $helpBox->display('person_completing'),
                "readonly" => "readonly",
                "value" => $person_completing));
    echo $this->Form->input('sub_project_name',
            array('after' => $helpBox->display('sub_project_name'),));
    echo $this->Form->input('sub_project_status',
            array('after' => $helpBox->display('sub_project_status'),
                'options' => ($databaseFields->getOptions('sub_project_status', '3')),));
    echo $this->Form->input('number_of_sites',
            array('after' => $helpBox->display('number_of_sites'),));
    ?>
</fieldset>