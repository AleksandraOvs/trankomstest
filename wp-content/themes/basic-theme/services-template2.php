<?php
/*
Template Name: Шаблон доп2.
Template Post Type: post
*/

get_header();

?>

<div class="services-header">
   <div class="fixed-container">
        <ul class="breadcrumbs__list">
            <?php echo true_breadcrumbs(); ?>
        </ul>
   </div>
</div>

<div class="services-content">
    <div class="fixed-container">
    <video class="post-header__video" pip="false" noaudio autoplay muted loop>
        <?php
            $gallery  = carbon_get_post_meta( get_the_ID(), 'crb_portfolio_sources' );
            foreach( $gallery  as $i => $item ){      
            echo '<source src="'.wp_get_attachment_url( $item ).'">';
            }
            ?>
    </video>
</div>
</div>



<div class="post__inner">
    <div class="post-container">
    
        
        <?php the_content() ?>
    </div>
</div>




            
<?php
get_footer();