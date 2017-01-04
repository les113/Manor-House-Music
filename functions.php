<?php

/* sidebars */
	register_sidebar( array(
	'name' => __( 'sidebar-shop' ),
	'id' => 'sidebar-1',
	'before_widget' => '<div id="%1$s" class="widgetSidebar %2$s">', // required to pickup woocommerce widget classes
	'after_widget' => '</div>',
) );
	register_sidebar( array(
	'name' => __( 'footer1' ),
	'id' => 'sidebar-2',
	'before_widget' => '',
	'after_widget' => '',
) );
	register_sidebar( array(
	'name' => __( 'footer2' ),
	'id' => 'sidebar-3',
	'before_widget' => '',
	'after_widget' => '',
) );
	register_sidebar( array(
	'name' => __( 'socialLinks' ),
	'id' => 'sidebar-4',
	'before_widget' => '',
	'after_widget' => '',
) );
/*
	register_sidebar( array(
	'name' => __( 'homepage' ),
	'id' => 'sidebar-5',
	'before_widget' => '',
	'after_widget' => '',
) );
*/
	register_sidebar( array(
	'name' => __( 'sidebar-page' ),
	'id' => 'sidebar-6',
	'before_widget' => '',
	'after_widget' => '',
) );
	register_sidebar( array(
	'name' => __( 'sidebar-blog' ),
	'id' => 'sidebar-7',
	'before_widget' => '',
	'after_widget' => '',
) );

/* menus */
function register_my_menus() {
	register_nav_menus( array(
		'top-menu' => "Top Menu",
		'footer-menu' => "Footer Menu",
		'main-menu' => "Main Menu"
		) 
	);
}
add_action( 'init', 'register_my_menus' );

// Register custom navigation walker for bootstrap dropdown menu
   require_once('wp_bootstrap_navwalker.php');

// add 'active' class to menu on current page 
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

/* call google jquery */
function my_scripts_method() {
    wp_enqueue_script( 'jquery' );
}    
add_action('wp_enqueue_scripts', 'my_scripts_method');

/* admin login logo */
function login_logo() {
echo '<style type="text/css">
h1 a {background:url("http://www.root.lamtha2.co.uk/logos/lamtha2_logo.gif") !important; background-repeat:no-repeat !important; margin-left:50px !important; width:230px !important;}
</style>';}
add_action('login_head', 'login_logo');

// allow editor to access appearance menu - themes, widgets and menus
// get the the role object
$role_object = get_role( 'editor' );
// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );

// hide wp version from page source
remove_action('wp_head', 'wp_generator');

//remove query string from resources (e.g. plugings links to jquery cdn) to enable browser cacheing
function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// autosave interval
define('AUTOSAVE_INTERVAL', 300); // seconds

// allow shortcodes in widget
add_filter('widget_text', 'do_shortcode');

// add theme support for page featured image
add_theme_support( 'post-thumbnails' ); 





/****** woocommerce  ******/

// make theme compatible with woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// disable woocommerce theme stylesheet
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// load my woocommerce custom stylesheet after woocommerce default css
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );
function theme_enqueue_styles() {
	wp_enqueue_style( 'woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css');
}

// show category image on category archive page
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<div class="catimage dimmed"><img src="' . $image . '" alt="" /></div>';
		}
	}
}

// Removes category product count 
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
  return;
}
if (is_product_category()){
    global $wp_query;
    // get the query object
    $cat = $wp_query->get_queried_object();
    // get the thumbnail id user the term_id
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
    // get the image URL
    $image = wp_get_attachment_image( $thumbnail_id, 'feature-image' );
    // print the IMG HTML
    echo $image;
}

/* Change number of products per row */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // products per row
	}
}

// Number of products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );

// number of related products on product page
function woo_related_products_limit() {
  global $product;
	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}


// remove the 'product description' text from product detail page
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
return '';
}

// login problem 'you must enable cookies'
 setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
if ( SITECOOKIEPATH != COOKIEPATH )
    setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);


// image crop problem
// see https://wordpress.org/support/topic/image-crop-not-working-properly-in-ajax-editor/

function rblythe_image_resize_dimensions( $output, $orig_w, $orig_h, $dest_w, $dest_h, $crop  ) {
    if ( $crop ) {
        // crop the largest possible portion of the original image that we can size to $dest_w x $dest_h
        $aspect_ratio = $orig_w / $orig_h;
        $new_w = min($dest_w, $orig_w);
        $new_h = min($dest_h, $orig_h);

        if ( ! $new_w ) {
            $new_w = (int) round( $new_h * $aspect_ratio );
        }

        if ( ! $new_h ) {
            $new_h = (int) round( $new_w / $aspect_ratio );
        }

        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        if ( ! is_array( $crop ) || count( $crop ) !== 2 ) {
            $crop = array( 'center', 'center' );
        }

        list( $x, $y ) = $crop;

        if ( 'left' === $x ) {
            $s_x = 0;
        } elseif ( 'right' === $x ) {
            $s_x = $orig_w - $crop_w;
        } else {
            $s_x = floor( ( $orig_w - $crop_w ) / 2 );
        }

        if ( 'top' === $y ) {
            $s_y = 0;
        } elseif ( 'bottom' === $y ) {
            $s_y = $orig_h - $crop_h;
        } else {
            $s_y = floor( ( $orig_h - $crop_h ) / 2 );
        }
    } else {
        // don't crop, just resize using $dest_w x $dest_h as a maximum bounding box
        $crop_w = $orig_w;
        $crop_h = $orig_h;

        $s_x = 0;
        $s_y = 0;

        list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
    }

    /**ADDED checks to see if the src image has been cropped */
    $src_cropped = false;
    if ( !empty($_REQUEST['history']) ) {
        $changes = json_decode( wp_unslash($_REQUEST['history']) );
        foreach ( $changes as $key => $obj ) {
            if ($src_cropped = isset($obj->c))
                break;
        }
    }

    /**ADDED skip the WP evaulation if $src_cropped is true**/
    // if the resulting image would be the same size or larger we don't want to resize it
    if (!$src_cropped && $new_w >= $orig_w && $new_h >= $orig_h && $dest_w != $orig_w && $dest_h != $orig_h ) {
        return false;
    }

    // the return array matches the parameters to imagecopyresampled()
    // int dst_x, int dst_y, int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );

}
add_filter( 'image_resize_dimensions', 'rblythe_image_resize_dimensions', 10, 6);

// end image crop function

// allow shop manager to edit appearance (theme, menus etc)
function add_theme_caps() {
    $role = get_role( 'shop_manager' );
    $role->add_cap( 'edit_theme_options' ); 
}
add_action( 'admin_init', 'add_theme_caps');

?>