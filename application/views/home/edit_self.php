<div>
	<img src="<?php echo resources_url();?>img/lancletra.png" alt='"<?php echo _e('missing_image'); ?>"' class="back-left" />
    <div class="container animated_form">
		<div class="row" >
			<div class="col-md-6 col-md-offset-3">
       			<?php echo $this->session->flashdata('verify_msg'); ?>
				<div class="baby panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
                            <li class="<?php if ($this->data['tab'] == "settings") echo "active";?>">
                            	<a href="#settings" data-toggle="tab"><?php _e("settings");?></a>
                            </li>
                            <li class="<?php if ($this->data['tab'] == "password") echo "active";?>">
                            	<a href="#password_change" data-toggle="tab"><?php _e("change_password");?></a>
                            </li>
                        </ul>
						<h4><?php echo _e('update_title'); ?></h4>
					</div>
					<div class="panel-body">
    					<div class="tab-content">
                            <div class="tab-pane fade<?php if ($this->data['tab'] == "settings") echo " in active";?>" id="settings">
                                <?php $attributes = array("name" => "userupdateform");
                                    echo form_open("home/update", $attributes); 
                                ?>
                        		<div class="form-group">
        							<label for="name"><?php echo _e('name_label'); ?></label> 
        							<input id="name" class="form-control" name="name" type="text" value="<?php echo $this->data['name']; ?>" /> 
    								<span class="text-danger">
    									<?php echo form_error('name'); ?>
    								</span>
        						</div>
                                <div class="form-group">
        							<label><?php echo _e('gender_label'); ?></label><br>
        							<input class="radiobtn" type="radio" name="gender" value="M" <?php if($gender === 'M') echo 'checked'; ?>>
    								 <?php echo _e('male'); ?>
        							<br>
          							<input class="radiobtn" type="radio" name="gender" value="F" <?php if($gender === 'F') echo 'checked'; ?>> 
      								<?php echo _e('female'); ?>
          							<br>
        						</div>
        						<div class="form-group">
        							<label for="email"><?php echo _e('email_label'); ?></label> 
        							<input id="email" class="form-control" name="email" type="text" value="<?php echo $this->data['email']; ?>" /> 
        							<span class="text-danger">
        								<?php echo form_error('email'); ?>
        							</span>
        						</div>
        						<div class="form-group">
        							<label for="birthday"><?php echo _e('birthday_label'); ?></label> 
        							<input id="birthday" class="form-control datepicker" name="birthday" type="text" 
        									value="<?php echo $this->data['birthday']; ?>" /> 
        							<span class="text-danger">
        								<?php echo form_error('birthday'); ?>
        							</span>
        						</div>
        						<div class="form-group">
        							<label for="language"><?php echo _e('language_label'); ?></label> 
        							<select id="language" name='language'>
        								<option value='1' <?php if($language == 1) echo 'selected'; ?>>English</option>
        								<option value='2' <?php if($language == 2) echo 'selected'; ?>>Magyar</option>
        								<option value='3' <?php if($language == 3) echo 'selected'; ?>>Român</option>
        							</select>
        							<br /> 
        							<span class="text-danger">
        								<?php echo form_error('language'); ?>
        							</span>
    							</div>
        						<div class="form-group">
        							<label for="measurement"><?php echo _e('measurement_label'); ?></label> 
        							<select id="measurement" name='measurement'>
        								<option value='1' <?php if($measurement === 'SI (metre, kilogram)') echo 'selected'; ?>>
        									SI(metre, kilogram)
        								</option>
        								<option value='2' <?php if($measurement === 'English units(yard, stone)') echo 'selected'; ?>>
        									English(yard, stone)
        								</option>
        							</select>
        							<br /> 
        							<span class="text-danger">
        								<?php echo form_error('measurement'); ?>
        							</span>
        						</div>
        						<div class="form-group">
        							<button name="submit" type="submit" class="btn btn-primary"><?php echo _e('save_button'); ?></button>
        							<button name="cancel" onclick="location.href='<?php echo base_url();?>home'" 
        									type="reset" class="btn btn-default">
        								<?php echo _e('cancel_button'); ?>
        							</button>
        						</div>
            					<?php echo form_close()?>
                            </div>
                        	<div class="tab-pane fade<?php if ($this->data['tab'] == "password") echo " in active";?>" id="password_change">
								<?php $attributes = array("name" => "userupdateform");
                                    echo form_open("home/update_password", $attributes); 
                                ?>
        						<div class="form-group">
        							<label for="password1"><?php echo _e('new_password_label'); ?></label>
        							<input id="password1" class="form-control" name="newpassword" 
        									placeholder="<?php echo _e('new_password_label'); ?>" type="password" />
        							<span class="text-danger">
        								<?php echo form_error('newpassword'); ?>
        							</span>
        						</div>
        						<div class="form-group">
        							<label for="subject"><?php echo _e('confirm_password_label'); ?></label> 
        							<input id="subject" class="form-control" name="cpassword" 
        									placeholder="<?php echo _e('confirm_password_label'); ?>" type="password" /> 
        							<span class="text-danger">
        								<?php echo form_error('cpassword'); ?>
        							</span>
        						</div>
        						<div class="form-group">
        							<button name="submit" type="submit" class="btn btn-primary"><?php echo _e('save_button'); ?></button>
        							<button name="cancel" onclick="location.href='<?php echo base_url();?>home'" 
        									type="reset" class="btn btn-default">
        								<?php echo _e('cancel_button'); ?>
        							</button>
        						</div>
        						<?php echo form_close()?>
							</div>
                        	<?php echo $this->session->flashdata('msg'); ?>
                        </div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
