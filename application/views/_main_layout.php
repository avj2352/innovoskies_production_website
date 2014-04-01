<?php $this->load->view('components/page_head'); ?>

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
          <?php echo get_menu($menu); ?>
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('admin/user/login', 'Login'); ?></li>
          </ul>
        </div>
      </div>
    </div><!-- Navbar finishes here -->
      
    <div id="homepage" class="container">
      <div class="row"></div>
      <div class="row">
        <?php $this->load->view('templates/'.$subview); ?>
      </div>
      <!-- End of the Homepage area -->
    </div>
<script>
  $('ul.nav li.dropdown a').click(function(){
    var url = $(this).attr('href');
    // alert(url); 
    window.location=url;
  });
</script>
<?php $this->load->view('components/page_tail'); ?>
