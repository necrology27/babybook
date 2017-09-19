
<div class="container-fluid">
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th class="row md-col-2"><?php echo $this->lang->line('discussions_title') ; ?></th>
    </tr>
  </thead>
  <tbody class="col-md-offset-1">

  <tr>
  	<td>SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest '
            . (($dir == 'ASC') ? 'DESC' : 'ASC'));?>
    </td>
  </tr>
    <?php foreach ($query as $result) { ?>
      <tr>
          <td class="row md-col-2">
              <div class="ratings">
                <input class="rating_type" id="<?php echo $result['ds_id']?>" type = 'hidden' value=<?php echo $result['type']; ?> >
                <p>
                    <!-- Like Icon HTML -->
                    <span class="glyphicon glyphicon-thumbs-up rate btn" id="like.<?php echo $result['ds_id']. "." . $result['like_num']. "." .$result['dislike_num']; ?>"></span>&nbsp;
                    <!-- Like Counter -->
                    <span class="counter" ><?php echo $result['like_num']; ?></span>&nbsp;&nbsp;&nbsp;
                    <!-- Dislike Icon HTML -->
                    <span class="glyphicon glyphicon-thumbs-down rate btn" id="dislike.<?php echo $result['ds_id']. "." . $result['like_num']. "." .$result['dislike_num'];  ?>"></span>&nbsp;
                    <!-- Dislike Counter -->
                    <span class="counter" ><?php echo $result['dislike_num']; ?></span>
                </p>
            </div>
        </td>
        <td>
            <span class="pull-left">
    			<img src="<?php echo resources_url();?>img/<?php echo $result["role"];?>.ico" alt="flag" class="pull-left" style="width:32px;height:32px;border:0;">
                <span  class="col-md-2 text"><?php echo anchor('comments/index/'.$result['ds_id'],$result['ds_title']);?></span>
            </span>
            <br>
            <div class="small text-muted col-md-offset-3">
            	<?php _e('comments_created_by'); echo ": " . $result['name']; ?>
            </div>
            <?php if ($result['ds_link'] != NULL) {?>
                <br />
                <button class="btn btn-info showLink">+</button>
                <div style="display: none;">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/_8zDVnuZrt8" frameborder="0" allowfullscreen></iframe>
                    <?php echo $result['ds_link']; ?>
                </div>
            <?php }?>
        </td>
      </tr>
    <?php } ?>

  </tbody>
    
</table>
</div>