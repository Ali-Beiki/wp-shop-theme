<?php
function styles_scripts_register(){
    // for css
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '1.0.0');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', [], '1.0.0');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', [], '1.0.0');
    wp_enqueue_style('nouislider', get_template_directory_uri() . '/assets/css/nouislider.min.css', [], '1.0.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', [], '1.0.0');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.0');

    // Load jQuery (WordPress includes jQuery, just enqueue it)
    wp_enqueue_script('jquery');

    // for js
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('jquery-zoom', get_template_directory_uri() . '/assets/js/jquery.zoom.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('nouislider', get_template_directory_uri() . '/assets/js/nouislider.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'styles_scripts_register');



