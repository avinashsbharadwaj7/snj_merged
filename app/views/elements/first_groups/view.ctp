<fieldset>
    <legend>RNC Group#1</legend>
    <dl>
        <?php
        foreach ($rncFields[0] as $field => $label):
        ?>
            <dt class="<?php echo $rncDatabaseFields->getClass($this->data['FirstGroup'][$field]);?>">
                <?php echo $label ?>
            </dt>
            <dd style ="margin-right: 1em">
                <?php echo $this->data['FirstGroup'][$field]?>
            </dd>
        <?php endforeach; ?>
    </dl>
</fieldset>