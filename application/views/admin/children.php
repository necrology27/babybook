<table class="table" id="myTable">
	<thead>
		<tr>
            <th>#</th>
            <th><?php echo _e('child_name_placeholder') ?></th>
            <th><?php echo _e('parent') ?></th>
            <th><?php echo _e('gender_label') ?></th>
            <th><?php echo _e('birthday_label') ?></th>
            <th><?php echo _e('disorders_label') ?></th>
            <th><?php echo _e('birth_weight_label') ?></th>
            <th><?php echo _e('birth_length_label') ?></th>
            <th><?php echo _e('delete') ?></th>
		</tr>
    </thead>
    <tbody id="children">
        <?php if (sizeof($children) > 0) : ?>
            <?php foreach ($children as $row) : ?>
                <tr class="one_child" id="child<?php echo $row['child_id'];?>">
                    <td><?php echo $row['child_id'] ; ?></td>
                    <td class="name"><?php echo $row['name'] ; ?></td>
                    <td><?php echo $row['user_id'] ; ?></td>
                    <td><?php echo $row['gender'] ; ?></td>
                    <td><?php echo $row['birthday'] ; ?></td>
                    <td><?php 
                        if($row['genetical_disorders'] != null){ 
                            echo _e('genetical_disorders_label')."  ".$row['genetical_disorders']; 
                        } 
                        if($row['other_disorders'] != null)
                            echo _e('other_disorders_label') ."  ". $row['other_disorders'] ; 
                        ?>
                    </td>
                    <td><?php echo $row['birth_weight'] ; ?></td>
                    <td><?php echo $row['birth_length'] ; ?></td>
                    <td><?php echo anchor('admin/delete_child/'.$row['child_id'], 'Delete', 
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

