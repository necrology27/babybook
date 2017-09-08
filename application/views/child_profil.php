<div>
	<div class="panel-heading">
		    <?php echo $this->session->flashdata('verify_msg'); ?>
			<!-- <h4><?php echo $profil_title; ?></h4>  -->
		<div style="text-align: center;">
			<img
				src="<?php echo uploads_url() . $user_id . "/" . $child_id . "/" . $this->image_model->get_def_img($child_id); ?>"
				class="img-circle" alt="<?php echo _e('missing_image');?>" width="250">
		</div>

		<div class="container">
			<div>
				<h3><?php echo _e('social'); ?></h3>
				<div class="progress">
					<div class='progress-bar progress-bar-striped myProgress' role='progressbar'
                     	value='<?php echo $personal_social_value_pct;?>' aria-valuemin='0' aria-valuenow='<?php echo $personal_social_value_pct;?>'
                     	aria-valuemax='<?php echo $max_score;?>' style='width: <?php echo $personal_social_value_pct;?>%'></div>
					<p id='prog_value0'></p>

				</div>
			</div>

			<div>
				<h3><?php echo _e('fine_motor'); ?></h3>
				<div class="progress">
					<div class='progress-bar progress-bar-striped myProgress' role='progressbar'
                     	value='<?php echo $fine_motor_value_pct;?>' aria-valuenow='<?php echo $fine_motor_value_pct;?>'
                     	 aria-valuemin='0' aria-valuemax='<?php echo $max_score;?>' style='width: <?php echo $fine_motor_value_pct;?>%'></div>
					<p id='prog_value1'></p>
				</div>
			</div>
			<div>
				<h3><?php echo _e('language'); ?></h3>
				<div class="progress">
					<div class='progress-bar progress-bar-striped myProgress' role='progressbar'
                     	value='<?php echo $language_value_pct;?>' aria-valuenow='<?php echo $language_value_pct;?>'
                     	 aria-valuemin='0' aria-valuemax='<?php echo $max_score;?>' style='width: <?php echo $language_value_pct;?>%'></div>
					<p id='prog_value2'></p>
				</div>
			</div>
			<div>
				<h3><?php echo _e('gross_motor'); ?></h3>
				<div class="progress">
					<div class='progress-bar progress-bar-striped myProgress' role='progressbar'
                     	value='<?php echo $gross_motor_value_pct;?>' aria-valuenow='<?php echo $gross_motor_value_pct;?>'
                     	 aria-valuemin='0' aria-valuemax='".$max_score."' style='width: <?php echo $gross_motor_value_pct;?>%'></div>
					<p id='prog_value3'></p>
				</div>
			</div>
    		<?php echo $this->session->flashdata('msg'); ?>
    		</div>
	</div>
</div>