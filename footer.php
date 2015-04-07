    <?php wp_footer()//Declare </body> for plugin compatibility ?>

      <footer class="page-footer background-primary">
        <div class="container" id="footer-recent-posts">
          <div class="row">
            <?php foreach(get_posts(array("posts_per_page"=>6)) as $post) : setup_postdata($post); ?>
              <div class="col s12 m6 l4">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title color-secondary"><?php echo get_the_title(); ?></span>
                    <p><?php echo substr(get_the_content(), 0, 250); ?></p>
                  </div>

                  <div class="card-action">
                    <a href="<?php echo get_the_permalink(); ?>" class="color-secondary">Read More</a>
                  </div>
                </div>

              </div>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
          </div>
        </div>

        <div class="background-secondary" id="footer-divider"></div>

        <div class="container">
          <div class="row">
            <div class="col s12"><?php echo get_theme_mod("copyright_notice", getCustomizerDefaults()["copyright_notice"] . get_bloginfo("name")); ?></div>
          </div>

          <div class="row">
            <div class="col s4">Proudly Powered By Wordpress</div>
            <a class="col s4" href="<?php echo get_admin_url() ?>">Admin Panel</a>
            <div class="col s4">Theme designed by <a href="https://noahhuppert.com">Noah Huppert</a></div>
          </div>
        </div>
      </footer>
    </body>
</html>
