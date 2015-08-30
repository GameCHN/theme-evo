<?php
function wpt_slider_posttype() {

$labels = array(
    'name'                  => __( 'Slides', 'site5framework' ),
    'singular_name'         => __( 'Slide Item', 'site5framework' ),
    'add_new'               => __( 'Add New Item', 'site5framework' ),
    'add_new_item'          => __( 'Add New Slide Item', 'site5framework' ),
    'edit_item'             => __( 'Edit Slide Item', 'site5framework' ),
    'new_item'              => __( 'Add New Slide Item', 'site5framework' ),
    'view_item'             => __( 'View Item', 'site5framework' ),
    'search_items'          => __( 'Search Slide', 'site5framework' ),
    'not_found'             => __( 'No slide items found', 'site5framework' ),
    'not_found_in_trash'    => __( 'No slide items found in trash', 'site5framework' )
);

$args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'query_var'             => true,
    'permalink_epmask'      => true,
    'supports'              => array( 'title','page-attributes' ),
    'rewrite'               => array( 'slug' => 'featured', 'with_front' => false ),
    'menu_position'         => 5,
    'show_in_menu'          => true,
    'has_archive'           => true
    
);

register_post_type( 'featured', $args);
}

add_action( 'init', 'wpt_slider_posttype' );



$labels = array(
    'name'                          => __( 'Sliders', 'site5framework' ),
    'singular_name'                 => __( 'Slider', 'site5framework' ),
    'search_items'                  => __( 'Search Sliders', 'site5framework' ),
    'popular_items'                 => __( 'Popular Sliders', 'site5framework' ),
    'all_items'                     => __( 'All Sliders', 'site5framework' ),
    'parent_item'                   => __( 'Parent Slider', 'site5framework' ),
    'edit_item'                     => __( 'Edit Slider', 'site5framework' ),
    'update_item'                   => __( 'Update Slider', 'site5framework' ),
    'add_new_item'                  => __( 'Add New Slider', 'site5framework' ),
    'new_item_name'                 => __( 'New Slider', 'site5framework' ),
    'separate_items_with_commas'    => __( 'Separate Sliders with commas', 'site5framework' ),
    'add_or_remove_items'           => __( 'Add or remove Sliders', 'site5framework' ),'',
    'choose_from_most_used'         => __( 'Choose from most used Sliders', 'site5framework' )
    );

$args = array(
    'label'                         => __( 'Sliders', 'site5framework' ),
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => array( 'slug' => 'sliders', 'with_front' => false ),
    'query_var'                     => true
);

register_taxonomy( 'sliders', 'featured', $args );




// Styling for the custom post type icon

add_action( 'admin_head', 'wpt_slider_icons' );

function wpt_slider_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-slider .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-icon.png) no-repeat 6px 6px !important;
        }
        #menu-posts-slider:hover .wp-menu-image, #menu-posts-slider.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
        #icon-edit.icon32-posts-slider {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-32x32.png) no-repeat;}
    </style>
<?php }

?>
<?php
// GET PORTFOLIO IMAGE  
function wpt_get_slide_image($post_ID) {  
    $post_thumbnail_id = get_image_id_by_link ( get_post_meta($post_ID, 'snbf_slideimage_src', true) );
    if ($post_thumbnail_id) {  
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'small');  
        return $post_thumbnail_img[0];  
    }  
}  


function wpt_slide_columns_head($defaults) {  
    $defaults['slide_caption'] = 'Slide Caption'; 
    $defaults['slider'] = 'Slider';
    $defaults['slide_image'] = 'Slide Image'; 
    
    return $defaults;  
}  
  
// SHOW THE FEATURED IMAGE  
function wpt_slide_columns_content ( $column, $post_id ) {
    switch ( $column ) {
        case 'slide_image':
            $post_slide_image = wpt_get_slide_image($post_id);  
            if ($post_slide_image) {  
                echo '<img width=200 src="' . $post_slide_image . '" />';
            }
            break;
        case 'slider':
            $terms = get_the_terms( $post_id , 'sliders' , '' , ',' , '' );
            if ( count( $terms ) > 0  && is_array($terms)) {
                foreach ( $terms as $term ) {
                    echo  $term->name . ' ';
                }
            } else {
                echo 'Unable to get slider(s)';
            }
            break;
        case 'slide_caption':
            echo get_post_meta($post_id, 'snbf_fitemcaption', true);
            break;
    }  
} 
 
// ADDS EXTRA INFO TO ADMIN MENU FOR PORTFOLIO POST TYPE
add_filter("manage_edit-featured_columns", "wpt_slide_columns_head");
add_action("manage_featured_posts_custom_column", "wpt_slide_columns_content", 10, 2 );

$prefix = 'snbf_';

$featured_meta_box = array(
    'id' => 'featuredbox',
    'title' => 'Slider Listing Details',
    'page' => 'featured',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
    
        array(
            'name' => 'Slide Caption',
            'desc' => '',
            'id' => $prefix . 'fitemcaption',
            'type' => 'text',
            'std' => ''
        ),

        array(
            'name' => 'Slide Image Link',
            'desc' => '',
            'id' => $prefix . 'fitemlink',
            'type' => 'text',
            'std' => ''
        ),
        
        array(
            'name' => 'Add Slider Image',
            'desc' => 'Please make sure that the image height is 375px',
            'id' => $prefix . 'fitembutton',
            'type' => 'upload',
            'std' => ''
        ),
        
        array(
            'name' => '',
            'id' => $prefix . 'slideimage_src',
            'type' => 'hidden',
			'desc' => '',
            'std' => ''
        )
    

    ),

);


add_action('admin_menu', 'featured_add_box');

// Add meta box
function featured_add_box() {
    global $featured_meta_box;

    add_meta_box($featured_meta_box['id'], $featured_meta_box['title'], 'featured_show_box', $featured_meta_box['page'], $featured_meta_box['context'], $featured_meta_box['priority']);
}

// Callback function to show fields in meta box
function featured_show_box() {
    global $featured_meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($featured_meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'hidden':
                echo '<img src="', $meta ? $meta : $field['std'], '" id="', $field['id'], '_img" style="width:600px"/>';
                echo '<input type="hidden" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
                    '<br />', $field['desc'];
                break;
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
                    '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea class="theEditor" name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
                    '<br />', $field['desc'];

                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>',
                '<br />', $field['desc'];
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case "upload":
            echo '<div class="upload_button_div"> <span id="', $field['id'], '" rel="', $post->ID ,'"><a href="#" id="set-post-thumbnail" onclick="jQuery(\'#add_image\').click();return true;" class="button-primary">Add Media</a></b></span><br />'.$field['desc'].'</div>';
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo    '<td>',
            '</tr>';
    }

    echo '</table>';
}

add_action('save_post', 'featured_save_data');

// Save data from meta box
function featured_save_data($post_id) {
    global $featured_meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($featured_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

?>