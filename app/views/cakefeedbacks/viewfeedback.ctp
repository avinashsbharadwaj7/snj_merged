<?PHP
    $class = 'class="altrow"';
?>
<style>
root { 
    display: block;
}

div.lte-link {
    padding: 5px;
    margin: 2px;
    margin-left: 245px;
}

div.div_rssi_table {
    width: 520px;
    height: 128px;
    padding: 0px;
    margin: 0px;
}

div.div_rssi_row {
    width: 100%;
    padding: 0px;
    margin: 0px;
}

div.div_rssi_column_header {
    width: 62%;
    clear: none;
    float: left;
    padding: 0px;
    padding-bottom: 6px;
    margin: 0px;
    text-align: center;
}

div.div_rssi_column {
    width: 31%;
    clear: none;
    float: left;
    padding: 0px;
    padding-bottom: 6px;
    margin: 0px;
    text-align: center;
}

label.div_rssi_column {
    width: 0px;
}

div.lte_view {
   
}

div.lte_container {
    margin-left: 60px;
}

div.altrow {
    background: #E4E8EF;
}

div.view_col_left {
    font-size: 12px;
    padding-left: 4px;
    margin: 0px;
    line-height: 2.5em;
    font-weight: bold;
    width: 46%;
    float: left;
    clear: none;
    
}

div.view_col_right {
    margin: 0px;
    font-size: 12px;
    float: left;
    clear: right;
    width: 53%;
    line-height: 2em;
    word-wrap: break-word;
}

div.paginator_table {
   margin: 0px;
   padding: 0px;
   width: 100%;
}

div.paginator_row {
    padding: 0px;
    margin: 0px;
    width: 100%;
    min-width: 775px;
}

div.paginator_col_header_inner {
    padding: 6px;
    line-height: 1.5em;
    background-color: #c7e2cc;
}

div.paginator_col_header {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;  
    width: 16%;
}

div.paginator_col_header_id {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;
    width: 100px;
}

div.paginator_col_header_date {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    font-weight: bold;
    width: 90px;
}

div.paginator_col_inner {
    padding: 6px;
}

div.paginator_col_inner_alt {
    padding: 6px;
    background: #E4E8EF;
}

div.paginator_col {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 16%;
    overflow: auto;
}

div.paginator_col_id {
    clear: none;
    float: left;
    border: 1px #000 solid;
    margin: 1px;
    width: 100px;
}

div.paginator_col_date {
    clear: none;
    float: left;
    margin: 1px;
    border: 1px #000 solid;
    width: 90px;
}

div.paginator_nav_left {
    text-align: left;
    margin: 0px;
    padding-bottom: 6px;
    padding-top: 6px;
    padding-left: 1px;
}
    
</style>




<html>
    <head>
        <li><?php echo $html->link("Back",array('action' => 'feedbackindex') ); ?>
        <h3><u><b>PQR - View Feedback/Request.</b></u></h3>
    </head>
<?php      
                            $final = $view_fields[0]['Cakefeedback']; 
                            $final_comment = $view_fields[0]['Cakefeedbackcomment']; 
?>

<div class="lte_container">

<fieldset>
    <legend>Feedback/Request Details</legend>
    
    <div class="lte_view"><?PHP $i = 0; ?>
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Feedback/Request Number'); ?></div>
            <div class="view_col_right"><?php echo $final['id']; ?></div>
            <div style="clear: both;"></div>
        </div>
        
        <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Date Created'); ?></div>
            <div class="view_col_right"><?php echo $final['date']; ?></div>
            <div style="clear: both;"></div>
        </div>

		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Created by'); ?></div>
            <div class="view_col_right"><?php echo $final['name']." - ".$final['signum']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Module'); ?></div>
            <div class="view_col_right"><?php echo $final['module']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Category'); ?></div>
            <div class="view_col_right"><?php echo $final['category']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<?php if($final['category'] == 'Request') { ?>
		 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Priority'); ?></div>
            <div class="view_col_right">
			<?php 
				if($final['priority'] == 1)
					echo "High"; 
				elseif($final['priority'] == 2)
					echo "Medium"; 
				elseif($final['priority'] == 3)
					echo "Low"; 
			?>
			</div>
            <div style="clear: both;"></div>
         </div> 
		 <?php } ?>
        
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Feedback/Request'); ?></div>
            <div class="view_col_right"><?php echo $final['notes']; ?></div>
            <div style="clear: both;"></div>
        </div>
		
		<?php if($final['category'] == "Request") { ?>	
		<div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Status'); ?></div>
            <div class="view_col_right">
			<?php 
				if($final['status'] == 0)
					echo "Pending"; 
				elseif($final['status'] == 1)
					echo "Completed";
				elseif($final['status'] == 2)
					echo "Canceled";
			?>
			</div>
            <div style="clear: both;"></div>
        </div>
		<?php } ?>
		
		<br>
		
		   <fieldset>
				<legend>Comments</legend>
				<?php if(!empty($final_comment)) { ?>
					<fieldset>
					<legend>Previous Comments</legend>
						<?php foreach($final_comment as $comm): ?>
							<div <?php if ($i++ % 2 == 0) echo $class;?>>    
								<div class="view_col_left"><?php __($comm['signum'].' - '.$comm['name'].'<br>'.$comm['date']); ?></div>
								<div class="view_col_right"><?php echo $comm['comments']; ?></div>
								<div style="clear: both;"></div>
							</div>
						<?php endforeach; ?>
					</fieldset>					
				<?php } ?>
				<?php //if($group == 35004 || $group == 1) { ?>
					<?php
						echo $this->Form->create('Cakefeedback',array('action' => 'modifyfeedback'));
						echo $this->Form->hidden('id',array('value'=>$final['id']));
						echo $this->Form->input("Cakefeedbackcomment.comments", array( 'label'=>'Comments','type'=>'textarea') ); 
                    ?>
				<?php //} ?>
			</fieldset>
		
		
		<?php if($group == 1 && $final['category'] == "Request") { ?>	
		 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('Change Status'); ?></div>
            <div class="view_col_right">
			<?php 				
				echo $this->Form->input('status',array('label'=>'','type'=>'select','options'=>array('0'=>'Pending','1'=>'Completed','2'=>'Canceled'),'value'=>$final['status']));				
			?>
			</div>
            <div style="clear: both;"></div>
         </div> 
		 <?php } ?>
		 <br>
		  <?php //if($group == 1 || $group == 35004) {  ?>	
		 <div <?php if ($i++ % 2 == 0) echo $class;?>>    
            <div class="view_col_left"><?php __('.'); ?></div>
            <div class="view_col_right">
			<?php 
				echo $this->Form->end(array("label" => 'Modify'));						
			?>
			</div>
            <div style="clear: both;"></div>
         </div> 
		 <?php // } ?>
		 
    </div>
</fieldset> 
</div> 
    