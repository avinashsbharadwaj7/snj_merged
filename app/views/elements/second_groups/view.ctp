<fieldset>
    <legend>RNC Group#1</legend>
    <dl>
        <?php
        foreach ($rncFields[1] as $field => $label):
        ?>
            <dt class="<?php echo $rncDatabaseFields->getClass($this->data['SecondGroup'][$field]);?>">
                <?php echo $label ?>
            </dt>
            <dd style ="margin-right: 1em">
                <?php echo $this->data['SecondGroup'][$field]?>
            </dd>
        <?php endforeach; ?>
    </dl>
</fieldset>