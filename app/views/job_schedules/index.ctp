
<h2>Scheduling and Tracking</h2>
<div style="margin-top: 25px;"></div>
<div class="module-home-section">
    <div class="module-home-section-header"><?php __('Common Tasks'); ?></div>
    <div style="width: 0px; clear: both;"></div>
    <?php if (Authsome::check('/job_schedules/schedule')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/db_add-2.png', array("alt" => "Add Schedule", "title" => "Add Schedule", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'job_schedules', 'action' => 'schedule'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Add Schedule'); ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (Authsome::check('/job_schedules/modify')): ?>
        <div class="module-home-selection-container">
            <div class="module-home-selection">
                <?php echo $html->image('/img/db_comit-2.png', array("alt" => "Modify Schedule", "title" => "Modify Schedule", 'style' => 'width:48px;', 'url' => array('plugin' => '', 'controller' => 'job_schedules', 'action' => 'modify'))); ?>
            </div>
            <div class="module-home-selection">
                <?php echo __('Edit Schedule'); ?>
            </div>
        </div>
    <?php endif ?>
    <div style="width: 0px; clear: both;"></div>
</div>
