<?php

class WP_Blade
{


    protected static $compilers = array(
         'js', 'static',  'wpquery', 'wpposts', 'wpempty', 'wpend', 'debug', 'acfrepeater', 'acfend', 'define', 'assets',
    );

    public static function compile_assets($value){
        $pattern = '/(\s*)@assets\(((\s*)(.+))\)/';
        $url = "<?=get_template_directory_uri()?>";
        if(preg_match_all($pattern,$value,$matches,PREG_SET_ORDER)){
            foreach($matches as $m){
                $ext = pathinfo($m[2],PATHINFO_EXTENSION);
                $file = "<?=$m[2]?>";
                if(strpos($file,'.js')){
                    $replacement = "<script type='text/javascript' src='$url/assets/$file'></script>";
                } elseif(strpos($file,'.css')) {
                    $replacement = "<link rel='stylesheet' href='$url/assets/$file' type='text/css' />";
                } else {
                    $replacement = "$url/assets/$file";
                }
                $value = str_replace($m[0],$m[1].$replacement,$value);
            }
        }

        return $value;
    }

    public static function compile_js($value){
        $pattern = '/(\s*)@js\(((\s*)(.+))\)/';
        $url = "<?=get_template_directory_uri()?>";
        if(preg_match_all($pattern,$value,$matches,PREG_SET_ORDER)){
            foreach($matches as $m){
                $ext = pathinfo($m[2],PATHINFO_EXTENSION);
                $file = "<?=$m[2]?>";
                //if(strpos($file,'.js')){
                    $replacement = "<script type='text/javascript' src='$url/static/$file'></script>";
               // } elseif(strpos($file,'.css')) {
                //    $replacement = "<link rel='stylesheet' href='$url/static/$file' type='text/css' />";
                //} else {
                //    $replacement = "$url/static/$file";
                //}
                $value = str_replace($m[0],$m[1].$replacement,$value);
            }
        }

        return $value;

    }


    public static function compile_static($value){
        $pattern = '/(\s*)@\(((\s*)(.+))\)/';
        $url = "<?=get_template_directory_uri()?>";
        if(preg_match_all($pattern,$value,$matches,PREG_SET_ORDER)){
            foreach($matches as $m){
                $ext = pathinfo($m[2],PATHINFO_EXTENSION);
                $file = "<?=$m[2]?>";
                if(strpos($file,'.js')){
                    $replacement = "<script type='text/javascript' src='$url/static/$file'></script>";
                } elseif(strpos($file,'.css')) {
                    $replacement = "<link rel='stylesheet' href='$url/static/$file' type='text/css' />";
                } else {
                    $replacement = "$url/static/$file";
                }
                $value = str_replace($m[0],$m[1].$replacement,$value);
            }
        }

        return $value;

    }

    public static function compile_acfrepeater($value)
    {
        $pattern = '/(\s*)@acfrepeater\(((\s*)(.+))\)/';
        $replacement = '$1<?php if ( get_field( $2 ) ) : ';
        $replacement .= 'while ( has_sub_field( $2 ) ) : ?>';

        return preg_replace($pattern, $replacement, $value);
    }

    public static function compile_acfend($value)
    {

        return str_replace('@acfend', '<?php endwhile; endif; ?>', $value);
    }

    /**
     *
     */
    public static function compile_string($value, $view = NULL)
    {

        foreach(static::$compilers as $compiler){
            $method = "compile_{$compiler}";

            $value = static::$method($value, $view);
        }

        return $value;
    }

    /**
     *
     */
    protected static function compile_wpposts($value)
    {

        return str_replace('@wpposts', '<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>', $value);
    }

    /**
     *
     */
    protected static function compile_wpquery($value)
    {

        $pattern = '/(\s*)@wpquery(\s*\(.*\))/';
        $replacement = '$1<?php $bladequery = new WP_Query$2; ';
        $replacement .= 'if ( $bladequery->have_posts() ) : ';
        $replacement .= 'while ( $bladequery->have_posts() ) : ';
        $replacement .= '$bladequery->the_post(); ?> ';

        return preg_replace($pattern, $replacement, $value);
    }

    /**
     *
     */
    protected static function compile_wpempty($value)
    {

        return str_replace('@wpempty', '<?php endwhile; ?><?php else: ?>', $value);
    }

    /**
     *
     */
    protected static function compile_wpend($value)
    {

        return str_replace('@wpend', '<?php endif; wp_reset_postdata(); ?>', $value);
    }

    /**
     *
     */
    protected static function compile_debug($value)
    {

        // Done last
        if(strpos($value, '@debug')) die($value);

        return $value;
    }

    /**
     *
     */
    protected static function compile_define($value)
    {

        return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
    }

}
