<?php

function blackbird_child_edit_stylesheet() {
    if (!is_admin()) {
        wp_dequeue_style('blackbird_stylesheet', get_template_directory_uri() . "/style.css", '', '', 'all');
        wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/css/output.min.css');
        /*wp_enqueue_style('960.js', get_stylesheet_directory_uri() . '/css/960_24_col_responsive.css');
        wp_enqueue_style('reset', get_stylesheet_directory_uri() . '/css/reset.css');
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.css', array('parent-style', 'reset', '960.js'));*/
    }
}

add_action('wp_enqueue_scripts', 'blackbird_child_edit_stylesheet',0);

function the_eldest_category() {
    $category = get_the_category();
    $parent = $category[0]->category_parent;
    if ($parent != 0) {
        $category = get_the_category_by_ID($parent);
    } else {
        $category = $category[0]->cat_name;
    };
    echo $category;
}

function blackbird_child_wp_enqueue_scripts() {
    if (!is_admin()) {
        //dequeue scripts to add minified and combined
        wp_dequeue_script('blackbird-ddsmoothmenu');
        wp_dequeue_script('blckbird-flex-slider');
        wp_dequeue_script('blackbird-testimonial');
        wp_dequeue_script('blackbird-validate');
        wp_dequeue_script('blackbird-custom');


        wp_enqueue_script('output', get_stylesheet_directory_uri() . '/js/output.min.js', array('jquery'));
    }
}

add_action('wp_enqueue_scripts', 'blackbird_child_wp_enqueue_scripts', 20);


if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
    wp_enqueue_script('livereload');
}

