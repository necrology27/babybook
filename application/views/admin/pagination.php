<div style="width:800px; margin:0 auto;">
	<?php
        $n=$num_of_data;
        $num_of_pages=ceil($n/$num_per_page);
    ?>
    <ul class="pagination pagination-sm">
    <?php for($i=0; $i<$num_of_pages; $i++) { ?>
       	<li class="page-item" id=<?php echo $i?>>
           	<a href="<?php echo base_url();?>admin/<?php echo $current_place; ?>/<?php echo $i?>">
				<?php echo ($i+1)."  " ?>
           	</a>
       	</li>
   	<?php } ?>
    </ul>
</div>