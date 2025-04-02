<?php
    class Autoloader{
        public function __construct(){
            spl_autoload_register(array($this,'autoload')); # اگر کلاسی وجود نداشت در اسکوپ اسم کلاس رو به تابع پاس میده
        }

        public function autoload($class_name){
            $full_file_path=$this->convert_class_name_to_file_class($class_name);
            

            if(is_file($full_file_path) and file_exists($full_file_path) and is_readable($full_file_path)){
                // echo 'autoload success full :'.$full_file_path .'<br>';
                include $full_file_path;
            }else{
                // echo 'Autoloader Calss ,not found file :'.$full_file_path.'<br>';
            }
        }

        private function convert_class_name_to_file_class($class_name){
            $class = strtolower($class_name); # هست classes کوچک کردن اسم کلاس برای درست کردن اسم فایل کلاس که در پوشه
            $class = $class.'-class.php';

            $path_class =THEME_PATH.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.$class;
    
            return $path_class;
        }
    }

    new Autoloader();