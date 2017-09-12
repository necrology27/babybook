               	<br>
               	<br>
               	<br>
                <em class="footer">babybook &copy; <?php $d =  new DateTime(); echo date('Y'); ?></em>   
    <script>
        var base_url = "<?php echo base_url();?>";
        var weak = "<?php echo _e('weak');?>";
        var below_average = "<?php echo _e('below_average');?>";
        var average = "<?php echo _e('average');?>";
        var good = "<?php echo _e('good');?>";
        var very_good = "<?php echo _e('very_good');?>";
        var no_data = "<?php echo _e('no_data');?>";
    </script>
    <script src="<?php echo resources_url();?>jquery-3.2.1.min.js"></script>
    <script src="<?php echo resources_url();?>jquery.form.min.js"></script>
    <script src="<?php echo resources_url();?>jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo resources_url();?>bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo resources_url();?>slider/js/bootstrap-slider.js"></script>
    <script>
        $( function() {
        	var date = $('.datepicker').datepicker({
            	 dateFormat: 'yy-mm-dd',
        	     changeMonth: true,
        	     changeYear: true,
        	     yearRange: "-100:-10"
        	 }).val();
        } );
        $( function() {
        	var date = $('.datepicker2').datepicker({
            	 dateFormat: 'yy-mm-dd',
        	     changeMonth: true,
        	     changeYear: true,
        	     yearRange: "-6:+1"
        	 }).val();
        } );
    </script>
    <?php 
    if(isset($scripts))
    {
        foreach($this->data['scripts'] as $script)
        {
            echo '<script src="'. resources_url().$script.'?v=9"></script>';
          
        }
    }
    ?>
    <script src="<?php echo resources_url();?>main.js?v=2"></script>
	</body>
</html>