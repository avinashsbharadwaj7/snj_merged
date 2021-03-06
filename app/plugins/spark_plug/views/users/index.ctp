<?php echo $html->link($trans->__('Back to Dashboard'), '/users/dashboard'); ?>

<h2><?php echo $trans->__('Users'); ?> </h2>
<div class="table_wrap browse">
    <table class="full" cellspacing="1" cellpadding="4" border="0" bgcolor="#dddddd" width="100%">
        <tr>
            <th><?php echo $paginator->sort('id'); ?></th>
            <th><?php echo $paginator->sort('user_group_id'); ?></th>
            <th><?php echo $paginator->sort('first_name'); ?></th>
            <th><?php echo $paginator->sort('last_name'); ?></th>
            <th><?php echo $paginator->sort('username'); ?></th>
            <th><?php echo $paginator->sort('email'); ?></th>
            <th><?php echo $paginator->sort('active'); ?></th>
            <th><?php echo $paginator->sort('created'); ?></th>
            <th class="actions"><?php $trans->__('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($users as $user):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td>
                    <?php echo $user['User']['id']; ?>
                </td>
                <td>
                    <?php echo $user['UserGroup']['name']; ?>
                </td>
                <td>
                    <?php echo $user['User']['first_name']; ?>
                </td>
                <td>
                    <?php echo $user['User']['last_name']; ?>
                </td>
                <td>
                    <?php echo $user['User']['username']; ?>
                </td>
                <td>
                    <?php echo $user['User']['email']; ?>
                </td>
                <td>
                    <?php echo $user['User']['active']; ?>
                </td>
                <td>
                    <?php echo $user['User']['created']; ?>
                </td>
                <td class="actions">
                    <?php echo $html->link($trans->__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $html->link($trans->__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="paging">
        <?PHP
        echo $paginator->first('<< ' . __('First', true), array(), null, array('class' => 'disabled'));
        if ($paginator->hasPrev()) {
            echo "&nbsp;|&nbsp;";
        }
        ?>
        <?php echo $paginator->prev('<< ' . $trans->__('Previous', true), array(), null, array('class' => 'disabled')); ?>
    | 	<?php echo $paginator->numbers(); ?>
    |	<?php echo $paginator->next($trans->__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
        <?php if ($this->Paginator->hasNext()) {
              echo "&nbsp;|&nbsp;";
              }
        ?>
        <?php echo $paginator->last(__('Last', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
</div>