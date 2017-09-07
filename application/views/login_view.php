<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8" />
<title>babybook | <?php echo _e('login_title'); ?></title>
<link href="<?php echo resources_url(); ?>/css/style.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css"
	rel="stylesheet" type="text/css" />
</head>
<body>


	<img src="<?php echo resources_url();?>img/bemaszik.png" alt='"<?php echo _e('missing_image'); ?>"'
		class="back-left" />
	<div class="row animated_form">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>babybook | <?php echo _e('login_title'); ?></h1>
				</div>
				<div class="panel-body">
        <?php echo validation_errors(); ?>
        <?php echo form_open('login/verify_login'); ?>
        	<div class="form-group">
        		<label for="email">Email:</label> 
        		<input class="form-control" type="text" id="email" name="email" />
        		<br />
        	</div>
        	<div class="form-group">
        		<label for="password"><?php echo _e('password_label'); ?>:</label> 
        		<input id="password" class="form-control" type="password" name="password" /> 
        		<br />
        	</div>
        	<div class="form-group">
        		<input class="btn btn-primary" type="submit" value="<?php echo _e('login_title'); ?>" />
        	</div>
    	<?php echo form_close()?>
	<div class="form-group">
    	<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>user/forgot'"><?php echo _e('forgot_title'); ?></button>
    	<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>user/register'"><?php echo _e('register_title'); ?></button>
<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&     FACEBOOK LOGIN     &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->    	
<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

            <div id="fb-root"></div>
            <div class="fb-login-button"></div>
<!-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
    	<label id=status></label>
	</div>
</div>
</div>
</div>
</div>