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
        <!-- Modal Window Ends here-->
  <!-- /////////////////////////////////////////////////////////////////////////// -->
    <!-- Homepage Body ends here -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <?php if($this->uri->segment(1) == 'gallery'):?>
    <?php //TODO Gallery related Javascripts go here; ?>
      <script type="text/javascript" src="<?php echo base_url('js/jquery.tmpl.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/jquery.easing.1.3.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/jquery.elastislide.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/gallery.js'); ?>"></script>
    <?php endif; ?>
  </body>
</html>