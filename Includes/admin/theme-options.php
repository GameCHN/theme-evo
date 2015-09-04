<?php
/*********************************************************************************************
 *
 * Initalize Framework Settings
 *********************************************************************************************/
if (!function_exists('optionsframework_init')) {


    /*********************************************************************************************
     *
     * Print objects
     *********************************************************************************************/
    /**
     * @param $obj
     */
    function s5pr($obj)
    {
        echo "<pre style='clear:both'>";
        print_r($obj);
        echo "</pre>";
    }

    /*********************************************************************************************
     *
     * Fix rel validation on category links
     *********************************************************************************************/
    add_filter('the_category', 'add_nofollow_cat');
    function add_nofollow_cat($text)
    {
        $text = str_replace('rel="category tag"', "", $text);
        return $text;
    }

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(100, 100, true); // Normal post thumbnails
    add_image_size('single-post-thumbnail', 170, 170, true);
    add_image_size('portfolio-item-small', 300, 250, true);


    define('OPTIONS_FRAMEWORK_URL', get_template_directory_uri() . '/admin/');
    define('OPTIONS_FRAMEWORK_DIRECTORY', __DIR__ . '/');
    //get_template_directory() . '/Includes/admin/'
    define('OPTIONS_DIRECTORY', OPTIONS_FRAMEWORK_DIRECTORY . '/options/');


//Shortname prefix for theme options and custom meta fields
    define('SN', 's5s_');


    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'options-framework.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/contentvalidation.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/customfunctions.php');
    if(current_user_can('manage_options')){
        require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/slider.post.type.php');
        //require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/portfolio.post.type.php');
    }

    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/pagination.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/widgets.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/wpnavmenu.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/wphooks.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/customizer.php');
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'inc/ajax-thumbnail-rebuild.php');

//Metaboxes for Post Formats. Add here additional metaboxes for custom posts
    require_once(OPTIONS_FRAMEWORK_DIRECTORY . 'meta-box-class/meta-box-post-format.php');
//use sample below for creating additional metaboxes
//require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'meta-box-class/meta-box-portfolio-sample.php');
}

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

if (!function_exists('of_get_option')) {
    function of_get_option($name, $default = false)
    {
        $optionsframework_settings = get_option('optionsframework');
        // Gets the unique option id
        $option_name = $optionsframework_settings['id'];
        if (get_option($option_name)) {
            $options = get_option($option_name);
        }
        if (isset($options[$name])) {
            return $options[SN . $name];
        } else {
            return $default;
        }
    }
}

function optionsframework_option_name()
{

    // This gets the theme name from the stylesheet (lowercase and without spaces)
    $theme = of_get_theme_info();
    $themeName = $theme['Name'];


    $themeName = preg_replace("/\W/", "", strtolower($themeName));


    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themeName;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options()
{

    $sliders_array = array(
        "none" => "None",
        //"nivo" => "Nivo Slider",
        "flex" => "Flex Slider"
    );

    $slidersfx_array = array(
        "fade"  => "fade",
        "slide" => "slide"
    );

    $sliders = get_categories('taxonomy=sliders&type=featured');
    $sliders_tags_array[''] = 'Select a Slider';
    foreach ($sliders as $slider) {
        $sliders_tags_array[$slider->cat_ID] = $slider->cat_name;
    }


    $numberofs_array = array("1"  => "1",
                             "2"  => "2",
                             "3"  => "3",
                             "4"  => "4",
                             "5"  => "5",
                             "6"  => "6",
                             "7"  => "7",
                             "8"  => "8",
                             "9"  => "9",
                             "10" => "10",
                             "11" => "11",
                             "12" => "12",
                             "13" => "13",
                             "14" => "14",
                             "15" => "15",
                             "16" => "16",
                             "17" => "17",
                             "18" => "18",
                             "19" => "19",
                             "20" => "20"
    );

    $robots_array = array(
        "none"                 => "none",
        "index,follow"         => "index,follow",
        "index, follow"        => "index, follow",
        "index,nofollow"       => "index,nofollow",
        "index,all"            => "index,all",
        "index,follow,archive" => "index,follow,archive",
        "noindex,follow"       => "noindex,follow",
        "noindex,nofollow"     => "noindex,nofollow"
    );


    // Background Defaults
    $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');


    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    $options_categories[''] = __('All Categories', 'site5framework');
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = __('Select a page:', 'site5framework');
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }


    $options = array();


    /*********************************************************************************************
     *
     * Initalize Theme Options
     *********************************************************************************************/
    if (!function_exists('optionsframeworks_init')) {


        require(OPTIONS_DIRECTORY . 'general.php');
        require(OPTIONS_DIRECTORY . 'typography.php');
        require(OPTIONS_DIRECTORY . 'slider.php');
        require(OPTIONS_DIRECTORY . 'portfolio.php');
        require(OPTIONS_DIRECTORY . 'blog.php');
        require(OPTIONS_DIRECTORY . 'contact.php');
        require(OPTIONS_DIRECTORY . 'social.php');
        require(OPTIONS_DIRECTORY . 'meta.php');
        require(OPTIONS_DIRECTORY . 'footer.php');
        require(OPTIONS_DIRECTORY . 'thumbnails.php');
    }


    static $saved_settings;
    if (!function_exists('ot_settings_id') || !is_admin()) {
        //nothing
    } elseif (!isset($saved_settings) && 0) {
        $saved_settings = get_option('option_tree_settings', array());
        /* settings are not the same update the DB */
        $ot = [];
        foreach($options as $k => $v){
            $v['section']     = 'general';
            $ot[$k] = $v;
        }
        $custom_settings = array(
            'contextual_help' => array(
                 'content'       => array(
                   array(
                     'id'        => 'general_help',
                     'title'     => 'General',
                     'content'   => '<p>Help content goes here!</p>'
                   )
                 ),
                 'sidebar'       => '<p>Sidebar content goes here!</p>',
               ),
               'sections'        => array(
                 array(
                   'id'          => 'general',
                   'title'       => 'General'
                 )
               ),
            "settings" => $ot
        ) ;
        if ($saved_settings !== $custom_settings) {
            update_option('option_tree_settings', $custom_settings);
        }


        /* Lets OptionTree know the UI Builder is being overridden */
        global $ot_has_custom_theme_options;
        $ot_has_custom_theme_options = true;
    }


    return $options;
}

/*********************************************************************************************
 *
 * Upload Mime-types
 *********************************************************************************************/
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes($existing_mimes = array())
{
    $existing_mimes['ico'] = 'application/x-ico';
    $existing_mimes['vcf'] = 'text/x-vcard';

    return $existing_mimes;
}
