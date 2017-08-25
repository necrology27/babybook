<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
<link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?php echo resources_url();?>jquery.js"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
<script src="<?php echo resources_url();?>bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script src="<?php echo resources_url();?>main.js"></script>
<script src="<?php echo resources_url();?>test.js?v=5"></script>

<title>babybook | <?php echo $title; ?></title>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
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
		<li><p class="navbar-text" id="user"><?php echo $logged_in_as; ?>: <?php echo $name; ?></p></li>
        <li><a href="#"><?php echo $forum; ?></a></li>
        <li><a href="#"><?php echo $settings; ?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<div class="btn-group" role="group" aria-label="...">
          	<button class="btn-default btn navbar-btn" onclick="location.href='<?php echo base_url();?>upload_controller/add_child'"><?php echo $add_child; ?></button>
    		<button class="btn-default btn navbar-btn" onclick="location.href='<?php echo base_url();?>home/update'"><?php echo $edit_profile; ?></button>
		</div>
      	<button class="btn-primary btn navbar-btn" onclick="home/logout"><?php echo $logout; ?></button>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>