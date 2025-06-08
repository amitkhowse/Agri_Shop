<?php

function my_custom_wp_block_patterns()
{
    register_block_pattern(
        'my-patterns/my-custom-pattern',
        array(
            'title'=> __('Transparent Cover', 'transparent-cover'),
            'description' => _x('Includes a cover block, two columns with headings and text, a separator and a single-column text block.', 'Block pattern description', 'page-intro-block'),
            'content'=> '<!-- wp:vayu-blocks/advance-container {"id":"2b8bd8de-af4e-4efe-934a-800a9ce3216c","uniqueID":"_8bd8de-af6","variationSelected":true,"direction":"row"} -->
<div id="" class="wp-block-vayu-blocks-advance-container th-container-outside-wrapper alignfull th-c_8bd8de-af6 boxed-content"><div class="th-inside-content-wrap th-con"><!-- wp:vayu-blocks/advance-container {"id":"e4e34d50-a271-4162-b773-79e3f3083163","uniqueID":"_e34d50-a21","boxedcontentWidth":524} -->
<div id="" class="wp-block-vayu-blocks-advance-container th-container-outside-wrapper  th-c_e34d50-a21 boxed-content"><div class="th-inside-content-wrap th-con"><!-- wp:vayu-blocks/advance-slider {"slideslength":2,"classNamemain":"block-editor-block-list__block wp-block  \n         \n         wp-block-vayu-blocks-advance-slider"} -->
<!-- wp:vayu-blocks/image {"uniqueId":"-56hqj63","image":"http://localhost/wp63/wp-content/plugins/vayu-blocks/public/build/block/advance-slider/../../images/no-image.69a0483a.png","overlayshow":true,"parentBlock":"vayu-blocks/advance-container","classNamemain":"block-editor-block-list__block wp-block swiper-slide custom-margin \n         \n         \n         wp-block-vayu-blocks-image","className":"swiper-slide","metadata":{"name":"Slide"}} -->
<section class="wp-block-vayu-blocks-image my-class swiper-slide"><!-- wp:vayu-blocks/advance-heading {"id":"6a7c62c0-fed9-4774-948e-84a3f35cfb0a","uniqueID":"_7c62c0-fe1","fontFamily":"cardo","fontVariant":"bold","lineHeight":0.8,"className":"vayu-blocks-heading-innerblock"} -->
<h2 id="_7c62c0-fe1" class="wp-block-vayu-blocks-advance-heading wp-block-th-advance-heading th-h_7c62c0-fe1 vayu-blocks-heading-innerblock">Image Title...</h2>
<!-- /wp:vayu-blocks/advance-heading -->

<!-- wp:paragraph {"align":"center","className":"vayu-blocks-para-innerblock","fontFamily":"cardo"} -->
<p class="has-text-align-center vayu-blocks-para-innerblock has-cardo-font-family">write here please.....</p>
<!-- /wp:paragraph --></section>
<!-- /wp:vayu-blocks/image -->

<!-- wp:vayu-blocks/image {"uniqueId":"-14t1gjs","image":"http://localhost/wp63/wp-content/plugins/vayu-blocks/public/build/block/advance-slider/../../images/no-image.69a0483a.png","overlayshow":true,"parentBlock":"vayu-blocks/advance-container","classNamemain":"block-editor-block-list__block wp-block swiper-slide custom-margin \n         \n         \n         wp-block-vayu-blocks-image","className":"swiper-slide","metadata":{"name":"Slide"}} -->
<section class="wp-block-vayu-blocks-image my-class swiper-slide"><!-- wp:vayu-blocks/advance-heading {"id":"6299a78a-fd68-47b3-a318-c5c1664ebbb0","uniqueID":"_99a78a-fd2","fontFamily":"cardo","fontVariant":"bold","lineHeight":0.8,"className":"vayu-blocks-heading-innerblock"} -->
<h2 id="_99a78a-fd2" class="wp-block-vayu-blocks-advance-heading wp-block-th-advance-heading th-h_99a78a-fd2 vayu-blocks-heading-innerblock">Image Title...</h2>
<!-- /wp:vayu-blocks/advance-heading -->

<!-- wp:paragraph {"align":"center","className":"vayu-blocks-para-innerblock","fontFamily":"cardo"} -->
<p class="has-text-align-center vayu-blocks-para-innerblock has-cardo-font-family">write here please.....</p>
<!-- /wp:paragraph --></section>
<!-- /wp:vayu-blocks/image -->
<!-- /wp:vayu-blocks/advance-slider --></div></div>
<!-- /wp:vayu-blocks/advance-container -->

<!-- wp:vayu-blocks/advance-container {"id":"c01e3af3-b3e3-4d10-bf85-aeb44ce85323","uniqueID":"_1e3af3-b35"} -->
<div id="" class="wp-block-vayu-blocks-advance-container th-container-outside-wrapper  th-c_1e3af3-b35 boxed-content"><div class="th-inside-content-wrap th-con"><!-- wp:vayu-blocks/blurb -->
<!-- wp:vayu-blocks/advance-container {"id":"067004b8-a519-47fe-8659-209d1e1345d7","uniqueID":"_7004b8-a54","backgroundColor":"#0D0D0D","elementGap":"30"} -->
<div id="" class="wp-block-vayu-blocks-advance-container th-container-outside-wrapper  th-c_7004b8-a54 boxed-content"><div class="th-inside-content-wrap th-con"><!-- wp:vayu-blocks/advance-container {"id":"fd6b3222-026d-4b0c-9e43-9bb856a072d0","uniqueID":"_6b3222-022","elementGap":"0"} -->
<div id="" class="wp-block-vayu-blocks-advance-container th-container-outside-wrapper  th-c_6b3222-022 boxed-content"><div class="th-inside-content-wrap th-con"><!-- wp:vayu-blocks/icon {"uniqueId":"vayu-blocks-376517d4","color":"#e8383e","hoverColor":"#e8383e","alignment":"center","printedIcon":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 \n\t\taria-label=\u0022Add Card\u0022 role=\u0022graphics-symbol\u0022 \n\t\tstroke=\u0022undefined\u0022 stroke-width=\u00220.5px\u0022 \n\t\tstroke-dasharray=\u00220, 0\u0022\u003e\u003cpath d=\u0022M18.5 5.5V8H20V5.5h2.5V4H20V1.5h-1.5V4H16v1.5h2.5zM12 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-6h-1.5v6a.5.5 0 01-.5.5H6a.5.5 0 01-.5-.5V6a.5.5 0 01.5-.5h6V4z\u0022 /\u003e\u003c/svg\u003e","classNamemain":"block-editor-block-list__block wp-block  \n         \n         wp-block-vayu-blocks-icon"} /--></div></div>
<!-- /wp:vayu-blocks/advance-container -->

<!-- wp:vayu-blocks/advance-container {"id":"8b1993da-5997-4672-b278-eb4de387d8f0","uniqueID":"_1993da-593"} -->
<div id="" class="wp-block-vayu-blocks-advance-container th-container-outside-wrapper  th-c_1993da-593 boxed-content"><div class="th-inside-content-wrap th-con"><!-- wp:vayu-blocks/advance-heading {"id":"f7001b74-268f-4928-ae52-a35bdae3099a","uniqueID":"_001b74-263","align":"center","headingColor":"#fff","fontFamily":"unset","fontVariant":"bold"} -->
<h2 id="_001b74-263" class="wp-block-vayu-blocks-advance-heading wp-block-th-advance-heading th-h_001b74-263">Lorem Ipsum</h2>
<!-- /wp:vayu-blocks/advance-heading -->

<!-- wp:vayu-blocks/advance-heading {"id":"799fdaec-43f8-4d98-8321-dfc1289b122d","uniqueID":"_9fdaec-434","align":"center","headingColor":"#fff","fontSize":"14","fontFamily":"unset","fontVariant":"bold"} -->
<h2 id="_9fdaec-434" class="wp-block-vayu-blocks-advance-heading wp-block-th-advance-heading th-h_9fdaec-434">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</h2>
<!-- /wp:vayu-blocks/advance-heading -->

<!-- wp:vayu-blocks/advance-button {"id":"ae783551-e94b-4e8b-b726-8c8d60da199b","uniqueID":"_783551-e91","align":"center","borderRadius":"25","buttonbackgroundColor":"#E8383E","buttonbackgroundColorHvr":"#E8383E"} -->
<div id="_783551-e91" class="wp-block-vayu-blocks-advance-button th-button-wrapper_783551-e91"><span class="th-button th-button-inside"><span><span>Read</span></span></span></div>
<!-- /wp:vayu-blocks/advance-button --></div></div>
<!-- /wp:vayu-blocks/advance-container --></div></div>
<!-- /wp:vayu-blocks/advance-container -->
<!-- /wp:vayu-blocks/blurb --></div></div>
<!-- /wp:vayu-blocks/advance-container --></div></div>
<!-- /wp:vayu-blocks/advance-container -->',
            'categories'=> array('gallery'),
        )
    );
}
add_action('init', 'my_custom_wp_block_patterns');
 
//  The above code will add a new block pattern to the WordPress block editor. 
//  Conclusion 
//  In this article, we learned how to create custom block patterns in WordPress. We also learned how to add custom block patterns to the WordPress block editor. 
//  I hope this article helped you to understand how to create custom block patterns in WordPress. 
//  If you have any questions or thoughts to share, use the comment form below. 
//  block patterns WordPress
//  I am a full-stack developer with a passion for front-end technologies. I am an expert in WordPress, HTML, CSS, and JavaScript. I am a beginner at React and Node.js. 
//  Your name can also be listed here. Got a tip?  Submit it here to become anauthor. 
//  Your email address will not be published. Required fields are marked * 
//   Save my name, email, and website in this browser for the next time I comment.