<div>
	<button class="btn btn-success video-show">Show video</button>
  	<h3>Youtube</h3>
    <iframe id="vid1" style="display: none;" height="300" width="500" src="http://www.youtube.com/embed/m5Jmh9JKnyQ" frameborder="0" allowfullscreen></iframe>

	<div class="container-fluid" id="child_boxes">
	<h2><?php echo _e('my_children'); ?></h2>
		<?php 
		if ($child_count==0)
		{?>
			<br/>
		    <h1><?php echo _e('no_child'); ?></h1>
		<?php
		}
		else{
		   ?> 
		   <div class="container">
		    	<h3 class="pull-left"><?php echo _e('filter');?>:</h3>
		    	<br>
           		<div class="dropdown pull-left col-md-2">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="gendercheck">
                    <span class="glyphicon glyphicon-cog"></span>  <?php echo _e('by_gender');?>  <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="filter" aria-labelledby="gendercheck" id="gender_check_list">
                      <li class="small"><input type="checkbox" id="female_check"/><?php echo _e('girl'); ?></li>
                      <li class="small"><input type="checkbox" id="male_check"/><?php echo _e('boy'); ?></li>
                    </ul>
            	 </div>
            	
           		<div class="pull-left form-inline">
           			<label for="ageslider" class="col-md-8 col-xs-12"><?php echo _e('by_age');?>:</label>
           			<div class="form-group col-md-4">
                   		<input type="text" id="ageslider" class="span2" value="" data-slider-min="0" data-slider-max="72"
                    	 data-slider-step="0.1" data-slider-value="[0, 72]" data-slider-orientation="horizontal" data-slider-handle="round"
                    	  data-slider-selection="after" data-slider-tooltip="show">
					</div>
                </div>
                
                <div class="col-xs-12 col-md-2 pull-right form-group">
                	<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="<?php echo _e('search_by_name'); ?>">
                </div>
            
           		<div class="dropdown pull-right">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="regdatecheck">
                    <span class="glyphicon glyphicon-cog"></span> <?php echo _e('sort_by');?> <span class="caret"></span></button>
                    <ul class="dropdown-menu" aria-labelledby="regdatecheck">
                      <li class="small"><input type="radio" name="sort" onclick="sort_by_name()"/><?php echo _e('sort_by_name');; ?></li>
                      <li class="small"><input type="radio" name="sort" onclick="sort_by_age()"/><?php echo _e('sort_by_age'); ?></li>
                      <li class="small"><input type="radio" name="sort" onclick="sort_by_registration()"/><?php echo _e('sort_by_registration'); ?></li>
                      <li class="small"><input type="radio" name="sort" onclick="sort_by_last_update()"/><?php echo _e('sort_by_last_update'); ?></li>
                    </ul>
        	    </div>
            	 
            </div>
            
            <div id="childs">  
		   <?php
		    for ($i = 0; $i < $child_count/3; $i++) {
		        ?>
           		
        		    <?php
        		  for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
        		?>   
                <div class="col-md-3 one_child" id="child<?php echo $j;?>">   
        	     	<div class="thumbnail child_box">
                      <img class="child_box" style="max-height: 100%;" src="<?php echo uploads_url() . getCurrentUserID() . "/" . $children[$j]['child_id'] . "/" . $def_imgs[$j]; ?>" alt="<?php echo $children[$j]['name'];?>">
                        <div class="caption">
                            <h3><?php echo $children[$j]['name'];?>
                            	<em id="age<?php echo $j;?>" style="display: none;"><?php echo $children[$j]['birthday']; ?></em>
                            	<em id="gender<?php echo $j;?>" style="display: none;"><?php if ($children[$j]['gender'] == 'F') {
                                    echo 'female';
                                } else {
                                    echo 'male';
                                }
                                ?></em>
                            </h3>
                            <input class="birthday" id="child_id" type = 'hidden' value=<?php echo $children[$j]['birthday']; ?> >
                            <input class="registration_date" id="child_id" type = 'hidden' value="<?php echo $children[$j]['registration_date']; ?>" >
                            <input class="last_update" id="child_id" type = 'hidden' value="<?php echo $last_up_all[$j]; ?>" >
                           
                            <p><?php echo _e('last_updated');?>:<br> <?php if ($last_up_day[$j] == 0) 
                                                                              echo _e('today');
                                                                           else {
                                                                              echo $last_up_day[$j] . " "; 
                                                                              _e('days_ago');
                                                                           }
                                                                     ?></p>
                            <h4>
                            <a href="<?php echo base_url();?>child/add_child/<?php echo $children[$j]['child_id'];?>" class="label label-danger" title="Edit"><?php echo _e('edit_button');?></a>
                            <a href="<?php echo base_url();?>make_test/set_text_items/<?php echo $children[$j]['child_id'];?>" class="label label-success"  title="Take test"><?php echo _e('take_test_button');?></a>
                            <a href="<?php echo base_url();?>child/profil/<?php echo $children[$j]['child_id'];?>" class="label label-success" title="Profile"><?php echo _e('profile_button');?></a>
                   			<a href="<?php echo base_url();?>child/album/<?php echo $children[$j]['child_id'];?>" class="label label-success" title="Album"><?php echo _e('album_button');?></a></h4>	
                      	</div>
                   </div>
        		</div>
        		<?php
        		  }?>
        		
        		<?php
        		}
		  }?>
		  </div>
		  
		</div>
</div>