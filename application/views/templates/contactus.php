<!-- Homepage Template -->
        <div class="col-md-8"><!-- Main Content Area -->
          <h2><?php echo $meta_title; ?> - Contact Us</h2>
          <hr>
            <?php echo $content; ?>
            <p>&nbsp;</p>
            <hr>
            
            <!-- Condition to check if the mail sent was a success -->
          <?php $mail_sent = $this->session->flashdata('mail'); ?>
          <?php if(isset($mail_sent) && $mail_sent == true): ?>
            <div class="alert alert-dismissable alert-info">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Thank You!</strong> Your mail has been sent successfully!
          </div>
          <?php endif; ?>
          <!-- Condition to check if the mail sent was a success -->


          <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
          <?php echo form_open(); ?>  
          <table class="table contactUsTable">
        <tr>
            <td>Your Name:</td>
            <td><?php echo form_input('name', set_value('name'), 'class="form-control" columns="60"'); ?></td>
        </tr>
        <tr>
            <td>Email Address:</td>
            <td><?php echo form_input('email', set_value('email'), 'class="form-control" columns="60"'); ?></td>
        </tr>
      <tr>
        <td>Subject:</td>
        <td><?php echo form_input('subject', set_value('subject'), 'class="form-control" columns="60"'); ?></td>
      </tr>
      <tr>
        <td>Message:</td>
        <td><?php echo form_textarea('body', set_value('body'), 'class="tinymce form-control", rows="4", columns="100"'); ?></td>
      </tr>
      <tr>
        <td></td>
        <td><?php echo form_submit('submit', 'Submit', 'class="btn btn-success"'); ?>&nbsp; &nbsp;<?php echo form_reset('reset', 'Cancel', 'class="btn btn-primary"'); ?></td>
      </tr>
    </table>  
    <?php echo form_close(); ?>
        </div><!-- Main Content Ends here -->

        <!-- <div class="col-md-1"></div>   -->
        <div class="col-md-4"><!-- Sidebar Area -->
          <div class="well">
            <ul class="list-group">
              <li class="list-group-item">
                  <div style="font-size:18px; color: #FBB25A;">Reach out to us</div>
              </li>
            </ul>
             <p><?php echo mailto('info@innovoskies.com', '<span class="glyphicon glyphicon-user"></span> info@innovoskies.com'); ?></p>
             <hr> 
              <p><span class="glyphicon glyphicon-road">&nbsp;</span><strong>Address</strong></p>
              <p><?php echo web_address(); ?></p>
              <hr>
              <p><span class="glyphicon glyphicon-earphone">&nbsp;</span><strong>Call us</strong></p>
              <p><ul>
                <li>+91 9845111324</li>
                <li>+91 9845506618</li>
              </ul></p>
          </div><!-- End of the Sidebar -->
        </div>
<!-- Homepage Template -->        