<?php
/*********************************************************************************************

Registers Custom Portfolio Post Type

*********************************************************************************************/
$labels = array(
    'name'                          => __( 'Types', 'site5framework' ),
    'singular_name'                 => __( 'Type', 'site5framework' ),
    'search_items'                  => __( 'Search Types', 'site5framework' ),
    'popular_items'                 => __( 'Popular Types', 'site5framework' ),
    'all_items'                     => __( 'All Types', 'site5framework' ),
    'parent_item'                   => __( 'Parent Type', 'site5framework' ),
    'edit_item'                     => __( 'Edit Type', 'site5framework' ),
    'update_item'                   => __( 'Update Type', 'site5framework' ),
    'add_new_item'                  => __( 'Add New Type', 'site5framework' ),
    'new_item_name'                 => __( 'New Type', 'site5framework' ),
    'separate_items_with_commas'    => __( 'Separate Types with commas', 'site5framework' ),
    'add_or_remove_items'           => __( 'Add or remove Types', 'site5framework' ),'',
    'choose_from_most_used'         => __( 'Choose from most used Types', 'site5framework' )
    );

$args = array(
    'label'                         => __( 'Types', 'site5framework' ),
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => array( 'slug' => 'portfolio/types', 'with_front' => false ),
    'query_var'                     => true
);

register_taxonomy( 'types', 'portfolio', $args );


register_post_type( 'portfolio',
    array(
        'labels'                => array(
        'name'                  => __( 'Portfolio', 'site5framework' ),
        'singular_name'         => __( 'Portfolio Item', 'site5framework' ),
        'add_new'               => __( 'Add New Item', 'site5framework' ),
        'add_new_item'          => __( 'Add New Portfolio Item', 'site5framework' ),
        'edit_item'             => __( 'Edit Portfolio Item', 'site5framework' ),
        'new_item'              => __( 'Add New Portfolio Item', 'site5framework' ),
        'view_item'             => __( 'View Item', 'site5framework' ),
        'search_items'          => __( 'Search Portfolio', 'site5framework' ),
        'not_found'             => __( 'No portfolio items found', 'site5framework' ),
        'not_found_in_trash'    => __( 'No portfolio items found in trash', 'site5framework' )
            ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
        'permalink_epmask'      => true,
        'menu_position'         => 5,
        'show_in_menu'          => true,
        'supports'              => array( 'title', 'editor', 'comments', 'page-attributes' ),
        'rewrite'               => array( 'slug' => 'portfolio/details', 'with_front' => false ),
        'has_archive'           => true
    )
);


//  Add Columns to Portfolio Edit Screen


function portfolio_edit_columns($portfolio_columns){
    $portfolio_columns = array(
        "cb"                => "<input type=\"checkbox\" />",
        "title"             => __('Title', 'site5framework'),
        "portfolio-tags"    => __('Tags', 'site5framework'),
        "author"            => __('Author', 'site5framework'),
        "comments"          => __('Comments', 'site5framework'),
        "date"              => __('Date', 'site5framework'),
    );
    $portfolio_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
    return $portfolio_columns;
}



// Styling for the custom post type icon

add_action( 'admin_head', 'wpt_portfolio_icons' );

function wpt_portfolio_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
        #menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
        #icon-edit.icon32-posts-portfolio {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-32x32.png) no-repeat;}
    </style>
<?php } ?>
<?php
// GET PORTFOLIO IMAGE  
function wpt_get_featured_image($post_ID) {  
    $post_thumbnail_id = get_image_id_by_link ( get_post_meta($post_ID, 'snbp_pitemlink', true) );
    if ($post_thumbnail_id) {  
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'small');  
        return $post_thumbnail_img[0];  
    }  
}  


function wpt_portfolio_columns_head($defaults) {  
    $defaults['featured_image'] = 'Image';  
    return $defaults;  
}  
  
// SHOW THE FEATURED IMAGE  
function wpt_portfolio_columns_content ( $column, $post_id ) {

    if ( $column == 'featured_image') {  
        $post_portfolio_image = wpt_get_featured_image($post_id);  
        if ($post_portfolio_image) {  
            echo '<img src="' . $post_portfolio_image . '" />';  
        }  
    }  
} 
 
// ADDS EXTRA INFO TO ADMIN MENU FOR PORTFOLIO POST TYPE
add_filter("manage_edit-portfolio_columns", "wpt_portfolio_columns_head");
add_action("manage_portfolio_posts_custom_column", "wpt_portfolio_columns_content", 10, 2 );

$prefix = 'snbp_';

$meta_box = array(
    'id' => 'portfoliobox',
    'title' => 'Portfolio Item Image Details',
    'page' => 'portfolio',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(

        array(
            'name' => 'Add Portfolio Item Image',
            'desc' => 'The image should be 900px wide for a proper display. This image will be also resized and used as thumbnail on portfolio list.',
            'id' => $prefix . 'pitembutton',
            'type' => 'upload',
            'std' => ''
        ),
        
        array(
            'name' => '',
            'id' => $prefix . 'pitemlink',
            'type' => 'hidden',
			'desc' => '',
            'std' => ''
        )
        
    ),

);


add_action('admin_menu', 'portfolio_add_box');

// Add meta box
function portfolio_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'portfolio_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function portfolio_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="portfolio_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'hidden':
                echo '<img src="', $meta ? $meta : $field['std'], '" id="', $field['id'], '_img" style="width:600px"/>';
                echo '<input type="hidden" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:600px" />',
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
            echo '<div class="upload_button_div"> <span id="', $field['id'], '" rel="', $post->ID ,'"><a href="#" id="set-post-thumbnail" onclick="jQuery(\'#add_image\').click();return true;" class="button-primary">Add Media</a></b></span><br /><small>'.$field['desc'].'<small></div>';
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

add_action('save_post', 'portfolio_save_data');

// Save data from meta box
function portfolio_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['portfolio_meta_box_nonce'], basename(__FILE__))) {
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

    foreach ($meta_box['fields'] as $field) {
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