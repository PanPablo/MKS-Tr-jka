<?php
/**
 * Created by PhpStorm.
 * User: pawelstruminski
 * Date: 19.03.2018
 * Time: 21:24
 */
?>
<div class="container">
    <div class="row">
            <div class="col-sm name">
                <p>DOKUMENTY DO POBRANIA</p>
            </div>
    </div>
    <?php

    $q = new WP_Query([
        'post_type' => 'dokumenty',
        'order' => 'ASC',

    ]);

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <!-- post -->
        <div class="row documents">
            <div class="col-sm singleFile">
                <a href="<?php the_field('dodaj_dokument')?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"></a>
                <p><?php the_title() ?></p>
            </div>
        </div>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif;

    ?>
</div>
