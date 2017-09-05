<div>
	<div class="btn-group-vertical col-md-2 pull-right" role="group" aria-label="New image/album">
      <button type="button" class="btn btn-primary">Upload Photo</button>
      <button type="button" class="btn btn-secondary">New Album</button>
    </div>
</div>
<div>
<?php if ($img_count==0)
{?>
	<br/>
    <h1><?php echo $no_child; ?></h1>
<?php
}
else{ ?>
    <div id="nanoGallery">
    <?php 
    for ($i = 0; $i < $img_count; $i++) {
        ?>
    	<a href="<?php echo $user_id.'/'.$child_id.'/'.$imgs[$i]["file_name"];?>"
    		 data-ngthumb="<?php echo $user_id.'/'.$child_id.'/'.$imgs[$i]["file_name"];?>"	
    		  data-ngdesc="<?php echo $imgs[$i]["description"];?>"><?php echo $imgs[$i]["title"];?></a>
    <?php
    }?>
	</div>
<?php }?>
</div>