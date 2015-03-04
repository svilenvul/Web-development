<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
$header_options = array(
	'default-image'          => '',
	'width'                  => 950,
	'height'                 => 150,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $header_options );

function the_eldest_category() {
    $category = get_the_category();
    $parent = $category[0]->category_parent;
    if($parent !=0){
        $category = get_the_category_by_ID($parent);
    }else{
        $category=$category[0]->cat_name;
    };
    echo $category;
}