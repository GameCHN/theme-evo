<?php
/**
 * Created by Mo.
 * 2015/2/11@12:20 <post_contact.php>
 */

(new question_post())->register();

class question_post
{

    var $name = '法律咨询';
    var $singular_name = '法律咨询';
    var $id = 'question';
    var $menu_name = '法律咨询';

    function register()
    {

        # 自定义文章类型
        # http://blog.wpjam.com/article/wordpress-post-type/

        add_action('init', function () {
            $labels = array(
                'name' => _x($this->name, 'post type 名称'),
                'singular_name' => _x($this->singular_name, 'post type 单个 item 时的名称，因为英文有复数'),
                'add_new' => _x('新建', '添加新内容的链接名称'),
                'add_new_item' => __('新建一个' . $this->name),
                'edit_item' => __('编辑' . $this->name),
                'new_item' => __('新' . $this->name),
                'all_items' => __('全部'),
                'view_item' => __('查看' . $this->name),
                'search_items' => __('搜索' . $this->name),
                'not_found' => __('没有找到有关' . $this->name),
                'not_found_in_trash' => __('回收站里面没有相关' . $this->name),
                'parent_item_colon' => '',
                'menu_name' => $this->menu_name,
            );

            $args = array(
                'labels' => $labels,
                'description' => '我们网站的' . $this->name . '信息',
                'public' => TRUE,
                'menu_position' => 5,
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
                'has_archive' => TRUE
            );
            register_post_type($this->id, $args);
        });

        add_action('init', function () {
            $labels = array(
                'name' => _x($this->name . '分类', 'taxonomy 名称'),
                'singular_name' => _x($this->singular_name . '分类', 'taxonomy 单数名称'),
                'search_items' => __('搜索分类'),
                'all_items' => __('所有分类'),
                'parent_item' => __('该' . $this->name . '分类的上级分类'),
                'parent_item_colon' => __('该' . $this->name . '分类的上级分类：'),
                'edit_item' => __('编辑分类'),
                'update_item' => __('更新分类'),
                'add_new_item' => __('添加新分类'),
                'new_item_name' => __('新分类'),
                'menu_name' => __('分类'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => TRUE,
            );
            register_taxonomy($this->id . '_category', $this->id, $args);
        }, 0);

        add_action("manage_posts_custom_column", function ($column) {
            global $post;
            switch ($column) {
                case $this->id . "_recommend":
                    echo get_post_meta($post->ID, $this->id . '_recommend', TRUE) ? '是' : '否';
                    break;
            }
        });

        add_filter("manage_edit-movie_columns", function ($columns) {

            $columns[$this->id . '_recommend'] = '推荐';

            return $columns;
        });

        add_filter($this->id . '_template', function ($template) {
            return $template;
        });

    }

    function bak()
    {

        add_action('add_meta_boxes', function () {
            add_meta_box('movie_director', '扩展资料', function ($post) {
                // 创建临时隐藏表单，为了安全
                wp_nonce_field('movie_director_meta_box', 'movie_director_meta_box_nonce');
                // 获取之前存储的值
                $value = get_post_meta($post->ID, '_question_name', TRUE);

                ?>

                <label for="question_name">名称:</label>
                <input type="text" id="question_name" name="question_name" value="<?php echo esc_attr(meta('_question_name', $post->ID)); ?>" placeholder="">
                <label for="question_address">地址:</label>
                <input type="text" id="question_address" name="question_address" value="<?php echo esc_attr(meta('_question_address', $post->ID)); ?>" placeholder="">
                <?php
            }, $this->id, 'normal'/* 'side'*/, 'low');
        });

        add_action('save_post', function ($post_id) {
            // 安全检查
            // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
            if (!isset($_POST['movie_director_meta_box_nonce'])) {
                return;
            }
            // 判断隐藏表单的值与之前是否相同
            if (!wp_verify_nonce($_POST['movie_director_meta_box_nonce'], 'movie_director_meta_box')) {
                return;
            }
            // 判断该用户是否有权限
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }

            // 判断 Meta Box 是否为空
            if (!isset($_POST['movie_director'])) {
                return;
            }

            $movie_director = sanitize_text_field($_POST['movie_director']);
            update_post_meta($post_id, '_movie_director', $movie_director);
        });

    }
}
