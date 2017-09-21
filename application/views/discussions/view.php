<div class="container-fluid col-md-8 col-md-offset-2">
    <table class="table table-hover table-responsive table-striped">
      	<thead>
            <tr>
              	<th class="row md-col-2"><?php echo $this->lang->line('discussions_title') ; ?></th>
            </tr>
    	</thead>
        <tbody class="">
            <tr>
                <td>
                    <?php echo _e('sort_label').' '.anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest '
                        . (($dir == 'ASC') ? 'DESC' : 'ASC'));?>
                </td>
            </tr>
        	<?php foreach ($query as $result) { ?>
              	<tr>
                    <td class="col-md-2">
                        <div class="ratings">
                            <input class="rating_type" id="<?php echo $result['ds_id']?>" type = 'hidden' value=<?php echo $result['type']; ?> >
                            <p>
                                <span class="glyphicon glyphicon-thumbs-up rate btn" 
                                		id="like.<?php echo $result['ds_id']. "." . $result['like_num']. "." .$result['dislike_num']; ?>">
                                </span>
                                &nbsp;
                                <span class="counter" >
                                	<?php echo $result['like_num']; ?>
                                </span>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <span class="glyphicon glyphicon-thumbs-down rate btn" 
                                		id="dislike.<?php echo $result['ds_id']. "." . $result['like_num']. "." .$result['dislike_num'];  ?>">
                                </span>
                                &nbsp;
                                <span class="counter" >
                                	<?php echo $result['dislike_num']; ?>
                                </span>
                            </p>
                        </div>
                    </td>
                    <td>
                        <span class="pull-left">
                			<img src="<?php echo resources_url();?>img/<?php echo $result["role"];?>.ico" 
                					alt="flag" class="pull-left" style="width:32px;height:32px;border:0;">
                            <span  class="col-md-2 text">
                            	<?php echo anchor('comments/index/'.$result['ds_id'],$result['ds_title']);?>
                            </span>
                        </span>
                        <br>
                        <div class="small text-muted col-md-offset-3">
                        	<?php _e('comments_created_by'); echo ": " . $result['name']; ?>
                        </div>
                        <button class="small btn btn-info showText" style="display: block;">+</button>
                        <div class="col-md-5 well container" style="display: none;">
                            <?php echo $result['ds_body']; ?>
                        </div>
                    </td>
              	</tr>
        	<?php } ?>
        </tbody>
	</table>
</div>