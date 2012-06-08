<h2>LTE Portal</h2>
<div style="margin-top: 25px;"></div>
<div class="module-home-section">
    <div class="module-home-section-header"><?php __('Common Tasks'); ?></div>
    <div style="width: 0px; clear: both;"></div>
    <?php if (Authsome::check('/litmasters/add')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/db_add-2.png', array("alt" => "Add Report", "title" => "Add Report", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'litmasters', 'action' => 'add'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Add Report'); ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (Authsome::check('/users/dashboard')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/house_green.png', array("alt" => "Home", "title" => "Home", 'style' => 'width:48px;', 'url' => array('controller' => 'users', 'action' => 'dashboard'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Home'); ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (Authsome::check('/users/logout')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/system-log-out-3.png', array("alt" => "Logout", "title" => "Logout", 'style' => 'width:48px;', 'url' => array('controller' => 'users', 'action' => 'logout'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Logout'); ?>
            </div>
        </div>
    <?php endif ?>
    <div style="width: 0px; clear: both;"></div>
</div>
<div class="module-home-section">
    <div class="module-home-section-header"><?php __('LIT Tasks'); ?></div>
    <div style="width: 0px; clear: both;"></div>
    <?php if (Authsome::check('/litmasters/edit')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/db_comit-2.png', array("alt" => "Edit LIT", "title" => "Edit LIT", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'litmasters', 'action' => 'edit'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Edit LIT'); ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (Authsome::check('/litmasters/search')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/view32.png', array("alt" => "Search LITs", "title" => "Search LITs", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'litmasters', 'action' => 'search'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Search LITs'); ?>
            </div>
        </div>
    <?php endif ?>

    <?php if (Authsome::check('/bulk_lte_records/bulkupload')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/onebit_30.png', array("alt" => "Upload Excel Records", "title" => "Upload Excel Records", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'bulk_lte_records', 'action' => 'bulkupload'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Upload Excel<BR>Records'); ?>
            </div>
        </div>
    <?php endif ?>
    <div style="width: 0px; clear: both;"></div>
</div>
<?php if (Authsome::check('/siadmasters/view')): ?>
    <div class="module-home-section">
        <div class="module-home-section-header"><?php __('SIAD Tasks'); ?></div>
        <div style="width: 0px; clear: both;"></div>
        <?php if (Authsome::check('/siadmasters/edit')): ?>
            <div class="module-home-selection-container">
                <div class="module-home-selection">
                    <?php echo $html->image('/img/db_comit-2.png', array("alt" => "Edit SIAD Record", "title" => "Edit SIAD Record", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'siadmasters', 'action' => 'edit'))); ?>
                </div>
                <div class="module-home-selection">
                    <?php echo __('Edit SIAD<br>Record'); ?>
                </div>
            </div>
        <?php endif ?>
        <?php if (Authsome::check('/siadmasters/search')): ?>
            <div class="module-home-selection-container">
                <div class="module-home-selection">
                    <?php echo $html->image('/img/view32.png', array("alt" => "Search SIAD Records", "title" => "Search SIAD Records", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'siadmasters', 'action' => 'search'))); ?>
                </div>
                <div class="module-home-selection">
                    <?php echo __('Search SIAD<br>Records'); ?>
                </div>
            </div>
        <?php endif ?>
        <div style="width: 0px; clear: both;"></div>
    </div>
<?php endif ?>
<?php if (Authsome::check('/ndsmasters/view')): ?>
    <div class="module-home-section">
        <div class="module-home-section-header"><?php __('NDS Tasks'); ?></div>
        <div style="width: 0px; clear: both;"></div>
        <?php if (Authsome::check('/ndsmasters/edit')): ?>
            <div class="module-home-selection-container">
                <div class="module-home-selection">
                    <?php echo $html->image('/img/db_comit-2.png', array("alt" => "Edit NDS Record", "title" => "Edit NDS Record", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'ndsmasters', 'action' => 'edit'))); ?>
                </div>
                <div class="module-home-selection">
                    <?php echo __('Edit NDS<br>Record'); ?>
                </div>
            </div>
        <?php endif ?>
        <?php if (Authsome::check('/ndsmasters/search')): ?>
            <div class="module-home-selection-container">
                <div class="module-home-selection">
                    <?php echo $html->image('/img/view32.png', array("alt" => "Search NDS Records", "title" => "Search NDS Records", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'ndsmasters', 'action' => 'search'))); ?>
                </div>
                <div class="module-home-selection">
                    <?php echo __('Search NDS<br>Records'); ?>
                </div>
            </div>
        <?php endif ?>
        <div style="width: 0px; clear: both;"></div>
    </div>
<?php endif ?>

<div class="module-home-section">
    <div class="module-home-section-header"><?php __('Extras'); ?></div>
    <div style="width: 0px; clear: both;"></div>
    <?php if (Authsome::check('/litmasters/downloadTemplate')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/down_alt.png', array("alt" => "Download Auto Populate Template", "title" => "Download Auto Populate Template", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'litmasters', 'action' => 'downloadTemplate'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Download<br>Auto Populate<br>Template'); ?>
            </div>
        </div>
    <?php endif ?>
    <div style="width: 0px; clear: both;"></div>
</div>
