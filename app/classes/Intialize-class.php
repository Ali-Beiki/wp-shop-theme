<?php
class Intialize{

    public static function setup(){
        add_action('wp_enqueue_scripts', function(){self::styles_scripts_register();});
        add_action('after_setup_theme',function(){self::feature_theme();});
        add_filter('show_admin_bar',"__return_false"); # میده false یک تابع در وردپرس هست که خروجی __return_false غیر فعال کردن بخش منو ادمین بالای وردپرس
    }

    private static function styles_scripts_register(){
    // for css
        wp_enqueue_style('bootstrap', Assets::css('bootstrap.min.css'), [], '1.0.0');
        wp_enqueue_style('slick', Assets::css('slick.css'), [], '1.0.0');
        wp_enqueue_style('slick-theme', Assets::css('slick-theme.css'), [], '1.0.0');
        wp_enqueue_style('nouislider', Assets::css('nouislider.min.css'), [], '1.0.0');
        wp_enqueue_style('font-awesome', Assets::css('font-awesome.min.css'), [], '1.0.0');
        wp_enqueue_style('style', Assets::css('style.css'), [], '1.0.0');

        // Load jQuery (WordPress includes jQuery, just enqueue it)
        wp_enqueue_script('jquery');

        // for js
        wp_enqueue_script('bootstrap', Assets::js('bootstrap.min.js'), ['jquery'], '1.0.0', true);
        wp_enqueue_script('jquery-zoom', Assets::js('jquery.zoom.min.js'), ['jquery'], '1.0.0', true);
        wp_enqueue_script('nouislider', Assets::js('nouislider.min.js'), ['jquery'], '1.0.0', true);
        wp_enqueue_script('slick', Assets::js('slick.min.js'), ['jquery'], '1.0.0', true);
        wp_enqueue_script('main', Assets::js('main.js'), ['jquery'], '1.0.0', true);
    }

    private static function feature_theme(){
        add_theme_support('title-tag'); # created in wp_head()
        add_theme_support('post-thumbnails');
    }
    
}
