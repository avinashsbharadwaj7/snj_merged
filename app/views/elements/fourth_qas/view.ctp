<div class="fourthQas form">
    <?php echo $form->create('FourthQa', array("action" => "add")); ?>
    <fieldset>
        <legend><?php __('Additional Test/Verification/Print Outs'); ?></legend>
        <?php
        echo $form->input('report_id', array("type" => "text", "class" => "groups_report_id", "value" => $report_id, "div" => array("style" => "display:none;")));
        echo $form->input('date', array("type" => "text", "readonly" => "readonly", "value" => date("Y-m-d")));
        ?>
        <dt<?php if ($i % 2 == 0)
            echo $class; ?>><?php __('AGPS Hardware Redundancy'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $firstGroup['FirstGroup']['agps_hw_redudancy']; ?>
            &nbsp;
        </dd>

		<?php if($firstGroup['FirstGroup']['agps_hw_redudancy_notes'] !== "" && !empty($firstGroup['FirstGroup']['agps_hw_redudancy_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['agps_hw_redudancy_notes'];?>
&nbsp;
</dd>
<?php endif;?>

        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('IUB over IP'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <?php echo $firstGroup['FirstGroup']['iub_over_ip']; ?>
            &nbsp;
        </dd>

		<?php if($firstGroup['FirstGroup']['iub_over_ip_notes'] !== "" && !empty($firstGroup['FirstGroup']['iub_over_ip_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['iub_over_ip_notes'];?>
&nbsp;
</dd>
<?php endif;?>

        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Systemlog Crash'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <?php echo $firstGroup['FirstGroup']['systemlog_crash']; ?>
            &nbsp;
        </dd>

		<?php if($firstGroup['FirstGroup']['systemlog_crash_notes'] !== "" && !empty($firstGroup['FirstGroup']['systemlog_crash_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['systemlog_crash_notes'];?>
&nbsp;
</dd>
<?php endif;?>

        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('OSS Connectivity Verification'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <?php echo $firstGroup['FirstGroup']['oss_connectivity_verification']; ?>
            &nbsp;
        </dd>

		<?php if($firstGroup['FirstGroup']['oss_connectivity_verification_notes'] !== "" && !empty($firstGroup['FirstGroup']['oss_connectivity_verification_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['oss_connectivity_verification_notes'];?>
&nbsp;
</dd>
<?php endif;?>

        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Final CV (Make sure Total Number of CV is < less than'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <?php echo $firstGroup['FirstGroup']['final_cv']; ?>
            &nbsp;
        </dd>

    		<?php if($firstGroup['FirstGroup']['final_cv_notes'] !== "" && !empty($firstGroup['FirstGroup']['final_cv_notes'])):?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes/Comments'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $firstGroup['FirstGroup']['final_cv_notes'];?>
&nbsp;
</dd>
<?php endif;?>

    	?>
    </fieldset>
    <?php echo $form->end(__('Save', true)); ?>
</div>
