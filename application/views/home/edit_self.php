<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8">
<title>babybook | <?php echo $update_title; ?></title>
<script src="<?php echo resources_url();?>jquery.js"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
<script>
    $( function() {
    	var date = $('.datepicker').datepicker({
        	 dateFormat: 'yy-mm-dd',
    	     changeMonth: true,
    	     changeYear: true,
    	     yearRange: "-100:-10"
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
                
	<img src="<?php echo resources_url();?>img/lancletra.png" class="back-left" />
	<div class="container animated_form">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4><?php echo $update_title; ?></h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "userupdateform");
                echo form_open("home/update", $attributes); ?>
                		<div class="form-group">
							<label for="name"><?php echo $name_label; ?></</label> 
							<input class="form-control" name="name" type="text" value="<?php echo $name; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('name'); ?>
								</span>
						</div>

						<div class="form-group">
							<label for="password"><?php echo $new_password_label; ?></</label>
							<input class="form-control" name="newpassword" placeholder="<?php echo $new_password_label; ?>" type="password" />
							<span class="text-danger">
							<?php echo form_error('newpassword'); ?>
							</span>
						</div>

						<div class="form-group">
							<label for="subject"><?php echo $confirm_password_label; ?></</label> 
							<input class="form-control" name="cpassword" placeholder="<?php echo $confirm_password_label; ?>" type="password" /> 
							<span class="text-danger">
							<?php echo form_error('cpassword'); ?>
							</span>
						</div>
						
                        <div class="form-group">
							<label for="name"><?php echo $gender_label; ?></</label><br>
							<input class="radiobtn" type="radio" name="gender" value="M" <?php if($gender === 'M') echo 'checked'; ?>> <?php echo $male; ?></<br>
  							<input class="radiobtn" type="radio" name="gender" value="F" <?php if($gender === 'F') echo 'checked'; ?>> <?php echo $female; ?></<br>
						</div>

						<div class="form-group">
							<label for="email"><?php echo $email_label; ?></</label> 
							<input class="form-control" name="email" type="text" value="<?php echo $email; ?>" /> 
							<span class="text-danger">
							<?php echo form_error('email'); ?>
							</span>
						</div>

						<div class="form-group">
							<label for="birthday"><?php echo $birthday_label; ?></</label> 
							<input class="form-control datepicker" name="birthday" type="text" value="<?php echo $birthday; ?>" /> 
							<span class="text-danger">
							<?php echo form_error('birthday'); ?>
							</span>
						</div>
						
						<div class="form-group">
							<label for="language"><?php echo $language_label; ?></</label> 
							<select name='language' id='language'>
								<option value='1' <?php if($language == 1) echo 'selected'; ?>>English</option>
								<option value='2' <?php if($language == 2) echo 'selected'; ?>>Magyar</option>
								<option value='3' <?php if($language == 3) echo 'selected'; ?>>Român</option>
							</select>
							<br /> 
							<span class="text-danger">
							<?php echo form_error('language'); ?>
							</span>
						</div>

						<div class="form-group">
							<label for="measurement"><?php echo $measurement_label; ?></</label> 
							<select name='measurement' id='measurement'>
								<option value='1' <?php if($measurement === 'SI (metre, kilogram)') echo 'selected'; ?>>SI(metre, kilogram)</option>
								<option value='2' <?php if($measurement === 'English units(yard, stone)') echo 'selected'; ?>>English(yard, stone)</option>
							</select>
							<br /> 
							<span class="text-danger">
							<?php echo form_error('measurement'); ?>
							</span>
						</div>
						
						<div class="form-group">
							<label for="password"><?php echo $old_password_label; ?></</label>
							<input class="form-control" name="password" placeholder="<?php echo $old_password_label; ?>" type="password" />
							<span class="text-danger">
							<?php echo form_error('password'); ?>
							</span>
						</div>

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-primary"><?php echo $save_button; ?></</button>
							<button name="cancel" type="reset" class="btn btn-default"><?php echo $cancel_button; ?></</button>
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>