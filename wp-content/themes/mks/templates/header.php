<header class="banner">
  <div class="container">
      <div class="mainBackground">
          <div class="row">
              <div class="col-sm">
                  <nav class="nav-primary">
                      <?php
                      if (has_nav_menu('primary_navigation')) :
                          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav',]);
                      endif;
                      ?>
                  </nav>
                  <div class="nav-icon3">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </div>
          </div>
          <div class="row">
             <div class="col-sm">
<!--                <a class="brand" href="--><?//= esc_url(home_url('/')); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->
                 <div class="logo"></div>
            </div>
          </div>
          <div class="row">
              <div class="col-sm">
<!--                  <div class="ns"></div>-->
<!--                  <div class="yt"></div>-->
<!--                  <div class="fb"></div>-->
                  <div class="socialHeader">
                      <?php

                      $q = new WP_Query([
                          'post_type' => 'social',
                          'posts_per_page' => 5,
                          'order' => 'asc',

                      ]);

                      if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
                          <!-- post -->
                          <div class="socialHeadIcon">
                              <a href="<?php the_field('link') ?>"><img src="<?php the_field('social_icons') ?>"></a>
                          </div>

                      <?php endwhile; ?>
                          <!-- post navigation -->
                      <?php else: ?>
                          <!-- no posts found -->
                      <?php endif;

                      ?>
                  </div>
                  <div class="arrow"></div>
              </div>
          </div>
      </div>
      <div class="menuMobile">
          <nav class="nav-mobile">
              <?php
              if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav',]);
              endif;
              ?>
          </nav>
      </div>
      <div class="row">
          <div class="col-sm name">
              <p>MIĘDZYSZKOLNY KLUB SPORTOWY TRÓJKA</p>
          </div>
      </div>
      <div class="row">
          <div class="col-sm motto">
              <div class="puchar"></div>
              <p>Naszą misją jest wspieranie młodych sportowców <br>
               ich drodze do sukcesu, życia w duchu fair play<br>
               oraz odpowiedzialności za siebie i innych.</p>
              <div class="timer"></div>
          </div>
      </div>
  </div>
</header>
