
<ul id="navbar">
	<li id="title">babybook</li>
	<li><a><?php echo $forum; ?></a></li>
	<li><a><?php echo $settings; ?></a></li>
	<li><a href="home/logout"><?php echo $logout; ?></a></li>
</ul>


<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>upload_controller/add_child'"><?php echo $add_child; ?></button>
<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>home/update'"><?php echo $edit_profile; ?></button>

<div>
	<div id="child_boxes">
	<h2><?php echo $my_children; ?></h2>
		<?php 
		for ($i = 0; $i < $child_count/3; $i++) {
		    ?>
   		<div class="row">
		    <?php
		  for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
		?>   
        <div class="col-md-3">   
	     	<div class="thumbnail child_box">
                <div class="caption">
                    <h4><?php echo $children[$j]['name'];?></h4>
                    <p>Last updated: <?php echo $children[$j]['birthday'];?></p>
                    <p><a href="" class="label label-danger" rel="tooltip" title="Edit">Edit</a>
                    <a href="" class="label label-default" rel="tooltip" title="Take test">Take test</a></p>
                </div>
                <img class="child_box" src="<?php echo uploads_url() . $id . "/" . $children[$j]['id'] . "/" . $def_imgs[$j]; ?>" alt="<?php echo $children[$j]['name'];?>">
            </div>
		</div>
		<?php
		  }?>
		</div>
		<?php
		}?>
		</div>
		<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>make_test'">képesseg</button>
</div>