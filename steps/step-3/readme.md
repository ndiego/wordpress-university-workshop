# Step 3: Introduction to theme.json

## 1. Clean up
1. In the `/assets/fonts` folder, remove extra `/dm-sans` and `/ibm-plex-mono` folders.
2. Place EB Garmond fonts in a `/eb-garamond` folder.
3. Update the `theme.json` file to reflect the new file path for EB Garmond font files.
4. Remove the `:visited` color styles from the global button element.
5. Remove the `text` color styles from the link element in the Post Content block.

## 2. Styles and Settings
1. Style the Site Title block in Site Editor. Save changes to the theme and see them show up in theme.json.
    - Font Family to EB Garmond
    - Size to Large
2. Replace the `"fluid": false` specification on the `x-large` font size with:

```json
"fluid": {
	"max": "2.75rem",
	"min": "2.25rem"
},
```
3. Add the name `"name": "XX Large"` to the `xx-large` font size.
4. Add a new `x-small` font size:
```json
{
	"fluid": {
		"max": ".8125rem",
		"min": "0.6875rem"
	},
	"name": "Extra Small",
	"size": ".8125rem",
	"slug": "x-small"
},
```
5. Add a new smallest spacing size (refer to the [Fluid Type Scale Calculator](https://www.fluid-type-scale.com/)):
```json
{
	"name": "1",
	"size": "clamp(1rem, 0.91vw + 0.77rem, 1.5rem)",
	"slug": "20"
},
```
6. Renumber the names of all other spacing sizes.
7. Add custom variables for border-radius:
```json
"custom": {
	"borderRadius": {
		"default": "0",
		"small": "2px",
		"medium": "8px",
		"large": "16px",
		"round": "1000px"
	}
},
```
8. Update the global button element border `radius` setting to use the new custom small variable `var(--wp--custom--border-radius--small)`. 
9. Add custom button element styles to the Search block.
```json
"core/search": {
	"elements": {
		"button": {
			"spacing": {
				"margin": {
					"left": "2px !important"
				},
				"padding": {
					"bottom": "0.6em",
					"left": "0.6em",
					"right": "0.6em",
					"top": "0.6em"
				}
			}
		}
	}
},
```

### 3. Templates and Template Parts
1. Remove the Blog (Alternate) template specification under `customTemplates` and then remove the `blog-alternate.html` file from the templates folder in the theme.
2. Remove the Post Meta template part specification under `templateParts` and then remove the `post-meta.html` file from the parts folder in the theme.

### 4. Style Variations
1. Delete the `/styles` folder. This theme will only have one style variation.

## Resources
- [Global Settings & Styles (theme.json)](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Theme.json Version 2 (Living reference)](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/)
- [Intrinsic design, theming, and rethinking how to design with WordPress](https://developer.wordpress.org/news/2023/02/intrinsic-design-theming-and-rethinking-how-to-design-with-wordpress/)
- [Fluid Type Scale Calculator](https://www.fluid-type-scale.com/)
- [Everything you need to know about spacing in block themes](https://developer.wordpress.org/news/2023/03/everything-you-need-to-know-about-spacing-in-block-themes/)
- [Builder Basics: Demystifying theme.json and Global Styles](https://wordpress.tv/2022/12/09/builder-basics-demystifying-theme-json-and-global-styles/)

---
[← Previous](/steps/step-2/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-4/readme.md)


