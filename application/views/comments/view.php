<div class="container white-container">
	<?php foreach ($discussion_querys as $discussion_result) { ?> 
  		<h2>
          	<?php echo $discussion_result['ds_title']; ?><br />
          	<small>
          		<?php echo $this->lang->line('comments_created_by') . $discussion_result['name']; ?> 
          		<small class="pull-right">
          			<?php echo $discussion_result['ds_created_at']; ?>
          		</small>
          	</small>
      	</h2>
      	<p class="lead">
      		<?php echo $discussion_result['ds_body']; ?>
      	</p>
    <?php } ?>
 	<hr/>
    <ul>
        <?php foreach ($comment_query as $comment_result) { ?>
      		<li class="media">
                <div class="media-body">
                  	<h4 class="media-heading">
                  		<img src="<?php echo resources_url();?>img/<?php echo $comment_result["role"];?>.ico" 
                  				alt="flag" style="width:32px;height:32px;border:0;">
                  		<?php echo $comment_result['name'] ; ?>
                  	</h4>
                  	<small>
                  		<small class="pull-right">
                  			<?php echo $comment_result['cm_created_at'];?>
                  		</small>
                  	</small>
                  	<p><?php echo $comment_result['cm_body']; ?></p>
                </div>
          	</li>
        <?php } ?>
    </ul>
    <br />
    <br />
    <p class="lead">
    	<?php echo $this->lang->line('comments_form_instruction');?>
    </p>
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/index') ; ?>
        <div class="form-group  col-md-10">
          	<label for="comment_body">
          		<?php echo $this->lang->line('comments_comment_body');?>
          	</label>
          	<textarea class="form-control" rows="3" name="comment_body" id="comment_body"><?php echo set_value('comment_body'); ?></textarea>
        </div>
        <div class="form-group  col-md-11">
          	<button type="submit" class="btn btn-success">
          		<?php echo $this->lang->line('save_button');?>
          	</button>
        </div>
      	<?php echo form_hidden('ds_id',$ds_id) ; ?>
    <?php echo form_close() ; ?>
</div>