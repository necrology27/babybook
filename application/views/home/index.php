
<ul id="navbar">
	<li id="title">babybook</li>
	<li><a>Forum</a></li>
	<li><a>Settings</a></li>
	<li><a>Logout</a></li>
</ul>

<a>Add child...</a>

<div>
	<h2>Children</h2>
	<table id="child_boxes">
		<?php 
		for ($i = 0; $i < 3; $i++) {
		    ?>
		    <tr class="child_row">
		    <?php
		  for($j=0; $j < 3; $j++) {
		?>
		     <td class="box <?php echo "ch" . $i . $j;?>">
		     	Child <?php echo $i . " " . $j;?>
		     </td>         
		<?php
		  }?>
		  </tr>
		<?php
		}?>
	</table>
</div>