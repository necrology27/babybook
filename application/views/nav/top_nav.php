<div class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>home">babybook</a>
        </div>
        <div id="admin-nav" class="baby-heading navbar-collapse collapse">
            <div class="container-fluid">
                <div class="navbar-header">
                  	<a class="navbar-brand" href="<?php echo base_url();?>discussions"><?php echo $this->lang->line('system_system_name'); ?></a>
                </div>
                <ul class="nav navbar-nav">
                    <li <?php if ($this->uri->segment(2) == 'create') {echo 'class="active"';} ; ?>>
                    	<?php echo anchor('discussions/create', $this->lang->line('top_nav_new_discussion')) ; ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                	<li>
                		<button class="btn-primary btn navbar-btn" 
                				onclick="location.href='<?php echo base_url();?>login/logout'" ><?php echo _e('logout'); ?>
                		</button>
                	</li>
                </ul>
            </div>
    	</div>
    </div>
    <div class="container theme-showcase" role="main"></div>
</div>
