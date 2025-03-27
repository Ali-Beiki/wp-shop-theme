<?php
    class Assets{
       public static function css_loader($file_name){
            $file_url= THEME_URL.'/accets/css/'.$file_name;
            return $file_url;
       }

       public static function js_loader($file_name){
            $file_url= THEME_URL.'/accets/js/'.$file_name;
            return $file_url;        
        }
       
       public static function img_loader($file_name){
            $file_url= THEME_URL.'/accets/img/'.$file_name;
            return $file_url;
       }

    }