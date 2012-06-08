<?php echo $html->css('rnc/issues');?>
<?php if($saved):?>
<div class="success">Issue Successfully Saved. Window will now automatically close.</div>
<script type="text/javascript">
    setTimeout('parent.$.fn.colorbox.close()', 2000);
</script>
<?php endif;?>
<?php if(!$saved):?>
<div class="success">Issue couldn't be Successfully Saved</div>
<?php endif;?>