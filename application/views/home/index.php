<div>
	<div id="child_boxes">
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
           		<div class="dropdown pull-left">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="gendercheck">
                    <span class="glyphicon glyphicon-cog"></span>  Nem szerint  <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="filter" aria-labelledby="gendercheck">
                      <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox"/><?php echo $girl; ?></a></li>
                      <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox"/><?php echo $boy; ?></a></li>
                      
                    </ul>
            	 </div>
            
           		<div class="dropdown pull-left">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="agecheck">
                <span class="glyphicon glyphicon-cog"></span> Életkor szerint <span class="caret"></span></button>
                <ul class="dropdown-menu"  aria-labelledby="agecheck">
                  <li><a href="#" class="small" data-value="option1" tabIndex="-2"><input type="checkbox"/><?php echo $month0_6; ?></a></li>
                  <li><a href="#" class="small" data-value="option2" tabIndex="-2"><input type="checkbox"/><?php echo $month6_12; ?></a></li>
                  <li><a href="#" class="small" data-value="option1" tabIndex="-2"><input type="checkbox"/><?php echo $year1_2; ?></a></li>
                  <li><a href="#" class="small" data-value="option2" tabIndex="-2"><input type="checkbox"/><?php echo $year2_3; ?></a></li>
                  <li><a href="#" class="small" data-value="option2" tabIndex="-2"><input type="checkbox"/><?php echo $year3_4; ?></a></li>
                  <li><a href="#" class="small" data-value="option2" tabIndex="-2"><input type="checkbox"/><?php echo $year4_5; ?></a></li>
                  <li><a href="#" class="small" data-value="option2" tabIndex="-2"><input type="checkbox"/><?php echo $year5_6; ?></a></li>
                </ul>
            	 </div>
            
           		<div class="dropdown pull-left">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="regdatecheck">
                <span class="glyphicon glyphicon-cog"></span> Rendezés <span class="caret"></span></button>
                <ul class="dropdown-menu" aria-labelledby="regdatecheck">
                  <li><a href="#" class="small" data-value="option1" tabIndex="-3"><input type="checkbox"/><?php echo $sort_by_name; ?></a></li>
                  <li><a href="#" class="small" data-value="option2" tabIndex="-3"><input type="checkbox"/><?php echo $sort_by_age; ?></a></li>
                  <li><a href="#" class="small" data-value="option1" tabIndex="-3"><input type="checkbox"/><?php echo $sort_by_registration; ?></a></li>
                </ul>
            	 </div>
            	 
            	 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="<?php echo $search_by_name; ?>"  style="float: right;">
              </div>
            
            <div id="childs" >  
		    <?php
		    for ($i = 0; $i < $child_count/3; $i++) {
		        ?>
           		<div class="row">
        		    <?php
        		  for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
        		?>   
                <div class="col-md-3 one_child" id="child<?php echo $j;?>">   
        	     	<div class="thumbnail child_box">
                      <img class="child_box" src="<?php echo uploads_url() . $id . "/" . $children[$j]['child_id'] . "/" . $def_imgs[$j]; ?>" alt="<?php echo $children[$j]['name'];?>">
                        <div class="caption">
                            <h3><?php echo $children[$j]['name'];?></h3>
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
        		</div>
        		<?php
        		}
		  }?>
		  </div>
		  
		  
		  <script>
            function myFunction() {
                var input, filter, ul, li, a, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                ul = document.getElementById("childs");
                li = ul.getElementsByClassName("one_child");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("h3")[0];
                    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
            
                    }
                }
            }
            </script>
		  
		  
		</div>
</div>