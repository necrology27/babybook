

<input id="child_id" type = 'hidden' value=<?php echo $child_id; ?> >

<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'"><?php echo $back_to_home; ?></button>
	<?php if ($child_id != 0) {
	echo '<img src='.uploads_url() . $user_id . "/" . $child_id . "/" . $this->image_model->get_def_img($child_id).' alt= '.$missing_image.'. class="back-left" />';
	} ?>
	<div class="container animated_form">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
			<div class="panel panel-default">
					<div class="panel-heading">
						<h4><?php echo $child_update_title; ?></h4>
					</div>
					<div class="panel-body">
                <?php $attributes = array("name" => "userupdateform");
                echo form_open_multipart("child/add_child/".$child_id, $attributes); ?>
                		<div class="form-group">
							<label for="name"><?php echo $name_label; ?></label> 
							<input id="name" class="form-control" name="name" type="text" value="<?php echo $name; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('name'); ?>
								</span>
						</div>
						<div class="form-group">
							<label for="birthday"><?php echo $birthday_label; ?></label> 
							<input id="birthday" class="form-control datepicker" name="birthday" type="text" value="<?php echo $birthday; ?>" /> 
							<span class="text-danger">
							<?php echo form_error('birthday'); ?>
							</span>
						</div> 
						
						<?php if ($child_id == 0) { ?>
        						    <div class="form-group">
        						    <label><?php echo $gender_label; ?></label><br>
        							<input class="radiobtn" type="radio" name="gender" value="M"> <?php echo $male; ?><br>
          							<input class="radiobtn" type="radio" name="gender" value="F" checked><?php echo $female; ?><br>
        						</div>

        						<div class="form-group">
        							<label for="birth_weight"><?php echo $birth_weight_label; ?></label> <br> 
        							<input id="birth_weight" class="form-control2" name="birth_weight" type="text" value="<?php echo set_value('birth_weight'); ?>" /> 
        								<span class= "measurement">
        								<?php 
        								if ($measurement === 'SI (metre, kilogram)') 
        								    echo 'g';
        								 else 
        								     echo 'lb';
        								 ?>
        								 </span>
        								<span class="text-danger">
        								<?php echo form_error('birth_weight'); ?>
        								</span>
        						</div>
        						
        						<div class="form-group">
        							<label for="birth_length"><?php echo $birth_length_label; ?></label> <br>
        							<input id="birth_length" class="form-control2" name="birth_length" type="text" value="<?php echo set_value('birth_length'); ?>" /> 
        								<span class= "measurement">
        								<?php 
        								if ($measurement === 'SI (metre, kilogram)') 
        								    echo 'cm';
        								 else 
        								     echo 'in';
        								 ?>
        								 </span>
        								<span class="text-danger">
        	
        								<?php echo form_error('birth_length'); ?>
        								</span>
        								
        						</div>
        						<div class="form-group">
        							<label for="apgar_score"><?php echo $apgar_score_label; ?></label>  <br> 
        							<input id="apgar_score" class="form-control2" name="apgar_score" type="text" value="<?php echo set_value('apgar_score'); ?>" /> 
        								<span class="text-danger">
        								<?php echo form_error('apgar_score'); ?>
        								</span>
        						</div>
						<?php }?>

						<div class="form-group">
							<label for="genetical_disorders"><?php echo $genetical_disorders_label; ?></label> 
							<input id="genetical_disorders" class="form-control" name="genetical_disorders" placeholder="<?php echo $none_placeholder; ?>" type="text" value="<?php echo $genetical_disorders; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('genetical_disorders'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="other_disorders"><?php echo $other_disorders_label; ?></label> 
							<input id="other_disorders" class="form-control" name="other_disorders" placeholder="<?php echo $none_placeholder; ?>" type="text" value="<?php echo $other_disorders; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('other_disorders'); ?>
								</span>
						</div>

						
						
						<div class="form-group">
							<label for="image"><?php echo $default_image_label; ?></label> 
							<?php echo $error;?> 
                                <input id="image" type='file' name='userfile' size='20' />
								<span class="text-danger">
								<?php echo form_error('image'); ?>
								</span>
						</div>
						
						<?php if ($child_id == 0) { ?>
						
						
							<div class="form-group">
							<input type="checkbox" name="is_parent" value="is_parent"><?php echo $my_child_label; ?><br>
							<?php echo form_error('is_parent'); ?>
							
							</div>
						<?php }?>
						

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-primary"><?php echo $save_button; ?></button>
							<button name="cancel" type="reset" class="btn btn-default"><?php echo $cancel_button; ?></button>
						</div>
					<?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
                </div>
                </div>
               </div>
              </div>
              </div>
              
              