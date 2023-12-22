<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

	
<div class="fixed-container">
    <ul class="breadcrumbs__list">
        <?php echo true_breadcrumbs(); ?>
    </ul>
    <h2 class="toleft"><?php echo single_cat_title() ?></h2>
</div>
	
<div class="page-container">
    <div class="fixed-container">
        <section class="site-page" <?php if (is_active_sidebar('page-sidebar1')) : echo 'style="width:73%;"'; endif;?>>

        <?php
            if ( have_posts() ) {
                ?>
                <ul class="posts__list">
                <?php

	            // Load posts loop.
	            while ( have_posts() ) {
		            the_post();
                    ?>
                    <li class="posts__list__item">
                        <a class="posts__list__item__link" href="<?php the_permalink() ?>">
                            <?php if (the_post_thumbnail()){
                                the_post_thumbnail();
                            }else {
                                ?>
                                <img src="<?php echo get_stylesheet_directory_uri() . '/images/placeholder.svg' ?>">
                                <?php
                            } ?>
                            
                            <h3 class="posts__list__item__heading"><?php the_title(); ?></h3> 
                        </a>
                        
                    </li>
                    <?php
	            }
                ?>
                </ul>
                <?php
            } else {
	            get_template_part( 'temps/content-none' );
            }
            ?>
        </section>

<?php if (is_active_sidebar('page-sidebar1')){ ?>
	
	<aside class="sidebar__page">
		<?php	
			dynamic_sidebar( 'page-sidebar1' );
		?>
	</aside>
<?php
	}
?>

</div>
</div>
</main>

<?php
get_footer();
