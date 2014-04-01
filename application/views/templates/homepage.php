<!-- Homepage Template -->
        <div class="col-md-9"><!-- Main Content Area -->

          <h1>Welcome to <?php echo $meta_title; ?></h1>
          <hr>
            <?php echo $content; ?>
            
          <hr>
          <?php if(isset($articles[0])): ?>
          <h1>News Articles</h1>
          <div class="col-md-6 well" style="opacity: 0.7;">
            <?php echo get_excerpt($articles[0]); ?>
          </div>
           <?php endif; ?>
           <?php if(isset($articles[1])): ?> 
           <div class="col-md-6 well" style="opacity: 0.7;">
            <?php echo get_excerpt($articles[1]); ?>
          </div>
          <?php endif; ?>
           <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
        <div class="sidebar col-md-3"><!-- Sidebar Area -->
          <!-- Gallery Sidebar -->
          <div class="well">
            <ul class="list-group">
              <li class="list-group-item">
                <span class="badge"><?php echo $art_count; ?></span>
                  <div style="font-size:18px; color: #FBB25A;"><?php echo anchor('gallery', 'New in Gallery', 'attributs'); ?></div>
              </li>
            </ul>
             <?php if(isset($artworks)): ?>
                 <?php echo artwork_links($artworks); ?> 
             <?php else: ?>
                  <p><?php echo "Currently There are no Artworks"; ?></p>
             <?php endif; ?>
          </div><!-- Gallery Sidebar ends here-->
          <div>&nbsp;</div>
          <!-- Articles Sidebar -->
          <div class="well">
            <ul class="list-group">
              <li class="list-group-item">
                <span class="badge"><?php echo $articles_count; ?></span>
                  <div style="font-size:18px; color: #FBB25A;"><?php echo anchor($news_archive_link, 'News Articles'); ?></div>
              </li>
            </ul>
             <?php $articles = array_slice($articles, 2); ?>
             <?php if(isset($articles)): ?>
                 <?php echo article_links($articles); ?> 
             <?php else: ?>
                  <p><?php echo "Currently There are no Articles"; ?></p>
             <?php endif; ?>
          </div><!-- End of the Articles Sidebar -->
        </div><!-- Sidebar ends here -->
<!-- Homepage Template -->        