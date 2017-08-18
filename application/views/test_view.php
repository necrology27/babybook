<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>babybook Test</title>
<script src="<?php echo resources_url();?>jquery.js"></script>
<script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
<script>

    </script>
    <link rel="stylesheet"
        href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
        <link href="<?php echo resources_url(); ?>/css/style.css"
            rel="stylesheet" type="text/css" />
            <link
            href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css"
                rel="stylesheet" type="text/css" />
                </head>
                <body>
                <button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'">Back to home page</button>
                <div class="container animated_form">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Add a child</h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "addchildform");
                echo form_open_multipart("upload_controller/add_child", $attributes); ?>
                		<div class="form-group">
							<label for="name">Name   <?php echo $skills[0]['name'];?> </label> <input class="form-control"
								name="name" placeholder="Child's name" type="text"
								value="<?php echo set_value('name'); ?>" /> 
							<!-- 	<span>
							 	class="text-danger"><?php echo form_error('name'); ?></span>   -->
						</div>
						
						<div class="form-group">
							<label for="birthday">Birthday</label> 
							<input class="form-control datepicker" name="birthday" type="text" /> 
							<span class="text-danger">
						<!-- 	<?php echo form_error('birthday'); ?> -->
							</span>
						</div>
						
						
						

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-default">Add</button>
							<button name="cancel" type="reset" class="btn btn-default" onclick="location.href='<?php echo base_url();?>home'">Cancel</button>
							
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>