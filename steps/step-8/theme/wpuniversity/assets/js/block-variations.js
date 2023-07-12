/**
 * Register the "Post Search" block variation for Search blocks.
 */
wp.domReady( function () {
    wp.blocks.registerBlockVariation( 'core/search', {
        name: 'wpu/post-search',
        title: 'Post Search',
        attributes: {
            placeholder: 'Search Posts',
            query: {
                post_type: 'post'
            }
        }
    } );
} );

/**
 * Unregister the "YouTube" block variation for Embed blocks.
 */
wp.domReady( function () {
    wp.blocks.unregisterBlockVariation( 'core/embed', 'youtube' );
} );