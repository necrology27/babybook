<div class="col-md-10 col-md-offset-1">
			<h2 class="col-md-2"><?php _e('my_children'); ?></h2>
	<div class="container-fluid" id="child_boxes">
		<div class="white-container container-fluid">

    		<?php 
    		if ($child_count==0)
    		{?>
    			<br/>
    			<br/>
    		    <h1><?php _e('no_child'); ?></h1>
    		<?php
    		}
    		else{
            ?> 
		   		<div class="container filter-container col-md-12">
    		    	<label class="form-inline col-md-1 age-filter"><?php _e('filter');?>:</label>
    		    	<br>
               		<div class="dropdown col-md-2 form-inline">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="gendercheck">
                        	<span class="glyphicon glyphicon-cog"></span>  
                        	<?php echo _e('by_gender');?>  
                        	<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="filter" aria-labelledby="gendercheck" id="gender_check_list">
                            <li class="small"><input type="checkbox" id="female_check"/><?php echo _e('girl'); ?></li>
                            <li class="small"><input type="checkbox" id="male_check"/><?php echo _e('boy'); ?></li>
                        </ul>
                	 </div>
               		<div class="form-inline col-md-4 col-xs-12 age-filter" >
               			<label for="ageslider" class=""><?php echo _e('by_age');?>:</label>
               			<br>
               			<div class="form-group col-md-4">
                       		<input type="text" id="ageslider" class="span2" value="" data-slider-min="0" data-slider-max="72"
                        	 		data-slider-step="0.1" data-slider-value="[0, 72]" data-slider-orientation="horizontal" data-slider-handle="round"
                	  				data-slider-selection="after" data-slider-tooltip="show">
    					</div>
                    </div>
               		<div class="dropdown col-md-2 form-inline sort-filter">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="regdatecheck">
                        <span class="glyphicon glyphicon-cog"></span> <?php echo _e('sort_by');?> <span class="caret"></span></button>
                        <ul class="dropdown-menu" aria-labelledby="regdatecheck">
                            <li class="small"><input type="radio" name="sort" onclick="sort_by_name()"/><?php echo _e('sort_by_name');; ?></li>
                            <li class="small"><input type="radio" name="sort" onclick="sort_by_age()"/><?php echo _e('sort_by_age'); ?></li>
                            <li class="small"><input type="radio" name="sort" onclick="sort_by_registration()"/><?php echo _e('sort_by_registration'); ?></li>
                            <li class="small"><input type="radio" name="sort" onclick="sort_by_last_update()"/><?php echo _e('sort_by_last_update'); ?></li>
                        </ul>
            	    </div>
                    <div class="pull-left col-xs-12 col-md-2 form-inline">
                    	<input class="form-control" type="text" id="myInput" onkeyup="search_by_name()" placeholder="<?php echo _e('search_by_name'); ?>">
                    </div>
				</div>
		</div>
        <div id="childs">  
    			<?php
    		    for ($i = 0; $i < $child_count/3; $i++) {
                    for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
        		?>   
                    <div class="col-md-3 one_child" id="child<?php echo $j;?>">   
            	     	<div class="thumbnail child_box">
                          	<img class="child_box" style="max-height: 100%;" 
                          			src="<?php echo uploads_url() . getCurrentUserID() . "/" . $children[$j]['child_id'] . "/" . $def_imgs[$j]; ?>" 
                          			alt="<?php echo $children[$j]['name'];?>">
                            <div class="caption">
                                <h3><?php echo $children[$j]['name'];?>
                                	<em id="age<?php echo $j;?>" style="display: none;"><?php echo $children[$j]['birthday']; ?></em>
                                	<em id="gender<?php echo $j;?>" style="display: none;">
                                		<?php if ($children[$j]['gender'] == 'F') {
                                            echo 'female';
                                        } else {
                                            echo 'male';
                                        }
                                        ?>
                                    </em>
                                </h3>
                                <input class="birthday" id="child_id" type = 'hidden' value=<?php echo $children[$j]['birthday']; ?> >
                                <input class="registration_date" id="child_id" type = 'hidden' value="<?php echo $children[$j]['registration_date']; ?>" >
                                <input class="last_update" id="child_id" type = 'hidden' value="<?php echo $last_up_all[$j]; ?>" >
                                <p>
                                	<?php echo _e('last_updated');?>:
                                	<br> 
                                    <?php if ($last_up_day[$j] == 0) 
                                          echo _e('less_than_a_day');
                                       else {
                                          echo $last_up_day[$j] . " "; 
                                          _e('days_ago');
                                       }
                                    ?>
                                </p>
                                <h4>
                                <a href="<?php echo base_url();?>child/add_child/<?php echo $children[$j]['child_id'];?>" 
                                		class="label label-danger child-btn" title="Edit"><?php echo _e('edit_button');?></a>
                                <a href="<?php echo base_url();?>make_test/set_text_items/<?php echo $children[$j]['child_id'];?>" 
                                		class="label label-success child-btn"  title="Take test"><?php echo _e('take_test_button');?></a>
                                <br>
                                <a href="<?php echo base_url();?>child/profil/<?php echo $children[$j]['child_id'];?>" 
                                		class="label label-success child-btn" title="Profile"><?php echo _e('profile_button');?></a>
                       			<a href="<?php echo base_url();?>child/album/<?php echo $children[$j]['child_id'];?>" 
                       					class="label label-success child-btn" title="Album"><?php echo _e('album_button');?></a></h4>	
                          	</div>
            	     	</div>
                   		<div class="overlay-name <?php if ($children[$j]['gender'] == "M") echo "boy"; else echo "girl";?>">
                   			<h2><?php echo $children[$j]['name'];?></h2>
                   		</div>
                    </div>
            		<?php
                    }
    		    }
    		}?>
		</div>
	</div>
</div>