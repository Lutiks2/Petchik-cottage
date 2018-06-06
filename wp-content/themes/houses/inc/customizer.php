<?php
/**
 * Houses Theme Customizer
 *
 * @package Houses
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function houses_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'houses_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'houses_customize_partial_blogdescription',
        ));
    }
//// Header settings

    $wp_customize->add_section('header_settings', array(
        'title' => __('Header settings'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    // add  header background
    $wp_customize->add_setting('set_background', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_background', array(
        'label' => __('Featured Home Page Image', 'houses'),
        'section' => 'header_settings',
        'type' => 'background',
    )));

    //add header greeting
    $wp_customize->add_setting('about', array(
        'default' => __('Homes, villas, town houses, country houses in the period from 45 to 90 days', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about', array(
        'label' => __('About', 'houses'),
        'section' => 'header_settings',
        'settings' => 'about',
        'type' => 'text',
    ));

    // add header button

    $wp_customize->add_setting('text_button', array(
        'default' => __('Contact us', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('text_button', array(
        'label' => __('Text button', 'houses'),
        'section' => 'header_settings',
        'settings' => 'text_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('url_button', array(
        'default' => __('Url button', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('url_button', array(
        'label' => __('Button url', 'houses'),
        'section' => 'header_settings',
        'settings' => 'url_button',
        'type' => 'dropdown-pages',
    ));
    $wp_customize->add_setting('header_button_color', array(
        'default' => '#1abc9c',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_button_color', array(
        'label' => 'Button Color',
        'section' => 'header_settings',
        'settings' => 'header_button_color',
    )));

    /////////// add section "about us"////////////
    $wp_customize->add_section('about_us', array(
        'title' => __('About us'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    //add "about us" description
    $wp_customize->add_setting('about_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Строительная компания Коттедж Плюс раб',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_description', array(
        'label' => __('Section description', 'houses'),
        'section' => 'about_us',
        'settings' => 'about_description',
        'type' => 'textarea',
    ));

    // add about-us background color
    $wp_customize->add_setting('backgr_color', array(
        'default' => '#eaeff3',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'backgr_color', array(
        'label' => 'Bg Color',
        'section' => 'about_us',
        'settings' => 'backgr_color',
    )));

    //////////////add our works section///////////
    ///
     $wp_customize->add_section('our_works', array(
        'title' => __('Our works'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add our works heading
    $wp_customize->add_setting('our_works_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Our works',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('our_works_heading', array(
        'label' => __('Section heading', 'houses'),
        'section' => 'our_works',
        'settings' => 'our_works_heading',
        'type' => 'text',
    ));

    //add "our works" description
    $wp_customize->add_setting('our_works_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'What we are doing',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('our_works_description', array(
        'label' => __('Our works description', 'houses'),
        'section' => 'our_works',
        'settings' => 'our_works_description',
        'type' => 'text',
    ));
    ////////////////section reviwes
    $wp_customize->add_section('reviwes', array(
        'title' => __('Reviwes settings'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    // add  reviwes background
    $wp_customize->add_setting('reviwes_background', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'reviwes_background', array(
        'label' => __('Reviwes Image', 'houses'),
        'section' => 'reviwes',
        'type' => 'background',
    )));
    ////add reviwes heading
    $wp_customize->add_setting('reviwes_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Reviwes',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('reviwes_heading', array(
        'label' => __('Section heading', 'houses'),
        'section' => 'reviwes',
        'settings' => 'reviwes_heading',
        'type' => 'text',
    ));
    ///////////////Prises section/////////////////

    $wp_customize->add_section('prices', array(
        'title' => __('Prices'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add prices heading
    $wp_customize->add_setting('prices_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Prices',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('prices_heading', array(
        'label' => __('Section heading', 'houses'),
        'section' => 'prices',
        'settings' => 'prices_heading',
        'type' => 'text',
    ));

    //add "prices" description
    $wp_customize->add_setting('prices_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Below you’ll find answers to a few of the most commonly asked questions we receive',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('prices_description', array(
        'label' => __('Prices description', 'houses'),
        'section' => 'prices',
        'settings' => 'prices_description',
        'type' => 'text',
    ));

    //////////////add FAQ section///////////
    ///
    $wp_customize->add_section('faq', array(
        'title' => __('FAQ'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add faq heading
    $wp_customize->add_setting('faq_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'FAQ',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('faq_heading', array(
        'label' => __('Section heading', 'houses'),
        'section' => 'faq',
        'settings' => 'faq_heading',
        'type' => 'text',
    ));

    //add "faq" description
    $wp_customize->add_setting('faq_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Below you’ll find answers to a few of the most commonly asked questions we reseive',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('faq_description', array(
        'label' => __('FAQ description', 'houses'),
        'section' => 'faq',
        'settings' => 'faq_description',
        'type' => 'text',
    ));
    // add faq background color
    $wp_customize->add_setting('faq_backgr_color', array(
        'default' => '#eaeff3',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'faq_backgr_color', array(
        'label' => 'Bg Color',
        'section' => 'faq',
        'settings' => 'faq_backgr_color',
    )));
    //////////////add Blog section///////////
    ///
    $wp_customize->add_section('blog', array(
        'title' => __('Blog'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add faq heading
    $wp_customize->add_setting('blog_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Blog',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('blog_heading', array(
        'label' => __('Section heading', 'houses'),
        'section' => 'blog',
        'settings' => 'blog_heading',
        'type' => 'text',
    ));

    //add "faq" description
    $wp_customize->add_setting('blog_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Below you’ll find answers to a few of the most commonly asked questions we reseive',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('blog_description', array(
        'label' => __('Blog description', 'houses'),
        'section' => 'blog',
        'settings' => 'blog_description',
        'type' => 'text',
    ));
    ///// add button blog


    $wp_customize->add_setting('blog_button', array(
        'default' => __('Reed all articles', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_button', array(
        'label' => __('Text button', 'houses'),
        'section' => 'blog',
        'settings' => 'blog_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('blog_url_button', array(
        'default' => __('Url button', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_url_button', array(
        'label' => __('Button url', 'houses'),
        'section' => 'blog',
        'settings' => 'blog_url_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('blog_button_color', array(
        'default' => '#1abc9c',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_button_color', array(
        'label' => 'Button Color',
        'section' => 'blog',
        'settings' => 'blog_button_color',
    )));

    ////////// add big-Footer ///////////


    $wp_customize->add_section('footer', array(
    'title' => __('Footer'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    // add footer background color
    $wp_customize->add_setting('footer_backgr_color', array(
        'default' => '#333C39',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_backgr_color', array(
        'label' => 'Bg Color',
        'section' => 'footer',
        'settings' => 'footer_backgr_color',
    )));
    //footer img
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Bg Logo',
        'section' => 'footer',
        'settings' => 'footer_logo',
    )));
    //add footer description
    $wp_customize->add_setting('footer_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Below you’ll find answers to a few of the most commonly asked questions we reseive answers to a few of the most commonly asked questions we reseive answers to a few of the most commonly asked questions we reseive',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_description', array(
        'label' => __('Footer description', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_description',
        'type' => 'textarea',
    ));
    ////add footer number heading
    $wp_customize->add_setting('footer_number_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Blog',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_number_heading', array(
        'label' => __('Phone Number', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_number_heading',
        'type' => 'text',
    ));
    //add footer number
    $wp_customize->add_setting('footer_number', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '+3 (068) 485 83 96',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_number', array(
        'label' => __('Footer_number', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_number',
        'type' => 'text',
    ));
    $wp_customize->add_setting('footer_number_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '(073) 030 75 89',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_number_2', array(
        'label' => __('Footer_number 2', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_number_2',
        'type' => 'text',
    ));
    //footer address heading
    $wp_customize->add_setting('footer_address_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Address',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_address_heading', array(
        'label' => __('Footer address heading', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_address_heading',
        'type' => 'text',
    ));
    //add footer address
    $wp_customize->add_setting('footer_address_street', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Dashkovicha str. 20, of. 301',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_address_street', array(
        'label' => __('Footer address', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_address_street',
        'type' => 'text',
    ));
    $wp_customize->add_setting('footer_address_city', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Cherkassy, Ukraine',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_address_city', array(
        'label' => __('Footer address', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_address_city',
        'type' => 'text',
    ));
    ///// add button footer

    $wp_customize->add_setting('footer_button', array(
        'default' => __('Contact us', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_button', array(
        'label' => __('Text button', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('footer_url_button', array(
        'default' => __('Url footer button', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_url_button', array(
        'label' => __('Button footer url', 'houses'),
        'section' => 'footer',
        'settings' => 'url_footer_button',
        'type' => 'dropdown-pages',
    ));
    $wp_customize->add_setting('footer_button_color', array(
        'default' => '#1abc9c',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_button_color', array(
        'label' => 'Button Footer Color',
        'section' => 'footer',
        'settings' => 'footer_button_color',
    )));

    ////// footer lite////////////////
    ///
    /// // add footer background color
    $wp_customize->add_setting('footer_lite_backgr_color', array(
        'default' => '#424E4A',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_lite_backgr_color', array(
        'label' => 'Footer Lite Bg Color',
        'section' => 'footer',
        'settings' => 'footer_lite_backgr_color',
    )));
    $wp_customize->add_setting('footer_copywrite', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Copyright 2015 Cottage Plus | All Rights Reserved',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('footer_copywrite', array(
        'label' => __('Copywrite', 'houses'),
        'section' => 'footer',
        'settings' => 'footer_copywrite',
        'type' => 'text',
    ));
    ///// add button related posts

    $wp_customize->add_section('related_posts', array(
        'title' => __('Related posts'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));


    $wp_customize->add_setting('related_posts_button', array(
        'default' => __('Reed more', 'houses'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('related_posts_button', array(
        'label' => __('Text button', 'houses'),
        'section' => 'related_posts',
        'settings' => 'related_posts_button',
        'type' => 'text',
    ));

    $wp_customize->add_setting('related_posts_button_color', array(
        'default' => '#1abc9c',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'related_posts_button_color', array(
        'label' => 'Button Color',
        'section' => 'related_posts',
        'settings' => 'related_posts_button_color',
    )));

}

add_action('customize_register', 'houses_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function houses_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function houses_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function houses_customize_preview_js()
{
    wp_enqueue_script('houses-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'houses_customize_preview_js');
