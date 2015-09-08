<?php namespace YC\Evo\Widgets;

/**
 * Created by PhpStorm.
 * User: Mo
 * Date: 15-9-7
 * Time: 下午3:21
 */
class BaseWidget extends \WP_Widget
{
    public $id = '';
    public $title = '';
    public $desc = '这是一个测试部件';

    /**
     * @param string $id
     * @param string $name
     * @param array  $option
     */
    public function __construct($id = '', $name = '', $option = []) {
        parent::__construct($id ?: ($this->id ?: static::className()) , $name ?: __($this->title ?: static::className()), $option ?: ['description' => __($this->desc)]);
    }

    /**
        * Strip the namespace from the class to get the actual class name
        *
        * @param string $obj Class name with full namespace
        *
        * @return string
        * @access private
        */
       public function className($obj = null)
       {
           $classname = $obj && is_object($obj) ? get_class($obj) : ($obj ? $obj : static::class);
           if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
               $classname = $matches[1];
           }
           return $classname;
       }

    // Creating widget front-end
    // This is where the action happens
    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // This is where you run the code and display the output
        echo __('Hello, World!', 'wpb_widget_domain');
        echo $args['after_widget'];
    }

    // Widget Backend
    /**
   	 * Output the settings update form.
   	 *
   	 * @since 2.8.0
   	 * @access public
   	 *
   	 * @param array $instance Current settings.
   	 * @return string Default return is 'noform'.
   	 */
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'wpb_widget_domain');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    /**
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    public static function register() {
        $class = static::class;
        add_action('widgets_init', function () use ($class) {
            register_widget($class);
        });
    }


}