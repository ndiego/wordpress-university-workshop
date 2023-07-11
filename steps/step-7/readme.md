# Step 7: Block Variations

## Steps

### 1. Setup

1. In the theme's `/assets/js` folder, add the file `block-variations.js`.
2. In the theme's `functions.php` file, enqueue `block-variations.js` using the following code:
```php
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
```

### 2. Register a "Post Search" variation for Search blocks

1. In the `block-variations.js` file, add the following to register a variation of the Search block that will only return posts. All other post types will be excluded from the results.
```js
/**
 * Register the "Post Search" block variation for Search blocks.
 */
wp.domReady( function () {
    wp.blocks.registerBlockVariation( 'core/search', {
        name: 'wpu/post-search',
        title: 'Post Search',
        attributes: {
            query: {
                post_type: 'post'
            }
        }
    } );
} );
```
2. In the Editor, click the Inserter to add a new block. 
3. Search for "search" and see the new variation. Insert it into the page. 
4. Save the page and view it on the front end. 
5. Perform a search and see that the URL is querying the `post` post type.
```
.../?s=wordpress&post_type=post
```

### 3. Unregister the "YouTube" Embed block variation

1. In the `block-variations.js` file, add the following to unregister the "YouTube" variation of the Embed block.
```js
/**
 * Unregister the "YouTube" block variation for Embed blocks.
 */
wp.domReady( function () {
    wp.blocks.unregisterBlockVariation( 'core/embed', 'youtube' );
} );
```
2. In the Editor, click the Inserter to add a new block. 
3. Search for "YouTube," which will not be available.

## Resources
- [Block Variations (Block Editor Handbook)](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/)
- [Exploring the Power of Block Variations](https://wordpress.tv/2022/08/26/nick-diego-exploring-the-power-of-block-variations/)
- [Builder Basics: Block Styles vs. Block Variations](https://wordpress.tv/2023/03/01/builder-basics-block-styles-vs-block-variations/)

---
[← Previous](/steps/step-6/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-8/readme.md)