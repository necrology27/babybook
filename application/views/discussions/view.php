SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest '
            . (($dir == 'ASC') ? 'DESC' : 'ASC'));?>
<div class="container-fluid">
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th><?php echo $this->lang->line('discussions_title') ; ?></th>
    </tr>
  </thead>
  <tbody class=" col-md-offset-1">

    <?php foreach ($query as $result) { ?>
      <tr>
        <td>
            <span class="pull-left">
    			<img src="<?php echo resources_url();?>img/<?php echo $result["role"];?>.ico" alt="flag" class="pull-left" style="width:32px;height:32px;border:0;">
                <span class="col-md-2"><?php echo anchor('comments/index/'.$result['ds_id'],$result['ds_title']);?></span>
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