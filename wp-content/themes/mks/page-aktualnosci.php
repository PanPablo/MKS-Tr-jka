<?php
/**
 * Created by PhpStorm.
 * User: pawelstruminski
 * Date: 19.02.2018
 * Time: 16:00
 */
?>
<div class="container">
    <div class="row">
    <?php

    $q = new WP_Query([
        'post_type' => 'post',
        'category_name' => 'news',
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
    <div class="row">
        <div class="col-lg-6 fbNews">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fbPage.png" alt="facebook page" class="fbPageImg">
        </div>
        <div class="col-lg-6 fbNews">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chatIcon.png" alt="">
            <p>Polub profil MKS Trójki Łódź na Facebooku. Oglądaj filmy, zdjęcia z życia zawodników.
            Czytaj aktualności. Komentuj, lajkuj...
            Bądź z nami na bieżąco</p>
        </div>
    </div>
    <div class="row">
        <?php

        $q = new WP_Query([
            'post_type' => 'post',
            'category_name' => 'news',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DSC',
            'offset' => 3,
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

</div>