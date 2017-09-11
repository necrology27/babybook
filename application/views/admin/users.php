<table class="table">
    <thead>
        <tr>
          <th>#</th>
          <th>facebook id</th>
          <th><?php echo _e('name_label') ?></th>
          <th><?php echo _e('gender_label') ?></th>
          <th><?php echo _e('email_label') ?></th>
          <th><?php echo _e('registration_date') ?></th>
          <th><?php echo _e('birthday_label') ?></th>
          <th><?php echo _e('role_label') ?></th>
          <th><?php echo _e('language_label') ?></th>
          <th><?php echo _e('measurement_label') ?></th>
        <!--  <td>Actions</td> -->
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($users) > 0) : ?>
            <?php foreach ($users as $row) : ?>
                <tr>
                  <td><?php echo $row['id'] ; ?></td>
                  <td><?php echo $row['facebook_id'] ; ?></td>
                  <td><?php echo $row['name'] ; ?></td>
                  <td><?php echo $row['gender'] ; ?></td>
                  <td><?php echo $row['email'] ; ?></td>
                  <td><?php echo $row['registration_date'] ; ?></td>
                  <td><?php echo $row['birthday'] ; ?></td>
                  <td><?php echo $row['role'] ; ?></td>
                  <td><?php echo $row['language'] ; ?></td>
                  <td><?php echo $row['measurement'] ; ?></td>
                  
                  <!-- <td><?php echo anchor('admin/update_item/cm/allow/'.
                    $row->cm_id,$this->lang->line('admin_dash_allow')) . 
                    ' ' . anchor('admin/update_item/cm/disallow/'.
                    $row->cm_id,$this->lang->line('admin_dash_disallow')) ; ?>
                  </td>
                </tr> -->
                <tr>
               
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