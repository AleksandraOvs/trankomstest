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


	<?php
		if (is_front_page()){
			get_template_part('templates/hero');
		}
	?>

	<?php 
		if (!is_front_page()){
			?>
			<div class="fixed-container">
            <ul class="breadcrumbs__list">
                <?php echo true_breadcrumbs(); ?>
            </ul>

        	</div>
		<?php
		}
	?>
<div class="page-container">
<div class="fixed-container">
<?php if (is_active_sidebar('page-sidebar1')){ ?>
	
	<aside class="sidebar__page">
		<?php	
			dynamic_sidebar( 'page-sidebar1' );
		?>
	</aside>
<?php
	}
?>

<section class="site-page" <?php if (is_active_sidebar('page-sidebar1')) : echo 'style="width:73%;"'; endif;?>>

<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		the_title();

		//get_template_part( 'temps/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	//twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'temps/content-none' );

}
?>
   
</section>

</div>
</div>
</main>

<?php
get_footer();
