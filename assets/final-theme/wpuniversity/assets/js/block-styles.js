/**
 * Unregister the "Rounded" block style for Image blocks.
 */
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
} );