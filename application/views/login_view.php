<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>babybook | Login</title>
   <link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
 <img src="<?php echo resources_url();?>img/bemaszik.png" class="back-left"/>
 <div class="row animated_form">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
        	<div class="panel-heading">
   <h1>babybook | Login</h1>
   </div>
   <div class="panel-body">
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
   <div class="form-group">
     <label for="email">Email:</label>
     <input class="form-control" type="text" id="email" name="email"/>
     <br/>
     </div>
     <div class="form-group">
     <label for="password">Password:</label>
     <input class="form-control" type="password" id="passowrd" name="password"/>
     <br/>
     </div>
     <div class="form-group">
     <input class="btn btn-default" type="submit" value="Login"/>
     </div>
   </form>
	<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>user/register'">Register</button>
 </body>
</html>