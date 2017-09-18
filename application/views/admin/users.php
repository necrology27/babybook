<table class="table">
    <thead>
        <tr>
          <th>#</th>
          <th><?php echo _e('name_label') ?></th>
          <th><?php echo _e('user_role') ?></th>
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
                  <td>
                         <div class="dropdown pull-left col-md-2">
                         <?php echo $row['role'] ; ?>
                              <div class="dropdown pull-right">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="regdatecheck">
                                <span class="glyphicon glyphicon-cog"></span> <?php echo _e('sort_by');?> <span class="caret"></span></button>
                                <ul class="dropdown-menu" aria-labelledby="regdatecheck">
                                  <li class="small"><input type="radio" name="role" class="role_radio" id="admin.<?php echo  $row['id']; ?>"/><?php echo  _e('admin'); ?></li>
                                  <li class="small"><input type="radio" name="role" class="role_radio" id="parent.<?php echo  $row['id']; ?>"/><?php echo  _e('parent'); ?></li>
                                  <li class="small"><input type="radio" name="role" class="role_radio" id="expert.<?php echo  $row['id']; ?>"/><?php echo  _e('expert'); ?></li>
                                </ul>
                                </div>
            	 		</div>
                        <!-- <button class="glyphicon glyphicon-cog myModalBtn" id=btn<?php echo $row['id'] ; ?>></button> -->
                        </td>
                  <td><?php echo $row['gender'] ; ?></td>
                  <td><?php echo 0 ; ?></td>
                  <td></td>
                  <td></td>                  
                  <td><?php echo $row['email'] ; ?></td>
                  <td><?php echo $row['registration_date'] ; ?></td>
                  <td><?php echo $row['birthday'] ; ?></td>
                  <td><?php echo $row['role'] ; ?></td>
                  <td><?php echo $row['language'] ; ?></td>
                  <td><?php echo $row['measurement'] ; ?></td>
                  <td><?php echo anchor('admin/delete_user/'.$row['id'], 'Delete', 
                             array('onClick' => "return confirm('Are you sure you want to delete?')"));
                        ?><span class="glyphicon glyphicon-trash"></span>
					</td>
            <?php endforeach ; ?>
        <?php else : ?>
                <tr>
                  <td colspan="4">No naughty comments here, horay!</td>
                </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>
