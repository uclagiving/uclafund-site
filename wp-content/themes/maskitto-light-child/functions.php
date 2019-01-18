<?php
/**
 * Theme functions file
 */


/**
 * Enqueue parent theme styles first
 * Replaces previous method using @import
 * <http://codex.wordpress.org/Child_Themes>
 */

add_action( 'wp_enqueue_scripts', 'maskitto_light_parent_theme_style', 99 );

function maskitto_light_parent_theme_style() {
	global $maskitto_light;

    if( !isset( $maskitto_light['minity-status'] ) || $maskitto_light['minity-status'] == 1 ) :

        wp_enqueue_style( 'maskitto-light-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'maskitto-light-default-style', get_template_directory_uri() . '/css/style.css' );
        wp_enqueue_style( 'maskitto-light-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
        wp_enqueue_style( 'maskitto-light-animate', get_template_directory_uri() . '/css/animate.min.css' );
        wp_enqueue_style( 'maskitto-light-jquery-tosrus-min', get_template_directory_uri() . '/css/jquery.tosrus.all.css' );

        wp_enqueue_script( 'maskitto-light-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'maskitto-light-jquery-tosrus-min', get_template_directory_uri() . '/js/jquery.tosrus.min.all.js', array( 'jquery' ));
        wp_enqueue_script( 'maskitto-light-waypoint-min', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ));
        wp_enqueue_script( 'maskitto-light-counterup-min', get_template_directory_uri() . '/js/jquery.counterup.min.js', array( 'jquery' ));

    else :

        wp_enqueue_style( 'maskitto-light-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
        wp_enqueue_style( 'maskitto-light-default-style', get_template_directory_uri() . '/css/style.css' );
        wp_enqueue_style( 'maskitto-light-font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
        wp_enqueue_style( 'maskitto-light-animate', get_template_directory_uri() . '/css/animate.css' );
        wp_enqueue_style( 'maskitto-light-jquery-tosrus', get_template_directory_uri() . '/css/jquery.tosrus.all.css' );

        wp_enqueue_script( 'maskitto-light-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ));
        wp_enqueue_script( 'maskitto-light-jquery-tosrus', get_template_directory_uri() . '/js/jquery.tosrus.min.all.js', array( 'jquery' ));
        wp_enqueue_script( 'maskitto-light-waypoint', get_template_directory_uri() . '/js/jquery.waypoints.js', array( 'jquery' ));
        wp_enqueue_script( 'maskitto-light-counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array( 'jquery' ));

    endif;


    wp_enqueue_style( 'maskitto-light-responsive-style', get_template_directory_uri() . '/css/responsive.css' );
    wp_enqueue_style( 'maskitto-light-owl-carousel', get_template_directory_uri() . '/css/slick.css' );

    wp_enqueue_script( 'maskitto-light-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'maskitto-light-smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ) );
    wp_enqueue_script( 'maskitto-light-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'masonry' ) );
    wp_enqueue_script( 'maskitto-light-child-custom-scripts', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array( 'masonry' ) );
    


    if( isset($maskitto_light['body-font']['font-family']) && $maskitto_light['body-font']['font-family'] ) {
        wp_enqueue_style( 'maskitto-light-google-fonts', '//fonts.googleapis.com/css?family='.preg_replace("/ /", "+", $maskitto_light['body-font']['font-family']).':300italic,400italic,300,400,600,700' );
    } else {
        wp_enqueue_style( 'maskitto-light-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,300,400,600,700' );
    }
}

/**
 * Custom Language files
 */

add_action( 'after_setup_theme', 'maskitto_light_child_setup' );
function maskitto_light_child_setup() {
    load_child_theme_textdomain( 'maskitto-light', get_stylesheet_directory() . '/languages' );
}


/**
 * Add your custom functions below
 */




// ENQUEUE the CHILD THEME stylesheet with logic pairing stylesheets with templates
// ENQUEUE the CHILD THEME stylesheet with logic pairing stylesheets with templates
// ENQUEUE the CHILD THEME stylesheet with logic pairing stylesheets with templates

add_action( 'wp_enqueue_scripts', 'maskitto_child_theme_style', 110 );
function maskitto_child_theme_style() {

    // ENQUEUE the RESPONSIVE style
    // ENQUEUE the MAIN style
    wp_register_style( 'main-style', get_stylesheet_directory_uri() . "/style-min.css", '', '');
    wp_register_style( 'gaw-responsive', get_stylesheet_directory_uri() . "/css/responsive-min.css", '', '');
    wp_enqueue_style( 'main-style' );
    wp_enqueue_style( 'gaw-responsive', array( 'main-style' ) );

    // ENQUEUE the TEMPLATE styles
    if( is_page_template( 'templates/gaw-generic.php' ) ) {
        wp_register_style( 'gaw-generic', get_stylesheet_directory_uri() . "/css/generic-style-min.css", '', '');
        wp_enqueue_style( 'gaw-generic', array( 'main-style' ) );
    } else if( is_page_template( 'templates/gaw-luskin.php' ) ) {
        wp_register_style( 'gaw-luskin', get_stylesheet_directory_uri() . "/css/luskin-style-min.css", '', '');
        wp_enqueue_style( 'gaw-luskin', array( 'main-style' ) );
    } else if( is_page_template( 'templates/gaw-engineering.php' ) ) {
        wp_register_style( 'gaw-engineering', get_stylesheet_directory_uri() . "/css/engineering-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-engineering', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-fielding.php' ) ) {
        wp_register_style( 'gaw-fielding', get_stylesheet_directory_uri() . "/css/fielding-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-fielding', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-dentistry.php' ) ) {
        wp_register_style( 'gaw-dentistry', get_stylesheet_directory_uri() . "/css/dentistry-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-dentistry', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-law.php' ) ) {
        wp_register_style( 'gaw-law', get_stylesheet_directory_uri() . "/css/law-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-law', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-nursing.php' ) ) {
        wp_register_style( 'gaw-nursing', get_stylesheet_directory_uri() . "/css/nursing-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-nursing', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-arts.php' ) ) {
        wp_register_style( 'gaw-arts', get_stylesheet_directory_uri() . "/css/arts-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-arts', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-anderson.php' ) ) {
        wp_register_style( 'gaw-anderson', get_stylesheet_directory_uri() . "/css/anderson-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-anderson', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-library.php' ) ) {
        wp_register_style( 'gaw-library', get_stylesheet_directory_uri() . "/css/library-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-library', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-music.php' ) ) {
        wp_register_style( 'gaw-music', get_stylesheet_directory_uri() . "/css/music-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-music', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-tft.php' ) ) {
        wp_register_style( 'gaw-tft', get_stylesheet_directory_uri() . "/css/tft-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-tft', array( 'main-style') );
    } else if( is_page_template( 'templates/gaw-gseis.php' ) ) {
        wp_register_style( 'gaw-gseis', get_stylesheet_directory_uri() . "/css/gseis-style-min.css", '', '');
        wp_enqueue_style ( 'gaw-gseis', array( 'main-style') );
    } else if( is_page_template( 'templates/westward.php' ) ) {
        ///Deregister Jquery and Load newer version
        wp_deregister_script( 'jquery' );
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js');
        wp_enqueue_script('jquery');
        
        /*Deregister and Dequeue main stylesheeet. Note that this removes style for MENU DONATE button, which may be good anyway as Donate button seems superfluous on this page
        wp_dequeue_style( 'main-style' );
        wp_deregister_style( 'main-style' );
        */

        //Register and enqueue the page specific stylesheet
        wp_register_style( 'westward-style', get_stylesheet_directory_uri() . "/css/westward-style.css", '', '');
        wp_enqueue_style( 'westward-style' );
        
        //Register and enqueue the Jquery doc
        wp_register_script( 'westward-js', get_stylesheet_directory_uri() . "/js/westward.js", '', '');
        wp_enqueue_script( 'westward-js', array( 'jquery' ) );
        /* 
        SomeDayMaybe: remove bootstrap, and then reload new version (3.4 -> 3.7)
        https://wordpress.stackexchange.com/questions/189985/how-to-properly-dequeue-scripts-and-styles-in-child-theme
        Might possibly adversely affect other GAW pages if visiting after this page
        */

    } else {
        //ENQUEUE the responsive styles  
        //ENQUEUE the main CHILD THEME stylesheet LAST to supersede other styles 
        //wp_enqueue_style( 'maskitto-light-child-style', get_stylesheet_directory_uri() . '/style.css' );
        //wp_enqueue_style( 'maskitto-light-child-responsive', get_stylesheet_directory_uri() . '/responsive-min.css', array( 'maskitto-light-child-style') );
    }

    
}




