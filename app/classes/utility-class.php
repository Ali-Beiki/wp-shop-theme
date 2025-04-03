<?php
    class Utility{
        # convert english number to persian number
        public static function persian_number($numbers){
            $persian_number =array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
            $english_number =array('0','1','2','3','4','5','6','7','8','9');

            # convert
            return str_replace($english_number,$persian_number,$numbers); 
        }
    }
    