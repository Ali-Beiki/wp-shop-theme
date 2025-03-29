<?php

    require_once get_template_directory() . '/constants.php';
    require_once THEME_PATH . '/app/autoloader.php'; # میرود و اسم کلاسی که موجود نیست رو میگیره به عنوان ورودی spl_autoload_register هر وقت از کلاسی شئ ساخته شد و ان کلاس نباشد به این سراغ تابع 

    Intialize::setup();

    // echo THEME_PATH;


    /*
    interface Shipping_Method{
        public function get_name();
    }

    class ShippingByVIP implements Shipping_Method{
        protected $name;

        public function __construct(){
            $this->name =' تحویل با ماشین ';
        }
        public function get_name(){
            return $this->name;
        }
    }

    class ShippingByAir implements Shipping_Method{
        protected $name;

        public function __construct(){
            $this->name =' تحویل با هواپیما ';
        }
        public function get_name(){
            return $this->name;
        }
    }

    class ShippingByPost implements Shipping_Method{
        protected $name;

        public function __construct(){
            $this->name =' تحویل با پست ';
        }
        public function get_name(){
            return $this->name;
        }
    }

    #add method other

    class ShippingByTiBaks implements Shipping_Method{
        protected $name;

        public function __construct(){
            $this->name =' تحویل با تیباکس ';
        }
        public function get_name(){
            return $this->name;
        }
    }

    add_filter('shipping_methods_custom_hook','shipping_methods_custom_hook_handler');

    function shipping_methods_custom_hook_handler($shipping_methods){
        $shipping_methods[]='ShippingByTiBaks';
        return $shipping_methods;
    }

    $shipping_methods = array('ShippingByVIP','ShippingByAir','ShippingByPost'); # list methods
    $shipping_methods = apply_filters( 'shipping_methods_custom_hook',$shipping_methods );

    


    foreach ($shipping_methods as $shipping_method) {
        $object = new $shipping_method;
        echo "<input type='radio' name='shipping_method'>".$object->get_name();
    }
    */