<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>babybook Test</title>
<script src="<?php echo resources_url();?>jquery.js"></script>
<script src="<?php echo resources_url();?>main.js"></script>
<script src="<?php echo resources_url();?>test.js?v=2"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script> 
<link rel="stylesheet" href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
<link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'">Back to home page</button>
    <div class="container animated_form">
    	<div class="row">
    		<div class="col-md-6 col-md-offset-3">
    			<p id="chid" style="display:hidden;"><?php echo $this->session->flashdata('child_id'); ?></p>
       	 		<?php echo $this->session->flashdata('verify_msg'); ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Add a child</h4>
					</div>
				<div class="panel-body">
                <?php $attributes = array("name" => "addchildform");?>
                <form>
              
                  <table>
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
                		 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'];?>.Pass" name="radio<?php echo  $skill['id'];?>" value="Pass"> </td>
						 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'];?>.Fail" name="radio<?php echo $skill['id'];?>" value="Fail"> </td>
						 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'];?>.No_opportunity" name="radio<?php echo $skill['id'];?>" value="No_opportunity"> </td>
						 <td align="center">	<input type="radio" class="answerRadio" id="<?php echo  $skill['id'];?>.Refuse" name="radio<?php echo $skill['id'];?>" value="Refusal"> </td>
						<td><div class="form-group popup" name=skill_name value=<?php echo $skill['name'];?> onclick="popup_function('popup<?php echo $i;?>')">
						 	<?php echo $skill['name'];?><br>
								<span class="popuptext" id="popup<?php echo $i;?>"> <?php echo $skill['description'];?></span>
						</div> </td>
						
					</tr>	
				<?php 
				
				# $'radio'.$i = $(".radio'.$i:checked").val();
				$data =  array(
				    $i => array(
				        'skill_name' => $skill['name'],
				        'respons' => 'radio'.$i
				    )
				);
				
				$i++;
				endforeach; 
				$jsonString= json_encode($data) ;
				# print_r($data);
				# die();
				?>
			</table>	
			<div class="form-group">
				<button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url();?>home'">Save</button>
				<button name="cancel" type="reset" class="btn btn-default">Cancel</button>
				
			</div>
		</form>
		<p id="loading"></p>
    <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>