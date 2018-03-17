<?php
/**
 * Created by PhpStorm.
 * User: pawelstruminski
 * Date: 13.03.2018
 * Time: 21:46
 */?>
<div class="container">
<?php

$q = new WP_Query([
    'post_type' => 'klub',
    'posts_per_page' => 3,
    'order' => 'asc',


]);

if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
    <!-- post -->
    <div class="row postClub">
        <div class="col-sm">
            <div class="imgClub"><?php the_post_thumbnail('medium_large') ?></div>
            <div class="imgClubMobile"><?php the_post_thumbnail('medium') ?></div>
        </div>
        <div class="col-sm">
            <h3 class="titleClub"><?php the_title()?></h3>
            <div class="aboutClub"><?php the_content() ?></div>
        </div>
    </div>
<?php endwhile; ?>
    <!-- post navigation -->
<?php else: ?>
    <!-- no posts found -->
<?php endif;

?>

    <?php

    $q = new WP_Query([
        'post_type' => 'klub',
        'title' => 'zawodnicy',

    ]);

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <!-- post -->
        <div class="row playersClub">
            <div class="col-sm">
                <div class="imgClub"><?php the_post_thumbnail('medium_large') ?></div>
                <div class="imgClubMobile"><?php the_post_thumbnail('medium') ?></div>
            </div>
            <div class="col-sm">
                <h3 class="titleClub"><?php the_title()?></h3>
                <div class="aboutClub"><?php the_content() ?></div>
            </div>
        </div>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif;

    ?>
</div>
