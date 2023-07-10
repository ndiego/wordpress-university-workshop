# Step 3: Introduction to theme.json

## 1. Clean up
1. Remove extra font files and place EB Garmond in a folder.
2. Update theme.json to reflect the new file path for EB Garmond font files.
3. Remove the `:visited` color styles from the global button element.
4. Remove the `text` color styles from the link element in the Post Content block.

## 2. Styles and Settings
1. Style Site Title block in Site Editor. Save changes to theme and see them show up in theme.json.
    - Font Family to EB Garmond
    - Size to Medium
2. Replace the `"fluid": false` specification on the `x-large` font size with:

```
"fluid": {
	"max": "2.75rem",
	"min": "2.25rem"
}
```
3. Add the name `"name": "XX Large"` to the `xx-large` font size.
4. Add a new `x-small` font size:
```
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
```
{
	"name": "1",
	"size": "clamp(1rem, 0.91vw + 0.77rem, 1.5rem)",
	"slug": "20"
},
```
6. Renumber the names of all other spacing sizes.
7. Add custom variables for border-radius:
```
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
8. Update button element border `radius` setting to use the new custom small variable `--wp--custom--border-radius--small`. 
9. Add custom button element styles to the Search block.
```
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

## Resources
- [Global Settings & Styles (theme.json)](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Theme.json Version 2 (Living reference)](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/)
- [Intrinsic design, theming, and rethinking how to design with WordPress](https://developer.wordpress.org/news/2023/02/intrinsic-design-theming-and-rethinking-how-to-design-with-wordpress/)
- [Fluid Type Scale Calculator](https://www.fluid-type-scale.com/)
- [Everything you need to know about spacing in block themes](https://developer.wordpress.org/news/2023/03/everything-you-need-to-know-about-spacing-in-block-themes/)

#### [← Previous](/steps/step-2/readme.md) ... [Next →](/steps/step-4/readme.md)


