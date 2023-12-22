<?php
/*
Template Name: Single service
Template Post Type: post
*/

?>

<?php get_header() ?>

<section class="page-section">
    <div class="page-section__header">
        <!-- <?php
            // if( has_post_thumbnail() ) { // условие, если есть миниатюра
	        //     the_post_thumbnail('full'); // если параметры функции не указаны, то выводится миниатюра текущего поста, размер thumbnail
            // } else {
	        //     echo '<img src="' . get_stylesheet_directory_uri() . '/images/road.jpg" />'; // изображение по умолчанию, если миниатюра не установлена
            // }
            ?>
        <div class="fixed-container">
            <ul class="breadcrumbs__list">
                single-services
                <?php //echo true_breadcrumbs(); ?>
            </ul>

            <h2 class="toright"><?php //the_title(); ?></h2>
        </div> -->
    </div>

    <div class="page-section__content">
        <div class="fixed-container">
            <?php the_content() ?>
        </div>
    </div>

</section>

<?php get_footer() ?>
