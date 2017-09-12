<table class="table">
    <thead>
        <tr>
          <th>#</th>
          <th><?php echo _e('name_label') ?></th>
          <th><?php echo _e('gender_label') ?></th>
          <th><?php echo _e('number_of_children') ?></th>
          <th><?php echo _e('number_of_discussions') ?></th>			<!-- vagy pontok szama -->
          <th><?php echo _e('number_of_comments') ?></th>
          <th><?php echo _e('email_label') ?></th>
          <th><?php echo _e('registration_date') ?></th>
          <th><?php echo _e('birthday_label') ?></th>
          <th><?php echo _e('role_label') ?></th>
          <th><?php echo _e('language_label') ?></th>
          <th><?php echo _e('measurement_label') ?></th>
          <th></th>
        <!--  <td>Actions</td> -->
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($users) > 0) : ?>
            <?php foreach ($users as $row) : ?>
                <tr>
                  <td><?php echo $row['id'] ; ?></td>
                  <td><?php echo $row['name'] ; ?><?php if ($row['facebook_id'] != null) {?>  <span class="fa fa-facebook-square"></span><?php } ?></td>
                  <td><?php echo $row['gender'] ; ?></td>
                  <td><?php echo $row['num_of_children'] ; ?></td>
                  <td></td>
                  <td></td>                  
                  <td><?php echo $row['email'] ; ?></td>
                  <td><?php echo $row['registration_date'] ; ?></td>
                  <td><?php echo $row['birthday'] ; ?></td>
                  <td><?php echo $row['role'] ; ?></td>
                  <td><?php echo $row['language'] ; ?></td>
                  <td><?php echo $row['measurement'] ; ?></td>
<!--                   <td><span class="glyphicon glyphicon-trash"></span></td> -->
                  <td><?php echo anchor('admin/delete_user/'.$row['id'], 'Delete', 
                             array('onClick' => "return confirm('Are you sure you want to delete?')"));
                        ?><span class="glyphicon glyphicon-trash"></span>
					</td>
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