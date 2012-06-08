<h2><?php echo $trans->__('Welcome'); ?> <?php echo Authsome::get('username'); ?>!</h2>
<ol>
       <ul class="bcp_home">
        <?php
            if (Authsome::check('/users/register')) {
                echo "<li>";
                echo $html->image('/img/user-new-3.png', array("alt" => "Add User", "title" => "Add User", 'url' => array('controller' => 'users', 'action' => 'register')));
                echo __('Add User');
            }
        ?>
        <?php
            if (Authsome::check('/user_group_permissions/index')) {
                echo "<li>";
                echo $html->image('/img/permissions_1.png', array("alt" => "Permissions", "title" => "Permissions", 'style'=>'width:64px;', 'url' => array('controller' => 'user_group_permissions', 'action' => 'index')));
                echo __('Permissions');
            }
        ?>
           
        <?php
            if (Authsome::check('/users/index')) {
                echo "<li>";
                echo $html->image('/img/user64.png', array("alt" => "Manage Users", "title" => "Manage Users", 'url' => array('controller' => 'users', 'action' => 'index')));
                echo __('Manage Users');
            }
        ?>
        <?php
            if (Authsome::check('/user_groups/index')) {
                echo "<li>";
                echo $html->image('/img/group64.png', array("alt" => "Manage Groups", "title" => "Manage Groups", 'url' => array('controller' => 'user_groups', 'action' => 'index')));
                echo __('Manage Groups');
            }
        ?>
		<?php
            if (Authsome::check('/users/edit')) {
                echo "<li>";
                echo $html->image('/img/edit_info.png', array("alt" => "Edit Personal Information", "title" => "Edit Personal Information", 'style'=>'width:64px;', 'url' => array('controller' => 'users', 'action' => 'edit')));
                echo __('Edit Personal Information');
            }
        ?>
        <?php
            if (Authsome::check('/users/change_password')) {
                echo "<li>";
                echo $html->image('/img/settings64.png', array("alt" => "Change Password", "title" => "Change Password", 'url' => array('controller' => 'users', 'action' => 'change_password')));
                echo __('Change Password');
            }
        ?>
        <?php
            if (Authsome::check('/users/logout')) {
                echo "<li>";
                echo $html->image('/img/system-log-out-3.png', array("alt" => "Logout", "title" => "Logout", 'style'=>'width:64px;', 'url' => array('controller' => 'users', 'action' => 'logout')));
                echo __('Logout');
            }
        ?>
        <?php
            if (Authsome::check('/ir_modules/index')) {
                echo "<li>";
                echo $html->image('/img/ir64.png', array("alt" => "IR", "title" => "IR",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'ir_modules', 'action' => 'index')));
                echo __('IR');
            }
        ?>
        <?php
            if (Authsome::check('/rf_v2_modules/index')) {
                echo "<li>";
                echo $html->image('/img/rf.png', array("alt" => "RF(v2)", "title" => "RF(v2)",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'rf_v2_modules', 'action' => 'dashboard')));
                echo __('RF(v2)');
            }
        ?>
        <?php
            if (Authsome::check('/slmasters/index')) {
                echo "<li>";
                echo $html->image('/img/sl.png', array("alt" => "SL", "title" => "SLR",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'slmasters', 'action' => 'index')));
                echo __('SL');
            }
        ?>
        <?php
            /* Added 06/01/2011 - LIT link */
            if (Authsome::check('/litmasters/index')) {
                echo "<li>";
                echo $html->image('/img/lte-3.png', array("alt" => "LTE", "title" => "LTE",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'litmasters', 'action' => 'index')));
                echo __('LTE');
            }
        ?>
         <?php
            /* Added 06/22/2011 - CSR link */
            if (Authsome::check('/csrmasters/index')) {
                echo "<li>";
                echo $html->image('/img/CSR.png', array("alt" => "csr", "title" => "csr",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'csrmasters', 'action' => 'index')));
                echo __('CSR');
            }
         ?>
           
         <?php
            /* Added 06/28/2011 - COF link */
           /* if (Authsome::check('/cofmasters/index')) {
                echo "<li>";
                echo $html->image('/img/cof.png', array("alt" => "cof", "title" => "cof",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'cofmasters', 'action' => 'index')));
                echo __('COF');
            }*/
        ?>
           
           <?php
            /* Added 06/22/2011 - CDMA link */
            if (Authsome::check('/cdmamasters/index')) {
                echo "<li>";
                echo $html->image('/img/cdma.png', array("alt" => "cdma", "title" => "cdma",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'cdmamasters', 'action' => 'index')));
                echo __('CDMA');
            }
         ?>
				
		<?php
            /* Added 06/28/2011 - COF link */
            if (Authsome::check('/nslbs/index')) {
                echo "<li>";
                echo $html->image('/img/NSLB.png', array("alt" => "NSLB", "title" => "NSLB",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'nslbs', 'action' => 'index')));
                echo __('NSLB');
            }
        ?> 
		<?php
            /* Added 06/28/2011 - IRT link */
            if (Authsome::check('/users/redirectIrt')) {
                echo "<li>";
                echo $html->image('/img/IRT.png', array("alt" => "IRT", "title" => "Old IRT",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'users', 'action' => 'redirectIrt')));
                echo __('Old IRT');
            }
        ?>	
		
		<?php
            /* Added 06/28/2011 - COF link */
          /*  if (Authsome::check('/users/irt')) {
                echo "<li>";
                echo $html->image('/img/IRT.png', array("alt" => "IRT", "title" => "Old IRT",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'users', 'action' => 'redirectIrt')));
                echo __('COF');
            }*/
        ?>	
           <?php
           if(Authsome::check('/cofmasters/index')){
               echo"<li>";
               echo $html->image('/img/COF.png',array("alt"=>"COF","title"=>"COF",'style'=>'height:64px;','url' => array('plugin'=>'','controller' => 'cofmasters', 'action' => 'index')));
               echo __('COF');
           }
           ?>
        <?php
            if (Authsome::check('/rnc_reports/index')) {
                echo "<li>";
                echo $html->image('/img/rnc.png', array("alt" => "RNC", "title" => "RNC",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'rnc_reports', 'action' => 'index')));
                echo __('RNC');
            }
        ?>

        <?php
            if (Authsome::check('/ossrncs/index')) {
                echo "<li>";
                echo $html->image('/img/ossrncs.png', array("alt" => "OSS-RNC", "title" => "OSS-RNC",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'ossrncs', 'action' => 'index')));
                echo __('OSS-RNC Load/modify Form');
            }
        ?>
           
		<?php
            /* Added 06/28/2011 - COF link */
            if (Authsome::check('/ti_trackers/index')) {
                echo "<li>";
                echo $html->image('/img/TI.png', array("alt" => "NPI TI Tracker", "title" => "NPI TI Tracker",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'ti_trackers', 'action' => 'index')));
                echo __('NPI TI Tracker');
            }
        ?> 
		<?php
            if (Authsome::check('/cakefeedbacks/cakefeedbackindex')) {
                echo "<li>";
                echo $html->image('/img/cakefeedback.png', array("alt" => "Feedback/Request", "title" => "Feedback/Request", 'style'=>'width:64px;','url' => array('plugin'=>'','controller' => 'cakefeedbacks', 'action' => 'feedbackindex')));
                echo __('Feedback/Request');
            }
        ?>
		
		<?php
            if (Authsome::check('/graphs/index')) {
                echo "<li>";
                echo $html->image('/img/graphs.png', array("alt" => "Graphical Analysis", "title" => "Graphical Analysis",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'graphs', 'action' => 'pregraphs')));
                echo __('Graphical Analysis');
            }
        ?>
           
        
        <?php
            if (Authsome::check('/wcdma_siad_records/index')) {
                echo "<li>";
                echo $html->image('/img/WCDMA_SIAD.png', array("alt" => "WCDMA SIAD Support", "title" => "WCDMA SIAD Support", 'style'=>'height:100px;', 'url' => array('plugin'=>'', 'controller' => 'wcdma_siad_records', 'action' => 'index')));
                echo __('WCDMA - SIAD Support');
            }
        ?>
           
           <?php
//            if (Authsome::check('/job_schedules/index')) {
                echo "<li>";
                echo $html->image('/img/job_schedules.png', array("alt" => "Scheduling and Tracking Tool", "title" => "Scheduling & Tracking",'style'=>'height:64px;', 'url' => array('plugin'=>'','controller' => 'job_schedules', 'action' => 'index')));
                echo __('Scheduling & Tracking');
//            }
        ?>


         <?php
            //if (Authsome::check('/pqrfileuploads/index'))
            //{
                for($i = 0; $i<5; $i+=1)
                {
                        echo "<li>";
                }
                echo $html->image('/img/SnJ.png', 
                array("alt" => "SNJ", 
                "title" => "SNJ",'style'=>'height:64px;', 
                'url' => array('plugin'=>'',
                'controller' => 'snjs', 'action' => 'snjcall')));
                echo __('SNJ');
            //}
        ?>
         
           
    </ul>
</ol>
