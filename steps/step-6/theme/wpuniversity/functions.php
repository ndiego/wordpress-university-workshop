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

/**
 * Register block styles.
 */
function wpu_register_block_styles() {
    register_block_style( 'core/media-text', array(
        'name'  => 'text-overlay',
        'label' => __( 'Text Overlay', 'wpu' ),
    ) );
}
add_action( 'init', 'wpu_register_block_styles' );

/**
 * Enqueue the block styles script.
 */
function wpu_enqueue_block_styles() {
    wp_enqueue_script(
        'wpu-block-styles',
        get_theme_file_uri( 'assets/js/block-styles.js' ),
        array( 
            'wp-blocks', 
            'wp-dom-ready', 
            'wp-edit-post' 
        )
    );
}
add_action( 'enqueue_block_editor_assets', 'wpu_enqueue_block_styles' );