<h2>Integration Reporting Functions - Excel Report.</h2>

<?php
            $paginator->params['url'] = str_replace("%", "x", $paginator->params['url']);
            $opt;
            if(substr_count($paginator->params['url']['url'], 'page:') == 1)
                $opt = array($paginator->params['url']);
            else
            {                
                $opt = array('url' => $paginator->params['url']);
            }
?>


<table>
        <tr>
                <th><?php
                            echo $html->link("Back",array('action' => 'irform') );
                    ?>
               </th>
        </tr>
</table>
<table>
	<tr>
                <div style="font-weight:bold;font-size:xx-large ">
		<th>IR Number</th>
                <th>Engineer</th>
		<th>Project Manager</th>
		<th>Customer</th>
                <th>Region</th>
                <th>Activity Type</th>
                <th>Activity Result</th>
		<th># Nodes Successful</th>
		<th># Nodes Unsuccessful</th>
                </div>
	</tr>

	<?php foreach($srmasters as $sr): ?>
	<tr>
		<th><?php echo $html->link($sr['IrModule']['id'],array('action' => 'ir',"id",$sr['IrModule']['id'] ) ); ?></th>
                <th><?php echo $sr['IrModule']['engineer_name']; ?></th>
                <th><?php echo $sr['IrModule']['project_manager']; ?></th>
                <th><?php echo $sr['IrModule']['customer']; ?></th>
                <th><?php echo $sr['IrModule']['region']; ?></th>
                <th><?php echo $sr['IrModule']['activity_type']; ?></th>
                <th><?php echo $sr['IrModule']['activity_result']; ?></th>
                <th><?php echo $sr['IrModule']['total_nodes_successful']; ?></th>
                <th><?php echo $sr['IrModule']['total_nodes_unsuccessful']; ?></th>
	</tr>      
	
	<?php endforeach; ?>         
	
</table>
<table>
        <tr>
                <th><?php
                            echo $html->link('Download Excel File',array('action' => 'irexcel'));
                    ?>
               </th>
        </tr>
</table>

    <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));            
	?>
    </p>


	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), $opt, null, array('class'=>'disabled'));?>
	 |
                <?php echo $this->Paginator->numbers($opt);?>
         |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', $opt, null, array('class' => 'disabled'));?>
	</div>



