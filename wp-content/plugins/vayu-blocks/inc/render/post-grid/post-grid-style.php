<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function generate_inline_post_styles($attr) {
    $css = '';

    if (isset($attr['pg_posts']) && is_array($attr['pg_posts']) 
        && isset($attr['pg_posts'][0]) 
        && isset($attr['pg_posts'][0]['uniqueID'])) {
        $uniqueId = $attr['pg_posts'][0]['uniqueID'];
    }

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  

    $container = ".th-post-grid-{$uniqueId}";
    $wrapper = ".th-post-grid-wrapper-{$uniqueId}";
    $post = ".th-post-grid-inline-{$uniqueId}";

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    $css .= $OBJ_STYLE->advanceStyle($container);

    //Main div
    $css .= "$wrapper {";

        $css .= "display: grid;";

        $column = isset($attr['column']['Desktop']) ? $attr['column']['Desktop'] : '';
        $row = isset($attr['row']['Desktop']) ? $attr['row']['Desktop'] : '';        

        $css .= "grid-template-columns: repeat({$column}, minmax(0px, 1fr));";
        $css .= "grid-template-rows: repeat({$row}, minmax(100px, 1fr));";

        $gridGapUp = isset($attr['vergap']['Desktop']['top']) ? $OBJ_STYLE->handleValue($attr['vergap']['Desktop']['top']) : '';
        $gridGap = isset($attr['horigap']['Desktop']['left']) ? $OBJ_STYLE->handleValue($attr['horigap']['Desktop']['left']) : '';
     
        if($gridGap || $gridGapUp){
            $css .= "grid-gap: {$gridGapUp} {$gridGap};";
        }

        $css .= "grid-auto-rows: minmax(100px, auto);";
    $css .= "}";

    //Post
    $css .= "$wrapper $post {";
        $css .= "box-sizing: border-box;";
       
        $css .= isset($attr['layoutcustomWidth']) ? "width: " . esc_attr($attr['layoutcustomWidth']) . ";" : '';
        // Text color
        $css .= isset($attr['pg_textColor']) ? "color: " . esc_attr($attr['pg_textColor']) . ";" : '';
        
        // Position
        $css .= "position: relative;";

        $css .= "display:flex;";
        $css .= "flex-direction: column;";

        $alignment = isset($attr['pg_layoutalignment']['Desktop']) ? $attr['pg_layoutalignment']['Desktop'] : '';
        $alignItems = '';
        
        if ($alignment === 'left') {
            $alignItems = 'flex-start';
        } elseif ($alignment === 'center') {
            $alignItems = 'center';
        } elseif ($alignment === 'right') {
            $alignItems = 'flex-end'; 
        }
        
        $css .= "align-items: " . $alignItems . ";";
        $css .= isset($attr['spacing']['Desktop']) ? "gap: " . esc_attr($attr['spacing']['Desktop']) . "px;" : "";

        $css .= isset($attr['layout_backgroundAttachment']) ? "background-attachment: " . esc_attr($attr['layout_backgroundAttachment']) . ";" : '';
        $css .= isset($attr['layout_backgroundRepeat']) ? "background-repeat: " . esc_attr($attr['layout_backgroundRepeat']) . ";" : '';
        $css .= isset($attr['layout_backgroundSize']) ? "background-size: " . esc_attr($attr['layout_backgroundSize']) . ";" : '';
        
        $css .= $OBJ_STYLE->borderRadiusShadow('layoutborder', 'layoutradius', 'layoutShadow', 'Desktop');
        $css .= $OBJ_STYLE->background('layoutbackground');
        $css .= $OBJ_STYLE->dimensions('layoutpadding', 'padding', 'Desktop');
   
    $css .= "}";

    //Category
    $css .= "$wrapper $post .post-grid-category-style-new{";
        $css .= "cursor: pointer;";

        if (empty($attr['categorytypography'])) {
            $css .= "font-size: 13px; line-height: 1;";
        } else {
            $css .= $OBJ_STYLE->typography('categorytypography', 'Desktop');
        } 
        $css .= $OBJ_STYLE->borderRadiusShadow('categoryborder', 'categoryradius', 'categoryShadow', 'Desktop');

 
            $css .= $OBJ_STYLE->dimensions('categorypadding', 'padding', 'Desktop');

        $css .= isset($attr['pg_categoryTextColor']) ? "color: " . esc_attr($attr['pg_categoryTextColor']) . ";" : '';

        $css .= isset($attr['category_backgroundColor']) ? "background: " . esc_attr($attr['category_backgroundColor']) . ";" : '';

    $css .= "}";

    $css .= "$wrapper $post .post-grid-category-style-container {";

        if (isset($attr['categoryGap']['Desktop'])) {
            $css .= "gap: {$attr['categoryGap']['Desktop']}px;";
        }

        $css .= "display: flex;
        align-items: center;";

    $css .= "}";
        
    $css .= "$wrapper $post .vayu_blocks_title_post_grid {";
        $css .= "display:flex;";
        $css .="margin:0;";    
    $css .= "}";

    $css .= "$wrapper $post .post-grid-tag-style-conatiner {";
        if (isset($attr['tagGap']['Desktop'])) {
            $css .= "gap: {$attr['tagGap']['Desktop']}px;";
        }
        
        $css .= "display: flex;
                align-items: center;";
    
    $css .= "}";
    
    //Tag
    $css .= "$wrapper $post .post-grid-tag-style-conatiner .post-grid-tag-style-new{";
        $css .= "cursor: pointer;";
        $css .= "text-decoration: none;";
        $css .= "box-sizing: border-box;";
        
        $css .= isset($attr['pg_tagTextColor']) ? "color: " . esc_attr($attr['pg_tagTextColor']) . ";" : '';
        
        $css .= "background: " . esc_attr($attr['tag_backgroundColor']) . ";";

        if (empty($attr['tagtypography'])) {
            $css .= "font-size: 13px; line-height: 1;";
        } else {
            $css .= $OBJ_STYLE->typography('tagtypography', 'Desktop');
        } 
        $css .= $OBJ_STYLE->borderRadiusShadow('tagborder', 'tagradius', 'tagShadow', 'Desktop');

 
            $css .= $OBJ_STYLE->dimensions('tagpadding', 'padding', 'Desktop');
        
        
    $css .= "}";
        
    //Featured Image
    $css .= "$wrapper $post .post-grid-image{";
        $css .= "display: block;";
        $css .= "width: 100%;";
        $css .= "height: auto;";
        $css .= "box-sizing: border-box;";
        $css .= $OBJ_STYLE->borderRadiusShadow('imageborder', 'imageradius', '', 'Desktop');
    $css .= "}";
     
    //Title Tag
    $css .= "$wrapper $post {$attr['pg_blockTitleTag']}{";

        
        if (isset($attr['titlechoice']) && $attr['titlechoice'] === 'color') {
            // Apply color style if titlechoice is 'color'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "color: " . esc_attr($attr['pg_TitleColor']) . ";";
            }
        } elseif (isset($attr['titlechoice']) && $attr['titlechoice'] === 'gradient') {
            // Apply gradient style if titlechoice is 'gradient'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "background: " . esc_attr($attr['pg_TitleColor']) . " !important;";
                $css .= "-webkit-background-clip: text !important;";
                $css .= "-webkit-text-fill-color: transparent !important;";
                $css .= "background-clip: text !important;";
            }
        }
       
        $css .= "overflow-wrap: break-word;";
        $css .= "word-break: break-word;";

        if (empty($attr['titletypography'])) {
            $css .= "font-size: 13px; line-height: 1;";
        } else {
            $css .= $OBJ_STYLE->typography('titletypography', 'Desktop');
        } 

    $css .= "}";

    //Title Tag
    $css .= "$wrapper $post {$attr['pg_blockTitleTag']} a{";

        if (isset($attr['titlechoice']) && $attr['titlechoice'] === 'color') {
            // Apply color style if titlechoice is 'color'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "color: " . esc_attr($attr['pg_TitleColor']) . ";";
            }
        } elseif (isset($attr['titlechoice']) && $attr['titlechoice'] === 'gradient') {
            // Apply gradient style if titlechoice is 'gradient'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "background: " . esc_attr($attr['pg_TitleColor']) . " !important;";
                $css .= "-webkit-background-clip: text !important;";
                $css .= "-webkit-text-fill-color: transparent !important;";
                $css .= "background-clip: text !important;";
            }
        }
    $css .= "}";

    //author-date-container
    $css .= "$wrapper $post .post-grid-author-date-container{";
        $css .= "    display: flex;";
        $css .= "    align-items: flex-start;";
        $css .= "    flex-wrap: wrap;";

        if (empty($attr['authortypography'])) {
            $css .= "font-size: 13px; line-height: 1;";
        } else {
            $css .= $OBJ_STYLE->typography('authortypography', 'Desktop');
        } 
        $css .= "color: " . esc_attr($attr['pg_authorTextColor']) . ";";
        $css .= "fill: " . esc_attr($attr['pg_authorTextColor']) . ";";

    $css .= "}";

    $css .= "$wrapper .vb-excerpt_selector{";
        $css .= $OBJ_STYLE->typography('excetypography', 'Desktop');
        $css .= "color: " . esc_attr($attr['exceColor']) . ";";
    $css .= "}";

    //author-date-container
    $css .= "$wrapper $post .post-grid-author-date-container .datecontainer{";
        $css .= "    display: flex;";
        $css .= "    align-items: center;";
        $css .= "    flex-wrap: wrap;";
    $css .= "}";

    //author-image
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-author-image {";
        $css .= "    width: 20px;";
        $css .= "    border-radius: 50%;";
        $css .= "transform: scale(" . esc_attr($attr['pg_authorImageScale']) . ");";
    $css .= "}";
      
    //author-span
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-author-span{";
        $css .= "    text-decoration: none;";
        $css .= "color: " . esc_attr($attr['pg_authorTextColor']) . ";";
        $css .= "cursor: pointer;";
        $css .= "margin-right: 10px;";  
    $css .= "}";

    //date-span
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-date-span{";
        $css .= "color: " . esc_attr($attr['pg_authorTextColor']) . ";";
    $css .= "}";
        
    //date-image
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-date-image{";
        $css .= "transform: scale(" . esc_attr($attr['pg_authorImageScale']) . ");";
        $css .= "width: 20px;";
    $css .= "}";

    //content
    $css .= "$wrapper $post .post-grid-excerpt-view{";

        // Text Color
        $css .= isset($attr['pg_textColor']) ? "color: " . esc_attr($attr['pg_textColor']) . ";" : '';
        
        if (empty($attr['contenttypography'])) {
            $css .= "font-size: 13px; line-height: 1;";
        } else {
            $css .= $OBJ_STYLE->typography('contenttypography', 'Desktop');
        }      

        $alignment = isset($attr['pg_layoutalignment']['Desktop']) ? $attr['pg_layoutalignment']['Desktop'] : '';

        $css .= "text-align: $alignment;";
    $css .= "}";

    //pagination
    $css .= "$container .pagination{";  

        $css .="display:flex;";
        $css .= "height:100%;";
        $alignment = isset($attr['pg_Paginationalignment']['Desktop']) ? $attr['pg_Paginationalignment']['Desktop'] : ''; // default value
        $css .= "justify-content: {$alignment};";
    $css .= "}"; 

    $css .= ".page-numbers {";
  
        $css .= "cursor: pointer;";
        $css .= "margin: 20px 5px;";
        $css .="text-decoration: none;";
        
        $css .= isset($attr['pg_PaginationColor']) ? "color: " . esc_attr($attr['pg_PaginationColor']) . ";" : '';
        $css .= isset($attr['pg_PaginationbackgroundColor']) ? "background: " . esc_attr($attr['pg_PaginationbackgroundColor']) . ";" : '';
        
        $css .= $OBJ_STYLE->borderRadiusShadow('pg_paginationborder','pg_paginationradius','','Desktop');
        $css .= $OBJ_STYLE->typography('typography','Desktop');
        $css .= $OBJ_STYLE->dimensions('pg_Paginationpadding', 'padding', 'Desktop');

    $css .= "}"; 


    $css .= ".pagination a{";  
        $css .= "text-decoration: none;";
    $css .= "}"; 
     
    $css .= ".pagination .current{";  
        $css .= isset($attr['pg_PaginationactiveColor']) ? "color: " . esc_attr($attr['pg_PaginationactiveColor']) . ";" : '';
        $css .= "trasform: scale(1.1);";
        $css .= "font-weight: bold;";
    $css .= "}"; 

    $css .= "$wrapper $post {$attr['pg_blockTitleTag']} a:hover {";

        // Check if `titlechoicehvr` is set and apply styles accordingly
        if (isset($attr['titlechoicehvr']) && $attr['titlechoicehvr'] === 'color') {
            // Apply color style if titlechoicehvr is 'color'
            if (isset($attr['pg_TitleColorhvr'])) {
                $css .= "color: " . esc_attr($attr['pg_TitleColorhvr']) . " !important;";
            }
        } elseif (isset($attr['titlechoicehvr']) && $attr['titlechoicehvr'] === 'gradient') {
            // Apply gradient style if titlechoicehvr is 'gradient'
            if (isset($attr['pg_TitleColorhvr'])) {
                $css .= "background: " . esc_attr($attr['pg_TitleColorhvr']) . " !important;";
                $css .= "-webkit-background-clip: text !important;";
                $css .= "-webkit-text-fill-color: transparent !important;";
                $css .= "background-clip: text !important;";
            }
        }
        
    $css .= "}";

    $css .= ".page-numbers:hover {";
        $css .= "color:" . $attr['pg_PaginationactiveColor'] . ";";
    $css .= "}";

    // For tablet
    $css .= "@media (min-width: 768px) and (max-width: 1024px) {";

        $css .= "$wrapper {";
            $gridGapUp = isset($attr['vergap']['Tablet']['top']) ? $OBJ_STYLE->handleValue($attr['vergap']['Tablet']['top']) : '';
            $gridGap = isset($attr['horigap']['Tablet']['left']) ? $OBJ_STYLE->handleValue($attr['horigap']['Tablet']['left']) : '';
            $css .= "grid-gap: {$gridGapUp} {$gridGap};";
        $css .= "}";

        $css .= "$wrapper $post {";
            $css .= $OBJ_STYLE->borderRadiusShadow('layoutborder', 'layoutradius', 'layoutShadow', 'Tablet');
            $css .= isset($attr['spacing']['Tablet']) ? "gap: " . esc_attr($attr['spacing']['Tablet']) . "px;" : "";
            $css .= $OBJ_STYLE->dimensions('layoutpadding', 'padding', 'Tablet');
            
            $alignment = isset($attr['pg_layoutalignment']['Tablet']) ? $attr['pg_layoutalignment']['Tablet'] : '';
            $alignItems = '';
            if ($alignment === 'left') {
                $alignItems = 'flex-start';
            } elseif ($alignment === 'center') {
                $alignItems = 'center';
            } elseif ($alignment === 'right') {
                $alignItems = 'flex-end'; 
            }
            $css .= "align-items: " . $alignItems . ";";
            $css .= "width: " . (isset($attr['layoutcustomWidthTablet']) ? esc_attr($attr['layoutcustomWidthTablet']) : '') . ";";
        $css .= "}";

        $css .= "$wrapper $post .post-grid-category-style-new{";
            $css .= $OBJ_STYLE->borderRadiusShadow('categoryborder', 'categoryradius', 'categoryShadow', 'Tablet');
            $css .= $OBJ_STYLE->typography('categorytypography','Tablet');
            $css .= $OBJ_STYLE->dimensions('categorypadding', 'padding', 'Tablet');
        $css .= "}";

        $css .= "$wrapper $post .post-grid-excerpt-view{";
            $css .= $OBJ_STYLE->typography('contenttypography','Tablet');
            $alignment = isset($attr['pg_layoutalignment']['Tablet']) ? $attr['pg_layoutalignment']['Tablet'] : '';
            $css .= "text-align: $alignment;";
        $css .= "}";

        $css .= "$wrapper $post {$attr['pg_blockTitleTag']}{";
            $css .= $OBJ_STYLE->typography('titletypography','Tablet');
        $css .= "}";

        $css .= "$wrapper $post .post-grid-image{";
            $css .= $OBJ_STYLE->borderRadiusShadow('imageborder', 'imageradius', '', 'Tablet');
        $css .= "}";

        $css .= "$wrapper $post .post-grid-tag-style-conatiner {";
            if (isset($attr['tagGap']['Tablet'])) {
                $css .= "gap: {$attr['tagGap']['Tablet']}px;";
            }
        $css .= "}";

        $css .= "$wrapper $post .post-grid-category-style-container {";
            if (isset($attr['categoryGap']['Tablet'])) {
                $css .= "gap: {$attr['categoryGap']['Tablet']}px;";
            }
        $css .= "}";

        $css .= "$wrapper $post .post-grid-author-date-container {";
            $css .= $OBJ_STYLE->typography('authortypography','Tablet');
        $css .= "}";

        $css .= "$wrapper .vb-excerpt_selector{";
            $css .= $OBJ_STYLE->typography('excetypography', 'Tablet');
        $css .= "}";

        $css .= "$container .pagination{"; 	
            $alignment = isset($attr['pg_Paginationalignment']['Tablet']) ? $attr['pg_Paginationalignment']['Tablet'] : ''; 
            $css .= "justify-content: {$alignment};";
        $css .= "}";

        $media1024 = '';
        $media1024 .= $OBJ_STYLE->borderRadiusShadow('pg_paginationborder','pg_paginationradius','','Tablet');
        $media1024 .= $OBJ_STYLE->typography('typography','Tablet');
        $media1024 .= $OBJ_STYLE->dimensions('pg_Paginationpadding', 'padding', 'Tablet');

        if (trim($media1024) !== '') {
            $css .= ".page-numbers {";
            $css .= "$media1024";
            $css .= "}"; 
        }

    $css .= "}"; 

    // For mobile
    $css .= "@media (max-width: 767px) {";
        $css .= "$wrapper {";
            $gridGapUp = isset($attr['vergap']['Mobile']['top']) ? $OBJ_STYLE->handleValue($attr['vergap']['Mobile']['top']) : '';
            $gridGap = isset($attr['horigap']['Mobile']['left']) ? $OBJ_STYLE->handleValue($attr['horigap']['Mobile']['left']) : '';
            $css .= "grid-gap: {$gridGapUp} {$gridGap};";
        $css .= "}";

        $css .= "$wrapper $post .post-grid-excerpt-view{";
            $css .= $OBJ_STYLE->typography('contenttypography','Mobile'); 
            $alignment = isset($attr['pg_layoutalignment']['Mobile']) ? $attr['pg_layoutalignment']['Mobile'] : '';
            $css .= "text-align: $alignment;";
        $css .= "}";

        $css .= "$wrapper $post {";
            $css .= $OBJ_STYLE->borderRadiusShadow('layoutborder', 'layoutradius', 'layoutShadow', 'Mobile');
            $css .= $OBJ_STYLE->dimensions('layoutpadding', 'padding', 'Mobile');
            
            $alignment = isset($attr['pg_layoutalignment']['Mobile']) ? $attr['pg_layoutalignment']['Mobile'] : '';
            $alignItems = '';
            if ($alignment === 'left') {
                $alignItems = 'flex-start';
            } elseif ($alignment === 'center') {
                $alignItems = 'center';
            } elseif ($alignment === 'right') {
                $alignItems = 'flex-end'; 
            }
            $css .= "align-items: " . $alignItems . ";";
            $css .= isset($attr['spacing']['Mobile']) ? "gap: " . esc_attr($attr['spacing']['Mobile']) . "px;" : "";
            $css .= "width: " . (isset($attr['layoutcustomWidthMobile']) ? esc_attr($attr['layoutcustomWidthMobile']) : '') . ";";
        $css .= "}";

        $css .= "$wrapper $post .post-grid-category-style-new{";
            $css .= $OBJ_STYLE->borderRadiusShadow('categoryborder', 'categoryradius', 'categoryShadow', 'Mobile');
            $css .= $OBJ_STYLE->typography('categorytypography','Mobile');
            $css .= $OBJ_STYLE->dimensions('categorypadding', 'padding', 'Mobile');
        $css .= "}";

        $css .= "$wrapper $post {$attr['pg_blockTitleTag']}{";
            $css .= $OBJ_STYLE->typography('titletypography','Mobile');
        $css .= "}";

        $css .= "$wrapper $post .post-grid-image{";
            $css .= $OBJ_STYLE->borderRadiusShadow('imageborder', 'imageradius', '', 'Mobile');
        $css .= "}";

        $css .= "$wrapper $post .post-grid-tag-style-conatiner {";
            if (isset($attr['tagGap']['Mobile'])) {
                $css .= "gap: {$attr['tagGap']['Mobile']}px;";
            }
        $css .= "}";

        $css .= "$wrapper $post .post-grid-category-style-container {";
            if (isset($attr['categoryGap']['Mobile'])) {
                $css .= "gap: {$attr['categoryGap']['Mobile']}px;";
            }
        $css .= "}";

        $css .= "$wrapper $post .post-grid-author-date-container{";
            $css .= $OBJ_STYLE->typography('authortypography','Mobile');
        $css .= "}";

        $css .= "$wrapper .vb-excerpt_selector{";
            $css .= $OBJ_STYLE->typography('excetypography', 'Mobile');
        $css .= "}";

        $css .= "$container .pagination{"; 	
            $alignment = isset($attr['pg_Paginationalignment']['Mobile']) ? $attr['pg_Paginationalignment']['Mobile'] : ''; 
            $css .= "justify-content: {$alignment};";
        $css .= "}";

        $media400 = '';
        $media400 .= $OBJ_STYLE->borderRadiusShadow('pg_paginationborder','pg_paginationradius','','Mobile');
        $media400 .= $OBJ_STYLE->typography('typography','Mobile');
        $media400 .= $OBJ_STYLE->dimensions('pg_Paginationpadding', 'padding', 'Mobile');

        if (trim($media400) !== '') {
            $css .= ".page-numbers {";
            $css .= "$media400";
            $css .= "}"; 
        }
    $css .= "}";
    
    return $css;
}
