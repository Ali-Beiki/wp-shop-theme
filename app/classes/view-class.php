<?php
    class View{
        public static function __callStatic($method, $args){
            if($method=='render'){
                self::render_views($args[0]);
            }
        }

        private static function render_views($view_name){
            get_template_part('views'.DIRECTORY_SEPARATOR.$view_name);
        }
    }