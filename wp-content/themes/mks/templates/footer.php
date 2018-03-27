<footer class="content-info">
    <a name="section_contact"></a>
  <div class="container">
      <div class="row ">

          <?php

                        $q = new WP_Query([
                            'post_type' => 'contact',
                            'posts_per_page' => 3,
                            'order' => 'asc',
                        ]);

                        if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
                            <!-- post -->
                            <div class="col-sm footer">
                                <p class="footerTitle"><?php the_title()?> </p>
                                <span class="footerText"><?php the_content() ?></span>
                            </div>
                        <?php endwhile; ?>
                            <!-- post navigation -->
                        <?php else: ?>
                            <!-- no posts found -->
                        <?php endif;

                        ?>

          <div class="col-1 footer">
                  <?php

                  $q = new WP_Query([
                      'post_type' => 'social',
                      'posts_per_page' => 5,
                      'order' => 'asc',

                  ]);

                  if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
                      <!-- post -->
                     <div class="socialFooter">
                         <a href="<?php the_field('link') ?>"><img src="<?php the_field('social_icons') ?>"></a>
                     </div>

                  <?php endwhile; ?>
                      <!-- post navigation -->
                  <?php else: ?>
                      <!-- no posts found -->
                  <?php endif;

                  ?>
          </div>
          <div class="col mobileSocialFooter">
              <?php

              $q = new WP_Query([
                  'post_type' => 'social',
                  'posts_per_page' => 5,
                  'order' => 'asc',

              ]);

              if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
                  <!-- post -->
                  <div class="socialFooter">
                      <a href="<?php the_field('link') ?>"><img src="<?php the_field('social_icons') ?>"></a>
                  </div>

              <?php endwhile; ?>
                  <!-- post navigation -->
              <?php else: ?>
                  <!-- no posts found -->
              <?php endif;

              ?>
          </div>
      </div>
  </div>
</footer>
