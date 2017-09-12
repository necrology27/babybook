<nav class="navbar navbar-default ">
  <div class="container">
  
    <ul class="nav navbar-nav">
      <li class="page-item" id="users"><a href="<?php echo base_url();?>admin/users"><?php echo _e('users'); ?></a></li>
      <li class="page-item" id="children"><a href="<?php echo base_url();?>admin/children"><?php echo _e('children'); ?></a></li>
      <li class="page-item" id="discussions"><a href="<?php echo base_url();?>admin/discussions"><?php echo _e('discussions_title'); ?></a></li>
      <li class="page-item" id="comments"><a href="<?php echo base_url();?>admin/comments"><?php echo _e('comments_title'); ?></a></li>
    </ul>
    
  </div>
</nav>
<em id="current_place"  style="display: none;"><?php echo $current_place; ?></em>
<em id="current_page"  style="display: none;"><?php echo $current_page; ?></em>

