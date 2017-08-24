
<ul id="navbar">
	<li id="title">babybook</li>
	<li><a><?php echo $forum; ?></a></li>
	<li><a><?php echo $settings; ?></a></li>
	<li><a href="home/logout"><?php echo $logout; ?></a></li>
</ul>


<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>upload_controller/add_child'"><?php echo $add_child; ?></button>
<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>home/update'"><?php echo $edit_profile; ?></button>

<div>
	<h2><?php echo $my_children; ?></h2>
	<table id="child_boxes">
		<?php 
		for ($i = 0; $i < $child_count/3; $i++) {
		    ?>
		    <tr class="child_row">
		    <?php
		  for($j=$i*3; $j < min($i*3+3, $child_count); $j++) {
		?>
		     <td class="box <?php echo "ch" . $j;?>" background="<?php echo uploads_url() . $id . "/" . $children[$j]['id'] . "/" . $def_imgs[$j]; ?>">
		     	<?php echo $children[$j]['name'];?>
		     </td>         
		<?php
		  }?>
		  </tr>
		<?php
		
		}?>
		<button class="btn-default btn" onclick="location.href='<?php echo base_url();?>make_test'">képesseg</button>
	</table>
</div>