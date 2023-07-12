<?php

function wpu_setup() {

    // Enqueue editor styles.
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'wpu_setup' );

function wpu_enqueue_scripts() {

    // Register theme stylesheet.
    wp_register_style(
        'wpu-styles',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get( 'Version' ),
    );

    // Enqueue theme stylesheet.
    wp_enqueue_style( 'wpu-styles' );
}
add_action( 'wp_enqueue_scripts', 'wpu_enqueue_scripts' );