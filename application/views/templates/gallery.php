<!-- Homepage Template -->
        <div class="col-md-9"><!-- Main Content Area -->

          <h1><?php echo $meta_title; ?> Gallery</h1>
          <hr>
            <?php echo $content; ?>
            <p>&nbsp;</p>
            <div class="col-md-12">    
      <div class="content">
        <div id="rg-gallery" class="rg-gallery">
          <div class="rg-thumbs">
            <!-- Elastislide Carousel Thumbnail Viewer -->
            <div class="es-carousel-wrapper">
              <div class="es-nav">
                <span class="es-nav-prev">Previous</span>
                <span class="es-nav-next">Next</span>
              </div>
              <div class="es-carousel">
                <ul>
                  <?php foreach($artworks as $art): ?>
                  <li><a href="#"><img src="<?php echo base_url('img/gallery/'.$art->path); ?>" alt="<?php echo $art->title; ?>" data-large="<?php echo base_url('img/gallery/'.$art->path); ?>" data-description="<?php echo strip_tags($art->description); ?>" 
                    width="70px" height="60px"></a></li>
                <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <!-- End Elastislide Carousel Thumbnail Viewer -->
          </div><!-- rg-thumbs -->
        </div><!-- rg-gallery -->
      </div><!-- content -->
    </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
        <div class="sidebar col-md-3"><!-- Sidebar Area -->
          <!-- Articles Sidebar -->
          <div class="well">
            <ul class="list-group">
              <li class="list-group-item">
                <span class="badge"><?php echo $articles_count; ?></span>
                  <div style="font-size:18px; color: #FBB25A;"><a href="#">News Articles</a></div>
              </li>
            </ul>
             <?php if(isset($articles)): ?>
                 <?php echo article_links($articles); ?> 
             <?php else: ?>
                  <p><?php echo "Currently There are no Articles"; ?></p>
             <?php endif; ?>
          </div><!-- End of the Articles Sidebar -->
        </div>
<!-- Homepage Template -->        