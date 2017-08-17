<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8">
<title>babybook | Update Profile</title>
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
<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'">Back to home page</button>
                
	<img src="<?php echo resources_url();?>img/lancletra.png" class="back-left" />
	<div class="container animated_form">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4>User Profile</h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "userupdateform");
                echo form_open("home/update", $attributes); ?>
                		<div class="form-group">
							<label for="name">Name</label> 
							<input class="form-control" name="name" type="text" value="<?php echo $name; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('name'); ?>
								</span>
						</div>

						<div class="form-group">
							<label for="password">New Password</label>
							<input class="form-control" name="newpassword" placeholder="Password" type="password" />
							<span class="text-danger">
							<?php echo form_error('newpassword'); ?>
							</span>
						</div>

						<div class="form-group">
							<label for="subject">Confirm Password</label> 
							<input class="form-control" name="cpassword" placeholder="Confirm New Password" type="password" /> 
							<span class="text-danger">
							<?php echo form_error('cpassword'); ?>
							</span>
						</div>
						
                        <div class="form-group">
							<label for="name">Gender</label><br>
							<input class="radiobtn" type="radio" name="gender" value="M" <?php if($gender === 'M') echo 'checked'; ?>> Male<br>
  							<input class="radiobtn" type="radio" name="gender" value="F" <?php if($gender === 'F') echo 'checked'; ?>> Female<br>
						</div>

						<div class="form-group">
							<label for="email">Email</label> 
							<input class="form-control" name="email" type="text" value="<?php echo $email; ?>" /> 
							<span class="text-danger">
							<?php echo form_error('email'); ?>
							</span>
						</div>

						<div class="form-group">
							<label for="birthday">Birthday</label> 
							<input class="form-control datepicker" name="birthday" type="text" value="<?php echo $birthday; ?>" /> 
							<span class="text-danger">
							<?php echo form_error('birthday'); ?>
							</span>
						</div>
						
						<div class="form-group">
							<label for="language">Language</label> 
							<select name='language' id='language'>
								<option value='1' <?php if($language == 1) echo 'selected'; ?>>English</option>
								<option value='2' <?php if($language == 2) echo 'selected'; ?>>Magyar</option>
								<option value='3' <?php if($language == 3) echo 'selected'; ?>>Román</option>
							</select>
							<br /> 
							<span class="text-danger">
							<?php echo form_error('measurement'); ?>
							</span>
						</div>

						<div class="form-group">
							<label for="measurement">Measurement</label> 
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
							<label for="password">Old Password</label>
							<input class="form-control" name="password" placeholder="Password" type="password" />
							<span class="text-danger">
							<?php echo form_error('password'); ?>
							</span>
						</div>

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-primary">Save</button>
							<button name="cancel" type="reset" class="btn btn-default">Cancel</button>
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>