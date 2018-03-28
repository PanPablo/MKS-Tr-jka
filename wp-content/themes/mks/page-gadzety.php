<?php
/**
 * Created by PhpStorm.
 * User: pawelstruminski
 * Date: 27.03.2018
 * Time: 13:53
 */
?>
<div class="container">
    <div class="row">
        <div class="col gadgesTitle">
             <p>NAJNOWSZE GADŻETY</p>
        </div>
    </div>
        <div class="row">
            <?php

            $q = new WP_Query([
                'post_type' => 'gadzety',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DSC',
            ]);

            if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
                <!-- post -->
                <div class="col-lg-4 postNews newsPage">
                    <div class="thumbnail"><?php the_post_thumbnail('medium') ?></div>
                    <div class="mobileThumbnail"><?php the_post_thumbnail('medium') ?></div>
                    <p class="postTitle"><?php the_title()?> </p>
                    <span class="postText"><?php the_excerpt() ?></span>
                    <a href="<?php the_permalink()?>" class="readMore" >WIĘCEJ</a>

                </div>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif;

            ?>
    </div>
    <br>
    <div class="row">
        <div class="col-sm mainDLsection">
            <p>Pliki do pobrania</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 file"></div>

        <div class="col-sm-3 file shop">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
            <p class="fileTitle">REGULAMIN<br>SKLEPU</p>
        </div>
        <div class="col-sm-3 file shop">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
            <p class="fileTitle">INFORMACJE<br>DODATKOWE</p>
        </div>
        <div class="col-sm-3 file"></div>
    </div>
</div>
