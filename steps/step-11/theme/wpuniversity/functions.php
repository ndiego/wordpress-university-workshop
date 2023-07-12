<?php

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

/**
 * Restrict access to the locking UI and the Code Editor
 * to Administrators.
 * 
 * @param array $settings Default editor settings.
 * @param WP_Block_Editor_Context $context The current block editor context.
 */
function wpu_restrict_locking_ui( $settings, $context ) {
    $is_administrator = current_user_can( 'activate_plugins' );

    if ( ! $is_administrator ) {
        $settings[ 'canLockBlocks' ] = false;
        $settings[ 'codeEditingEnabled' ] = false;
    }

	return $settings;
}
add_filter( 'block_editor_settings_all', 'wpu_restrict_locking_ui', 10, 2 );
