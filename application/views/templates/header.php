<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0 charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>upload.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>light.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>slider/css/slider.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>nanogallery/dist/css/nanogallery.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
table, .white-container {
    padding-left: 10px;
    padding-top: 2px;
    margin-bottom: 15px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 2px 2px 10px #888888;
}

body {
    margin: 0 auto;
    background: #ffffff url(<?php echo resources_url() . "img/balls.jpg"?>) no-repeat scroll;
    background-size: cover;
    height: 100%;
}
</style>
<title>babybook | <?php echo $this->data['title'];?></title>
</head>
<body> 

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>home">babybook</a>
      
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

		<li><a href="<?php echo base_url();?>child/add_child"><?php echo _e('add_child'); ?></a></li>
        <li><a href="<?php echo base_url();?>discussions"><?php echo _e('forum'); ?></a></li>
        <li><a href="#"><?php echo _e('settings'); ?></a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
    		<li>
    		<div class="btn-group" role="group" aria-label="New image/album">
    			<button class="btn-default btn navbar-btn" onclick="location.href='<?php echo base_url();?>home/update'"><?php echo _e('edit_profile'); ?></button>
      			<button  class="btn-primary btn navbar-btn" onclick="location.href='<?php echo base_url();?>login/logout'" ><?php echo _e('logout'); ?></button>
      			<?php  if (getCurrentUserRole() == "3") {?>
      			<button  class="btn-primary btn navbar-btn" onclick="location.href='<?php echo base_url();?>admin/dashboard'" >Admin</button>
      			<?php  }?>
  			</div>
      		</li>
      		<li><p class="navbar-text" id="user"><?php echo _e('logged_in_as'); ?>: <?php echo getCurrentUserName(); ?></p></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>