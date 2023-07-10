# Step X – Block and template locking

## Steps

### 1. Block locking

1. Navigate to **Appearance → Editor → Library** and select the Feature Card pattern th 

### 2. Block Template locking

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
4. Switch to the Editor user and confirm that the locking UI is not available and neither is the Code Editor.

## Resources
- [Unlock the Power of the Block Locking API](https://wpengine.com/builders/block-locking-api/#restrict-locking-unlocking)

---
#### [← Previous](/steps/step-1/readme.md) ... [Next →](/steps/step-3/readme.md)