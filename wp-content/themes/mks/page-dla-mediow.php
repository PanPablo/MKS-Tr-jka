<?php
/**
 * Created by PhpStorm.
 * User: pawelstruminski
 * Date: 26.03.2018
 * Time: 10:43
 */
?>
<div class="container">

    <?php

    $q = new WP_Query([
        'post_type' => 'media',
        'posts_per_page' => 3,
        'order' => 'asc',


    ]);

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
        <!-- post -->
        <div class="row postClub">
            <div class="col-sm clubImage">
                <div class="imgClub"><?php the_post_thumbnail('medium_large') ?></div>
                <div class="imgClubMobile"><?php the_post_thumbnail('medium') ?></div>
            </div>
            <div class="col-sm">
                <h3 class="titleClub"><?php the_title()?></h3>
                <div class="aboutClub"><?php the_content() ?></div>
                <a href="<?php the_permalink()?>" class="readMore" >WIĘCEJ</a>
            </div>
        </div>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif;

    ?>
    <br>
    <div class="row">
        <div class="col-sm mainDLsection">
            <p>Pliki do pobrania</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm file">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
            <p class="fileTitle">INFORMACJA O<br> KLUBIE</p>
        </div>
        <div class="col-sm file">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
            <p class="fileTitle">PODSUMOWANIE<br> DZIAŁALNOŚCI</p>
        </div>
        <div class="col-sm file">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
            <p class="fileTitle">NAJWAŻNIEJSZE <br> OSIĄGNIĘCIA</p>
        </div>
    </div>
<form method="">
    <div class="row">
        <div class="col-sm form"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/newsletter.png"><p>ZAPISZ SIE DO NEWSLETTERA MKS TRÓJKA ŁÓDZ</p></div>
        <div class="col-sm form"><input type="text" value="Imię"></div>
        <div class="col-sm form"><input type="text" value="Nazwisko"></div>
        <div class="col-sm form"><input type="email" value="e-mail"></div>
        <div class="col-sm form"><input type="submit" value="ZAPISZ"></div>
    </div>
    <div class="row">
        <div class="col-sm  form1"><input type="checkbox"><label>Akceptuje politykę prywatności Klubu MKS Trójka Łódź</label></div>
    </div>
</form>

</div>