<fieldset>
    <h4>Report Details</h4>
    <?php
    echo $this->Form->input("id", array( 'READONLY' => true,'value' => 'SLRW'.$modify_fields['id'],'label'=>'SLR Number', 'type'=>'text' ) );
    echo $this->Form->input("date_created", array( 'READONLY' => true,'value' => $modify_fields['date_created'],'label'=>'Date Created', 'type'=>'text' ) );
    echo $this->Form->input("date_modified", array( 'READONLY' => true,'value' => $modify_fields['date_modified'],'label'=>'Date Modified', 'type'=>'text' ) );
    ?>
</fieldset>