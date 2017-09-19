<table class="table">
    <thead>
    	<tr>
            <th>#</th>
            <th><?php echo _e('users')?></th>
            <th><?php echo _e('discussion')?></th>
            <th><?php echo _e('comments_comment_body')?></th>
            <th><?php echo _e('delete') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($comment_query) > 0) : ?>
            <?php foreach ($comment_query as $row) : ?>
                <tr>
                    <td><?php echo $row['cm_id'] ; ?></td>
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['ds_id'] ; ?></td>
                    <td><?php echo $row['cm_body']; ?></td>
                    <td><?php echo anchor('admin/delete_comment/'.$row['cm_id'], 'Disable', 
                             array('onClick' => "return confirm('Are you sure you want to disable?')"));
                        ?><span class="glyphicon glyphicon-trash"></span>
                    </td>
                </tr>
            <?php endforeach ; ?>
        <?php else : ?>
            <tr>
              	<td colspan="4">No naughty comments here, horay!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>