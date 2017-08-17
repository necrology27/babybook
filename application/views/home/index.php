
<ul id="navbar">
	<li id="title">babybook</li>
	<li><a>Forum</a></li>
	<li><a>Settings</a></li>
	<li><a href="home/logout">Logout</a></li>
</ul>


<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>upload_controller/add_child'">Add child</button>
<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>home/update'">Edit profile</button>

<div>
	<h2>My Children</h2>
	<table id="child_boxes">
		<?php 
		for ($i = 0; $i < $child_count/3; $i++) {
		    ?>
		    <tr class="child_row">
		    <?php
		  for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
		?>
		     <td class="box <?php echo "ch" . $i . $j;?>">
		     	<?php echo $children[$j]['name'];?>
		     </td>         
		<?php
		  }?>
		  </tr>
		<?php
		}?>
	</table>
</div>