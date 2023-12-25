<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



// Container::make('post_meta', 'Видео')
 
// ->show_on_template('services-template.php')
// ->add_fields (array (

//     Field::make( 'media_gallery', 'crb_media_gallery' )
//     ->set_type( array( 'image', 'video' ) )
    
        
// ));

Container::make('post_meta', 'Добавить в портфолио')
            ->show_on_template('services-template.php')
            ->add_fields (array (
               Field::make('text', 'crb_portfolio_link', 'Youtube link')
               ->set_width(33),
               Field::make('image', 'crb_portfolio_placeholder', 'Project Placeholder')
               ->set_width(33),
               Field::make('media_gallery', 'crb_portfolio_sources', 'Project Sources')
               ->set_width(33)
               -> set_type('video')
           ));
    