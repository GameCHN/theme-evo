<?php namespace YC\Theme\Cutlass;

ThemeManager::register();

class ThemeManager
{
    public static function register()
    {

        if (!class_exists('OT_Loader')) {
            require_once __DIR__ . '/option-tree/ot-loader.php';
        }
        (new \OT_Loader())->load_option_tree();


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
                'header-menu' => __('网站主菜单'),
                "person-menu" => __('用户菜单'),
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

        /*只能查看自己的文章评论*/

        if (!current_user_can("edit_others_posts")) {
            add_filter("comments_clauses", function ($clauses) {
                if (is_admin()) {
                    global $user_ID, $wpdb;
                    $clauses["join"] = ", wp_posts";
                    $clauses["where"] .= " AND wp_posts.post_author = " . $user_ID . " AND wp_comments.comment_post_ID = wp_posts.ID";
                };
                return $clauses;
            });
        }

        /*只能查看自己发布的文章*/

        add_filter("parse_query", function ($wp_query) {
            if (strpos($_SERVER["REQUEST_URI"], "/wp-admin/edit.php") !== false) {
                if (!current_user_can("add_user")) {
                    global $current_user;
                    $wp_query->set("author", $current_user->id);
                }
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

        require __DIR__ . '/Includes/admin/theme-options.php';

        /*        function auto_login_new_user($user_id)
                {
                    // 这里设置的是跳转到首页，要换成其他页面
                    // 可以将home_url()改成你指定的URL
                    // 如 wp_redirect( 'http://www.baidu.com' );
                    //wp_redirect( home_url() );
                    //exit;
                }
                */
        // 用户注册成功后自动登录，并跳转到指定页面
        // 不能使用, 后台手工注册用户也会自动登录
        add_action('user_register', function ($user_id) {
            if (!is_admin()) {
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);
            }
        });

        add_filter('get_user_option_admin_color', function () {
            return 'midnight';
        });

        //为新用户预设默认的后台配色方案
        function set_default_admin_color($user_id)
        {
            $args = array(
                'ID'          => $user_id,
                'admin_color' => 'midnight',
            );
            wp_update_user($args);
        }

        add_action('user_register', 'set_default_admin_color');


        //在菜单中添加退出
        add_filter('wp_nav_menu_items', function ($items, $args) {
            global $wp;
            //Nav location in your theme. In this case, primary nav. Adjust accordingly.
            if ($args->theme_location != 'person-menu' || !is_user_logged_in()) {
                return $items;
            }
            $link = '<a title="' . __('退出') . '" href="' . wp_logout_url(home_url(add_query_arg(array(), $wp->request))) . '">' . __('退出') . '</a>';
            return $items .= '
                        <li id="loginout-link" class="menu-item menu-type-link">' . $link . '</li>
                    ';


        }, 10, 2);

        //添加默认头像
        add_filter('avatar_defaults',
            function ($avatar_defaults) {
                $myavatar = home_url('/static/assets/avatar.png');
                $avatar_defaults[$myavatar] = "本地默认头像";
                return $avatar_defaults;
            });


        // wpuf 用户表单显示hook
        add_action('form_register_userform',
            function ($form_id, $post_id, $form_settings) {
                // do what ever you want
                //kd(func_get_args());
            }, 10, 3);

        // wpuf 填写注册表单后自动登录
        //add_action('wpuf_after_register', function ($user_id, $userdata, $form_id, $form_settings) {
        //
        //    return true;
        //}, 10, 3);


    }


}

//kd(ot_get_option('phone_num'));

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


// 添加律师资料
//require_once __DIR__ . '/custom_post/post_contact.php';

//if (!function_exists('_')) {
//    function _($string)
//    {
//        return $string;
//    }
//}


