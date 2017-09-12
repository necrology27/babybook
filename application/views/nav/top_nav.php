<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>home">babybook</a>
    </div>
<div class="navbar-collapse collapse">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>discussions"><?php echo $this->lang->line('system_system_name'); ?></a>
    </div>
    
      <ul class="nav navbar-nav">
      
        <li <?php if ($this->uri->segment(1) == '') {echo 'class="active"';} ; ?>><?php echo anchor('/', $this->lang->line('top_nav_view_discussions')) ; ?></li>
        <li <?php if ($this->uri->segment(1) == 'discussions') {echo 'class="active"';} ; ?>><?php echo anchor('discussions/create', $this->lang->line('top_nav_new_discussion')) ; ?></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><?php echo anchor('admin/login', $this->lang->line('top_nav_login')) ; ?></li>
      </ul>
    </div><!--/.nav-collapse -->
    </nav>
  </div>
</div>

<div class="container theme-showcase" role="main"></div>
</div>
