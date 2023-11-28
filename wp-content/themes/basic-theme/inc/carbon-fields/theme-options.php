<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



Container::make('theme_options', 'Контакты')
    
        ->set_page_menu_position( 2 )
        ->set_icon ('dashicons-admin-generic')
        ->add_tab(__('Контакты'), array (
            Field::make('complex', 'contacts', 'Ссылки на мессенджеры')
            ->add_fields( array(

                Field::make('text', 'contact_name', 'Название')

                    ->set_width(33),

                Field::make('text', 'contact_link', 'Ссылка на контакт')

                    ->set_width(33),

                Field::make('image', 'contact_image', 'Иконка контакта')

                    ->set_width(33),
            )),
            
        ));
    
        Container::make('theme_options', 'Отзывы')
    
        ->set_page_menu_position( 2 )
        ->set_icon ('dashicons-format-status')
        ->add_fields( array(
        Field::make('complex', 'crb_feedback', 'Отзывы')
        ->add_fields( array(
            Field::make('text', 'crb_fb_name', 'Имя клиента')
            ->set_width(15),
            Field::make('text', 'crb_fb_date', 'Дата отзыва')
            ->set_width(15),
            Field::make('rich_text', 'crb_fb_text', 'текст отзыва')
            ->set_width(70)
        )),

        ));