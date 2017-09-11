SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest '
            . (($dir == 'ASC') ? 'DESC' : 'ASC'));?>

<table class="table table-hover">
  <thead>
    <tr>
      <th><?php echo $this->lang->line('discussions_title') ; ?></th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($query as $result) { ?>
      <tr>
        <td>
        <img src="<?php echo resources_url();?>img/<?php echo $result["role"];?>.ico" alt="flag" style="width:32px;height:32px;border:0;">
          <?php echo anchor('comments/index/'.$result['ds_id'],$result['ds_title']) . ' '
                . _e('comments_created_by') . $result['name']; ?>
          <br />
          <?php echo $result['ds_body'] ; ?>
        </td>
      </tr>
    <?php } ?>

  </tbody>
</table>
