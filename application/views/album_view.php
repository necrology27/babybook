<div>
<div class="modal fade" id="upload_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon"></span><?php echo  _e('upload_photo_label');?></h4>
            </div>
            <div class="modal-body" id="upload_modal_body">
                <form method="post" action="" id="upload_file">
                    <label for="title"><?php echo  _e('title_label');?></label>
       				<input class="form-control" type="text" name="title" id="new_title" value="" />
       				<br>
                    <label for="description"><?php echo  _e('description_label');?></label>
       				<input class="form-control" type="text" name="description" id="new_description" value="" />
       				
       				<br>
       				
                	<label for="new_image"><?php echo  _e('choose_file_label');?></label>
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-info">
                               <?php echo  _e('choose_file_label');?>
                            <input id="new_image" type='file' style="display: none;" name='new_image' size='20' />
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div id="upload" style="display:none;"><?php echo  _e('uploading_label');?></div>
                    <br>
                    <input type="button" class="btn btn-default pull-right"
                           id="uploadingFileButton" name="uploadingFileButton"
                           value="<?php echo  _e('upload_button');?>"/>
              	</form>
            </div>
            <br>
            <div class="modal-footer">
                <em> <?php echo  _e('click_on_label');?> <strong><?php echo  _e('choose_file_label');?></strong> <?php echo  _e('to_select_label');?> </em>
            </div>
        </div>
    </div>
</div>
	<div class="btn-group-vertical col-md-2 pull-right" role="group" aria-label="New image/album">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upload_modal" id="new_image_btn"><?php echo  _e('upload_photo_label');?></button>
      <button type="button" class="btn btn-secondary btn-lg"><?php echo  _e('new_album_label');?></button>
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