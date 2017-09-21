<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8">
    <title>babybook | <?php _e("register_title"); ?></title>
    <script src="<?php echo resources_url();?>jquery.js"></script>
    <script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
    <script>
    $( function() {
    	var date = $('.datepicker2').datepicker({
        	 dateFormat: 'yy-mm-dd',
    	     changeMonth: true,
    	     changeYear: true,
    	     yearRange: "-100:-10"
    	 }).val();
    } );
    </script>
	<link rel="stylesheet"
			href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
	<link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            margin: 0 auto;
            height: 100%;
            background: #ffffff url(<?php echo resources_url() . "img/asd.jpg"?>) repeat fixed;
            background-size: 250px;
        }
    </style>
</head>
<body>
	<img src="<?php echo resources_url();?>img/bemaszik.png" alt="<?php echo _e('missing_image'); ?>" class="back-left" />
	<button class="btn-default btn-right btn-warning" onclick="location.href='<?php echo base_url();?>login'"><?php echo _e('back_to_login'); ?></button>
	<div class="container animated_form col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
				<div class="panel-heading baby-heading">
					<h4><?php echo _e('register_title'); ?></h4>
				</div>
				<div class="panel-body baby">
                    <?php $attributes = array("name" => "registrationform");
                    echo form_open("user/register", $attributes); ?>
                    <div class="form-group">
						<label for="name"><?php echo _e('name_label'); ?></label> 
						<input id="name" class="form-control"
							name="name" placeholder="<?php echo _e('name_label'); ?>" type="text"
							value="<?php echo set_value('name'); ?>" /> <span
							class="text-danger"><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label for="password"><?php echo _e('password_label'); ?></label>
						<input id="password" class="form-control" name="password" placeholder="<?php echo _e('password_label'); ?>" type="password" />
						<span class="text-danger">
							<?php echo form_error('password'); ?>
						</span>
					</div>
					<div class="form-group">
						<label for="subject"><?php echo _e('confirm_password_label'); ?></label> 
						<input id="subject" class="form-control" name="cpassword" placeholder="<?php echo _e('confirm_password_label'); ?>" type="password" /> 
						<span class="text-danger">
							<?php echo form_error('cpassword'); ?>
						</span>
					</div>
					<div class="form-group">
						<label for="email"><?php echo _e('email_label'); ?></label> 
						<input id="email" class="form-control" name="email" 
								placeholder="<?php echo _e('email_label'); ?>" type="text" value="<?php echo set_value('email'); ?>" /> 
						<span class="text-danger">
							<?php echo form_error('email'); ?>
						</span>
					</div>
					<div class="form-group">
						<label for="birthday"><?php echo _e('birthday_label'); ?></label> 
						<input id="birthday" class="form-control datepicker2" name="birthday" type="text" value="<?php echo set_value('birthday'); ?>" /> 
						<span class="text-danger">
							<?php echo form_error('birthday'); ?>
						</span>
					</div>
					<div class="form-group">
						<label><?php echo _e('gender_label'); ?></label><br>
						<input class="radiobtn" type="radio" name="gender" value="M"> <?php echo _e('male'); ?><br>
						<input class="radiobtn" type="radio" name="gender" value="F" checked> <?php echo _e('female'); ?><br>
						<span class="text-danger">
							<?php echo form_error('gender'); ?>
						</span>
					</div>
					<div class="form-group">
						<label for="language"><?php echo _e('language_label'); ?></label> 
						<select name='language' id='language'>
							<option value='1'>English</option>
							<option value='2'>Magyar</option>
							<option value='3'>Român</option>
						</select>
						<br /> 
						<span class="text-danger">
							<?php echo form_error('language'); ?>
						</span>
					</div>
					<div class="form-group">
						<label for="measurement"><?php echo _e('measurement_label'); ?></label> 
						<select name='measurement' id='measurement'>
							<option value='1'>SI(metre, kilogram)</option>
							<option value='2'>English(yard, stone)</option>
						</select>
						<br /> 
						<span class="text-danger">
							<?php echo form_error('measurement'); ?>
						</span>
					</div>
					<div class="form-group">
						<label><?php echo _e('role_label'); ?></label><br>
						<input class="radiobtn" type="radio" name="role" value="1" checked> <?php echo _e('parent'); ?><br>
						<input class="radiobtn" type="radio" name="role" value="2"> <?php echo _e('expert'); ?><br>
						<span class="text-danger">
							<?php echo form_error('role'); ?>
						</span>
					</div>
					<div class="form-group">
						<button name="submit" type="submit" class="btn btn-default"><?php echo _e('signup_button'); ?></button>
						<button name="cancel" type="reset" class="btn btn-default"><?php echo _e('cancel_button'); ?></button>
					</div>
				<?php echo form_close()?>
            	<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
	</div>
</body>
</html>