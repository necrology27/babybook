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
        <p style="display: none;"><?php echo $imgs[$i]["id"];?></p>
    	<a href="<?php echo $user_id.'/'.$this->data["child_id"].'/'.$imgs[$i]["file_name"];?>"
    		 data-ngthumb="<?php echo $user_id.'/'.$this->data["child_id"].'/'.$imgs[$i]["file_name"];?>"	
    		  data-ngdesc="<?php echo $imgs[$i]["description"];?>"><?php echo $imgs[$i]["title"];?></a>
    <?php
    }?>
	</div>
<?php }?>
<div id="img_ids">
    <?php 
        for ($i = 0; $i < $img_count; $i++) {
            ?>
            <p style="display: none;" id="img_id_<?php echo $i;?>"><?php echo $imgs[$i]["id"];?></p>
        <?php
    }?>
</div>
