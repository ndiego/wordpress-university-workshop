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

/**
 * Enqueue the block variations script.
 */
function wpu_enqueue_block_variations() {
    wp_enqueue_script(
        'wpu-block-variations',
        get_theme_file_uri( 'assets/js/block-variations.js' ),
        array( 
            'wp-blocks', 
            'wp-dom-ready', 
            'wp-edit-post' 
        )
    );
}
add_action( 'enqueue_block_editor_assets', 'wpu_enqueue_block_variations' );

/**
 * Enqueue per-block stylesheets.
 */
function wpu_enqueue_per_block_styles() {

	// Get all available block types.
	$block_types = glob( dirname( __FILE__ ) . '/assets/blocks/*/' );
	$block_types = array_map(
		function( $type_path ) { return basename( $type_path ); },
		$block_types
	);

	foreach ( $block_types as $block_type ) {

		// Get all available block styles of the given block type.
		$block_styles = glob( dirname( __FILE__ ) . '/assets/blocks/' . $block_type . '/*.css' );
		$block_styles = array_map(
			function( $styles_path ) { return basename( $styles_path, '.css' ); },
			$block_styles
		);

		foreach ( $block_styles as $block_style ) {

			// Enqueue individual block stylesheets.
			wp_enqueue_block_style(
				$block_type . '/' . $block_style,
				array(
					'handle' => 'wpu-block-' . $block_type . '-' . $block_style . '-styles',
					'src'    => get_theme_file_uri( 'assets/blocks/' . $block_type . '/' . $block_style . '.css' ),

					// Add "path" to allow inlining of block styles when possible.
					'path'   => get_theme_file_path( 'assets/blocks/' . $block_type . '/' . $block_style . '.css' ),
				),
			);
		}
	}
}
add_action( 'init', 'wpu_enqueue_per_block_styles' );