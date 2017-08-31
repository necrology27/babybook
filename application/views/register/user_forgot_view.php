<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, charset=utf-8">
<title>babybook | <?php echo $forgot_title; ?></title>
<link rel="stylesheet" href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
<link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<img src="<?php echo resources_url();?>img/bemaszik.png" alt="<?php echo $missing_image; ?>" class="back-left" />
	<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>login'"><?php echo $back_to_login; ?></button>
	<div class="container animated_form">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4><?php echo $forgot_title; ?></h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "forgotform");
                echo form_open("user/forgot", $attributes); ?>
               
						<div class="form-group">
							<label for="email"><?php echo $email_label; ?></label> 
							<input id="email" class="form-control" name="email" placeholder="<?php echo $ex_mail; ?>" type="text" value="<?php echo set_value('email'); ?>" /> 
								<span class="text-danger">
								<?php echo form_error('email'); ?>
								</span>
						</div>

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-default"><?php echo $send_email_button; ?></button>
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>