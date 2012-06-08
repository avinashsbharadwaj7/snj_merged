<fieldset>
    <legend>Project Inputs</legend>
    <fieldset>
        <legend>Input Verification</legend>
        <?php
        echo $this->Form->input('checklist_accurate',
                array('options' => $databaseFields->getOptions('yes_no', '3'),
                    'label'=>'Are the project inputs/checklists available and accurate?',));
        echo $this->Form->input('checklist_inaccurate_reason',
                array('after' => $helpBox->display('checklist_inaccurate_reason'),
                    'options'=> ($databaseFields->getOptions('reason', 3)),
                    'label'=>'Reason',));
        echo $this->Form->input('checklist_inaccurate_comment',
                array('after' => $helpBox->display('checklist_inaccurate_comment'),
                    'label'=>'Please Comment',));
        echo $this->Form->input('sow_available',
                array('after' => $helpBox->display('sow_available'),
                    'options' => $databaseFields->getOptions('yes_no', '3'),
                    'label'=>'Is the SOW available and correct?',));
        echo $this->Form->input('sow_unavailable_reason',
                array('after' => $helpBox->display('sow_unavailable_reason'),
                    'options'=> ($databaseFields->getOptions('reason', 3)),
                    'label'=>'Reason',));
        echo $this->Form->input('sow_unavailable_reason_comment',
                array('after' => $helpBox->display('sow_unavailable_reason_comment'),
                    'label'=>'Please Comment',));
        echo $this->Form->input('nw_number_available',
                array('after' => $helpBox->display('nw_number_available'),
                    'options' => $databaseFields->getOptions('yes_no', '3'),
                    'label'=>'Was the NW Number available at project start?',));
        echo $this->Form->input('nw_number_unavailable_reason',
                array('after' => $helpBox->display('nw_number_unavailable_reason'),
                    'options'=> ($databaseFields->getOptions('reason', 3)),
                    'label'=>'Reason',));
        echo $this->Form->input('nw_number_unavailable_comment',
                array('after' => $helpBox->display('nw_number_unavailable_comment'),
                    'label'=>'Please Comment',));
        echo $this->Form->input('project_budget_access',
                array('after' => $helpBox->display('project_budget_access'),
                    'options' => $databaseFields->getOptions('yes_no', '3'),
                    'label'=>'Do you have access to the project budget (TPR)?',));
        echo $this->Form->input('project_budget_no_access_reason',
                array('after' => $helpBox->display('project_budget_no_access_reason'),
                    'options'=> ($databaseFields->getOptions('reason', 3)),
                    'label'=>'Reason',));
        echo $this->Form->input('project_budget_no_access_comment',
                array('after' => $helpBox->display('project_budget_no_access_comment'),
                    'label'=>'Please Comment',));
        echo $this->Form->input('engineers_qualified',
                array('after' => $helpBox->display('engineers_qualified'),
                    'options' => $databaseFields->getOptions('yes_no', '3'),
                    'label'=>'Are > 90% of the engineers qualified for the job?',));
        echo $this->Form->input('engineers_qualified_quantity',
                array('after' => $helpBox->display('engineers_qualified_quantity'),
                    'label'=>'How many are qualified?',
                    'options'=> ($databaseFields->getOptions('engineers_qualified', 3)),));
        ?>
    </fieldset>
    <fieldset>
        <legend>Project Milestone/Dates</legend>
        <?php
        echo $this->Form->input('project_start_date',
                array('after' => $helpBox->display('project_start_date'), 'class' => 'date', 'type' => 'text'));
        echo $this->Form->input('initial_planned_delivery_date_on_sow',
                array('after' => $helpBox->display('initial_planned_delivery_date_on_sow'), 'class' => 'date', 'type' => 'text',
                    'label'=>'Initial Planned Delivery Date (based on SOW)',));
        ?>
    </fieldset>
</fieldset>