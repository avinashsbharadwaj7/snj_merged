<fieldset>
    <legend>Project Deliverables</legend>
    <fieldset>
        <legend>Recommendations & Implementations</legend>
        <?php
        echo $this->Form->input('change_recommendations_number',
                array('after' => $helpBox->display('change_recommendations_number'),
                    'label' => 'Number of change recommendations (0=none)',));
        echo $this->Form->input('rejected_recommendations_number',
                array('after' => $helpBox->display('rejected_recommendations_number'),
                    'label' => 'No. of recommendations rejected from final/close-out report',));
        echo $this->Form->input('majority_rejection_responsible',
                array('after' => $helpBox->display('majority_rejection_responsible'),
                    'label' => 'Who is responsible for majority of rejections',
                    'options' => ($databaseFields->getOptions('rejection_responsible', '3')),));
        echo $this->Form->input('major_rejection_reason',
                array('after' => $helpBox->display('major_rejection_reason'),
                    'label' => 'Major reason for rejections',
                    'options' => ($databaseFields->getOptions('fail_reason', '3')),));
        echo $this->Form->input('major_rejection_reason_comment',
                array('after' => $helpBox->display('major_rejection_reason_comment'),
                    'label' => 'Please Comment',));
        echo $this->Form->input('changes_not_implemented_number',
                array('after' => $helpBox->display('changes_not_implemented_number'),
                    'label' => 'Total of number of accepted changes not implemented',
        ));
        echo $this->Form->input('major_not_implemented_reason',
                array('after' => $helpBox->display('major_not_implemented_reason'),
                    'label' => 'Major reason for not implemented',
                    'options' => ($databaseFields->getOptions('fail_reason', '3')),));
        echo $this->Form->input('major_not_implemented_comment',
                array('after' => $helpBox->display('major_not_implemented_comment'),
                    'label' => 'Please Comment',));
        ?>
    </fieldset>
    <fieldset>
        <legend>SOW/Delivery Date adjustments & Tracking</legend>
        <?php
        echo $this->Form->input('sow_adjustments_number',
                array('after' => $helpBox->display('sow_adjustments_number'),
                    'label' => 'Total number of SOW adjustments (0=none)',));
        echo $this->Form->input('sow_adjustments_reason_1',
                array('after' => $helpBox->display('sow_adjustments_reason_1'),
                    'label' => 'Reason for SOW adjustments 1st time',
                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),));
        echo $this->Form->input('sow_adjustments_reason_1_comment',
                array('after' => $helpBox->display('sow_adjustments_reason_1_comment'),
                    'label' => 'Please Comment',));
        echo $this->Form->input('sow_adjustments_reason_2',
                array('after' => $helpBox->display('sow_adjustments_reason_2'),
                    'label' => 'Reason for SOW adjustments 2nd time',
                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),));
        echo $this->Form->input('sow_adjustments_reason_2_comment',
                array('after' => $helpBox->display('sow_adjustments_reason_2_comment'),
                    'label' => 'Please Comment',));
        echo $this->Form->input('sow_adjustments_reason_3',
                array('after' => $helpBox->display('sow_adjustments_reason_3'),
                    'label' => 'Reason for SOW adjustments 3rd time',
                    'options' => ($databaseFields->getOptions('sow_adjustment_reason', 3)),));
        echo $this->Form->input('sow_adjustments_reason_3_comment',
                array('after' => $helpBox->display('sow_adjustments_reason_3_comment'),
                    'label' => 'Please Comment',));
        echo $this->Form->input('delivery_date_adjustments_number',
                array('after' => $helpBox->display('delivery_date_adjustments_number'),
                    'label' => 'Total number of Delivery Date adjustments (0=none)',));
        echo $this->Form->input('delivery_date_adjustment_reason_1',
                array('after' => $helpBox->display('delivery_date_adjustment_reason_1'),
                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                    'label' => 'Reason for 1st change to planned date',));
        echo $this->Form->input('delivery_date_adjustment_reason_1_comment',
                array('after' => $helpBox->display('delivery_date_adjustment_reason_1_comment'),
                    ));
        echo $this->Form->input('delivery_date_adjustment_reason_2',
                array('after' => $helpBox->display('delivery_date_adjustment_reason_2'),
                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                    'label' => 'Reason for 2nd change to planned date',));
        echo $this->Form->input('delivery_date_adjustment_reason_2_comment',
                array('after' => $helpBox->display('delivery_date_adjustment_reason_2_comment'),
                    'label' => 'Please Comment',));
        echo $this->Form->input('delivery_date_adjustment_reason_3',
                array('after' => $helpBox->display('delivery_date_adjustment_reason_3'),
                    'options' => ($databaseFields->getOptions('late_reason', 3)),
                    'label' => 'Reason for 2nd change to planned date',));
        echo $this->Form->input('delivery_date_adjustment_reason_3_comment',
                array('after' => $helpBox->display('delivery_date_adjustment_reason_3_comment'),
                    'label' => 'Please Comment',));
        echo $this->Form->input('actual_delivery_date',
                array('after' => $helpBox->display('actual_delivery_date'), 'class' => 'date', 'type' => 'text',));
        echo $this->Form->input('late_delivery_reason',
                array('after' => $helpBox->display('late_delivery_reason'),
                    'options' => ($databaseFields->getOptions('late_reason', '3')),
                    'label'=>'Reason for late delivery',));
        echo $this->Form->input('late_delivery_comment',
                array('after' => $helpBox->display('late_delivery_comment'),
                    'label' => 'Please Comment',));
        ?>
    </fieldset>
</fieldset>