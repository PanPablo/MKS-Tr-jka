<?php
/**
 * Created by PhpStorm.
 * User: pawelstruminski
 * Date: 19.03.2018
 * Time: 23:54
 */
?>
<div class="container">
    <div class="row">
        <div class="col becomeSponsor">
            <p>SPONSORZY/PARTNERZY</p>
            <button>JAK ZOSTAĆ SPONSOREM/PARTNEREM KLUBU?</button>
        </div>
    </div>
    <?php

    $q = new WP_Query([
        'post_type' => 'sponsorzy-partnerzy',
        'order' => 'ASC',

    ]);

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <!-- post -->
       <div class="row">
           <div class="col">
                <img src="<?php the_field('logo_sponsora')?>">
                <?php the_title(); ?>
                <a href="<?php the_field('link')?>"><?php the_field('link')?></a>
                <p><?php the_content()?></p>
           </div>
       </div>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif;

    ?>
</div>
