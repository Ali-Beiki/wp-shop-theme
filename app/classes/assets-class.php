<?php
    class Assets{
     # server lodaer file
     public static function css($file_name){
            $file_url= THEME_URL.'/assets/css/'.$file_name;
            return $file_url;
       }

       public static function js($file_name){
            $file_url= THEME_URL.'/assets/js/'.$file_name;
            return $file_url;        
        }
       
       public static function image($file_name){
            $file_url= THEME_URL.'/assets/img/'.$file_name;
            return $file_url;
       }

    }