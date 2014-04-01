<?php $this->load->view('admin/components/page_head'); ?>
  <body>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
      <!-- Navbar finishes here -->
      <!-- Marquee for InnovoSkies -->
      <!-- Marquee for InnovoSkies ends here-->
      <!-- Homepage Body begins here -->
    <div id="homepage" class="container">
      <div class="row"></div>
      <div class="row">
        <div class="col-md-12"><!-- Main Content Area -->

          <div class="modal show" role="dialog">
			<div class="modal-dialog">
              <div class="modal-content">

            	<?php $this->load->view($subview); ?>

                <div class="modal-footer">
                  <p><span class="gold">&copy; <?php echo $meta_title; ?>, 2013</span></p>
                </div>
              </div>
            </div>
          </div><!-- End of the Modal Tag -->

        </div>
      </div>
      <!-- End of the Homepage area -->
    </div>
<?php $this->load->view('admin/components/page_tail'); ?>
