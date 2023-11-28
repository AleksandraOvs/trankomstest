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
<div class="fixed-container">
<?php if (is_active_sidebar('page-sidebar1')){ ?>
	<div class="page-container">
	<aside class="sidebar__page" style="background: navy;">
		<?php	
			dynamic_sidebar( 'page-sidebar1' );
		?>
	</aside>
<?php
	}else {
		echo '<div class="fixed-container">';
	}
?>

<section class="site-page">
    
		<h1>Heading1</h1>
		<h2>Heading2</h2>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci labore fuga aut odio veritatis illo in est autem, vero cupiditate repudiandae quo, vel esse perspiciatis ut enim! Ut, eum assumenda?
		Corrupti ratione ad facere maiores dolore, quo molestias, illum omnis ipsam accusantium qui numquam ipsa fuga! Aspernatur quisquam itaque ducimus, quo voluptatum nesciunt soluta sapiente. Illo dolores non iure cupiditate!
		Temporibus veniam odit rem beatae quia pariatur libero, iure repellendus excepturi architecto, neque eaque blanditiis id harum ex modi deserunt molestias molestiae? Repudiandae perspiciatis neque impedit facilis reiciendis odio possimus?
		Provident quis, vero a sit quas nihil fugit eos, illo delectus natus rem perspiciatis perferendis explicabo veritatis consectetur est laudantium iure? Rerum ipsa natus sequi fugiat vitae minus voluptatum itaque!
		Voluptate odit non rem fugiat saepe ut consequuntur ipsa distinctio laboriosam, dolor nemo maiores aut nostrum inventore beatae officia, aliquid dignissimos reiciendis corrupti! Earum odio odit blanditiis laudantium ducimus iste.</p>
		<h3>Heading3</h3>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti odit modi dolorum natus ipsam sapiente qui fugiat maiores. Nam dignissimos, aperiam error magnam similique ipsa dolor velit eos modi praesentium!
		Fugiat deleniti eaque unde. Eveniet maiores fugiat tempore laudantium nihil magni possimus cumque, quis corrupti ut voluptate explicabo quibusdam magnam dolores fuga. Fuga officia nemo sequi accusantium rem placeat ea?
		Voluptates, reprehenderit? Delectus provident, porro laborum veniam illo perferendis minima praesentium hic? Suscipit quos sint molestiae repellat exercitationem quod ad possimus autem aspernatur, velit, provident, ullam cupiditate numquam cum consequatur.</p>
        <?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
			<header class="page-header alignwide">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header><!-- .page-header -->
		<?php endif; ?>

<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'temps/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
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
