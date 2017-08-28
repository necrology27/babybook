<script>
var base_url = '<?php echo base_url(); ?>';
</script>
<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'"><?php echo $back_to_home;?></button>
<div class="container animated_form">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo '<p id="chid" style="display:hidden;">' .$this->session->flashdata('child_id') . '</p>'; ?>
		
	<?php echo $this->session->flashdata('verify_msg'); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Add a child</h4>
			<input id="child_id" type = 'hidden' value=<?php echo $child_id; ?> >
		</div>
	<div class="panel-body">
    <?php $attributes = array("name" => "addchildform");?>
    <form>
      <div class="table-responsive">
      <table class="table-striped">
		<tr>
            <th>Pass &nbsp&nbsp&nbsp</th>
            <th>Fail &nbsp&nbsp&nbsp</th> 
            <th>No opportunity &nbsp</th>
            <th>Refusal &nbsp&nbsp&nbsp</th>
		</tr>
        <?php
        $i = 0;
       
        foreach($skills as $skill): ?>
            <tr> 		
        		 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'] . "." . $skill['skill_group_id'];?>.Pass" name="radio<?php echo  $skill['id'];?>" value="Pass"> </td>
				 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'] . "." .$skill['skill_group_id'];?>.Fail" name="radio<?php echo $skill['id'];?>" value="Fail"> </td>
				 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'] . "." .$skill['skill_group_id'];?>.No_opportunity" name="radio<?php echo $skill['id'];?>" value="No_opportunity"> </td>
				 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'] . "." .$skill['skill_group_id'];?>.Refuse" name="radio<?php echo $skill['id'];?>" value="Refusal"> </td>
				 <td>
				
                 <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" 
                 		data-placement="right" data-content="<?php echo $skill['description'];?>">
                  <?php echo $skill['name'];?>
                 </button>
				 </td>
				
			</tr>	
		<?php 
		
		$i++;
		endforeach; 
        
		?>
	</table>
	</div>	
	<div class="form-group">
		<button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url();?>home'"><?php echo $save_button;?></button>
		<button name="cancel" type="reset" class="btn btn-default"><?php echo $cancel_button;?></button>
		
	</div>
</form>

<?php echo $this->session->flashdata('msg'); ?> 
