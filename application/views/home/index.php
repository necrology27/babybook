<div>
	<div class="container-fluid" id="child_boxes">
	<h2><?php echo $my_children; ?></h2>
		<?php 
		if ($child_count==0)
		{?>
			<br/>
		    <h1><?php echo $no_child; ?></h1>
		<?php
		}
		else{
		   ?> 
		   <div class="container">
		    	<h3 class="pull-left">Szűrés:</h3>
		    	<br>
		    	<br>
           		<div class="dropdown pull-left col-md-2">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="gendercheck">
                    <span class="glyphicon glyphicon-cog"></span>  Nem szerint  <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="filter" aria-labelledby="gendercheck" id="gender_check_list">
                      <li><input type="checkbox" id="female_check"/><?php echo $girl; ?></li>
                      <li><input type="checkbox" id="male_check"/><?php echo $boy; ?></li>
                    </ul>
            	 </div>
            
            	
           		<div class="pull-left form-inline">
           			<label for="ageslider" class="col-md-8">Életkor szerint:</label>
           			<div class="form-group col-md-4">
                   		<input type="text" id="ageslider" class="span2" value="" data-slider-min="0" data-slider-max="72"
                    	 data-slider-step="0.1" data-slider-value="[0, 72]" data-slider-orientation="horizontal" data-slider-handle="round"
                    	  data-slider-selection="after" data-slider-tooltip="show">
					</div>
                </div>
                
                <div class="col-xs-2 pull-right form-group">
                	<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="<?php echo $search_by_name; ?>">
                </div>
            
           		<div class="dropdown pull-right">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="regdatecheck">
                    <span class="glyphicon glyphicon-cog"></span> Rendezés <span class="caret"></span></button>
                    <ul class="dropdown-menu" aria-labelledby="regdatecheck">
                      <li><a href="#" class="small" data-value="option1" tabIndex="-3"><input type="radio" name="sort" onclick="sort_by_name()"/><?php echo $sort_by_name; ?></a></li>
                      <li><a href="#" class="small" data-value="option2" tabIndex="-3"><input type="radio" name="sort" onclick="sort_by_age()"/><?php echo $sort_by_age; ?></a></li>
                      <li><a href="#" class="small" data-value="option1" tabIndex="-3"><input type="radio" name="sort" onclick="sort_by_registration()"/><?php echo $sort_by_registration; ?></a></li>
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
                      <img class="child_box" style="max-height: 100%;" src="<?php echo uploads_url() . $id . "/" . $children[$j]['child_id'] . "/" . $def_imgs[$j]; ?>" alt="<?php echo $children[$j]['name'];?>">
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
                            <input class="registration_date" id="child_id" type = 'hidden' value=<?php echo $children[$j]['registration_date']; ?> >
                           
                            <p>Last updated:<br> <?php echo $last_up[$j];?></p>
                            <h4><a href="<?php echo base_url();?>child/add_child/<?php echo $children[$j]['child_id'];?>" class="label label-danger" title="Edit">Edit</a>
                            <a href="<?php echo base_url();?>make_test/set_text_items/<?php echo $children[$j]['child_id'];?>" class="label label-success"  title="Take test">Take test</a>
                            <a href="<?php echo base_url();?>child/profil/<?php echo $children[$j]['child_id'];?>" class="label label-success" title="Profil">Profil</a>
                   			<a href="<?php echo base_url();?>child/album/<?php echo $children[$j]['child_id'];?>" class="label label-success" title="Album">Album</a></h4>	
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