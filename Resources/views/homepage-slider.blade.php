<!-- begin #slider -->

<div id="slider_container">
    <div class="flexslider loading wrapper slider-<?php echo of_get_option('slidereffect'); ?>">
        <ul class="slides">

            <?php
            global $wp_query, $post;
            $captions = array();
            $tmp = $wp_query;
            $slider = get_term_by('id', of_get_option('slidertag'), 'sliders');
            $slider = $slider->slug;
            $wp_query = new WP_Query('post_type=featured&orderby=menu_order&order=ASC&sliders=' . $slider . '&posts_per_page=99');
            if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
            $fitemlink = get_post_meta($post->ID, 'snbf_fitemlink', true);
            $fitemcaption = get_post_meta($post->ID, 'snbf_fitemcaption', true);

            ?>


            <?php
            $thumbId = get_image_id_by_link(get_post_meta($post->ID, 'snbf_slideimage_src', true));
            $thumb = wp_get_attachment_image_src($thumbId, 'slide', false);

            ?>
            <li>
                <?php if ($fitemlink != '') : ?>
                <a href="<?php echo $fitemlink ?>"><img src="<?php echo $thumb[0] ?>" alt="<?php echo $fitemcaption ?>"/></a>
                <?php else : ?>
                <img src="<?php echo $thumb[0] ?>" alt="<?php echo $fitemcaption ?>"/>
                <?php endif ?>

                <?php if ($fitemcaption != '') : ?>
                <div class="flex-caption">
                    <h3><?php echo $fitemcaption ?></h3>
                </div>
                <?php endif ?>
            </li>


            <?php
            endwhile; wp_reset_query();
            endif;
            $wp_query = $tmp;
            ?>
        </ul>
    </div>

</div>

<!-- end #slider -->


<!-- end flex slider & slider settings -->