<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



Container::make('theme_options', 'Контакты')
    
        ->set_page_menu_position( 2 )
        ->set_icon ('dashicons-admin-generic')
        ->add_tab(__('Контакты'), array (
            Field::make('complex', 'contacts', 'Контакты')
            ->add_fields( array(
                Field::make('text', 'crb_contact_name', 'Название')
                    ->set_width(33),
                Field::make('image', 'crb_contact_image', 'Иконка контакта')
                    ->set_width(33),
                Field::make('text', 'crb_contact_link', 'Ссылка контакта')
                    ->set_width(33),
            )),
        ))

        ->add_tab(__('Мессенджеры'), array (
            Field::make('complex', 'messengers', 'Ссылки на мессенджеры')
            ->add_fields( array(

                Field::make('text', 'crb_mes_name', 'Название')

                    ->set_width(33),

                Field::make('text', 'crb_mes_link', 'Ссылка на контакт')

                    ->set_width(33),

                Field::make('image', 'crb_mes_image', 'Иконка контакта')

                    ->set_width(33),
            )),
        ));

        Container::make('theme_options', 'Первый экран')
        ->set_page_menu_position( 2 )
        ->set_icon ('dashicons-cover-image')
        ->add_fields( array (
            Field::make('complex', 'crb_slider_items', 'Слайдер первого экрана')
                 ->add_fields( array(
                     Field::make('image', 'crb_slider_image', 'Изображение слайда')
                     ->set_width(33),
                     Field::make('text', 'crb_slider_head', 'Первый заголовок')
                     ->set_width(33),
                     Field::make('text', 'crb_slider_description', 'Описание под заголовком')
                     ->set_width(33),
                     Field::make('text', 'crb_slider_but1', 'Название кнопки 1')
                     ->set_width(25),
                     Field::make('text', 'crb_slider_but1_link', 'Ссылка кнопки 1')
                     ->set_width(25),
                     Field::make('text', 'crb_slider_but2', 'Название кнопки 2')
                     ->set_width(25),
                     Field::make('text', 'crb_slider_but2_link', 'Ссылка кнопки 2')
                     ->set_width(25)
                   ))
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

        Container::make('theme_options', 'Popup окна')
    
        ->set_page_menu_position( 2 )
        ->set_icon ('dashicons-admin-page')
        
       // Field::make('complex', 'crb_popups', 'Попапы')
        ->add_tab(__('Обратный звонок'), array (

                Field::make('text', 'crb_but_text', 'Текст кнопки')
                    ->set_width(50),
                Field::make('text', 'crb_but_link', 'Ссылка кнопки')
                    ->set_width(50),
                Field::make('text', 'crb_contact_head', 'Заголовок окна')
                    ->set_width(33),
                Field::make('rich_text', 'crb_contact_desc', 'Описание')
                    ->set_width(33),
                Field::make('text', 'crb_contact_shortcode', 'Шорткод из CF7')
                    ->set_width(33),
                
        ));

