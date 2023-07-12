const { addFilter } = wp.hooks;
const { select } = wp.data;

/**
 * Modifies the default typography settings for blocks with typography support.
 * 
 * @param {Object} settings - The original block settings.
 * 
 * @returns {Object} The modified block settings with updated typography defaults.
 */
function modifyTypographyDefaults( settings ) {

	// Only apply to blocks with typography support.
	if ( settings?.supports?.typography ) {
		return Object.assign( {}, settings, {
			supports: Object.assign( settings.supports, {
				typography: Object.assign( settings.supports.typography, {
					__experimentalDefaultControls: {
						fontAppearance: true,
						fontSize: true
					}
				} ),
			} ),
		} );
	}

	return settings;
}

addFilter(
	'blocks.registerBlockType',
	'modify-block-supports/modify-typography-defaults',
	modifyTypographyDefaults,
);

/**
 * If the user doesn't have permission to update settings (Editors,
 * Authors, etc.), disable the specified block settings when editing
 * the specified post types.
 * 
 * @see https://developer.wordpress.org/news/2023/05/curating-the-editor-experience-with-client-side-filters/
 *
 * @param {any}    settingValue The current value of the block setting.
 * @param {string} settingName  The name of the block setting to modify.
 * @param {string} clientId     The unique identifier for the block in the client.
 * @param {string} blockName    The name of the block type.
 * 
 * @return {any} Returns the modified setting value or the original setting value.
 */
function restrictBlockSettingsByUserPermissionsAndPostType(
	settingValue,
	settingName,
	clientId,
	blockName
) {
	const { canUser } = select( 'core' );
	const { getCurrentPostType } = select( 'core/editor' );

	// Check user permissions and get the current post type.
	const canUserUpdateSettings = canUser( 'update', 'settings' );
	const currentPostType = getCurrentPostType();

	// Disable block settings on these post types.
	const disabledPostTypes = [
		'post',
		// Add additional post types here.
	];

	// Disable these block settings.
	const disabledBlockSettings = [
		'border.color',
		'border.radius',
		'border.style',
		'border.width',
		// Add additional block settings here.
	];

	if (
		! canUserUpdateSettings &&
		disabledPostTypes.includes( currentPostType ) &&
		disabledBlockSettings.includes( settingName )
	) {
		return false;
	}

	return settingValue;
}

addFilter(
	'blockEditor.useSetting.before',
	'editor-curation-examples/useSetting.before/user-permissions-and-post-type',
	restrictBlockSettingsByUserPermissionsAndPostType
);

/**
 * If a 'core/button' block is within a 'core/cover' block, update the
 * color palette to only include 'Base" and 'Contrast'. Also disable custom
 * colors and gradients.
 * 
 * @see https://developer.wordpress.org/news/2023/05/curating-the-editor-experience-with-client-side-filters/
 *
 * @param {any}    settingValue The current value of the block setting.
 * @param {string} settingName  The name of the block setting to modify.
 * @param {string} clientId     The unique identifier for the block in the client.
 * @param {string} blockName    The name of the block type.
 * 
 * @return {any} Returns the modified setting value or the original setting value.
 */
function restrictButtonBlockSettingsByLocation(
	settingValue,
	settingName,
	clientId,
	blockName
) {
	if ( blockName === 'core/button' ) {
		const { getBlockParents, getBlockName } = select( 'core/block-editor' );

		// Get the block's parents and see if one is a 'core/cover' block.
		const blockParents = getBlockParents( clientId, true );
		const inCover = blockParents.some(
			( parentId ) => getBlockName( parentId ) === 'core/cover'
		);

		// Modify these block settings.
		const modifiedBlockSettings = {
			'color.custom': false,
			'color.customGradient': false,
			'color.defaultGradients': false,
			'color.defaultPalette': false,
			'color.gradients.theme': [],
			'color.palette.theme': [
				{
					color: '#ffffff',
					name: 'Base',
					slug: 'base',
				},
				{
					color: '#000000',
					name: 'Contrast',
					slug: 'contrast',
				},
                {
					color: '#3858e9',
					name: 'Primary',
					slug: 'primary',
				},
			],
			// Add additional block settings here.
		};

		if ( inCover && modifiedBlockSettings.hasOwnProperty( settingName ) ) {
			return modifiedBlockSettings[ settingName ];
		}
	}

	return settingValue;
}

addFilter(
	'blockEditor.useSetting.before',
	'editor-curation-examples/useSetting.before/button-location',
	restrictButtonBlockSettingsByLocation
);