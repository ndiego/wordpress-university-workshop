# Step 4: Columns, Groups, Rows, and Stacks 

## 1. Setup
1. Create a new page titled "Designs", or something similar.

## 2. Design the site header
![img](/steps/step-4/screenshots/site-header.jpg)

1. Design the site header using the following composition (not a complete list):
	- Site Logo image width is `32px`
	- Site Title has a `Large` font size
	- Outer Row block has `wide` width
	- Group container has a `Primary` background, top/bottom padding of `0.85rem`, and right/left padding of `2`
	- Search block uses "Button only" styling

<img src="screenshots/site-header-composition.jpg" width="360">

### 3. Design the site footer
![img](/steps/step-4/screenshots/site-footer.jpg)

1. Design the site header using the following composition (not a complete list):
	- Site Logo image width is `100px`
	- Site Title has a `Large` font size
	- Paragraphs are `Small` and `Extra Small`
	- Outer Columns block has `wide` width
	- Group container has a `Primary` background, top/bottom padding of `4`, and right/left padding of `2`
	- The Social Icons block is set to "Logos Only"

	<img src="screenshots/site-footer-composition.jpg" width="360">
2. On mobile, the right column should appear first. This will require some custom CSS. Add the custom CSS class `is-style-mobile-reverse-order` to the Columns block. In the theme's `style.css` file, add the following code: 
```css
/* Reverse column order on mobile in the Columns block. */
@media (max-width: 781px) {
    .wp-block-columns.is-style-mobile-reverse-order {
        flex-direction: column-reverse;
    }
}
```
3. The content of the rigth column should also be aligned left on mobile. This will also require some custom CSS. Add the custom CSS class `is-style-mobile-content-align-left` to the right Column block. In the theme's `style.css` file, add the following code:
```css
/* Align content in a Column block left on mobile. */
@media (max-width: 781px) {
    .wp-block-column.is-style-mobile-content-align-left {
        text-align: left;
    }

    .wp-block-column.is-style-mobile-content-align-left * {
        align-items: flex-start !important;
        justify-content: flex-start !important;
    }
}
```
4. Confirm that the footer appears correctly on mobile. 

<img src="screenshots/site-footer-mobile.jpg" width="360">

### 4. Design the site homepage banner

![img](/steps/step-4/screenshots/site-banner.jpg)

1. Design the site homepage banner using the following composition (not a complete list):
	- Cover is full width and has a minimum height of `100vh`
	- Cover has padding set to `0`
	- Group has a background color of `#1E1E1EB3`
	- Group has a left border width of `4px` in `Quaternary`
	- Group has padding and block spacing set to `3` 

	<img src="screenshots/site-banner-composition.jpg" width="360">

## Resources
- [Builder Basics: Building with Columns, Groups, Rows and Stacks](https://wordpress.tv/2022/12/02/builder-basics-building-with-columns-groups-rows-and-stacks/)

---
[← Previous](/steps/step-3/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-5/readme.md)


