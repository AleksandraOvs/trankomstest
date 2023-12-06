
<?php
/*
 * The template for displaying the footer
 */

?>

<div id="popup-callback" class="popup" style="display: none;">
<?php 
if ($popup_head = carbon_get_theme_option('crb_contact_head')  ){
	echo '<h3>' . $popup_head . '</h3>';
	if ($popup_desc = carbon_get_theme_option('crb_contact_desc')) : echo '<p class="popup-description">' . $popup_desc . '</p>'; endif;

	//echo '<p>' . $popup_desc . '</p>';
};
?>
<?php
$shcode = carbon_get_theme_option('crb_contact_shortcode');
echo do_shortcode("$shcode"); ?>
</div>

<div id="popup-delcalc" class="popup" style="display: none;">
<?php 
if ($popupdelcalc_head = carbon_get_theme_option('crb_delcalc_head')  ){
	echo '<h3>' . $popupdelcalc_head . '</h3>';
	if ($popupdelcalc_desc = carbon_get_theme_option('crb_delcalc_desc')) : echo '<p class="popup-description">' . $popupdelcalc_desc . '</p>'; endif;

	//echo '<p>' . $popup_desc . '</p>';
};
?>
<script data-b24-form="inline/14/q9d87m" data-skip-moving="true">(function(w,d,u){var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})(window,document,'https://cdn-ru.bitrix24.ru/b23892814/crm/form/loader_14.js');</script>
</div>


</main>



<footer id="footer" class="footer">

<div class="fixed-container">

<div class="footer-left">
	<a href="<?php site_url(); ?>" class="footer__logo logo">
  			<?php
  				$footer_logo = get_theme_mod('footer_logo');
  				$img = wp_get_attachment_image_src($footer_logo, 'full');
  				if ($img) :
    		?>
    			<img src="<?php echo $img[0]; ?>" alt="">
  				<?php endif; ?>
	</a>

	<?php if (is_active_sidebar('footer-sidebar1')){
			?>
			<div class="footer__sidebar1">
			<?php	
				dynamic_sidebar( 'footer-sidebar1' );
				?>
			</div>
		<?php
			}
	?>

</div>

<div class="footer-center">
<?php
			        wp_nav_menu(
				        array(
					        'theme_location' => 'menu-footer',
					        'container' => 'nav',
					        'menu_class' => 'footer__menu',
							'title'	=> true
				        )
			        );
			    ?>
</div>

<div class="footer-right footer-contacts">
	
<?php 
						if( $contacts = carbon_get_theme_option('contacts' ) ) {
    				?>
   				    <ul class="footer__right__contacts">
        		        <?php
					        foreach( $contacts as $contact ) {
    			            ?>
     				        <li class="frc__contacts__item">
    					        <a href="<?php echo $contact[ 'crb_contact_link']; ?>" class="frc__contacts__item__link">
								<?php
									if ($contact['crb_contact_image']){
								?>
  				                    <?php
    				                    $img_contact = wp_get_attachment_image_url( $contact['crb_contact_image'], 'full' );
				                    ?>		
					                <img class="frc__contacts__item__link__img" width="25" height="25" src="<?php echo $img_contact; ?>" alt="<?php echo $contact[ 'crb_contact_name']; ?>">
									<?php } ?>

									<span>
										<?php echo $contact[ 'crb_contact_name']; ?>
									</span>
  						        </a>
    				        </li>
				            <?php
					            }
    			            ?>
    			    </ul>
    				<?php
					    }
					?>   
					<?php 
						if( $messengers = carbon_get_theme_option('messengers' ) ) {
    				?>
   				    <ul class="footer__menu__messengers flex align-center">
        		        <?php
					        foreach( $messengers as $messenger ) {
    			            ?>
     				        <li class="footer__menu__messengers__item">
    					        <a href="<?php echo $messenger[ 'crb_mes_link']; ?>">
  				                    <?php
    				                    $thumb_contact = wp_get_attachment_image_url( $messenger['crb_mes_image'], 'full' );
				                    ?>	
									<img width="25" height="25" src="<?php echo $thumb_contact; ?>" alt="<?php echo $messenger[ 'crb_mes_name']; ?>">
									<span>
										<?php echo $messenger[ 'crb_mes_name']; ?>
									</span>
  						        </a>
    				        </li>
				            <?php
					            }
    			            ?>
    			    </ul>
    				<?php
					    }
					?>   
					<?php 
						if( $button_link = carbon_get_theme_option('crb_but_link' ) ) {
						?>
							<a href="<?php echo carbon_get_theme_option('crb_but_link' ) ?>" data-fancybox class="button fill"><?php echo carbon_get_theme_option('crb_but_text' ) ?></a>
						<?php
						}
    				?>
			

	<?php //if (is_active_sidebar('footer-sidebar2')){
			?>
			<!-- <div class="footer__sidebar2">
			<?php	
				//dynamic_sidebar( 'footer-sidebar2' );
				?>
			</div> -->
		<?php
			//}
	?>
</div>

	
</div>

<div class="arrow-up">
<svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.4166 1.15529C12.3647 1.10387 12.308 1.0575 12.2473 1.0168L12.155 0.966794C12.0857 0.922317 12.0087 0.891019 11.928 0.874471L11.8319 0.847544C11.6845 0.818513 11.533 0.818513 11.3856 0.847544L11.2856 0.878319L11.1702 0.912939C11.1306 0.931257 11.0921 0.951807 11.0548 0.974489L10.974 1.02065C10.9103 1.06337 10.8511 1.11234 10.7971 1.16683L0.445356 11.507C0.316232 11.6075 0.209948 11.7343 0.133556 11.8789C0.0571638 12.0236 0.0124093 12.1829 0.00226167 12.3462C-0.00788593 12.5095 0.0168053 12.6731 0.0746971 12.8261C0.132589 12.9791 0.222357 13.1181 0.338049 13.2338C0.45374 13.3495 0.592709 13.4393 0.745737 13.4972C0.898765 13.555 1.06236 13.5797 1.22565 13.5696C1.38895 13.5594 1.54822 13.5147 1.69291 13.4383C1.83759 13.3619 1.96438 13.2556 2.06485 13.1265L10.447 4.75588L10.447 35.8226C10.447 36.1286 10.5686 36.4222 10.785 36.6386C11.0014 36.855 11.295 36.9766 11.601 36.9766C11.9071 36.9766 12.2006 36.855 12.4171 36.6386C12.6335 36.4222 12.7551 36.1286 12.7551 35.8226L12.7551 4.75588L21.1372 13.1265C21.3593 13.2993 21.6368 13.385 21.9175 13.3675C22.1983 13.3501 22.4631 13.2307 22.662 13.0317C22.8609 12.8328 22.9803 12.5681 22.9978 12.2873C23.0152 12.0065 22.9295 11.729 22.7567 11.507L12.4166 1.15529Z" fill="white"/>
</svg>
<div>


</footer>
				
<?php wp_footer(); ?>

</body>


</html>
</div><!-- /end of site-container -->

