<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>babybook Forgot Password</title>
<link rel="stylesheet" href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
<link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<img src="<?php echo resources_url();?>img/bemaszik.png" class="back-left" />
	<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>login'">Back to login</button>
	<div class="container animated_form">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Forgot Password</h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "forgotform");
                echo form_open("user/forgot", $attributes); ?>
               
						<div class="form-group">
							<label for="email">Email</label> 
							<input class="form-control" name="email" placeholder="example@something.com" type="text" value="<?php echo set_value('email'); ?>" /> 
								<span class="text-danger">
								<?php echo form_error('email'); ?>
								</span>
						</div>

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-default">Send email</button>
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>