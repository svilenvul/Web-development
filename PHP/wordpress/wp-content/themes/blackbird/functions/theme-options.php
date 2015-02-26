<?php

add_action('init', 'blackbird_options');
if (!function_exists('blackbird_options')) {

    function blackbird_options() {
        // VARIABLES
        $themename = wp_get_theme(STYLESHEETPATH . '/style.css');
        $themename = $themename['Name'];
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $blackbird_options;
        $blackbird_options = blackbird_get_option('blackbird_options');
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }
        // Populate OptionsFramework option in array for use in theme
        $testimonial = array("on" => "On", "off" => "Off");
        $home_page_blog = array("on" => "On", "off" => "Off");
        $sign_up_section = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }

        // If using image radio buttons, define a directory path
        $imagepath = get_stylesheet_directory_uri() . '/images/';
        /* ---------------------------------------------------------------------------- */
        /* General Setting */
        /* ---------------------------------------------------------------------------- */
        $options = array(
            array("name" => __("General Settings", 'black-bird'),
                "type" => "heading"),
            array("name" => __("Custom Logo", 'black-bird'),
                "desc" => __("Choose your own logo. Optimal Size: 221px Wide by 84px Height.", 'black-bird'),
                "id" => "blackbird_logo",
                "type" => "upload"),
            array("name" => __("Home Page Top Right Cell Info", 'black-bird'),
                "desc" => __("Enter your text for home page top right cell info.", 'black-bird'),
                "id" => "blackbird_topright_cell",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Home Page Top Right Contact Info", 'black-bird'),
                "desc" => __("Enter your text for home page top right contact info.", 'black-bird'),
                "id" => "blackbird_topright_text",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Custom Favicon", 'black-bird'),
                "desc" => __("Specify a 16px x 16px image that will represent your website's favicon.", 'black-bird'),
                "id" => "blackbird_favicon",
                "type" => "upload"),
            array("name" => __("Body Background Image", 'black-bird'),
                "desc" => __("Select image to change your website background", 'black-bird'),
                "id" => "blackbird_bodybg",
                "std" => "",
                "type" => "upload"),
            /* ---------------------------------------------------------------------------- */
            /* Slider Setting */
            /* ---------------------------------------------------------------------------- */
            //Slider Setting
            array("name" => __("Home Top Feature", 'black-bird'),
                "type" => "heading"),
            //First Slider
            array("name" => __("Home Top Feature Image", 'black-bird'),
                "desc" => __("Choose your image for first slider. Optimal size is 950px wide and 390px height.", 'black-bird'),
                "id" => "blackbird_slideimage1",
                "std" => "",
                "type" => "upload"),
            array("name" => __("Home Top Feature Heading", 'black-bird'),
                "desc" => __("Enter your text heading for first slider.", 'black-bird'),
                "id" => "blackbird_sliderheading1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Home Top Feature Link URL", 'black-bird'),
                "desc" => __("Enter your link url for first Slider section.", 'black-bird'),
                "id" => "blackbird_Sliderlink1",
                "std" => "",
                "type" => "text"),
            array("name" => __("Home Top Feature Description", 'black-bird'),
                "desc" => __("Enter your text description for first slider.", 'black-bird'),
                "id" => "blackbird_sliderdes1",
                "std" => "",
                "type" => "textarea"),
            /* ---------------------------------------------------------------------------- */
            /* Homepage Feature Area */
            /* ---------------------------------------------------------------------------- */
            array("name" => __("Homepage Settings", 'black-bird'),
                "type" => "heading"),
            //Homepage Main Heading 
            array("name" => __("Home Page Heading", 'black-bird'),
                "desc" => __("Enter your heading text for home page", 'black-bird'),
                "id" => "blackbird_mainheading",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Home Page Feature Content", 'black-bird'),
                "type" => "saperate",
                "class" => "saperator"),
            //***Code for Feature Feature***//
            array("name" => __("First Feature Heading", 'black-bird'),
                "desc" => __("Enter your heading for first Feature area", 'black-bird'),
                "id" => "blackbird_headline1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("First Feature Image", 'black-bird'),
                "desc" => __("Choose image for your first Feature area. Optimal size 158px x 165px", 'black-bird'),
                "id" => "blackbird_wimg1",
                "std" => "",
                "type" => "upload"),
            array("name" => __("First Feature Content", 'black-bird'),
                "desc" => "Enter your content for first Feature area",
                "id" => "blackbird_feature1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("First Feature Link", 'black-bird'),
                "desc" => __("Enter your link for first Feature area", 'black-bird'),
                "id" => "blackbird_link1",
                "std" => "",
                "type" => "text"),
//***Code for second Feature***//
            array("name" => __("Second Feature Heading", 'black-bird'),
                "desc" => __("Enter your heading for second Feature area", 'black-bird'),
                "id" => "blackbird_headline2",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Second Feature Image", 'black-bird'),
                "desc" => __("Choose image for your second Feature area. Optimal size 158px x 165px", 'black-bird'),
                "id" => "blackbird_fimg2",
                "std" => "",
                "type" => "upload"),
            array("name" => __("Second Feature Content", 'black-bird'),
                "desc" => __("Enter your content for second feature area", 'black-bird'),
                "id" => "blackbird_feature2",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Second Feature Link", 'black-bird'),
                "desc" => __("Enter your link for second Feature area", 'black-bird'),
                "id" => "blackbird_link2",
                "std" => "",
                "type" => "text"),
//***Code for third Feature***//	
            array("name" => __("Third Feature Heading", 'black-bird'),
                "desc" => __("Enter your heading for third Feature area", 'black-bird'),
                "id" => "blackbird_headline3",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Third Feature Image", 'black-bird'),
                "desc" => __("Choose image for your thrid Feature. Optimal size 158px x 165px", 'black-bird'),
                "id" => "blackbird_fimg3",
                "std" => "",
                "type" => "upload"),
            array("name" => __("Third Feature Content", 'black-bird'),
                "desc" => __("Enter your content for third Feature area", 'black-bird'),
                "id" => "blackbird_feature3",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Third Feature Link", 'black-bird'),
                "desc" => __("Enter your link for third feature area", 'black-bird'),
                "id" => "blackbird_link3",
                "std" => "",
                "type" => "text"),
            /* ---------------------------------------------------------------------------- */
            /* Social Logos */
            /* ---------------------------------------------------------------------------- */
            array("name" => __("Social Logos", 'black-bird'),
                "type" => "heading"),
            array("name" => "Facebook URL",
                "desc" => __("Enter your Facebook URL if you have one", 'black-bird'),
                "id" => "blackbird_facebook",
                "std" => "#",
                "type" => "text"),
            array("name" => "Twitter URL",
                "desc" => __("Enter your Twitter URL if you have one", 'black-bird'),
                "id" => "blackbird_twitter",
                "std" => "#",
                "type" => "text"),
            array("name" => "LinkedIn URL",
                "desc" => __("Enter your LinkedIn URL if you have one", 'black-bird'),
                "id" => "blackbird_linked",
                "std" => "#",
                "type" => "text"),
            array("name" => "RSS Feed URL",
                "desc" => __("Enter your RSS Feed URL if you have one", 'black-bird'),
                "id" => "blackbird_rss",
                "std" => "#",
                "type" => "text"),
            /* ---------------------------------------------------------------------------- */
            /* Styling Setting */
            /* ---------------------------------------------------------------------------- */
            array("name" => __("Styling Options", 'black-bird'),
                "type" => "heading"),
            array("name" => __("Custom CSS", 'black-bird'),
                "desc" => __("Quickly add some Custom CSS to your theme by adding it to this block.", 'black-bird'),
                "id" => "blackbird_customcss",
                "std" => "",
                "type" => "textarea")
        );
        blackbird_update_option('of_template', $options);
        blackbird_update_option('of_themename', $themename);
        blackbird_update_option('of_shortname', $shortname);
    }

}
?>
