<?php Authsome::get('username'); ?>

<?php
    $id = Authsome::get('user_group_id');
	
    if(($id == 108) || ($id==1))
    {    
 ?>           
 
 <body>       
 <center>
                <table align="center" cellspacing="5" cellpadding="5" border="0">
                  <td valign="center">
                      <?php    
                        echo $html->image('/img/addjob.jpg',  array('style'=>'width:64px', "alt" => "Add Job", "title" => "Add Job",  'url' => array('controller' => '', 'action' => '/jobs/add')));
                        //echo $html->image('/img/user-new-3.png', array('style'=>'width:64px', "alt" => "Add User", "title" => "Add User", 'url' => array('controller' => '', 'action' => '')));
                       ?>    
                  </td>
                 
                 <td valign="center">    
                   <?php    
                        echo $html->image('/img/search.jpg', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '/jobs/search')));
                        //echo $html->image('/img/search.png', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '')));
                     ?>
                 </td>
                 </td>   
                 <td valign="center">
                   <?php
                        echo $html->image('/img/mytickets.jpg', array('style'=>'width:64px', "alt" => "myticket", "title" => "Myticket", 'url' => array('controller' => '', 'action' => '/jobs/mytickets')));
                        //echo $html->image('/img/myticket.png', array('style'=>'width:64px', "alt" => "myticket", "title" => "Myticket", 'url' => array('controller' => '', 'action' => 'register')));
                        
                    ?>
                 </td> 
                 <td valign="center">    
                  <?php    
                        
                  echo $html->image('/img/email.jpg', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => '', 'action' => '/jobs/email')));
                  //echo $html->image('/img/email.png', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => '', 'action' => 'register')));
                   ?>   
                 </td>
                 </td>   
                 <td valign="center">
                   <?php
                       echo $html->image('/img/calendar.jpg', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => '/jobs/calendar')));
                       //echo $html->image('/img/calendar_1.png', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => 'register')));
                        echo "</pre>";
                      
                    ?>
                 </td>
                 </table>
				 </center>
               </body>       
                 
                 
 <?php } ?>    
 <?php
    $id = Authsome::get('user_group_id');
    if($id == 109)
    {    
 ?>                 
            <body>      
                <center>
                <table>
                   <td valign="center">    
                   <?php    
                        echo $html->image('/img/search.jpg', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '/jobs/search')));
                        //echo $html->image('/img/search.png', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '')));
                     ?>
                 </td>
                 </td>   
                 <td valign="center">
                   <?php
                        echo $html->image('/img/mytickets.jpg', array('style'=>'width:64px', "alt" => "myticket", "title" => "Myticket", 'url' => array('controller' => '', 'action' => '/jobs/mytickets')));
                        //echo $html->image('/img/myticket.png', array('style'=>'width:64px', "alt" => "myticket", "title" => "Myticket", 'url' => array('controller' => '', 'action' => 'register')));
                        
                    ?>
                 </td> 
                 <td valign="center">    
                  <?php    
                        
                  echo $html->image('/img/email.jpg', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => '', 'action' => '/jobs/email')));
                  //echo $html->image('/img/email.png', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => '', 'action' => 'register')));
                   ?>   
                 </td>
                 </td>   
                 <td valign="center">
                   <?php
                       echo $html->image('/img/calendar_1.png', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => '/jobs/calendar')));
                       //echo $html->image('/img/calendar_1.png', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => 'register')));
                        echo "</pre>";
                      
                    ?>
                 </td>
                 </table>
                </center>
                </body>
    <?php } ?>
<?php
    $id = Authsome::get('user_group_id');
    if($id == 110)//get engg's id
    {    
 ?>                 
            <body>   
                <center>
                <table>
                    <td valign="center">    
                   <?php    
                        echo $html->image('/img/search.jpg', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '/jobs/search')));
                        //echo $html->image('/img/search.png', array('style'=>'width:64px', "alt" => "Search", "title" => "Search", 'url' => array('controller' => '', 'action' => '')));
                     ?>
                 </td>
                 </td>   
                 <td valign="center">
                   <?php
                        echo $html->image('/img/mytickets.jpg', array('style'=>'width:64px', "alt" => "myticket", "title" => "Myticket", 'url' => array('controller' => '', 'action' => '/jobs/mytickets')));
                        //echo $html->image('/img/myticket.png', array('style'=>'width:64px', "alt" => "myticket", "title" => "Myticket", 'url' => array('controller' => '', 'action' => 'register')));
                        
                    ?>
                 </td> 
                 <td valign="center">    
                  <?php    
                        
                  echo $html->image('/img/email.jpg', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => '', 'action' => '/jobs/email')));
                  //echo $html->image('/img/email.png', array('style'=>'width:64px', "alt" => "Email", "title" => "Email", 'url' => array('controller' => '', 'action' => 'register')));
                   ?>   
                 </td>
                 </td>   
                 <td valign="center">
                   <?php
                       echo $html->image('/img/calendar_1.png', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => '/jobs/calendar')));
                       //echo $html->image('/img/calendar_1.png', array('style'=>'width:64px', "alt" => "Calender", "title" => "Calender", 'url' => array('controller' => '', 'action' => 'register')));
                        echo "</pre>";
                      
                    ?>
                 </td>
                 </table>
                </center>
                </body>
    <?php } ?>         

