<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>babybook | <?php echo $add_child; ?></title>
<script src="<?php echo resources_url();?>jquery.js"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
<script>
$( function() {
    var date = $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-5:+1"
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
                <button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'"><?php echo $back_to_home; ?></button>
                <div class="container animated_form">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4><?php echo $add_child; ?></h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "addchildform");
                echo form_open_multipart("upload_controller/add_child", $attributes); ?>
                		<div class="form-group">
							<label for="name"><?php echo $name_label; ?></label> <input class="form-control"
								name="name" placeholder="<?php echo $child_name_placeholder; ?>" type="text"
								value="<?php echo set_value('name'); ?>" /> 
							<!-- 	<span>
							 	class="text-danger"><?php echo form_error('name'); ?></span>   -->
						</div>
						
						<div class="form-group">
							<label for="birthday"><?php echo $birthday_label; ?></label> 
							<input class="form-control datepicker" name="birthday" type="text" value="<?php echo set_value('birthday'); ?>"/> 
							<span class="text-danger">
						<!-- 	<?php echo form_error('birthday'); ?> -->
							</span>
						</div>
						
						
						<div class="form-group">
							<label for="name"><?php echo $gender_label; ?></label><br>
							<input class="radiobtn" type="radio" name="gender" value="M"> <?php echo $male; ?><br>
  							<input class="radiobtn" type="radio" name="gender" value="F" checked><?php echo $female; ?><br>
						</div>
					
					
					
  
						<div class="form-group">
							<label for="birth_weight"><?php echo $birth_weight_label; ?></label> <br> 
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
							<label for="birth_length"><?php echo $birth_length_label; ?></label> <br>
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
	
								<?php echo form_error('birth_length'); ?>
								</span>
								
						</div>
						
						
						<div class="form-group">
							<label for="apgar_score"><?php echo $apgar_score_label; ?></label>  <br> 
							<input class="form-control2" name="apgar_score" type="text" value="<?php echo set_value('apgar_score'); ?>" /> 
								<span class= "measurement">/10</span>
								<span class="text-danger">
								<?php echo form_error('apgar_score'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="genetical_disorders"><?php echo $genetical_disorders_label; ?></label> 
							<input class="form-control" name="genetical_disorders" placeholder="<?php echo $none_placeholder; ?>" type="text" value="<?php echo set_value('genetical_disorders'); ?>" /> 
								<span class="text-danger">
								<?php echo form_error('genetical_disorders'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="other_disorders "><?php echo $other_disorders_label; ?></label> 
							<input class="form-control" name="other_disorders" placeholder="<?php echo $none_placeholder; ?>" type="text" value="<?php echo set_value('other_disorders'); ?>" /> 
								<span class="text-danger">
								<?php echo form_error('other_disorders'); ?>
								</span>
						</div>

						
						<div class="form-group">
							<label for="image"><?php echo $default_image_label; ?></label> 
					
							 
							<?php echo $error;?> 
                                <input type='file' name='userfile' size='20' />
							 
								<span class="text-danger">
								<?php echo form_error('image'); ?>
								</span>
						</div>
						
							<div class="form-group">
							<input type="checkbox" name="is_parent" value="is_parent"><?php echo $my_child_label; ?><br>
							<?php echo form_error('is_parent'); ?>
							</span>
						</div>
						

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-default"><?php echo $add_button; ?></button>
							<button name="cancel" type="reset" class="btn btn-default" onclick="location.href='<?php echo base_url();?>home'"><?php echo $cancel_button; ?></button>
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>