<?php namespace YC\Theme\Cutlass;

ThemeManager::register();

class ThemeManager
{
    public static function register()
    {

        foreach (glob(__DIR__ . '/Helpers/*.php') as $file) {
            if (preg_match("/^\w+/", basename($file))) {
                require $file;
            }
        }


        //使WordPress支持post thumbnail
        if (function_exists('add_theme_support')) {
            add_theme_support('post-thumbnails');
        }

        // 支持自定义菜单
        if (function_exists('register_nav_menus')) {
            register_nav_menus(array(
                'header-menu' => __('topnav')
            ));
        }


        $sidebars = array('sidebar-profile', 'Post Sidebar', 'Page Sidebar');
        foreach ($sidebars as $name) {
            register_sidebar(array(
                'name'          => $name,
                'before_widget' => '<div>',
                'after_widget'  => '</div>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            ));
        }


        if (function_exists('add_image_size')) {
            add_image_size('60x60', 60, 60, true); // (cropped)
            add_image_size('245x163', 245, 163, true); // (cropped)
            add_image_size('337x225', 337, 225, true); // (cropped)

        }

        /*        //自动选择模板的函数
                //通过 single_template 钩子挂载函数
                add_filter('single_template', function ($single) {
                    //定义模板文件所在目录为 single 文件夹
                    define('SINGLE_PATH', TEMPLATEPATH . '/single');
                    global $wp_query, $post;
                    //通过分类别名或ID选择模板文件
                    $ext = '.blade.php';
                    foreach ((array)get_the_category() as $cat) :
                        if (file_exists(SINGLE_PATH . '/' . $cat->slug . $ext)) {
                            return SINGLE_PATH . '/' . $cat->slug . $ext;
                        } elseif (file_exists(SINGLE_PATH . '/' . $cat->term_id . $ext)) {
                            return SINGLE_PATH . '/' . $cat->term_id . $ext;
                        }
                    endforeach;

                    return $single;
                });
        */

        add_action('load-themes.php', function () {
            if ($GLOBALS['pagenow'] != 'themes.php' || !isset($_GET['activated'])) {
                return;
            }//仅主题启用时执行
            flush_rewrite_rules();//更新伪静态规则, 解决自定义文章类型页面 404 的问题
        });

        add_filter('excerpt_more', function ($more) {
            return ' ...';
        });

        add_filter('excerpt_length', function ($length) {
            return 200;
        });

        //apply_filters('logout_url', 'my_fixed_wp_logout_url');


        add_filter('show_admin_bar', '__return_false');

        add_filter('gettext', function ($translated, $text, $domain) {
            if ($domain != 'cutlass') {
                $t = __($text, 'cutlass');
                if ($t != $text) {
                    $translated = $t;
                }
            }
            return $translated;
        }, 10, 3);

        //让主题支持语言包
        add_action('after_setup_theme', function () {
            load_theme_textdomain('cutlass', get_template_directory() . '/Resources/lang');
            $locale = get_locale();
            $locale_file = get_template_directory() . "/Resources/lang/$locale.php";
            if (is_readable($locale_file)) {
                require_once($locale_file);
            }
        });

        add_filter('the_content', function ($content) {

            if (!is_page()) {
                return $content;
            }

            $generated = \Blade::compileString($content);

            ob_start();
            extract($GLOBALS, EXTR_SKIP);

            try {
                eval("?>" . $generated);
            } catch (\Exception $e) {
                ob_get_clean();
                throw $e;
            }

            $content = ob_get_clean();

            return $content;
        });

    }


}


//只在前台隐藏工具条
//if ( !is_admin() || 1) { remove_action( 'init', '_wp_admin_bar_init' ); }
/*
add_action('wp_head', function (){ ?>
  <style type="text/css">
    #wpadminbar {
      display: none;
    }
  </style>
<?php
});
*/


//kd(ot_get_option('phone_num') ?: '1800 011 2211');


// 添加律师资料
//require_once __DIR__ . '/custom_post/post_contact.php';

//if (!function_exists('_')) {
//    function _($string)
//    {
//        return $string;
//    }
//}


