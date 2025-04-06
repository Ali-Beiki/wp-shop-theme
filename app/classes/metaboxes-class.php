<?php
    class Metaboxes{

        public static function setup() {
            add_action( 'add_meta_boxes', function(){self::register_product_price_meta_box();} );
            add_action( 'save_post', function($post_id){self::save_product_price($post_id);} );
            
        }

        #add meta-box
        private static function register_product_price_meta_box(){
            add_meta_box( 'product_price_meta_box', ' قیمت محصول ', function($post){self::product_price_content_handler($post);}, 'product', 'side', 'high' );
        }

        # create content meta-box
        private static function product_price_content_handler($post){
            $price = (int) get_post_meta($post->ID,Product::PRICE_META_KEY,true) ?? 10; # میکنیم true مقدار های متا دیتایی که در دیتابیس ارایه ای نیستند پارامتر سوم را
            View::render_and_send_date('admin.metabox.product.price_meta_box',array('price'=>$price));
        }

        #save product price in DB
        private static function save_product_price($post_id){
            if(isset($_POST[Product::PRICE_META_KEY]) && intval($_POST[Product::PRICE_META_KEY])>0) {
                update_post_meta($post_id,Product::PRICE_META_KEY,intval($_POST[Product::PRICE_META_KEY]));
            }
        }
        
    }