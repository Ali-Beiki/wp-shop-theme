<?PHP
    class Posttype{
        public static function setup(){
            add_action( 'init', function(){self::register_product_post_type();} );

            # add custom columns
            add_filter('manage_product_posts_columns',function($columns){ return self::add_custom_colunms_product($columns);});
            #show value in every row
            add_action( 'manage_product_posts_custom_column' , function($column,$post_id){self::show_product_price_value_columns($column,$post_id);}, 10, 2 );

        }

        #register custom post type
        private static function register_product_post_type(){
            $labels = array(
                'name'                  => _x( 'محصولات', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'محصول', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'محصولات', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'محصول', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'افزودن', 'textdomain' ),
                'add_new_item'          => __( 'افزودن محصول', 'textdomain' ),
                'new_item'              => __( ' محصول جدید', 'textdomain' ),
                'edit_item'             => __( ' محصول ویرایش', 'textdomain' ),
                'view_item'             => __( 'محصول نمایش ', 'textdomain' ),
                'all_items'             => __( 'محصولات همه ', 'textdomain' ),
                'search_items'          => __( ' محصولات جستجو', 'textdomain' ),
                'parent_item_colon'     => __( ' محصولات والد:', 'textdomain' ),
                'not_found'             => __( 'محصولات یافت نشد', 'textdomain' ),
                'not_found_in_trash'    => __( 'در زباله دان محصولی نیست', 'textdomain' ),
                'featured_image'        => _x( 'عکس محصول ', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'set_featured_image'    => _x( 'عکس محصول را اپلود کنید', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( ' حذف عکس محصول ', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'archives'              => _x( 'محصول archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
                'insert_into_item'      => _x( 'Insert into محصولات', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
                'uploaded_to_this_item' => _x( 'Uploaded to this محصولات', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
                'filter_items_list'     => _x( 'Filter محصولات list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
                'items_list_navigation' => _x( 'محصولات list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
                'items_list'            => _x( 'محصولات list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
            );
        
            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'product' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'taxonomies'         => array( 'category', 'post_tag' ),
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            );
        
            register_post_type( 'product', $args ); # register custome post type
        } 

        private static function add_custom_colunms_product($columns){
            #add custom columns to array columns
            $columns[Product::PRODUCT_PRICE_META_KEY] = ' قیمت ';
            return $columns;
        }

        private static function show_product_price_value_columns($column,$post_id){
            if($column == Product::PRODUCT_PRICE_META_KEY){
                $product_price = get_post_meta($post_id,Product::PRODUCT_PRICE_META_KEY,true) ; # get price in DB (in table {prefix}_postmeta)
                $product_price = !empty($product_price) ? $product_price : '0';
                $product_price = number_format($product_price); # formating price

                echo Utility::persian_number($product_price). ' تومان ';
            }
        }
    }