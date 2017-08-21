<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>babybook Test</title>
    <script src="<?php echo resources_url();?>jquery.js"></script>
    <script src="<?php echo resources_url();?>main.js"></script>
    <script src="<?php echo resources_url();?>jquery-ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo resources_url(); ?>jquery-ui/jquery-ui.css">
    <link href="<?php echo resources_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo resources_url(); ?>/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
 	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">babybook</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    		<button class="btn btn-default navbar-btn navbar-right" onclick="location.href='<?php echo base_url();?>home'">Back to home page</button>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
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
               
              	<table id="skill-table" class="table table-striped header-fixed">                    
              	  <tr>
                    <th>Pass &nbsp&nbsp&nbsp</th>
                    <th>Fail &nbsp&nbsp&nbsp</th> 
                    <th>No opportunity &nbsp</th>
                    <th>Refusal &nbsp&nbsp&nbsp</th>
                    <th>Skill &nbsp&nbsp&nbsp</th>
                   </tr>
                <?php
                $i = 0;
                
                foreach($skills as $skill): ?>
                    <tr> 		
                		 <td align="center">	<input type="radio" name="radio<?php echo $i;?>" value="Pass"> </td>
						 <td align="center">	<input type="radio" name="radio<?php echo $i;?>" value="Fail"> </td>
						 <td align="center">	<input type="radio" name="radio<?php echo $i;?>" value="No_opportunity"> </td>
						 <td align="center">	<input type="radio" name="radio<?php echo $i;?>" value="Refusal"> </td>
						<td><div class="form-group popup" onclick="popup_function('popup<?php echo $i;?>')">
						 	<?php echo $skill['name'];?><br>
								<span class="popuptext" id="popup<?php echo $i;?>"> <?php echo $skill['description'];?></span>
						</div> </td>
						
					</tr>	
				<?php 
				
				$data =  array(
				    $i => array(
				        'skill_name' => $skill['name'],
				        'respons' => 'radio'.$i
				    )
				);
				
				$i++;
				endforeach; 
				$jsonString= json_encode($data) ;
				# print_r($data);
				# die();
				?>
			</table>	
						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-default">Save</button>
							<button name="cancel" type="reset" class="btn btn-default" onclick="location.href='<?php echo base_url();?>home'">Cancel</button>
							
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>

</body>
</html>