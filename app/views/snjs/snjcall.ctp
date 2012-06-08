<?php 
  echo $html->css(array('snj/960',  'snj/snj'));
?>

<div id="jobsContainer" class="container_12 ui-widget">
  <?php 
    Authsome::get('username');
    $id = Authsome::get('user_group_id');
    
    if(($id == $pmgroupid) || ($id==1)) // PM
    {    
  ?>
      <center>
        <table align="center" cellspacing="5" cellpadding="5" border="0">
          <td valign="center">
            <?php
              echo $html->image('/img/mytickets.jpg', array('style'=>'width:64px', "alt" => "My Tickets", "title" => "My Tickets", 'url' => array('controller' => '', 'action' => '/jobs/mytickets')));
            ?>
          </td> 
          <td valign="center">
            <?php    
              echo $html->image('/img/addjob.jpg',  array('style'=>'width:64px', "alt" => "Add Job", "title" => "Add Job",  'url' => array('controller' => '', 'action' => '/jobs/add')));
            ?>
          </td>
          <td valign="center">    
            <?php    
              echo $html->image('/img/search.jpg', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '/jobs/search')));
            ?>
          </td>
          <td valign="center">    
            <?php    
              echo $html->image('/img/email.jpg', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => 'distribution_lists', 'action' => 'subscribe')));
            ?>
          </td>
          <!--<td valign="center">
            <?php
              //echo $html->image('/img/calendar.jpg', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => '/jobs/calendar')));
            ?>
          </td>-->
          <td valign="center">
                
              <a href="../../app/webroot/files/snj/userguidepm.pdf"  target="_blank"><img src="../../app/webroot/img/helpabout64.png" style="width:64px" alt="User Guide" title="User Guide" /></a>
               
              </td>
    
        </table>
      </center>
  <?php 
    } 
  ?>
  
  <?php 
    $id = Authsome::get('user_group_id');
    if(($id == $lmgroupid) || ($id == $enggroupid)) // IM
    {    
  ?>
      <center>
        <table align="center" cellspacing="5" cellpadding="5" border="0">
          <td valign="center">
            <?php
              echo $html->image('/img/mytickets.jpg', array('style'=>'width:64px', "alt" => "My Tickets", "title" => "My Tickets", 'url' => array('controller' => '', 'action' => '/jobs/mytickets')));
            ?>
          </td> 
          <td valign="center">    
            <?php    
              echo $html->image('/img/search.jpg', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '/jobs/search')));
            ?>
          </td>
          <td valign="center">    
            <?php    
                           echo $html->image('/img/email.jpg', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => 'distribution_lists', 'action' => 'subscribe')));
            ?>
          </td>
         <!-- <td valign="center">
            <?php
              //echo $html->image('/img/calendar.jpg', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => '/jobs/calendar')));
            ?>
          </td>-->
		  <?php 
			
			if ($id == $lmgroupid)
			{
			?>		  
		  
		   <td valign="center">
           <a href="../../app/webroot/files/snj/userguidelm.pdf"  target="_blank"><img src="../../app/webroot/img/helpabout64.png" style="width:64px" alt="User Guide" title="User Guide" /></a>
          </td>
		  
		  <?php
		  }
		  ?>
		  
		  <?php 
			
			if ($id == $enggroupid)
			{
			?>
			
           <td valign="center">
           <a href="../../app/webroot/files/snj/userguideengm.pdf"  target="_blank"><img src="../../app/webroot/img/helpabout64.png" style="width:64px" alt="User Guide" title="User Guide" /></a>
          </td>
		  
		  <?php
		  }
		  ?>
		  
        </table>
      </center>
  <?php 
    } 
  ?>
  
  
</div> <!-- container -->