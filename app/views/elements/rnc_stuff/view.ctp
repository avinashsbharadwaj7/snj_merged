<?php foreach($groups as $groupName => $groupIndex): if(!(preg_match("/Qa$/", $groupName) > 0) || $readyForQa):?>
    <div id="fragment-<?php echo ($groupIndex + 2)?>">
        <div class="reports form">
            <fieldset>
                <legend>RNC Group#<?php echo ($groupIndex + 1);?></legend>
                <dl>
                    <?php
                    foreach ($rncFields[$groupIndex] as $field => $label): if(!in_array($field, array("report_id", "date"))):
                    ?>
                        <dt class="<?php echo $rncDatabaseFields->getClass($this->data[$groupName][$field]);?>">
                            <?php echo $label ?>
                        </dt>
                        <dd style ="margin-right: 1em">
                            <?php echo $this->data[$groupName][$field]?>
                        </dd>
                    <?php endif;endforeach; ?>
                </dl>
            </fieldset>
        </div>
    </div>
<?php endif; endforeach;?>