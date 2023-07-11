# Step 6: Block Styles

## Steps

### 1. Setup: Design a Media & Text block

1. In the "Block Designs" page, create earlier, add a Media & Text block.
2. Set the image on the left (this should be the default).
3. In the content area, add (stock text below):
    - Heading block
    - 2 Paragraph blocks
    - Buttons block with one button that reads "Apply now" linked to the `/apply` page.
4. Save the page.
5. In the theme's `style.css` file, add the following custom CSS:
```css
/* Modify Media & Text styling to use spacing presets. */
.wp-block-media-text {
    grid-gap: var(--wp--preset--spacing--40);
}

.wp-block-media-text .wp-block-media-text__content {
    padding: 0;
}
```

<details>
    <summary>Stock Text</summary>

**Heading**

Web Development Certificate Program

**Paragraph 1**

WordPress University's Web Development Certificate Program equips students with the skills and knowledge needed to become proficient in designing and building websites using WordPress. Through a comprehensive curriculum, students will learn essential programming languages, explore advanced WordPress functionalities, and gain hands-on experience in creating dynamic and visually appealing websites. 

**Paragraph 2**

Graduates of this program will be well-prepared for careers as professional web developers or freelancers in the ever-growing field of web development.

</details>

### 2. Add a "Text Overlay" block style for Media & Text blocks
<img src="screenshots/text-overlay-card.jpg">

1. In the theme's `style.css` file, add the following custom CSS:

```css
/* Add the text overlay block style to Media & Text blocks. */ 
@media (min-width: 600px) {
    .wp-block-media-text.is-style-text-overlay .wp-block-media-text__content {
        background-color: var(--wp--preset--color--tertiary);
        margin-left: -100px;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: var(--wp--preset--spacing--40);
    }

    .wp-block-media-text.is-style-text-overlay.has-media-on-the-right .wp-block-media-text__content {
        margin-left: 0;
        margin-right: -100px;
        z-index: 1;
    }  
}
```
2. Add the class `is-style-text-overlay` to the Media & Text block that was created in Step 1.
3. Refresh the page and confirm that the text overlay styling is applied.
4. In the theme's `functions.php` register a block style to make it easier to apply this text overlay styling using the following code:
```php
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
```
5. Confirm that the block style "Text Overlay" now appears as an option for all Media & Text blocks under the Styles panel in the block settings sidebar.

### 3. Unregister the "Rounded" block style for Image blocks

1. In the theme's `/assets` folder, create a new `/js` and add the file `block-styles.js`.
2. In the theme's `functions.php` file, enqueue `block-styles.js` using the following code:
```php
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
```
3. In the `block-styles.js` file, add the following code to unregister the "Rounded" block style.
```js
/**
 * Unregister the "Rounded" block style for Image blocks.
 */
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
} );
```
## Resources
- [What Are Block Variations and How to Use Them](https://wpengine.com/builders/what-are-block-variations/)
- [Block Styles (Block Editor Handbook)](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/)
- [Creating custom block styles in WordPress themes](https://developer.wordpress.org/news/2023/02/creating-custom-block-styles-in-wordpress-themes/)

---
[← Previous](/steps/step-5/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-7/readme.md)