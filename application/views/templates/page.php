<!-- Homepage Template -->
        <div class="col-md-9"><!-- Main Content Area -->

          <h1>Welcome to <?php echo $meta_title; ?></h1>
          <hr>
            <?php echo $content; ?>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
        <div class="col-md-3"><!-- Sidebar Area -->
          <div class="well">
            <ul class="list-group">
              <li class="list-group-item">
                <span class="badge">4</span>
                  <div style="font-size:18px; color: #FBB25A;">Sidebar Updates</div>
              </li>
            </ul>
             <p><?php echo mailto('avj2352@gmail.com', '<span class="glyphicon glyphicon-user"></span> avj2352@gmail.com'); ?></p>
             <hr> 
              <p><?php echo anchor('admin/user/logout', '<span class="glyphicon glyphicon-off"></span> Logout'); ?></p>
          </div><!-- End of the Sidebar -->
        </div>
<!-- Homepage Template -->        