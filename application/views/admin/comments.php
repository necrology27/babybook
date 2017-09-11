
<table class="table">
    <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
        <!--  <td>Actions</td> -->
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($comment_query) > 0) : ?>
            <?php foreach ($comment_query as $row) : ?>
                <tr>
                  <td><?php echo $row['cm_id'] ; ?></td>
                  <td><?php echo $row['name'] ; ?></td>
                  <td><?php echo $row['email'] ; ?></td>
                  <!-- <td><?php echo anchor('admin/update_item/cm/allow/'.
                    $row->cm_id,$this->lang->line('admin_dash_allow')) . 
                    ' ' . anchor('admin/update_item/cm/disallow/'.
                    $row->cm_id,$this->lang->line('admin_dash_disallow')) ; ?>
                  </td>
                </tr> -->
                <tr>
                  <td colspan="3"><?php echo $row['cm_body']; ?></td>
                  <td></td>
                </tr>
            <?php endforeach ; ?>
        <?php else : ?>
                <tr>
                  <td colspan="4">No naughty comments here, horay!</td>
                </tr>
        <?php endif; ?>
    </tbody>
</table>