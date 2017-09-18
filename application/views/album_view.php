<div class="modal fade" id="album_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon"></span><?php echo  _e('new_album_label');?></h4>
            </div>
            <div class="modal-body" id="album_modal_body">
                <form method="post" action="" id="new_album_form">
                    <label for="title"><?php echo  _e('title_label');?></label>
       				<input class="form-control" type="text" name="title" id="new_album_title" value="" />
       				<br>
       				
           			<div class="modal-footer">
                        <input type="button" class="btn btn-default pull-right"
                       		id="new_album_save_button" name="new_album_save_button"
                          		value="<?php echo  _e('upload_button');?>"/>
                  	</div>
          		</form>
   			</div>
        </div>
    </div>
</div>
<div class="modal fade" id="remove_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon"></span><?php echo  _e('remove_selected_question');?></h4>
            </div>
            <div class="modal-body" id="remove_modal_body">
                <form method="post" action="" id="remove_form">
                    <button type="button" class="btn btn-danger btn-lg" id="remove_btn" data-dismiss="modal"><?php echo  _e('remove_selected_label');?></button>
              		<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancel</button>
          		</form>
   			</div>
        </div>
    </div>
</div>
<div class="container white-container">
    <div>
    	<br>
    	<div class="btn-group-vertical col-md-3 col-xs-12 pull-right" role="group" aria-label="New image/album">
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#album_modal" id="album_btn">
            	<?php echo  _e('new_album_label');?>
            </button>
            <div class="upload"></div>
        </div>
          
    </div>
    <p id="child_id" style="display: none;"><?php echo $this->data['child_id'];?></p>
    <div id="gallery" class="row col-xs-12">
            <?php $this->load->view('nano_view', $this->data);?>
    </div>
    <button type="button" class="btn btn-danger btn-lg col-md-2 col-xs-12 pull-right"
    	 data-toggle="modal" data-target="#remove_modal" id="modal_btn" style="margin-bottom: 15px;">
    	<?php echo  _e('remove_selected_label');?>
    </button>
    	
</div>

<script>
var chid = document.getElementById("child_id").innerHTML;
</script>