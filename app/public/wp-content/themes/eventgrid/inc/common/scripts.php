<?php 



function convent_enqueue_styles()
{
    // Theme main stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2', 'all');

    // LineIcons
    wp_enqueue_style('lineicons', get_template_directory_uri() . '/assets/css/LineIcons.3.0.css', array(), '3.0', 'all');

    // Animate
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.1.1', 'all');

    // Tiny Slider
    wp_enqueue_style('tiny-slider', get_template_directory_uri() . '/assets/css/tiny-slider.css', array(), '2.9.3', 'all');

    // GLightbox
    wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css', array(), '3.0.0', 'all');

    // Zoombox
    wp_enqueue_style('zoombox', get_template_directory_uri() . '/assets/css/zoombox.min.css', array(), '2.0', 'all');

    // Main CSS
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
    // style CSS
    wp_enqueue_style('style', get_template_directory_uri().'/style.css', array(), '1.0', 'all');

}
add_action('wp_enqueue_scripts', 'convent_enqueue_styles');


function convent_enqueue_scripts()
{
    // jQuery (already included in WordPress)
    wp_enqueue_script('jquery');

    // Bootstrap
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '5.0.2', true);

    // WOW.js
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.1.2', true);

    // Tiny Slider
    wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/assets/js/tiny-slider.js', array(), '2.9.3', true);

    // GLightbox
    wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/js/glightbox.min.js', array(), '3.0.0', true);

    // Count Up
    wp_enqueue_script('count-up', get_template_directory_uri() . '/assets/js/count-up.min.js', array(), '1.9.3', true);

    // Zoombox
    wp_enqueue_script('zoombox', get_template_directory_uri() . '/assets/js/zoombox.min.js', array(), '2.0', true);

    // Main JS
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'convent_enqueue_scripts');
























?>