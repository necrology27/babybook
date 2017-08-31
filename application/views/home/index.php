
<ul id="navbar">
	<li id="title">babybook</li>
	<li><a><?php echo $forum; ?></a></li>
	<li><a><?php echo $settings; ?></a></li>
	<li><a href="home/logout"><?php echo $logout; ?></a></li>
</ul>


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
		    for ($i = 0; $i < $child_count/3; $i++) {
		        ?>
           		<div class="row">
        		    <?php
        		  for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
        		?>   
                <div class="col-md-3">   
        	     	<div class="thumbnail child_box">
                      <img class="child_box" src="<?php echo uploads_url() . $id . "/" . $children[$j]['child_id'] . "/" . $def_imgs[$j]; ?>" alt="<?php echo $children[$j]['name'];?>">
                        <div class="caption">
                            <h3><?php echo $children[$j]['name'];?></h3>
                            <p>Last updated:<br> <?php echo $last_up[$j];?></p>
                            <h4><a href="<?php echo base_url();?>child/update_child/<?php echo $children[$j]['child_id'];?>" class="label label-danger" title="Edit">Edit</a>
                            <a href="<?php echo base_url();?>make_test/set_text_items/<?php echo $children[$j]['child_id'];?>" class="label label-success"  title="Take test">Take test</a>
                            <a href="<?php echo base_url();?>child/profil/<?php echo $children[$j]['child_id'];?>" class="label label-success" title="Profil">Profil</a></h4>
                   			
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
</div>