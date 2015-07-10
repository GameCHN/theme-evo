<?php
/**
 * Created by PhpStorm.
 * User: Mo
 * Date: 15-7-8
 * Time: 上午5:08
 */

function items($option, $default = '')
{
    $ret = [];
    $items = ot_get_option($option, $default);
    $items = is_array($items) ? $items : explode("\n", $items);
    foreach ($items as $k => $v) {
        if (is_numeric($k)) {
            list($url, $title) = array_map('trim', explode('=', $v, 2));
        } else {
            $url = $k;
            $title = $v;
        }
        $ret[] = ['url' => $url, 'title' => $title];
    }

    return $ret;
}

function my_fixed_wp_logout_url($redirect = '')
{
    $args = array('action' => 'logout');
    if (!empty($redirect)) {
        $args['redirect_to'] = urlencode($redirect);
    }

    $logout_url = add_query_arg($args, site_url('wp-login.php', 'login'));
    $logout_url = wp_nonce_url($logout_url, 'log-out');

    return $logout_url;
}

function is_post_type($type)
{
    global $wp_query;
    if ($type == get_post_type($wp_query->post->ID)) {
        return true;
    }
    return false;
}

/**
 * Language list Code for non-Widget users
 *
 * @global array $q_config
 * @param string $sep
 */
function qtrans_generate_language_list($sep = " | ")
{
    global $q_config;
    $languages = qtrans_getSortedLanguages();
    $num_langs = count($languages);
    $id = 'qtranslate-chooser';
    $url = is_404() ? get_option('home') : '';

    echo '<div class="qtrans_language_chooser" id="' . $id . '">';
    foreach ($languages as $language) {
        $classes = array('lang-' . $language);
        if ($language == $q_config['language']) {
            $classes[] = 'active';
        }

        echo '<span class="' . implode(' ', $classes) . '"><a href="' . qtrans_convertURL($url, $language) . '"';
        echo ' hreflang="' . $language . '" title="' . $q_config['language_name'][ $language ] . '"';
        echo '>' . $q_config['language_name'][ $language ] . '</a></span>';

        if (--$num_langs > 0) {
            echo '<span class="qtrans_separator">' . $sep . '</span>';
        }
    }
    echo "</div>";
}

/**
 * @param      $meta
 * @param      $count
 * @param null $extra
 * @return \WP_Query
 */
function query_meta($meta, $count, $extra = null)
{
    wp_reset_postdata();
    $args = array();
    if ($meta) {
        foreach (is_array($meta) ? $meta : [$meta] as $k => $v) {
            list($key, $compare) = preg_split("/\s+/", $k, 2);
            isset($compare) or $compare = is_array($v) ? 'IN' : '=';
            $arr = ['key' => $key, 'value' => $v, 'compare' => $compare];
            is_numeric($v) and $arr['type'] = 'numeric';
            $args['meta_query'][] = $arr;
        }
    }

    $args['posts_per_page'] = $count;
    $args['orderby'] = 'modified';
    $args['order'] = 'DESC';
    if (is_array($extra)) {
        $args = array_merge($args, $extra);
    }
    $query = new WP_Query($args);

    return $query;
}

/**
 * @param      $categoies
 * @param      $count
 * @param null $extra
 * @return \WP_Query
 */
function query_category($categoies, $count, $extra = null)
{
    wp_reset_postdata();
    $args = $cats = array();
    if ($categoies) {
        foreach (is_array($categoies) ? $categoies : [$categoies] as $k => $v) {
            if ($cat_id = is_numeric($v) ? $v : get_category_by_slug($v)->term_id) {
                foreach (get_categories(['child_of' => $cat_id]) as $cat) {
                    $cat->term_id and $cats[] = $cat->term_id;
                }
                $cats[] = $cat_id;
            }

        }
        $args['category__in'] = array_unique($cats);
    }

    //kd($args,$categoies);

    $args['posts_per_page'] = $count;
    $args['orderby'] = 'modified';
    $args['order'] = 'DESC';

    if (is_array($extra)) {
        $args = array_merge($args, $extra);
    }
    $query = new WP_Query($args);

    return $query;
}

/*
Plugin Name: 获取 WordPress 特色图片地址
Plugin URI:  http://blog.wpjam.com/m/get_post_thumbnail_url/
Description: 获取 WordPress 特色图片地址。
Version: 0.1
Author: Denis
Author URI: http://blog.wpjam.com/
*/
function get_thumb($type = 'thumbnail', $post_id = null)
{
    $post_id = (null === $post_id) ? get_the_ID() : $post_id;
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {//$thumbnail_id
        $thumb = get_the_post_thumbnail($post_id, $type);//wp_get_attachment_image_src

        return $thumb;
    } else {
        return false;
    }
}

if (!function_exists('excerpt')):
    function excerpt($limit)
    {
        return wp_trim_words(get_the_excerpt(), $limit, ' ...');
    }
endif;

function meta($name, $post_id = null)
{
    return get_post_meta($post_id ?: get_the_ID(), $name, true);
}
