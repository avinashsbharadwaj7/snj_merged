
<li id="backButton"><?php echo $this->Html->link(__('Back', true), array('controller' => 'snjs', 'action' => 'snjcall')); ?></li> 
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$signum = Authsome::get('username');
 $name = Authsome::get('first_name') . ' ' . Authsome::get('last_name');
 
 echo $javascript->link(array( 'gen_validatorv4.js', 'snj/jquery.uiforms' ));
?>


<fieldset>
 <legend>
    <?php __('Subscribe to Distribution List'); ?>
    
  </legend>

<?php echo $this->Form->input("Signum", array( 'READONLY' => true, 'value' => $signum, 'label'=>'Signum', 'type'=>'text') );?>
<?php echo $this->Form->input("Name", array( 'READONLY' => true, 'value' => $name, 'label'=>'Name', 'type'=>'text')); ?>
<?php echo $form->create('DistributionList'); ?>

<p>Which distribution list do you want to subscribe to?</p>
<input type="radio" id="Option1" checked="checked"  name="ListType" value="1" onclick="HideUnHide(this);"/> Select an existing distribution list<br /><br/>
<input type="radio" id="Option2" name="ListType" value="2" onclick="HideUnHide(this);"/>Select distribution list based on Organization, Customer and Region:

 <div id="divMakeList" style="display:none" >
  <?php 
  echo $this->Form->input('Organization',array('type'=>'select','options'=>array('%'=>'All',$orgs),'onchange'=>'PopulateListName()'));
  echo $this->Form->input('customer',array('type'=>'select', 'options'=> array('%'=>'All',$customers), 'id'=> 'customerno','onchange'=>'PopulateListName()') );
  echo $this->Form->input('Region', array('type'=>'select', 'options'=> array('%'=>'All',$regions),'onchange'=>'PopulateListName()'));
  ?>
</div>

<div id="divDL">
  <?php echo $this->Form->input('picklistname',array('type'=>'select','options'=> $dls,'label'=>'Select Distribution List','onchange'=>'PopulateListName()')); ?>
</div>
   
 <?php echo $this->Form->input('name', array('type' => 'hidden','id'=>'name')); ?>
<?php echo $this->Form->input('uname', array('type' => 'hidden','id'=>'uname')); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden','id'=>'listid')); ?>




<?php echo $form->end('Subscribe');?>
</fieldset>
  <script type="text/javascript" language="javascript">
         var frmvalidator  = new Validator("DistributionListSubscribeForm");
      frmvalidator.addValidation("DistributionListPicklistname","dontselect=0","You must select a distribution list!");
         // frmvalidator.addValidation("DistributionListOrganization","dontselect=0","You must select an organization!",
        //"VWZ_IsChecked(document.forms['DistributionListSubscribeForm'].elements['ListType'],'Create a new distribution list')");
        
        //frmvalidator.addValidation("customerno","dontselect=0","You must select a customer!",
        //"VWZ_IsChecked(document.forms['DistributionListSubscribeForm'].elements['ListType'],'Create a new distribution list')");
        
        //frmvalidator.addValidation("DistributionListOrganization","dontselect=0","You must select a region!",
        //"VWZ_IsChecked(document.forms['DistributionListSubscribeForm'].elements['ListType'],'Create a new distribution list')");
         
          //   frmvalidator.addValidation("DistributionListPicklistname","dontselect=0","You must select a distributionlist!",
        //"VWZ_IsChecked(document.forms['DistributionListSubscribeForm'].elements['ListType'],'Select Distribution List')");
       
        
        

      </script>
      
      
<script language="javascript">
    function HideUnHide(thisCheck)
    {
        var ele1 = document.getElementById("divDL");
        var ele2 = document.getElementById("divMakeList");
        var radioValue = thisCheck.value;

        if (radioValue == '1')
        {
            ele1.style.display = "block";
            ele2.style.display = "none";
            frmvalidator.clearAllValidations();
             frmvalidator.addValidation("DistributionListPicklistname","dontselect=0","You must select a distribution list!");
        }
        else
        {
            ele1.style.display = "none";
            ele2.style.display = "block";
            frmvalidator.clearAllValidations();
               frmvalidator.addValidation("DistributionListOrganization","dontselect=0","You must select an Organization!");
         frmvalidator.addValidation("customerno","dontselect=0","You must select a Customer!");
         frmvalidator.addValidation("DistributionListRegion","dontselect=0","You must select a Region!");
        }
    }
 </script>
 
 <script language="javascript">
    function PopulateListName()
    {
        
        var checkValue1 = document.getElementById("Option1");
        var checkValue2 = document.getElementById("Option2");
        
        var selected_text ;
        if (checkValue1.checked)
        {
            var thisValue = document.getElementById("DistributionListPicklistname");
            var selid =thisValue.selectedIndex;
            selected_text = thisValue.options[selid].text;
            
              document.getElementById("listid").value = thisValue.value;
             var strarray = selected_text.split("_");
              var struname = "<br/> Organization: " + strarray[1] + ", Customer: " + strarray[2] + ", Region: " + strarray[3];
              document.getElementById("uname").value = struname;
            }
         
         if (checkValue2.checked)
            {
               
                var struname = "<br/>";
                var thisValue1 = document.getElementById("DistributionListOrganization");
                var selid1 =thisValue1.selectedIndex;
                var selected_text1 = thisValue1.options[selid1].text;
                
                struname = "<br/>Organization: " + selected_text1;
               
                
                var thisValue2 = document.getElementById("customerno");
                var selid2 =thisValue2.selectedIndex;
                var selected_text2 = thisValue2.options[selid2].text ;
                struname = struname + ", Customer: " + selected_text2;
                
                 var thisValue3 = document.getElementById("DistributionListRegion");
                var selid3 =thisValue3.selectedIndex;
                var selected_text3 = thisValue3.options[selid3].text;
                struname = struname + ", Region: " + selected_text3;
                
                selected_text = "SNJ_" + selected_text1 + "_" + selected_text2 + "_" + selected_text3;
                selected_text =  selected_text.replace(/[^a-zA-Z 0-9 _]+/g,'');
                selected_text=selected_text.split(' ').join('').toUpperCase();
                
                document.getElementById("uname").value = struname;
                              
            }
        
            
             //alert(selected_text);
            listName = document.getElementById("name");
            listName.value = selected_text;
       
        
    }
  </script>