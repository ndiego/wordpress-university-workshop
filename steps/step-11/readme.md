# Step 11 – Block and template locking

## Steps

### 1. Block locking

1. Navigate to **Appearance → Editor → Library** and edit the Text Overlay Card pattern that was created earlier. 
2. Click on the Header block inside of the Media & Text block and click on the ︙ icon in the toolbar. 
3. Select "Lock", choose "Lock all", and click "Apply".
4. Notice that the block can no longer be moved or removed.
5. Apply the same settings to all other blocks inside of the Media & Text block.
6. Open the Code Editor and see that the attributes `{"lock":{"move":true,"remove":true}}` have been applied to each block.
7. Don't save the pattern. Refresh the page to clear the changes.

### 2. Block template locking

1. Now wrap the Media & Text block in a Group block.
2. Open the Code Editor and add the attribute `"templateLock":"contentOnly"` to the Group block.
3. Switch to the Visual Editor and experiment with editing the pattern as would a user.

### 3. Restricting access

1. Navigate to **Users → Add New** and create an "Editor" user with the role of `Editor`. It's recommended you set the password to something like `editor`.
2. In the theme's `functions.php` file, use the `block_editor_settings_all` and the `canLockBlocks` settings to disable the locking UI for all users except Administrators. 

```php
/**
 * Restrict access to the locking UI to Administrators.
 * 
 * @param array $settings Default editor settings.
 * @param WP_Block_Editor_Context $context The current block editor context.
 */
function wpu_restrict_locking_ui( $settings, $context ) {
    $settings[ 'canLockBlocks' ] = current_user_can( 'activate_plugins' );

    return $settings;
}
add_filter( 'block_editor_settings_all', 'wpu_restrict_locking_ui', 10, 2 );
```
3. Modify the locking code to also restrict access to the Code Editor to only Administrators using the `codeEditingEnabled` setting.
```php
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
```
4. Switch to the Editor user and confirm that the locking UI and the Code Editor are not available.

## Resources
- [Unlock the Power of the Block Locking API](https://wpengine.com/builders/block-locking-api/#restrict-locking-unlocking)
- [How to lock blocks and templates](https://fullsiteediting.com/how-to-lock-blocks-and-templates/)
- [Curating the Editor (Block Editor Handbook)](https://developer.wordpress.org/block-editor/how-to-guides/curating-the-editor-experience/#locking-apis)
- [Block Templates (Block Editor Handbook)](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-templates/#locking)
- [Builder Basics: How to Curate the Editing Experience](https://wordpress.tv/2022/11/10/builder-basics-how-to-curate-the-editing-experience/)

---
[← Previous](/steps/step-10/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-12/readme.md)