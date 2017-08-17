<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>babybook User Registration Form</title>
<script src="<?php echo resources_url();?>jquery.js"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
<script>
$( function() {
    var date = $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-20:+3"
    }).val();
} );
    </script>
    <link rel="stylesheet"
        href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
        <link href="<?php echo resources_url(); ?>/css/style.css"
            rel="stylesheet" type="text/css" />
            <link
            href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css"
                rel="stylesheet" type="text/css" />
                </head>
                <body>
                <button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'">Back to home page</button>
                <div class="container animated_form">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Add a child</h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "addchildform");
                echo form_open_multipart("upload_controller/add_child", $attributes); ?>
                		<div class="form-group">
							<label for="name">Name</label> <input class="form-control"
								name="name" placeholder="Child's name" type="text"
								value="<?php echo set_value('name'); ?>" /> 
							<!-- 	<span>
							 	class="text-danger"><?php echo form_error('name'); ?></span>   -->
						</div>
						
						<div class="form-group">
							<label for="birthday">Birthday</label> 
							<input class="form-control datepicker" name="birthday" type="text" /> 
							<span class="text-danger">
						<!-- 	<?php echo form_error('birthday'); ?> -->
							</span>
						</div>
						
						
						<div class="form-group">
							<label for="name">Gender</label><br>
							<input class="radiobtn" type="radio" name="gender" value="M"> Male<br>
  							<input class="radiobtn" type="radio" name="gender" value="F" checked> Female<br>
						</div>
					
					
					
  
						<div class="form-group">
							<label for="birth_weight">Birth weight </label> <br> 
							<input class="form-control2" name="birth_weight" type="text" value="<?php echo set_value('birth_weight'); ?>" /> 
								<span class= "measurement">
								<?php 
								if ($measurement === 'SI (metre, kilogram)') 
								    echo 'g';
								 else 
								     echo 'lb';
								 ?>
								 </span>
								<span class="text-danger">
								<?php echo form_error('birth_weight'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="birth_length">Birth length </label> <br>
							<input class="form-control2" name="birth_length" type="text" value="<?php echo set_value('birth_length'); ?>" /> 
								<span class= "measurement">
								<?php 
								if ($measurement === 'SI (metre, kilogram)') 
								    echo 'cm';
								 else 
								     echo 'in';
								 ?>
								 </span>
								<span class="text-danger">
	
								<?php echo form_error('birth_weight'); ?>
								</span>
								
						</div>
						
						
						<div class="form-group">
							<label for="apgar_score">Apgar score </label>  <br> 
							<input class="form-control2" name="apgar_score" type="text" value="<?php echo set_value('apgar_score'); ?>" /> 
								<span class= "measurement">/10</span>
								<span class="text-danger">
								<?php echo form_error('birth_weight'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="genetical_disorders">Genetical disorders </label> 
							<input class="form-control" name="genetical_disorders" placeholder="none" type="text" value="<?php echo set_value('genetical_disorders'); ?>" /> 
								<span class="text-danger">
								<?php echo form_error('birth_weight'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="other_disorders ">Other disorders</label> 
							<input class="form-control" name="other_disorders" placeholder="none" type="text" value="<?php echo set_value('other_disorders'); ?>" /> 
								<span class="text-danger">
								<?php echo form_error('birth_weight'); ?>
								</span>
						</div>

						
						<div class="form-group">
							<label for="image">Add default image</label> 
					
							 
							<?php echo $error;?> 
                                <?php echo "<input type='file' name='userfile' size='20' />"; ?>
							 
								<span class="text-danger">
								<?php echo form_error('image'); ?>
								</span>
						</div>
						
							<div class="form-group">
						<!--	<label for="birthday">Birthday</label> -->
							<input type="checkbox" name="is_parent" value="is_parent"> My child.<br>
							<?php echo form_error('is_parent'); ?>
							</span>
						</div>
						

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-default">Add</button>
							<button name="cancel" type="reset" class="btn btn-default" onclick="location.href='<?php echo base_url();?>home'">Cancel</button>
							
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>