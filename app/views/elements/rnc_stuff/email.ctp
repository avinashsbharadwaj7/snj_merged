<div id="request-email-container">
    <?php echo $this->Html->image('mail-send.png', array('alt' => 'Send Mail'))?>
    Send Email</div>
<div id="email-text-field">
    <?php
    echo $this->Form->create("RncEmail", array("url" => array("controller" => "rnc_reports", "action" => "requestEmail", $report_id)));
    echo $this->Form->input("email_list", array("label" => array("Emails", "style" => "width:100%"), "after"=>"seperated by semi colon (;)", "type" => "textarea", "div" => false));
    echo $this->Form->end("Send");
    ?>
</div>