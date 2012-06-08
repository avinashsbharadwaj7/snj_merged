<?php echo $html->css(array('rnc/style', 'rnc/view', 'rnc/css_menu', 'rnc/bcp')); 
/*variables*/
$region = array(""=>"",
                "SOUTH EAST"=>"SOUTH EAST",
                "SOUTH WEST"=>"SOUTH WEST",           
                "SOUTH CENTRAL"=>"SOUTH CENTRAL",              
                "NORTH EAST"=>"NORTH EAST",                
                "NORTH WEST"=>"NORTH WEST",
                "NORTH CENTRAL"=>"NORTH CENTRAL");

$activity = array(""=>"",
                  "SIAD Configuration" => "SIAD Configuration",
                  "Ports Turn Up"=>"Ports Turn Up",
                  "Troubleshooting"=>"Troubleshooting",
                  "Status Check"=>"Status Check",
                  "Other"=>"Other");?>

<?php if ($searchRendered){ ?>
    <div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>            
            <li><?php echo $this->Html->link(__('Back', true), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Add', true), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('Reset Search Conditions', true), array('action' => 'search')); ?> </li>
        </ul>
    </div>

    <fieldset>        
        <div class="paging">
        <?php echo $paginator->prev('<< ' . __('Previous', true), array(), null, array('class' => 'disabled')); ?>
        |     <?php echo $paginator->numbers(); ?>
        <?php echo $paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
        <br>
        <br><?php
        echo $paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>
        </div>


    <legend>WCDMA SIAD Support</legend>

    <table>
        <tr>
            <th>ID</th>
            <th>Site USID</th>
            <th>Market</th>
            <th>Node</th>
            <th>Region</th>
            <th>Network Number</th>
            <th>Activity Type</th>
            <th>Loop Back IP</th>
            <th>SIAD CLLI</th>
            <th>Signum</th>
            <th>Status</th>
        </tr>

        <?php foreach ($siadquery as $post): ?>
         <tr>
            
                <?php //echo $this->Html->link($post['WcdmaSiadSupport']['id'], array('action' => 'view', $post['WcdmaSiadSupport']['id'])); ?>
            
            <td><?php echo $post['WcdmaSiadSupport']['id']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['site_id']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['market']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['node_name']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['region']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['network_number']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['activity']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['siad_oam']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['siad_clli']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['signum']; ?></td>
            <td><?php echo $post['WcdmaSiadSupport']['status']; ?></td>            
        </tr>
        <?php endforeach; ?>

     </table>

            <div class="paging">
                 <?php echo $paginator->prev('<< ' . __('Previous', true), array(), null, array('class' => 'disabled')); ?>
                    |     <?php echo $paginator->numbers(); ?>
                 <?php echo $paginator->next(__('Next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
                 <br><br><?php
                 echo $paginator->counter(array(
                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                ));
        ?>
            </div>
        </fieldset>
<?php } else { ?>

     <fieldset>
                <legend>Search Criteria</legend>
                <?php
                echo $this->Form->create('WcdmaSiadRecord');                
                echo $this->Form->input('site_id', array('label'=>'Site ID', 'type'=>'text'));
                echo $this->Form->input('market', array("label"=>"Market"));
                echo $this->Form->input('node_name', array("label"=>"Node Name"));
                echo $this->Form->input('region', array("label"=>"Region", 'type'=>'select', 'options'=>$region));
                echo $this->Form->input('network_number', array("label"=>"Network Number")); 
                echo $this->Form->input('activity', array('label'=>'Activity', 'type'=>'select', 'options'=>$activity));
                echo $this->Form->input('siad_oam', array("label"=>"Loopback IP"));
                echo $this->Form->input('siad_clli', array("label"=>"SIAD CLLI"));
                echo $this->Form->input('signum', array("label"=>"Signum"));
                echo $this->Form->input('status', array("label"=>"Status", 'type'=>'select', 'options'=>
                     array(""=>"", "N/A"=>"N/A", "Nok"=>"Nok", "Ok"=>"Ok"))); 
                echo $datePicker->picker('From');
                echo $datePicker->picker('To');
                ?>
                
                <?php echo $this->Form->end(array("label" => 'Search'));?>
    </fieldset>


<?php } ?>