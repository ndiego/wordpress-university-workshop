# Step 10: Custom CSS in block themes

## Steps

### 1. Custom CSS in theme.json

1. In the `style.css` file, add the following CSS:
```
a, 
a:hover { 
    text-decoration-thickness: 1px !important; 
    text-underline-offset: 0.3ch;
}
```
2. Confirm that the link underline thickness is now thinner in the Editor and on the front end.
3. Remove the CSS from the `style.css` file. 
4. In the `theme.json` file, add the following JSON at the end of the styles section. 
```
"styles": {
    ...
    "css": "a, a:hover { text-decoration-thickness: 1px !important; text-underline-offset: 0.3ch; }"
},
```
5. Confirm that the link underline thickness is now thinner in the Editor and on the front end.
6. Navigate to **Appearance → Editor → Styles** and click the pencil icon or the canvas to edit Global Styles.
7. In the Styles panel, click "Additional CSS" and confirm the custom CSS added in `theme.json` is present.

### 2. Per-block stylesheets

1. In the `/assets` folder, create a new folder named `/blocks`.
2. Within that folder, create another folder named `/core` that contains four files:
    - `column.css`
    - `columns.css`
    - `cover.css`
    - `media-text.css`
3. Copy the block-specific custom CSS currently in `style.css` (added in prior steps) to the corresponding stylesheets.
4. In the `functions.php` file, register the individual block stylesheets using the [`wp_enqueue_block_style()`](https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/) function using the following code:
```php
/**
 * Enqueue per-block stylesheets.
 */
function wpu_enqueue_per_block_styles() {
    // Add the block name (with namespace) for each style.
    $blocks = array(
        'core/column'
        'core/columns',
        'core/cover',
        'core/media-text',
        'core/query'
    );

    // Loop through each block and enqueue its styles.
    foreach ( $blocks as $block ) {

        // Replace slash with hyphen for filename.
        $handle_slug = str_replace( '/', '-', $block );

        wp_enqueue_block_style( $block, array(
            'handle' => "wpu-block-{$handle_slug}-styles",
            'src'    => get_theme_file_uri( "assets/blocks/{$block}.css" ),
            'path'   => get_theme_file_path( "assets/blocks/{$block}.css" )
        ) );
    }
}
add_action( 'init', 'wpu_enqueue_per_block_styles' );
```
5. (Optional) Abstract this code so it works for any block:
```php
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
```

## Resources
- [Custom CSS for global styles and per block (Dev Note)](https://make.wordpress.org/core/2023/03/06/custom-css-for-global-styles-and-per-block/)
- [Per-block CSS with theme.json](https://developer.wordpress.org/news/2023/04/per-block-css-with-theme-json/)
- [Leveraging theme.json and per-block styles for more performant themes](https://developer.wordpress.org/news/2022/12/leveraging-theme-json-and-per-block-styles-for-more-performant-themes/)
- [Exploring Per-Block Stylesheets in Block Themes](https://wpengine.com/builders/per-block-stylesheets/)
- [Builder Basics: Adding Custom CSS to Block Themes](https://wordpress.tv/2023/02/08/builder-basics-adding-custom-css-to-block-themes/)

---
[← Previous](/steps/step-9/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-11/readme.md)
