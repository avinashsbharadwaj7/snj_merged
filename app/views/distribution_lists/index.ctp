<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'snjs', 'action' => 'snjcall')); ?></li> 
<center>
    <p><h1>You have subscribed to the following distribution lists:</h1></p>

<table cellpadding="5" cellspacing="0" >
		
	<tr>
            <th>Organization</th>
            <th>Customer</th>
            <th>Region</th>
        </tr>
	<tr>
		
                <?php
                               
                foreach($distributionlists as $r)
		{
    			$listelements = explode("_", $r['distribution_lists']['name']); ?>
        <tr>
            <td> <?php echo $listelements[1] ?></td>
            <td><?php echo $listelements[2] ?></td>
            <td><?php echo $listelements[3] ?></td>
        </tr>
                
    	 <?php	}            
                ?>
             
</table>
</center>
<li id="backButton"><?php echo $this->Html->link(__('Subscribe to Distribution Lists', true), array('controller' => 'distribution_lists', 'action' => 'subscribe')); ?></li> 
