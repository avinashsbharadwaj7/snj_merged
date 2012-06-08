<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php //echo $this->Html->link(__('Edit Ir Module', true), array('action' => 'edit', $RfModule['RfModule']['id']));  ?> </li>
        <li><?php //echo $this->Html->link(__('Delete Ir Module', true), array('action' => 'delete', $RfModule['RfModule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $RfModule['RfModule']['id']));  ?> </li>
        <li><?php echo $this->Html->link(__('List All Reports', true), array('action' => 'listall')); ?> </li>
        <li><?php echo $this->Html->link(__('Add', true), array('action' => 'add')); ?> </li>

        <li><?php //echo $this->Html->link(__('List Ir Additional Engineers', true), array('controller' => 'rf_additional_engineers', 'action' => 'index'));  ?> </li>
        <li><?php //echo $this->Html->link(__('New Ir Additional Engineer', true), array('controller' => 'rf_additional_engineers', 'action' => 'add'));  ?> </li>
        <li><?php echo $this->Html->link(__('Feedback', true), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('View Comments/Feedback', true), array('controller' => 'feedbacks', 'action' => 'listall')); ?> </li>
    </ul>
</div>

<fieldset>
    <div class="paging">
        <?php echo $paginator->prev('<< ' . __('Previous Page', true), array(), null, array('class' => 'disabled')); ?>
        |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next Page', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
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
            <th><?php echo $this->Paginator->sort('Report Number', 'id') ?></th>
            <th><?php echo $this->Paginator->sort('Date Created', 'date_created') ?></th>
            <th><?php echo $this->Paginator->sort('Project Name', 'project_name') ?></th>
            <th><?php echo $this->Paginator->sort('Customer Unit', 'customer_unit') ?></th>
            <th><?php echo $this->Paginator->sort('Region', 'region') ?></th>
            <th><?php echo $this->Paginator->sort('Technology', 'technology') ?></th>
            <th><?php echo $this->Paginator->sort('Project Type', 'project_type') ?></th>
            <th><?php echo $this->Paginator->sort('Market', 'market') ?></th>
        </tr>

        <?php foreach ($RfReports as $post): ?>
            <tr>
                <td>
                <?php echo $this->Html->link($post['RfModule']['id'], array('action' => 'view', $post['RfModule']['id'])); ?>
            </td>
            <td><?php echo $post['RfModule']['date_created']; ?></td>
            <td><?php echo $post['RfModule']['project_name']; ?></td>
            <td><?php echo $post['RfModule']['customer_unit']; ?></td>
            <td><?php echo $post['RfModule']['region']; ?></td>
            <td><?php echo $post['RfModule']['technology']; ?></td>
            <td><?php echo $post['RfModule']['project_type']; ?></td>
            <td><?php echo $post['RfModule']['market']; ?></td>



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
