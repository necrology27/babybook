
	<input id="child_id" type = 'hidden' value=<?php echo $child_id; ?> >
<button class="btn-default btn-right" onclick="location.href='<?php echo base_url();?>home'"><?php echo $back_to_home; ?></button>
	<img src="<?php echo uploads_url() . $user_id . "/" . $child_id . "/" . $this->image_model->get_def_img($child_id); ?>" class="back-left" />
	
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
                echo form_open_multipart("child/update_child/".$child_id, $attributes); ?>
                		<div class="form-group">
							<label for="name"><?php echo $name_label; ?></</label> 
							<input class="form-control" name="name" type="text" value="<?php echo $name; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('name'); ?>
								</span>
						</div>


						<div class="form-group">
							<label for="birthday"><?php echo $birthday_label; ?></</label> 
							<input class="form-control datepicker" name="birthday" type="text" value="<?php echo $birthday; ?>" /> 
							<span class="text-danger">
							<?php echo form_error('birthday'); ?>
							</span>
						</div>
						
						<div class="form-group">
							<label for="genetical_disorders"><?php echo $genetical_disorders_label; ?></label> 
							<input class="form-control" name="genetical_disorders" placeholder="<?php echo $none_placeholder; ?>" type="text" value="<?php echo $genetical_disorders; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('genetical_disorders'); ?>
								</span>
						</div>
						
						<div class="form-group">
							<label for="other_disorders "><?php echo $other_disorders_label; ?></label> 
							<input class="form-control" name="other_disorders" placeholder="<?php echo $none_placeholder; ?>" type="text" value="<?php echo $other_disorders; ?>" /> 
								<span class="text-danger">
								<?php echo form_error('other_disorders'); ?>
								</span>
						</div>

						
						
						<div class="form-group">
							<label for="image"><?php echo $default_image_label; ?></label> 
							<?php echo $error;?> 
                                <input type='file' name='userfile' size='20' />
								<span class="text-danger">
								<?php echo form_error('image'); ?>
								</span>
						</div>
						

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-primary"><?php echo $save_button; ?></</button>
							<button name="cancel" type="reset" class="btn btn-default"><?php echo $cancel_button; ?></</button>
						</div>
					</form>
                <?php echo $this->session->flashdata('msg'); ?>
                </div>
                </div>
                </div>
                </div>
                </div>
                
