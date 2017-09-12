<table class="table">
    <thead>
        <tr>
          <th>#</th>
          <th><?php echo _e('users')?></th>
         <th><?php echo _e('discussions_title')?></th>
          <th><?php echo _e('discussions_text')?></th>
          <th><?php echo _e('number_of_comments')?></th>
          <th><?php echo _e('number_of_likes')?></th>
          <th><?php echo _e('delete') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        if (sizeof($discussion_query) > 0) : ?>
            <?php foreach ($discussion_query as $row) : ?>
                <tr>
                  <td><?php echo $row['ds_id'] ; ?></td>
                  <td><?php echo $row['id'] ; ?></td>
                  <td><?php echo $row['ds_title']; ?></td>
                  <td><?php echo $row['ds_body']; ?></td>
                  <td></td>
                  <td></td>
                  <td><?php echo anchor('admin/delete_discussion/'.$row['ds_id'], 'Disable', 
                             array('onClick' => "return confirm('Are you sure you want to disable?')"));
                        ?><span class="glyphicon glyphicon-trash"></span>
					</td>
                </tr>
            <?php endforeach ; ?>
        <?php else : ?>
            <tr>
              <td colspan="4">No naughty forums here, horay!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>