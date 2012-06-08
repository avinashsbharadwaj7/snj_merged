<?php echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp')); ?>
<?php
/*
 * Search for RF modules
 *
 * Display when data search criteria is applied
 */
?>
<?php if ($searchRendered): ?>
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php //echo $this->Html->link(__('Edit Ir Module', true), array('action' => 'edit', $RfV2Module['RfV2Module']['id']));        ?> </li>
            <li><?php //echo $this->Html->link(__('Delete Ir Module', true), array('action' => 'delete', $RfV2Module['RfV2Module']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $RfV2Module['RfV2Module']['id']));        ?> </li>
            <li><?php echo $this->Html->link(__('List All Reports', true), array('action' => 'listall')); ?> </li>
            <li><?php echo $this->Html->link(__('Add', true), array('action' => 'add')); ?> </li>

            <li><?php //echo $this->Html->link(__('List Ir Additional Engineers', true), array('controller' => 'rf_additional_engineers', 'action' => 'index'));        ?> </li>
            <li><?php //echo $this->Html->link(__('New Ir Additional Engineer', true), array('controller' => 'rf_additional_engineers', 'action' => 'add'));        ?> </li>
            <li><?php echo $this->Html->link(__('Feedback', true), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('View Comments/Feedback', true), array('controller' => 'feedbacks', 'action' => 'listall')); ?> </li>
        </ul>
    </div>

    <fieldset>
        <?php echo $this->Html->link("Download Excel", array('action' => 'download'), array("style"=>"text-align:center;margin-bottom:10px;display:block;")); ?>
        <div class="paging">
        <?php echo $paginator->prev('<< ' . __('Previous', true), array(), null, array('class' => 'disabled')); ?>
        |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
        <br>
        <br><?php
        echo $paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>
    </div>


    <legend>RF Reports</legend>

    <table>
        <tr>
            <th>Report Number</th>
            <th>Project Name</th>
            <th>Customer Unit</th>
            <th>Region</th>
            <th>Technology</th>
            <th>Project Type</th>
            <th>Market</th>
        </tr>

        <?php foreach ($RfReports as $post): ?>
            <tr>
                <td>
                <?php echo $this->Html->link($post['RfV2Module']['id'], array('action' => 'view', $post['RfV2Module']['id'])); ?>
            </td>
            <td><?php echo $post['RfV2Module']['project_name']; ?></td>
            <td><?php echo $post['RfV2Module']['customer_unit']; ?></td>
            <td><?php echo $post['RfV2Module']['region']; ?></td>
            <td><?php echo $post['RfV2Module']['technology']; ?></td>
            <td><?php echo $post['RfV2Module']['project_type']; ?></td>
            <td><?php echo $post['RfV2Module']['market']; ?></td>



        </tr>
        <?php endforeach; ?>

            </table>

            <div class="paging">
        <?php echo $paginator->prev('<< ' . __('Previous Page', true), array(), null, array('class' => 'disabled')); ?>
                |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next Page', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
                <br><br><?php
                echo $paginator->counter(array(
                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                ));
        ?>
            </div>
        </fieldset>
<?php endif; ?>

                <fieldset>
                    <legend>Search Criteria</legend>
    <?php
                echo $this->Form->create('RfV2Module');
                echo $this->Form->input('customer_unit', array('options' => ($databaseFields->getOptions('customer_unit', '3'))));
                echo $this->Form->input('region', array('options' => ($databaseFields->getOptions('region', '3'))));
                echo $this->Form->input('market');
                echo $this->Form->input('technology', array('options' => ($databaseFields->getOptions('technology', '3'))));
                echo $this->Form->input('project_type', array('options' => ($databaseFields->getOptions('project_type', '3'))));
                echo $this->Form->input('work_location', array('options' => ($databaseFields->getOptions('work_location', '3'))));
    ?>
                <fieldset>
                    <legend>Expected Delivery Date</legend>
        <?php
                echo $this->Form->input('expected_delivery_date_from', array("label" => "From","after"=>"(YYYY-MM-DD)"));
                echo $this->Form->input('expected_delivery_date_to', array("label" => "To", "after"=>"(YYYY-MM-DD)"));
        ?>
            </fieldset>
            <fieldset>
                <legend>Actual Delivery Date</legend>
        <?php
                echo $this->Form->input('actual_delivery_date_from', array("label" => "From", "after"=>"(YYYY-MM-DD)"));
                echo $this->Form->input('actual_delivery_date_to', array("label" => "To", "after"=>"(YYYY-MM-DD)"));
        ?>
            </fieldset>
        <?php echo $this->Form->end(array("label" => 'Search'));?>
    </fieldset>
