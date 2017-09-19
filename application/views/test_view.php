<div class="container">
	<div class="row">
    	<div class="col-md-8 col-md-offset-3">
    		<?php echo '<p id="chid" style="display:hidden;">' .$this->session->flashdata('child_id') . '</p>'; ?>
    		
    	<?php echo $this->session->flashdata('verify_msg'); ?>
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			<h4><?php echo _e('take_test_title'); ?></h4>
        			<input id="child_id" type = 'hidden' value=<?php echo $child_id; ?> >
        		</div>
            	<div class="panel-body">
                    <?php $attributes = array("name" => "addchildform");?>
                    <form>
                      	<div class="table-responsive">
                          	<table class="table table-striped table-bordered table-condensed">
                              	<thead class="thead-inverse">
                            		<tr>
                                        <th><?php echo _e('pass'); ?></th>
                                        <th><?php echo _e('fail'); ?></th> 
                                        <th><?php echo _e('no_opportunity'); ?></th>
                                        <th><?php echo _e('refusal'); ?></th>
                                        <th></th>
                            		</tr>
                        		</thead>
                        		<tbody>
                                <?php
                                $i = 0;
                                foreach($skills as $skill): ?>
                                    <tr> 		
                                		 <td style="text-align:center;">	
                                		 <input type="radio" class="answerRadio" 
                                		 	id="<?php echo  $skill['id'] . "." . $skill['skill_group_id'];?>.Pass" 
                                		 		name="radio<?php echo  $skill['id'];?>" value="Pass"> 
                                		 </td>
                        				 <td style="text-align:center;">	
                        				 <input type="radio" class="answerRadio" 
                        				 	id="<?php echo  $skill['id'] . "." .$skill['skill_group_id'];?>.Fail" 
                        				 		name="radio<?php echo $skill['id'];?>" value="Fail"> 
                        				 </td>
                        				 <td style="text-align:center;">	
                        				 <input type="radio" class="answerRadio" 
                        				 	id="<?php echo  $skill['id'] . "." .$skill['skill_group_id'];?>.No_opportunity" 
                        				 		name="radio<?php echo $skill['id'];?>" value="No_opportunity"> 
                        				 </td>
                        				 <td style="text-align:center;">	
                        				 <input type="radio" class="answerRadio" 
                        				 	id="<?php echo  $skill['id'] . "." .$skill['skill_group_id'];?>.Refusal" 
                        				 		name="radio<?php echo $skill['id'];?>" value="Refusal"> 
                        				 </td>
                        				 <td>
                                             <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" 
                                             		data-placement="bottom" data-html="true" data-content="<?php echo $skill['description'];?>">
                                              <?php echo $skill['name'];?>
                                             </button>
                        				 </td>
                        			</tr>	
                        		<?php 
                            		$i++;
                            		endforeach; 
                        		?>
                        	</tbody>
                    	</table>
                	</div>	
                	<div class="form-group">
                		<button type="button" class="btn btn-primary" 
                			onclick="location.href='<?php echo base_url();?>home'"><?php echo _e('save_button');?>
                		</button>
                		<button name="cancel" type="reset" 
                			onclick="location.href='<?php echo base_url();?>home'" class="btn btn-default"><?php echo _e('cancel_button');?>
                		</button>
                	</div>
                </form>
                
                <?php echo $this->session->flashdata('msg'); ?> 
                </div>
            </div>
        </div>
    </div>
</div>
