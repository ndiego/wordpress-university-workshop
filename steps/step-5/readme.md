# Step 7: Query Loops

## Steps

### 1. 
<img src="screenshots/query-loop.jpg">

<img src="screenshots/query-loop-composition.jpg" width="360px">

```css
/* Modify Query block styles to stretch content and fill container. */
.wp-block-query.is-style-stretch-content,
.wp-block-query.is-style-stretch-content .wp-block-post-template,
.wp-block-query.is-style-stretch-content .wp-block-post-template > li,
.wp-block-query.is-style-stretch-content .wp-block-post-template > li > *[class*='wp-block'] {
    height: 100%;
}
```

```css
/* Modify Cover bock styles to stretch full width. */
.wp-block-cover.has-custom-content-position[class*='-center'] .wp-block-cover__inner-container {
    width: 100%;
}
```

## Resources
- 

---
[← Previous](/steps/step-4/readme.md) &nbsp;&nbsp;|&nbsp;&nbsp; [Next →](/steps/step-6/readme.md)