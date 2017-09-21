<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th><?php _e('name_label') ?></th>
            <th><?php _e('role_label');?></th>
            <th><?php _e('gender_label') ?></th>
            <th><?php _e('email_label') ?></th>
            <th><?php _e('registration_date') ?></th>
            <th><?php _e('birthday_label') ?></th>
            <th><?php _e('language_label') ?></th>
            <th><?php _e('measurement_label') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($users) > 0) : ?>
            <?php foreach ($users as $row) : ?>
                <tr> 
                    <td><?php echo $row['id'] ; ?></td>
                    <td><?php echo $row['name'] ; ?><?php if ($row['facebook_id'] != null) {?>  <span class="fa fa-facebook-square"></span><?php } ?></td>
                    <td><?php echo $row['role']."  " ; ?>
                         <div class="dropdown">
                          	<div class="dropdown">
                            	<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" id="regdatecheck">
                                	<span class="glyphicon glyphicon-cog"></span> 
                                	<?php _e('change_role');?> 
                                	<span class="caret"></span>
                               	</button>
                                <ul class="dropdown-menu" aria-labelledby="regdatecheck">
                                    <li class="small">
                                    	<input type="radio" name="role" 
                                    			class="role_radio" id="admin.<?php echo $row['id']; ?>"/>
                                    	<?php _e('admin'); ?>
                                    </li>
                                    <li class="small">
                                    	<input type="radio" name="role" 
                                       			class="role_radio" id="parent.<?php echo $row['id']; ?>"/>
                                        <?php _e('parent'); ?>
                                    </li>
                                    <li class="small">
                                    	<input type="radio" name="role" 
                                        		class="role_radio" id="expert.<?php echo $row['id']; ?>"/>
                                        <?php _e('expert'); ?>
                                    </li>
                                </ul>
                            </div>
                    	</div>
                    </td>
                    <td><?php echo $row['gender'] ; ?></td>
                    <td><?php echo $row['email'] ; ?></td>
                    <td><?php echo $row['registration_date'] ; ?></td>
                    <td><?php echo $row['birthday'] ; ?></td>
                    <td><?php echo $row['language'] ; ?></td>
                    <td><?php echo $row['measurement'] ; ?></td>
                    <td><?php echo anchor('admin/delete_user/'.$row['id'], 'Delete', 
                             array('onClick' => "return confirm('Are you sure you want to delete?')"));
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