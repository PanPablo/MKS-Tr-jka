<div class="container">
<p class="newsTitle">Aktualności z życia MKS Trójki</p>
<div class="row">
<?php

$q = new WP_Query([
    'post_type' => 'post',
    'category_name' => 'news',
    'posts_per_page' => 2,
    'orderby' => 'date',
    'order' => 'DSC',
]);

if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
    <!-- post -->
    <div class="col-sm postNews">
            <div class="thumbnail"><?php the_post_thumbnail('medium_large') ?></div>
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
    <div class="col-sm mainDLsection">
        <p>Pliki do pobrania</p>
    </div>
</div>
<div class="row">
    <div class="col-sm file">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
        <p class="fileTitle">STATUT <br> STOWRZYSZENIA</p>
    </div>
    <div class="col-sm file">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
        <p class="fileTitle">REGULAMIN <br> KLUBU</p>
    </div>
    <div class="col-sm file">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
        <p class="fileTitle">DEKLARACJA <br> CZŁONKOWSKA</p>
    </div>
    <div class="col-sm file">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/downloadIcon.png"><br>
        <p class="fileTitle">OPŁATY <br> CZŁONKOWSKIE</p>
    </div>
</div>
    <form method="">
<div class="row">

<!--    <div class="col-sm form"> --><?php //advanced_form("form_5a8ca9b864ae4")?><!--</div>-->
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
<div class="row">
    <div class="col-sm logos">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sp.png">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lodz.png">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lozp.png">
    </div>
</div>
</div>