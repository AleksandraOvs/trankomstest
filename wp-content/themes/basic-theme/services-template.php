<?php
/*
Template Name: Шаблон доп.
Template Post Type: post
*/

get_header();

?>

<div class="post-header">
    <video class="post-header__video" pip="false" noaudio autoplay muted loop>
        <?php
            $gallery  = carbon_get_post_meta( get_the_ID(), 'crb_portfolio_sources' );
            foreach( $gallery  as $i => $item ){      
            echo '<source src="'.wp_get_attachment_url( $item ).'">';
            }
            ?>
    </video>
</div>

<div class="post__inner">
    <div class="post-container">
        <div class="post__inner__head">
            <h2 class="toright"><?php the_title(); ?></h2>
            
            <ul class="breadcrumbs__list">
            <?php echo true_breadcrumbs(); ?>
        </ul>

        </div>
        
        <?php the_content() ?>
    </div>
</div>




            
<?php
get_footer();