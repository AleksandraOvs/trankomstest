<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', ' Условия доставки')
    ->show_on_page( 'dostavka-oplata' )
    ->add_fields ( array (
        Field::make('complex', 'crb_delivery_items', 'Условия доставки')
             ->add_fields( array(
                 Field::make('text', 'crb_delivery_title', 'Вопрос')
                 ->set_width(20),
                 Field::make('rich_text', 'crb_delivery_content', 'Ответ')
                 ->set_width(60),
             ))
    ));

Container::make('post_meta', 'О компании')
->show_on_page( 'about' )
->add_tab(__(' Пункты "О компании" '), array (
    Field::make('complex', 'crb_about_items', 'Пункты о компании')
            ->add_fields( array(
                Field::make('text', 'crb_about_title', 'Заголовок')
                ->set_width(33),
                Field::make('rich_text', 'crb_about_content', 'Текст')
                ->set_width(33),
                Field::make('image', 'crb_about_img', 'Изображение')
                ->set_width(33)
            ))
))

->add_tab(__(' Преимущества '), array (
    Field::make('complex', 'crb_adv_items', 'Преимущества')
            ->add_fields( array(
                Field::make('text', 'crb_adv_item', 'Преимущество')
                ->set_width(70),
                Field::make('image', 'crb_adv_img', 'Преимущество иконка')
                ->set_width(30)
            ))
));

// Container::make('post_meta', 'Вкладки на странице товара')
//             ->show_on_post_type( 'product' )
//             ->add_fields( array(
//               //  Field::make('rich_text', 'crb_product_characteristics', 'Характеристики'),
//                 Field::make('rich_text', 'crb_product_delivery', 'Информация о доставке'),
//                 Field::make('rich_text', 'crb_product_pay', 'Информация об оплате')
        
// ));

Container::make('post_meta', 'Контакты')
            ->show_on_page( 'contacts' )
            ->add_fields( array(
                Field::make('image', 'crb_contact_item_img', 'Иконка-адрес')
                    ->set_width(25),
                Field::make('text', 'crb_contact_address', 'Адрес')
                    ->set_width(25),

                Field::make('image', 'crb_contact_item_phones_img', 'Иконка-телефоны')
                    ->set_width(25),
                Field::make('rich_text', 'crb_contact_item_phone', 'Телефоны')
                    ->set_width(25),

                Field::make('image', 'crb_contact_item_working_img', 'Иконка-режим работы')
                    ->set_width(25),
                Field::make('rich_text', 'crb_contact_item_working', 'Режим работы')
                    ->set_width(25),

                Field::make('complex', 'crb_contacts_messengers')
                    ->add_fields( array(
                        Field::make('image', 'crb_contact_item_working_img', 'Иконка мессенджера')
                            ->set_width(25),
                        Field::make('rich_text', 'crb_contact_item_working', 'Ссылка на мессенджер')
                            ->set_width(25),
                    )),

                Field::make('rich_text', 'crb_contact_map', 'Ссылка на карту'),

                Field::make('complex', 'crb_contacts_driving')
                    ->add_fields( array(
                        Field::make('image', 'crb_contacts_driving_img', 'Иконка мессенджера')
                    )),
));
