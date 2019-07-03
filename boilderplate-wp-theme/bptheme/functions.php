<?php

date_default_timezone_set ( 'Europe/London' );
define('DISABLE_WP_CRON', true);

/***********************************************************************************************/
/* 	Define Constants */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/images');

/***********************************************************************************************/
/* 	Define Content width -- Required */
/***********************************************************************************************/

if ( ! isset( $content_width ) ) {
    $content_width = 992;
}


/***********************************************************************************************/
/* 	Theme text domain */
/***********************************************************************************************/

load_theme_textdomain( 'boilerplate', THEMEROOT .'/languages' );

/***********************************************************************************************/
/* 	Load Styles */
/***********************************************************************************************/

function theme_styles_load()
{

    // Register:
    wp_register_style( 'bootstrap-style', THEMEROOT . '/css/bootstrap.min.css');
    // Enqueue:
    wp_enqueue_style( 'bootstrap-style' );

    // Register:
    wp_register_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
    // Enqueue:
    wp_enqueue_style( 'fontawesome-css' );

    // Register:
    wp_register_style( 'animate-style', THEMEROOT . '/css/animate.css');
    // Enqueue:
//    wp_enqueue_style( 'animate-style' );

    // Register:
    wp_register_style( 'master-style', THEMEROOT . '/css/master.css');
    // Enqueue:
    wp_enqueue_style( 'master-style' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles_load' );


/***********************************************************************************************/
/* 	Load Scripts */
/***********************************************************************************************/

function theme_scripts_load()
{
//    // Deregister the included library
    wp_deregister_script( 'jquery' );
//
//    // Register the library again from Google's CDN
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), null, false );

    // Register:
    wp_register_script( 'bootstrap-script', THEMEROOT . '/js/bootstrap.min.js', array( 'jquery' ), false, true);
    // Enqueue:
    wp_enqueue_script( 'bootstrap-script' );

     Register:
    wp_register_script( 'custom-script', THEMEROOT . '/js/custom.js', array( 'jquery'), false, true);
    // Localize:
    wp_localize_script( 'custom-script', 'dataxObj', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'homeurl' => home_url(),
    ));
    // Enqueue:
    wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_load' );

/***********************************************************************************************/
/* 	Theme support */
/***********************************************************************************************/

add_theme_support( 'post-thumbnails' );

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/
function register_theme_menus(){
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu', 'vitae'),
            'footer-menu' => __('Footer Menu', 'vitae'),
            'footer-menu2' => __('Footer Menu 2', 'vitae'),
        )
    );
}
add_action('init', 'register_theme_menus');

/***********************************************************************************************/
/* Add ACF admin pages */
/***********************************************************************************************/

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Website Options',
        'menu_title'	=> 'Website Options',
        'menu_slug' 	=> 'website-options',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-admin-generic',
        'position' => 34
    ));
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');
// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');
// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');

function my_acf_init() {

    acf_update_setting('google_api_key', 'YOUR GOOGLE MAPS API KEY');
}

add_action('acf/init', 'my_acf_init');




/**
 * ADMIN AJAX EXAMPLE
 */

add_action("wp_ajax_send_example_form", "sendContactForm");
add_action("wp_ajax_nopriv_send_example_form", "sendContactForm");

function sendContactForm(){
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "send_form_nonce")) {
        exit("No naughty business please");
    }

    $returnData = [];

    $form_submission = array(
        'post_title'    => wp_strip_all_tags( $_REQUEST['first_name'] . ' ' . $_REQUEST['last_name']),
        'post_content'  => $_REQUEST['message'],
        'post_status'   => 'draft',
        'post_author'   => 1,
        'post_type'   => 'form_submission',
    );

    $returnData['submission'] = $form_submission;
    $returnData['finance_status'] = 'accepted';

    $postFields = [
        'content' => [
            'from' => ['name' => 'hello@reddico.co.uk', 'email' => 'hello@reddico.co.uk'],
            'subject' => 'Admin Ajax Sparkpost test email from ' . $_REQUEST['first_name'] . ' ' . $_REQUEST['last_name'],
            'text' => 'A new sparkpost test message has been sent. Please find details below:'.PHP_EOL.'Name: ' . $_REQUEST['first_name'] . ' ' . $_REQUEST['last_name'] . PHP_EOL . 'Email address: ' . $_REQUEST['email'] . PHP_EOL .'Message: ' . $_REQUEST['message'],
        ],
        "recipients"=> [
            [
                "address"=> [
                    "email"=> "jack.callow@reddico.co.uk"
                ]
            ],
//            [
//                "address"=> [
//                    "email"=> "ainsley@reddico.co.uk"
//                ]
//            ]
        ]
    ];


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.eu.sparkpost.com/api/v1/transmissions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postFields),
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Authorization: bdbc039a2456e1b2ef5f74a60bbb5b366c1c0df7",
            "Cache-Control: no-cache",
            "Content-Type: application/x-www-form-urlencoded"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);


    if($err) {
        $returnData['status'] = 'fail';
        $returnData['msg'] = 'Message not sent or saved to DB';
    } else {
        $postId = wp_insert_post($form_submission);
        if($postId > 0) {
            update_field( 'email_address', $_REQUEST['email'], $postId );
            $returnData['status'] = 'success';
            $returnData['msg'] = 'Email sent and saved to Database';
            $returnData['sparkpost'] = $response;
        } else {
            $returnData['status'] = 'success';
            $returnData['msg'] = 'Email sent but NOT saved to database';
            $returnData['sparkpost'] = $response;
        }
    }


    echo json_encode($returnData);
    die();
}

/**
 * CONTACT FORM POST TYPE
 */

// Register Custom Post Type
function form_submission_post_type() {

    $labels = array(
        'name'                  => _x( 'Form submissions', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Form submission', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Form submissions', 'text_domain' ),
        'name_admin_bar'        => __( 'Form submissions', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Add to item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Form submission', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'content', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'form_submission', $args );

}
add_action( 'init', 'form_submission_post_type', 0 );

?>