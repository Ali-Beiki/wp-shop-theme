<?php
    class View{
        public static function __callStatic($method, $args){
            
            # static method not found
            switch ($method) {
                case 'render':
                    self::render_views($args[0]);
                    break;
                case 'render_and_send_date':
                    self::render_views_and_send_data($args[0],$args[1]);
                    break;
               
            }
        }

        # simple render view
        private static function render_views($view_name){
            $view_name = str_replace(".",DIRECTORY_SEPARATOR,$view_name); # input example -> views.user.card ,output -> Linux : views/user/card or Win : views\user\card
            get_template_part('views'.DIRECTORY_SEPARATOR.$view_name);
        }

        # render and send data to view
        private static function render_views_and_send_data($view_name,$data =null){
            $view_name = str_replace('.',DIRECTORY_SEPARATOR,$view_name); # input example -> views.user.card ,output -> Linux : views/user/card or Win : views\user\card
            $view_file_path =THEME_VIEWS.$view_name.'.php'; # create view path

            # access condition
            if(is_file($view_file_path) and is_readable($view_file_path)){
                !empty($data) ? extract($data) : null;# define variable from array key
                include $view_file_path; 
            }
        }
    }