<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 charset=utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>upload.css">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>light.css">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>slider/css/slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>nanogallery/dist/css/nanogallery.min.css">
    <style>
        body {
            margin: 0 auto;
            height: 100%;
            background: #ffffff url(<?php echo resources_url() . "img/asd.jpg"?>) repeat fixed;
            background-size: 250px;
        }
    </style>
    <title>babybook | <?php echo $this->data['title'];?></title>
</head>
<body>
    <nav class="baby-heading navbar navbar-default navbar-static-top">
		<div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <img class="pull-left img-circle" alt="babybook" src="<?php echo resources_url()?>/img/logo2.png" style="display: inline-block; margin-top: 10px; height: 30px;">
                
                <a class="navbar-brand" href="<?php echo base_url();?>home">&nbsp;babybook</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url();?>child/add_child"><?php echo _e('add_child'); ?></a></li>
                    <li><a href="<?php echo base_url();?>discussions"><?php echo _e('forum'); ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
            		<li>
                		<div class="btn-group" role="group" aria-label="New image/album">
                			<button class="btn-primary btn navbar-btn" 
                					onclick="location.href='<?php echo base_url();?>home/update'"><?php echo _e('edit_profile'); ?></button>
                  			<button class="btn-default btn navbar-btn" 
                  					onclick="location.href='<?php echo base_url();?>login/logout'" > 
                  				<span class="glyphicon glyphicon-log-out"> </span>
                  				<?php echo _e('logout'); ?>
                  			</button>
                  			<?php  if (getCurrentUserRole() == "3") {?>
                  				<button class="btn-info btn navbar-btn" 
                  						onclick="location.href='<?php echo base_url();?>admin/dashboard'" >Admin</button>
                  			<?php  }?>
                		</div>
              		</li>
              		<li>
              			<p class="navbar-text" id="user">
              				<?php echo _e('logged_in_as'); ?>: <?php echo getCurrentUserName(); ?>
              				(<strong><?php  echo getCurrentUserPoints();?> pont</strong>)
              			</p>
              		</li>
          		</ul>
            </div>
		</div>
    </nav>
</body>