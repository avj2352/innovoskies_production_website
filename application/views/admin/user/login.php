<div class="panel-heading">
<h3><?php echo $meta_title; ?> - Login Page</h3>
<p>Please login with your credentials</p>
  </div>
  <div class="panel-body">
    <!--<?php //echo '<pre>' . print_r($this->session->userdata, TRUE) . '</pre>'; ?>-->
  	<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
    <?php echo form_open('admin/user/login'); ?>
    <!--<?php //var_dump($hashvalue); ?>-->
    <table class="table">
    	<tr>
    		<td>Email:</td>
    		<td><?php echo form_input('email', set_value('email'), 'class="form-control", '); ?></td>
    	</tr>
    	<tr>
    		<td>Password: </td>
    		<td><?php echo form_password('password', set_value('password'), 'class="form-control"'); ?></td>
    	</tr>
    	<tr>
    		<td></td>
    		<td><?php echo form_submit('submit', 'Log in', 'class="btn btn-info"'); ?></td>
            <td><?php echo anchor('/','Go Back', 'class="btn btn-success btn-sm"'); ?></td>
    	</tr>
    </table>
    <?php  echo form_close(); ?>
  </div> 