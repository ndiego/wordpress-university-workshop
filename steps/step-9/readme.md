# Step 9: Patterns

## Steps

### 1. Create a synced pattern in the Editor

1. Create a design in the Post Editor composed of any number of blocks.
2. Wrap the blocks in a container block (Group, Columns, etc.). This is not required, but it makes it easier to manage the pattern.
3. On the container block, select the ︙ icon in the toolbar and select "Create Pattern".
4. Give the pattern a name, but **do not** toggle "Keep all pattern instances in sync", we will do that next.
5. Click "Save".
6. View the newly saved pattern in the Inserter under the Patterns tab.
7. Insert the pattern into the Post Editor.
8. Next, navigate to **Pages → All Pages → Page Elements**.
9. Edit the page and select the Media & Text block that makes up the Text Overlay Card. 
10. Select the ︙ icon in the toolbar and select "Create Pattern".
11. Name the pattern "Text Overlay Card" and save it as an un-synced pattern.

### 2. Create an un-synced pattern in the Editor

1. Create another block design (or the same one as before) in the Post Editor.
2. Wrap the blocks in a container block.
3. On the container block, select the ︙ icon in the toolbar and select "Create Pattern".
4. Give the pattern a name, and **toggle** "Keep all pattern instances in sync."
5. Click "Save".
6. View the newly saved pattern in the Inserter under the "Synced Pattern" tab. This is denoted by the two diamond icon.
7. Insert the pattern into the Post Editor. Do this twice.
8. Edit one of the patterns and notice how all other instances of the synced pattern are also updated.

### 3. Add an un-synced pattern to the theme.

1. In the theme's `/patterns` folder, create a new `feature-card.php` file.
2. At the top of the file, add the following: 
```php
<?php
/**
 * Title: Text Overlay Card
 * Slug: wpuniversity/text-overlay-card
 * Categories: featured
 * Keywords: Text overlay, feature card, call to action
 */
?>
```
3. Locate to the corresponding saved un-synced pattern (created in Step 1) in the Site Editor by navigating to **Appearance → Editor → Library → Custom patterns**. 
4. Edit the pattern and access the Code Editor. 
5. Copy all of the block markup and add it to the `text-overlay-card.php` file in the theme.
5. In the theme's `assets` folder, create a new folder called `images`.
6. Place the [lecture-hall-1.jpg](/assets/photos/lecture-hall-1.jpg) file in this folder. 
7. In the `text-overlay-card.php` file, replace the media URLs with:

```php
<?php echo esc_url( get_template_directory_uri() ). '/assets/images/lecture-hall-1.jpg';?>
```
8. Remove the `mediaLink` attribute. The final code will look like this:

```php
<?php
/**
 * Title: Text Overlay Card
 * Slug: wpuniversity/text-overlay-card
 * Categories: featured
 * Keywords: Text overlay, feature card, call to action
 */
?>
<!-- wp:media-text {"align":"wide","mediaId":41,"mediaType":"image","verticalAlignment":"center","imageFill":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"is-style-text-overlay"} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center is-image-fill is-style-text-overlay" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><figure class="wp-block-media-text__media" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ). '/assets/images/lecture-hall-1.jpg';?>);background-position:50% 50%">
<img src="<?php echo esc_url( get_template_directory_uri() ). '/assets/images/lecture-hall-1.jpg';?>" alt="" class="wp-image-41 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size" style="margin-top:0;margin-bottom:0">Web Development Certificate Program</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">WordPress University's Web Development Certificate Program equips students with the skills and knowledge needed to become proficient in designing and building websites using WordPress. Through a comprehensive curriculum, students will learn essential programming languages, explore advanced WordPress functionalities, and gain hands-on experience in creating dynamic and visually appealing websites. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Graduates of this program will be well-prepared for careers as professional web developers or freelancers in the ever-growing field of web development.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button">Apply now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text -->
```

6. Save the file and go back to the Libary section of the Site Editor. Under the `Featured` folder, you should see the new pattern.

## Resources
- [Patterns (Block Editor Handbook)](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/)
- [What are Contextual Patterns in WordPress?](https://wpengine.com/builders/wordpress-contextual-patterns/)
- [What are Page Creation Patterns in WordPress?](https://wpengine.com/builders/page-creation-patterns/)
- [What are Semantic Patterns in WordPress?](https://wpengine.com/builders/semantic-patterns/)
- [Builder Basics: Taking Block Patterns to the Next Level](https://wordpress.tv/2022/06/13/nick-diego-builder-basics-everything-you-need-to-know-about-patterns/)
- [Builder Basics: Everything You Need to Know About Patterns](https://wordpress.tv/2022/06/13/nick-diego-builder-basics-everything-you-need-to-know-about-patterns/)

---
[← Previous](/steps/step-8/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-10/readme.md)