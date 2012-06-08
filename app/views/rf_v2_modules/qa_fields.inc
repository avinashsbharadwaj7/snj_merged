<fieldset>
    <legend>Delivery Review</legend>
    <?php
    echo $this->Form->input('project_expectations_met',
            array('after' => $helpBox->display('project_expectations_met'),
                'label' => 'Did we meet the project SOW & expectations?',
                'options' => ($databaseFields->getOptions('yes_no', '3')),));
    echo $this->Form->input('project_expectations_not_met_reason',
            array('after' => $helpBox->display('project_expectations_not_met_reason'),
                'label' => 'Reason for not meeting SOW & Expectations',
                'options' => ($databaseFields->getOptions('late_reason', 3)),));
    echo $this->Form->input('project_expectations_not_met_comment',
            array('after' => $helpBox->display('project_expectations_not_met_comment'),
                'label' => 'Please Comment',));
    echo $this->Form->input('project_approved_by_customer',
            array('after' => $helpBox->display('project_approved_by_customer'),
                'label' => 'Was the project approved by the customer when formally presented (on time)?',
                'options' => ($databaseFields->getOptions('yes_no', '3')),));
    echo $this->Form->input('customer_not_accepting_reason',
            array('after' => $helpBox->display('customer_not_accepting_reason'),
                'label' => 'Reason for customer not accepting project',
                'options' => ($databaseFields->getOptions('customer_accept_reason', 3)),));
    echo $this->Form->input('customer_not_accepting_comment',
            array('after' => $helpBox->display('customer_not_accepting_comment'),
                'label' => 'Please Comment',));
    ?>
    <fieldset class="short-labels">
        <legend>OverAll Quality</legend>
        <?php
        echo $this->Form->input('overall_quality_rating',
                array('after' => $helpBox->display('overall_quality_rating'),
                    'options' => ($databaseFields->getOptions('overall_quality_rating', '3')),));
        ?>
    </fieldset>
</fieldset>