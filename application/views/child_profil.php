
	
		<div class="panel-heading">
		    <?php echo $this->session->flashdata('verify_msg'); ?>
			<!-- <h4><?php echo $profil_title; ?></h4>  -->
			<div style="text-align:center;"><img src="<?php echo uploads_url() . $user_id . "/" . $child_id . "/" . $this->image_model->get_def_img($child_id); ?>" class="img-circle" alt="Cinque Terre" width="250" >
			</div>
			
			
		<!-- <button type="button" class="btn" onclick=""><?php echo $album;?></button>
		
		<h2><?php echo $actual_development_level;?></h2> -->
		 <div class="container">
			<div>
              <h3><?php echo $social; ?></h3>
              <div class="progress">
                <?php 
                if($personal_social_value_pct!=NULL) 
                    echo "<div class='progress-bar progress-bar-striped myProgress' id='myProgress' role='progressbar' aria-valuenow='".$personal_social_value_pct."' value=".$personal_social_value_pct." aria-valuemin='0' aria-valuemax='".$max_score."' style='width: ".$personal_social_value_pct."%'></div><p id='prog_value0'></p>";
                else
                    echo"<div><p>Nincs adat!!!</p></div>";
                ?>
                </div>
              </div>
    
			<div>
              <h3><?php echo $fine_motor; ?></h3>
              <div class="progress">
                <?php
                if($fine_motor_value_pct!=NULL) 
                    echo "<div class='progress-bar progress-bar-striped  myProgress' role='progressbar myProgress' value='".$fine_motor_value_pct."' aria-valuenow='".$fine_motor_value_pct."' aria-valuemin='0' aria-valuemax='".$max_score."' style='width: ".$fine_motor_value_pct."%'></div><p id='prog_value1'></p>";
                else
                    echo"<div><p>Nincs adat!!!</p></div>";
                ?>
                  
                </div>
              </div>
            <div >
              <h3><?php echo $language; ?></h3>
              <div class="progress">
             
                <?php 
                if($language_value_pct!=NULL) 
                    echo "<div class='progress-bar progress-bar-striped  myProgress' role='progressbar' value='".$language_value_pct."' aria-valuemin='0' aria-valuemax='".$max_score."' style='width: ".$language_value_pct."%'></div><p id='prog_value1'></p>";
                else
                       echo"<div><p>Nincs adat!!!</p></div>";
                       ?>
                 
                </div>
              </div>
			<div>
              <h3><?php echo $gross_motor; ?></h3>
                  <div class="progress">
                    <?php 
                    if($gross_motor_value_pct!=NULL) 
                        echo "<div class='progress-bar progress-bar-striped  progress' role='progressbar' value='".$gross_motor_value_pct."' aria-valuenow='".$gross_motor_value_pct."' aria-valuemin='0' aria-valuemax='".$max_score."' style='width: ".$gross_motor_value_pct."%'></div><p id='prog_value1'></p>";
                    else
                        echo"<div><p>Nincs adat!!!</p></div>";
                    ?>
                     
                  </div>
             </div>
    		<?php echo $this->session->flashdata('msg'); ?>
    		</div>
    		</div>