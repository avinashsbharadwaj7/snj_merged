<fieldset>
    <legend><?php __('Additional Information'); ?></legend>
    
    <?php    
    echo $this->Form->input('additional_notes', array( "label"=>"Additional Notes", "type"=>"textarea" ) );
    echo $this->Form->input('email_addresses', array( "label"=>"Email Addresses", "type"=>"textarea" ) );
    echo "NOTE : Please isolate e-mail addresses from each other using a semicolon."
    ?>
</fieldset>