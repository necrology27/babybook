<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0 charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>slider/css/slider.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>jquery-ui/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>nanogallery/css/nanogallery.css">

<title>babybook | <?php echo $this->data['title']; ?></title>
</head>
<body> 

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
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
  			</div>
      		</li>
      		<li><p class="navbar-text" id="user"><?php echo _e('logged_in_as'); ?>: <?php echo getCurrentUserName(); ?></p></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>