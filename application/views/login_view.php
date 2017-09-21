<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="shortcut icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8" />
    <title>babybook | <?php echo _e('login_title'); ?></title>
    <link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css"
    	rel="stylesheet" type="text/css" />
    <link href="<?php echo resources_url(); ?>/css/style.css"
    	rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            margin: 0 auto;
            height: 100%;
            background: #ffffff url(<?php echo resources_url() . "img/asd.jpg"?>) repeat fixed;
            background-size: 250px;
        }
        button#facebook {
            border-color: #2d5073;
            background-color: #3b5998;
            background-image: url(<?php echo resources_url()?>/img/facebook-icon.png);
        }
    </style>
</head>
<body>
	<img src="<?php echo resources_url();?>img/bemaszik.png" alt='"<?php echo _e('missing_image'); ?>"'
		class="back-left" />
	<div class="row col-md-6 col-md-offset-3">
		<div class="">
			<div class="panel panel-default">
				<div class="panel-heading baby-heading container-fluid">
					<img src="<?php echo resources_url();?>img/logo2.png" alt='"<?php echo _e('missing_image'); ?>"' class="img-circle logo col-md-2">
					<h1 class="col-md-6 col-md-offset-1">babybook | <?php _e('login_title'); ?></h1>
				</div>
				<div class="panel-body baby">
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
                    	<button type="submit" class="btn btn-primary">
              				<i class="icon-user icon-white"></i> 
              				<span class="glyphicon glyphicon-log-in"></span> 
              				<?php echo _e('login_title'); ?>
            			</button>
                	</div>
                	<?php echo form_close()?>
                	<button class="btn-default btn" style="float: right;" 
                				onclick="location.href='<?php echo base_url();?>user/register'">
            			<?php echo _e('register_title'); ?>
                	</button>
                	<div class="form-group">
                    	<a href='<?php echo base_url();?>user/forgot' tabindex="4"><?php echo _e('forgot_title'); ?></a>
                		<div id="fb-root"></div>
                		<div  class="social-wrap a">
                			<hr>
                    		<button  id="facebook" onclick="javascript:login();" >Sign in with Facebook</button>
                    	</div>
           			</div>
				</div>
            </div>
    	</div>
    </div>
</body>