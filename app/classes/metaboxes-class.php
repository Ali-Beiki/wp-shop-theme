<?php
    class Metaboxes{

        public static function setup() {
            # initialize price meta box
            add_action( 'add_meta_boxes', function(){self::register_product_price_meta_box();} );
            add_action( 'save_post', function($post_id){self::save_product_price($post_id);} );
            
            # initialize slider image meta box
            add_action( 'add_meta_boxes', function(){self::register_product_slider_images_meta_box();} );
            add_action( 'save_post', function($post_id){self::save_product_slider_images($post_id);} );
        }

        // price metabox
        #add meta-box
        private static function register_product_price_meta_box(){
            add_meta_box( 'product_price_meta_box', ' قیمت محصول ', function($post){self::product_price_content_handler($post);}, 'product', 'side', 'high' );
        }

        # create content meta-box
        private static function product_price_content_handler($post){
            $price = (int) get_post_meta($post->ID,Product::PRODUCT_PRICE_META_KEY,true) ?? 10; # میکنیم true مقدار های متا دیتایی که در دیتابیس ارایه ای نیستند پارامتر سوم را
            View::render_and_send_date('admin.metabox.product.price_meta_box',array('price'=>$price));
        }

        #save product price in DB
        private static function save_product_price($post_id){
            if(isset($_POST[Product::PRODUCT_PRICE_META_KEY]) && intval($_POST[Product::PRODUCT_PRICE_META_KEY])>0) {
                update_post_meta($post_id,Product::PRODUCT_PRICE_META_KEY,intval($_POST[Product::PRODUCT_PRICE_META_KEY]));
            }
        }

        // slider image metabox
        #add meta-box
        private static function register_product_slider_images_meta_box(){
            add_meta_box( 'product_slider_images_meta_box', ' گالری محصول ', function($post){self::product_slider_images_content_handler($post);}, 'product', 'side', 'high' );
        }

        # create content meta-box
        private static function product_slider_images_content_handler($post){
            $slider_image = get_post_meta($post->ID, Product::PRODUCT_SLIDER_IMAGE_META_KEY, true);
            $slider_image = is_array($slider_image) ? $slider_image : [];

            
            wp_nonce_field('save_gallery_meta_box', 'gallery_meta_box_nonce'); // for security            
            View::render_and_send_date('admin.metabox.product.slider_meta_box',array('slider_image'=>$slider_image));

            
        }

        #save product price in DB
        private static function save_product_slider_images($post_id){
            // check Security
            if (!isset($_POST['gallery_meta_box_nonce']) || !wp_verify_nonce($_POST['gallery_meta_box_nonce'], 'save_gallery_meta_box')) return;

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; // وردپرس فعاله یا نه و اگه فعال باشه ادامه نمیده چون وردپرس خودش ذخیره میکنه Autosave برسی میکنه   

            if (isset($_POST[Product::PRODUCT_SLIDER_IMAGE_META_KEY])) {
                $images = explode(',', sanitize_text_field($_POST[Product::PRODUCT_SLIDER_IMAGE_META_KEY]));
                $images = array_filter(array_map('absint', $images)); // validation image id array
                update_post_meta($post_id, Product::PRODUCT_SLIDER_IMAGE_META_KEY, $images);
            }

            //  بارگذاری اسکریپت‌های مدیا با توجه به پست تایپ
            add_action('admin_enqueue_scripts', function($hook) {
                $screen = get_current_screen();

                if ($screen && $screen->post_type === 'product') {
                    wp_enqueue_media(); // Load Media Library ( لود کردن اسکریپت های  مدیا وردپرس که برای اپلود و.. هست )
                }
            });

            add_action('admin_footer', function() {
                $screen = get_current_screen();
                if ($screen->post_type !=='product') return;
            });
        }

        
    }