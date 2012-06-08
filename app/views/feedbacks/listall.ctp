<li><?php echo $this->Html->link(__('Back', true), array('controller'=>'rf_modules','action' => 'index')); ?> </li>
<fieldset>
    <legend>Feedback/Comments</legend>

    <table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Comments</th>
    </tr>

    <?php  foreach ($feedbacks as $post): ?>
    <tr>
        <td>
        <?php echo $this->Html->link($post['Feedback']['id'], array('action' => 'view', $post['Feedback']['id']));?>
        </td>
        <td><?php echo $post['Feedback']['signum']; ?></td>
        <td><?php echo $post['Feedback']['comments']; ?></td> 


    
    </tr>
    <?php endforeach; ?>

    </table>
    </fieldset>
