<!-- Homepage Template -->
        <div class="col-md-9"><!-- Main Content Area -->

          <h1><?php echo $meta_title; ?> - News and Articles</h1>
          <hr>
            <?php echo $content; ?>
            <hr>
           <?php if($pagination): ?>
             <section class="pagination"><?php echo $pagination; ?></section>
           <?php endif; ?> 
          <div class="row">
            <?php  if(count($articles)): foreach ($articles as $article):?>
                <article class="col-lg-12"><?php echo get_excerpt($article); ?><hr></article>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        <?php if($pagination): ?>
             <section class="pagination"><?php echo $pagination; ?></section>
           <?php endif; ?> 
           <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
        <div class="sidebar col-md-3"><!-- Sidebar Area -->
          <!-- Contact us sidebar -->
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
          <div>&nbsp;</div>
          <!-- Articles Sidebar -->
          <div class="well">
            <ul class="list-group">
             <?php $articles = array_slice($articles, 3); ?>
              <li class="list-group-item">
                <span class="badge"><?php echo $articles_count; ?></span>
                  <div style="font-size:18px; color: #FBB25A;"><?php echo anchor($news_archive_link, 'News Articles'); ?></div>
              </li>
            </ul>
             <?php if(isset($articles)): ?>
                 <?php echo article_links($articles); ?> 
             <?php else: ?>
                  <p><?php echo "Currently There are no Articles"; ?></p>
             <?php endif; ?>
          </div><!-- End of the Articles Sidebar -->
        </div><!-- Sidebar ends here -->
<!-- Homepage Template -->        