<?php
    class Product{
        const PRODUCT_PRICE_META_KEY ='product_price'; # meta key product post
        const PRODUCT_SLIDER_IMAGE_META_KEY ='slider_image'; # meta key product slider image
        public static function price_separator($product_id){

            # invaid post id
            if (!$product_id) {
               return 0;
            }

            # get value
            $price = get_post_meta($product_id,self::PRODUCT_PRICE_META_KEY,true);

            # invalid value
            if (intval($price)> 0) {
                return Utility::persian_number(number_format($price));
            }

            return 0;
        }
    }