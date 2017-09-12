<table class="table">
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
          
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($children) > 0) : ?>
            <?php foreach ($children as $row) : ?>
                <tr>
                  <td><?php echo $row['child_id'] ; ?></td>
                  <td><?php echo $row['name'] ; ?></td>
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