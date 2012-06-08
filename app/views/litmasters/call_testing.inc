<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<fieldset>
    <legend><?php __('Call Testing (CT)'); ?></legend>
<?php
    echo $this->Form->input('Litmaster.ct_dummyload',
                                array(
                                    'options' => $databaseFields->getOptions('yes_no_only', '4'),
                                    'label' => 'Was CT Performed On Dummy Load',
                                    'type'=>'select',
                                    'onChange'=>"triggerUpdater(LitmasterCtDummyload, 'CtDummyloadPlaceholder', 'litmasters')"
                                    )
                                );
    
    echo $this->Html->div('', null, array('id'=>'CtDummyloadPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data['Litmaster']['ct_dummyload']) && $showFields->display('ct_dummyload', $this->data['Litmaster']['ct_dummyload'])) ? $this->Form->input('Litmaster.ct_dummyload_reason', array('label'=>'-Reason')): "";
    echo "</div>";
?>
<fieldset>
    <legend><?php __('RSSI Values'); ?></legend>
    
    <div class="div_rssi_table">
        <div class="div_rssi_row">
            <div style="padding-bottom: 6px; font-style: italic;"><?PHP __("*Acceptable values fall between 14 and 30"); ?></div>
        </div>
        <div class="div_rssi_row">
            <div class="div_rssi_column">
                &nbsp;
            </div>
            <div class="div_rssi_column_header">
                <?PHP __("Branch"); ?>
            </div>
        </div>
        <div class="div_rssi_row">
            <div class="div_rssi_column">
                <?PHP __("Sector"); ?>
            </div>
            <div class="div_rssi_column">
                <?PHP __("A"); ?>
            </div>
            <div class="div_rssi_column">
                <?PHP __("B"); ?>
            </div>
        </div>
        <div class="div_rssi_row">
            <div class="div_rssi_column">
                <?PHP __("A"); ?>
            </div>
            <div class="tabular_input div_rssi_column">
                <?PHP
                    echo $this->Form->input('Litmaster.rssi_sector_a_branch_a',
                                            array(
                                             'div' => false,
                                             'label' => '',
                                             )
                                         );
                ?>
            </div>
            <div class="div_rssi_column">
                <?PHP
                    echo $this->Form->input('Litmaster.rssi_sector_a_branch_b',
                                            array(
                                             'div' => false,
                                             'label' => '',
                                             )
                                         );
                ?>
            </div>
        </div>
        <div class="div_rssi_row">
            <div class="div_rssi_column">
                <?PHP
                    echo __("B");
                ?>
            </div>
            <div class="div_rssi_column">
                <?PHP
                    echo $this->Form->input('Litmaster.rssi_sector_b_branch_a',
                                            array(
                                             'div' => false,
                                             'label' => '',
                                             )
                                         );
                ?>
            </div>
            <div class="div_rssi_column">
                <?PHP
                    echo $this->Form->input('Litmaster.rssi_sector_b_branch_b',
                                            array(
                                             'div' => false,
                                             'label' => '',
                                             )
                                         );
                ?>
            </div>
        </div>
        <div class="div_rssi_row">
            <div class="div_rssi_column">
                <?PHP
                    echo __("C");
                ?>
            </div>
            <div class="div_rssi_column">
                <?PHP
                    echo $this->Form->input('Litmaster.rssi_sector_c_branch_a',
                                            array(
                                             'div' => false,
                                             'label' => '',
                                             )
                                         );
                ?>
            </div>
            <div class="div_rssi_column">
                <?PHP
                    echo $this->Form->input('Litmaster.rssi_sector_c_branch_b',
                                            array(
                                             'div' => false,
                                             'label' => '',
                                             )
                                         );
                ?>
            </div>
        </div>
    </div>
            
</fieldset>
<?PHP
    echo $this->Form->input('Litmaster.rrul_version',
                                array(
                                    'label' => 'RRUL Version',
                                    )
                                );
    echo $this->Form->input('Litmaster.rrus_version',
                                array(
                                    'label' => 'RRUS Version',
                                    )
                                );
    echo $this->Form->input('Litmaster.pci_visible_ct',
                                array(
                                    'label' => 'PCI Visible On The CT Equipment',
                                    )
                                );
    echo $this->Form->input('Litmaster.ct_cell_sector_locked',
                                array(
                                    'options' => $databaseFields->getOptions('yes_no_only', '4'),
                                    'label' => 'Was Cell/Sector Locked For CT',
                                    'type'=>'select',
                                    'onChange'=>"triggerUpdater(LitmasterCtCellSectorLocked, 'CtCellSectorLockedPlaceholder', 'litmasters')"
                                    )
                                );
    
    echo $this->Html->div('', null, array('id'=>'CtCellSectorLockedPlaceholder'));
    /* preloading previously entered values */
    echo (isset($this->data['Litmaster']['ct_cell_sector_locked']) && $showFields->display('ct_cell_sector_locked', $this->data['Litmaster']['ct_cell_sector_locked'])) ? $this->Form->input('Litmaster.ct_cell_sector_locked_explain', array('label'=>'-Reason')): "";
    echo "</div>";
?>
</fieldset>
