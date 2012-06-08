<h2>CSR Functions - Excel Report.</h2>

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
                            echo $html->link("Back",array('action' => 'Csrform') );
                    ?>
               </th>
        </tr>
</table>
<table>
	<tr>
     <div style="font-weight:bold;font-size:xx-large ">
		<th>CSR Number</th>
		<th>Date Entered</th>
		<th>Date Modified</th>
        <th>Engineer</th>
		<th>Project Name</th>
		<th>Project Manager</th>
		<th>Network Number</th>
    </div>
	</tr>

	<?php foreach($csrmasters as $csr): ?>
	<tr>
				<th><?php echo $html->link($csr['csrmaster']['CSRNumber'],array('action' => 'csr',"CSRNumber",$csr['csrmaster']['CSRNumber'] ) ); ?></th>
		        <th><?php echo $csr['csrmaster']['CSRDateinit']; ?></th>
                <th><?php echo $csr['csrmaster']['CSR_datemod']; ?></th>
                <th><?php echo $csr['csrmaster']['CSR_Engineer_Name']; ?></th>
                <th><?php echo $csr['csrmaster']['CSR_Project_Name']; ?></th>
				<th><?php echo $csr['csrmaster']['CSR_Project_Manager']; ?></th>
                <th><?php echo $csr['csrmaster']['CSR_Project_Network_number']; ?></th>
	</tr>      
	
	<?php endforeach; ?>         
	
</table>
<table>
        <tr>
                <th><?php
                            echo $html->link("Download Excel File",array('action' => 'csrexcel', $csrmasters) );
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



