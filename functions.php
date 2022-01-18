<?php

//add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
//function my_theme_enqueue_styles() {
//    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
//        array( 'parenthandle' ), 
//        wp_get_theme()->get('Version') // this only works if you have Version in the style header
//    );
//}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
    //wp_enqueue_style( 'child-style', get_stylesheet_uri());
}



///// extra header menu

function register_top_header_menu() {
	register_nav_menu('top-header-menu', __( 'Top Header Menu' ));
}
add_action( 'init', 'register_top_header_menu' );



?>
