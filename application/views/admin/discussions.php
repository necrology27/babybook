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
        <?php 
        
        if (sizeof($discussion_query) > 0) : ?>
            <?php foreach ($discussion_query as $row) : ?>
                <tr>
                  <td><?php echo $row['ds_id'] ; ?></td>
                  <td><?php echo $row['name'] ; ?></td>
                  <td><?php echo $row['email'] ; ?></td>
             <!--    <td><?php echo anchor('admin/update_item/ds/allow/'.
                    $row->ds_id,$this->lang->line('admin_dash_allow')) .
                    ' ' . anchor('admin/update_item/ds/disallow/'.
                    $row->ds_id,$this->lang->line('admin_dash_disallow')) ; ?>
                  </td> -->  
                </tr>
                <tr>
                  <td colspan="3"><?php echo $row['ds_title']; ?></td>
                  <td></td>
                </tr>
                <tr>
                   <td colspan="3"><?php echo $row['ds_body']; ?></td>
                  <td></td>
                </tr>
            <?php endforeach ; ?>
        <?php else : ?>
            <tr>
              <td colspan="4">No naughty forums here, horay!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>