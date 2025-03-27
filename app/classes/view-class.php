<?php
    class View{
        public function __callStatic($method, $args){
            if($method=='render'){
                self::render($args[0]);
            }
        }

        private static function render($view_name){
            get_template_part('views'.DIRECTORY_SEPARATOR.$view_name);
        }
    }