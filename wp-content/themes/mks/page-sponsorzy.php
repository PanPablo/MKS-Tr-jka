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
        <div class="col-sm becomeSponsor">
            <p>SPONSORZY/PARTNERZY</p>
        </div>
        <div class="col-sm becomeSponsor">
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
           <div class="col-4 sponsorsImg">
                <img src="<?php the_field('logo_sponsora')?>">
           </div>
            <div class="col-8 sponsorsDsc">
                <h4><?php the_title(); ?></h4>
                <p><?php the_content()?></p>
                <a href="<?php the_field('link')?>"><?php the_field('link')?></a>
           </div>
       </div>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif;

    ?>
</div>
