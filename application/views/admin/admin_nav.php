<nav class="baby navbar navbar-default ">
    <div class="container">
        <ul class="nav navbar-nav" style="list-style-type: none;">
            <li class="page-item" id="users"><a href="<?php echo base_url();?>admin/users"><?php echo _e('users'); ?></a></li>
            <li class="page-item" id="children"><a href="<?php echo base_url();?>admin/children"><?php echo _e('children'); ?></a></li>
            <li class="page-item" id="discussions"><a href="<?php echo base_url();?>admin/discussions"><?php echo _e('discussions_title'); ?></a></li>
            <li class="page-item" id="comments"><a href="<?php echo base_url();?>admin/comments"><?php echo _e('comments_title'); ?></a></li>
        </ul>
        <div class="nav navbar-nav col-xs-12 col-md-2 pull-right form-group">
    		<input class="form-control" type="text" id="sortInput" onkeyup="search_by_name()" placeholder="<?php echo _e('search_by_name'); ?>">
        </div>
    </div>
    <p id="current_place" style="display: none;">
    	<?php echo $current_place; ?>
    </p>
    <p id="current_page" style="display: none;">
    	<?php echo $current_page; ?>
    </p>
</nav>

