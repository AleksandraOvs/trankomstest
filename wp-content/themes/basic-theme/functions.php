<?php
/**
 * basic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package basic
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'crb_register_custom_fields');

function crb_register_custom_fields(){
	require_once __DIR__ . '/../../plugins/carbon-fields/theme-options.php' ;
	require_once __DIR__ . '/../../plugins/carbon-fields/post-meta.php' ;
}

//show current template for dev

add_filter( 'template_include', 'var_template_include', 1000 );
  function var_template_include( $t ){
	  $GLOBALS['current_theme_template'] = basename($t);
	  return $t;
  }
  
  function get_current_template( $echo = false ) {
	  if( !isset( $GLOBALS['current_theme_template'] ) )
		  return false;
	  if( $echo )
		  echo $GLOBALS['current_theme_template'];
	  else
		  return $GLOBALS['current_theme_template'];
  }
 
  if ( ! function_exists( 'basic_setup' ) ) :

	function basic_setup() {

		load_theme_textdomain( 'basic', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Верхнее меню', 'basic' ),
				'menu-footer' => esc_html__( 'Меню в футере', 'basic' ),
			)
		);

		// wp_nav_menu( array( 
		// 	'theme_location' => 'menu-header',
		// 	'walker' => new Walker_Nav_Menu
		// ) );
	
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'basic_setup' );

function site_scripts(){
	wp_deregister_script('jquery');
    wp_enqueue_script ('jquery', get_stylesheet_directory_uri() . '/inc/jquery-3.7.1.js', array(), null, true);
    wp_enqueue_script ('js-accordion-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), null, true);
	wp_enqueue_script ('js-tabs-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), null, true);
	wp_enqueue_script ('fancy_scripts', get_stylesheet_directory_uri() . '/inc/fancybox/jquery.fancybox.min.js', array('jquery'), null, true);
   // wp_enqueue_script ('js-accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array('jquery'), null, true);
    wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
    wp_enqueue_style ('swiper-style', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('slider-scripts', 'https://unpkg.com/swiper/swiper-bundle.min.js',array('jquery'), null, true);
    wp_enqueue_script ('swiper-scripts', get_stylesheet_directory_uri() . '/js/slider-scripts.js',array('jquery'), null, true);
	wp_enqueue_style ('fancy_styles', get_stylesheet_directory_uri() . '/inc/fancybox/jquery.fancybox.min.css', array(), time());
	wp_style_add_data( 'theme-style', 'rtl', 'replace' );
	add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
	
	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/fonts.css', array(), time() );
	wp_enqueue_style( 'basic-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), time() );
    wp_enqueue_style( 'header-styles', get_stylesheet_directory_uri() . '/css/header-style.css', array(), time() );
	
	wp_enqueue_style( 'dashicons' );

	
    
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

add_action( 'admin_enqueue_scripts', function(){
	wp_enqueue_style( 'my_wp_admin', get_template_directory_uri() .'/css/wp-admin.css' );
  }, 99 );


  add_action( 'widgets_init', 'register_widgets' );
function register_widgets(){
    register_sidebar( array(
		'name'          => 'Сайдбар на странице',
		'id'            => "page-sidebar1",
		'description'   => 'Сайдбар для страницы',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
	) );

	register_sidebar( array(
		'name'          => 'Сайдбар в футере-1',
		'id'            => "footer-sidebar1",
		'description'   => 'Сайдбар для футера',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
	) );

	register_sidebar( array(
		'name'          => 'Сайдбар в футере-2',
		'id'            => "footer-sidebar2",
		'description'   => 'Сайдбар для футера',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
	) );
}

//displayed logo

function my_customize_register( $wp_customize ) {
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        //'height' => '48',
        'width' => '280',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(

        'section' => 'title_tagline',
        'label' => 'Логотип Header'

    )));
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'section' => 'title_tagline',
        'label' => 'Логотип Footer'
    )));
}
add_action( 'customize_register', 'my_customize_register' );

function true_breadcrumbs(){
 
	// получаем номер текущей страницы
	$page_num = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 
	$separator = ' / '; //  разделяем обычным слэшем, но можете чем угодно другим
 
	// если главная страница сайта
	if( is_front_page() ){
 
		if( $page_num > 1 ) {
			echo '<a href="' . site_url() . '">Главная</a>' . $separator . $page_num . '-я страница';
		} else {
			echo 'Вы находитесь на главной странице';
		}
 
	} else { // не главная
 
		echo '<a href="' . site_url() . '">Главная</a>' . $separator;
 
 
		if( is_single() ){ // записи
 
			the_category( ', ' ); echo $separator; the_title();
 
		} elseif ( is_page() ){ // страницы WordPress 
 
			the_title();
 
		} elseif ( is_category() ) {
 
			single_cat_title();
 
		} elseif( is_tag() ) {
 
			single_tag_title();
 
		} elseif ( is_day() ) { // архивы (по дням)
 
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $separator;
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $separator;
			echo get_the_time('d');
 
		} elseif ( is_month() ) { // архивы (по месяцам)
 
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $separator;
			echo get_the_time('F');
 
		} elseif ( is_year() ) { // архивы (по годам)
 
			echo get_the_time( 'Y' );
 
		} elseif ( is_author() ) { // архивы по авторам
 
			global $author;
			$userdata = get_userdata( $author );
			echo 'Опубликовал(а) ' . $userdata->display_name;
 
		} elseif ( is_404() ) { // если страницы не существует
 
			echo 'Ошибка 404';
 
		}
 
		if ( $page_num > 1 ) { // номер текущей страницы
			echo ' (' . $page_num . '-я страница)';
		}
 
	}
 
}


function custom_pagination() {
    global $wp_query;
	$max = $wp_query->max_num_pages;  
    $pages = paginate_links( array(
   
    'type' => 'array',
    'prev_next' => TRUE,
    'prev_text' => '<svg width="41" height="8" viewBox="0 0 41 8" fill="none" xmlns="http://www.w3.org/2000/svg">
    //         <path d="M0.646446 3.64644C0.451183 3.84171 0.451183 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82842L1.70711 4L4.53553 1.17157C4.7308 0.976308 4.7308 0.659725 4.53553 0.464463C4.34027 0.269201 4.02369 0.269201 3.82843 0.464463L0.646446 3.64644ZM41 3.5L1 3.5L1 4.5L41 4.5L41 3.5Z" fill="#18223D"/>
    //         </svg>',
    'next_text' => '<svg width="41" height="8" viewBox="0 0 41 8" fill="none" xmlns="http://www.w3.org/2000/svg">
    //         <path d="M40.3536 3.64644C40.5488 3.84171 40.5488 4.15829 40.3536 4.35355L37.1716 7.53553C36.9763 7.73079 36.6597 7.73079 36.4645 7.53553C36.2692 7.34027 36.2692 7.02369 36.4645 6.82842L39.2929 4L36.4645 1.17157C36.2692 0.976308 36.2692 0.659725 36.4645 0.464463C36.6597 0.269201 36.9763 0.269201 37.1716 0.464463L40.3536 3.64644ZM-4.37114e-08 3.5L40 3.5L40 4.5L4.37114e-08 4.5L-4.37114e-08 3.5Z" fill="#18223D"/>
    //         </svg>',
    ) );
	
    if( is_array( $pages ) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<ul class="pagination__list"';
    foreach ( $pages as $page ) {
    echo '<li class="pagination__item">' . $page . '</li>';
    }
    echo '</ul>';
    }
    }
