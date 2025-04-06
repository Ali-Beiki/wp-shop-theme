<?php
    class Product{
        const PRICE_META_KEY ='product_price'; # meta key product post
        public static function price($product_id){

            # invaid post id
            if (!$product_id) {
               return 0;
            }

            # get value
            $price = get_post_meta($product_id,self::PRICE_META_KEY,true);

            # invalid value
            if (intval($price)> 0) {
                return Utility::persian_number(number_format($price));
            }

            return 0;
        }
    }