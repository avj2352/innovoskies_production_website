<?php $this->load->view('admin/components/page_head'); ?>
  <body>
    <div id="#myNav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <?php echo anchor('admin/dashboard', $meta_title, 'class="navbar-brand"'); ?>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><?php echo anchor('admin/user', 'Users'); ?></li>
            <li><?php echo anchor('admin/page', 'Pages'); ?></li>
            <li><?php echo anchor('admin/page/order', 'Order Pages'); ?></li>
            <li><?php echo anchor('admin/article', 'News Articles'); ?></li>
            <li><?php echo anchor('admin/gallery', 'Gallery'); ?></li>
          </ul>
        </div>
      </div>
    </div>
      <!-- Navbar finishes here -->
      <!-- Marquee for InnovoSkies -->
      <!-- Marquee for InnovoSkies ends here-->
      <!-- Homepage Body begins here -->
    <div id="homepage" class="container">
      <div class="row"></div>
      <div class="row">
        <div class="col-md-9"><!-- Main Content Area -->

          <h4>Innovoskies - Control Panel</h4>
          <hr>
            <?php $this->load->view($subview); ?>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
        <div class="col-md-3"><!-- Sidebar Area -->
          <div class="well">
             <p><?php echo mailto('avj2352@gmail.com', '<span class="glyphicon glyphicon-user"></span> avj2352@gmail.com'); ?></p>
             <hr> 
              <p><?php echo anchor('admin/user/logout', '<span class="glyphicon glyphicon-off"></span> Logout'); ?></p>
              <ul class="list-group">
              <li class="list-group-item">
                <span class="badge">4</span>
                  <div style="font-size:15px; color: #FBB25A;">New Requests Panel</div>
              </li>
            </ul>
          </div><!-- End of the Sidebar -->
        </div>
      </div>
      <!-- End of the Homepage area -->
    </div>
    <footer>
      <div class="container">
        <!-- First Row -->
        <div class="row">
          <div class="col-lg-offset-10" style="position: relative; top:10px;"><a href="#">Home</a> | <a href="#">Gallery</a> | <a href="#">Contact Us</a></div>
          <hr>
        </div>
        <!-- Second Row -->
        <div class="row">
          <div class="col-xs-2" style="width:100px;"><img src="<?php echo base_url('img/is_etched.png'); ?>" class="img-responsive"></div>
          <div class="col-xs-5">
            <ul>
              <li>Copyright 2013 Innovo Skies&nbsp;&copy;.</li>
              <li>Web hosting by IX Webhosting</li>
              <li>Contact : info@innovoskies.com | +91-9845111324 | +91-9845506618</li>
            </ul>
          </div>
        </div>
        <!-- Third Row -->
        <hr>
      </div>
    </footer>
    <!-- /////////////////////////////////////////////////////////////////////////// -->
        <!-- Modal Window -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <p class="modal-title gold" id="myModalLabel" style="font-size: 16px;">Staff Login Only*</p>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
        <!-- Modal Window Ends here-->
  <!-- /////////////////////////////////////////////////////////////////////////// -->
    <!-- Homepage Body ends here -->
  </body>
</html>