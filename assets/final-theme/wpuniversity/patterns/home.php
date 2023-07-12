<?php
/**
 * Title: home
 * Slug: wpuniversity/home
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:template-part {"slug":"header","area":"header","align":"full","theme":"wpuniversity"} /--></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/library-books.jpg","id":44,"dimRatio":30,"minHeight":300,"isDark":false,"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"clamp(2.5rem, 8vw, 4.5rem)"}}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light has-base-color has-text-color" style="margin-top:0;margin-bottom:clamp(2.5rem, 8vw, 4.5rem);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-44" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/library-books.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":1,"align":"wide"} -->
<h1 class="wp-block-heading alignwide has-text-align-left">University News</h1>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"clamp(3.75rem, 10vw, 7rem)"}}},"className":"is-style-mobile-reverse-order"} -->
<div class="wp-block-columns alignwide is-style-mobile-reverse-order"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:query {"queryId":2,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"clamp(1.5rem, 5vw, 2rem)","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"aspectRatio":"1","height":"100%"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="min-height:100%"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"large"} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":30,"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|tertiary","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"0"}},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--tertiary);border-top-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:0"><!-- wp:post-date {"fontSize":"x-small"} /-->

<!-- wp:post-terms {"term":"category","fontSize":"x-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous {"label":"Previous"} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"label":"Next"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group -->

<!-- wp:query-no-results -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"clamp(1.8rem, 1.8rem + ((1vw - 0.48rem) * 2.885), 3rem)","bottom":"clamp(1.8rem, 1.8rem + ((1vw - 0.48rem) * 2.885), 3rem)","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:clamp(1.8rem, 1.8rem + ((1vw - 0.48rem) * 2.885), 3rem);padding-right:var(--wp--preset--spacing--40);padding-bottom:clamp(1.8rem, 1.8rem + ((1vw - 0.48rem) * 2.885), 3rem);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading -->
<h2 class="wp-block-heading">Oops...</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","placeholder":"Add text or blocks that will display when a query returns no results.","fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size">It looks like no posts could be found. Try a search.</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","width":75,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true} /--></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"clamp(1.5rem, 5vw, 2rem)","bottom":"clamp(1.5rem, 5vw, 2rem)"}}},"backgroundColor":"tertiary","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:clamp(1.5rem, 5vw, 2rem);padding-right:var(--wp--preset--spacing--30);padding-bottom:clamp(1.5rem, 5vw, 2rem);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">Stay Connected</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Discover the latest happenings, insights, and updates in the dynamic world of WordPress at WordPress University's vibrant news blog.</p>
<!-- /wp:paragraph -->

<!-- wp:navigation {"ref":155,"textColor":"primary","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"6px"}},"fontSize":"medium"} /--></div>
<!-- /wp:group -->

<!-- wp:search {"label":"Search","buttonText":"Search","buttonUseIcon":true,"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","theme":"wpuniversity"} /-->