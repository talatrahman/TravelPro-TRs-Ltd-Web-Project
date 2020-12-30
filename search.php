<?php
/**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.0
 *
 * Search custom
 *
 * Created by ShineTheme
 *
 */
if(New_Layout_Helper::isNewLayout()){
    echo st()->load_template('layouts/modern/page/archive');
    return;
}
get_header();
?>
    <div class="container">
        <h1 class="page-title"><?php esc_html_e('Search Blog','traveler')?></h1>
    </div>
    <div class="container">
        <div class="row">
            <?php $sidebar_pos=apply_filters('st_blog_sidebar','right');
            if($sidebar_pos=="left"){
                get_sidebar('blog');
            }
            ?>
            <div class="<?php echo apply_filters('st_blog_sidebar','right')=='no'?'col-sm-12':'col-sm-9 col-xs-12'; ?>">
                <?php
                global $wp_query;
                if(have_posts()):
                    while(have_posts())
                    {
                        the_post();
						echo st()->load_template('blog/content-loop');
                    }
                    TravelHelper::paging();
                else:
                    get_template_part('content','none');
                endif;
                wp_reset_query();
                wp_reset_postdata();
                ?>
            </div>
            <?php $sidebar_pos=apply_filters('st_blog_sidebar','right');
            if($sidebar_pos=="right"){
                get_sidebar('blog');
            }
            ?>
        </div>
    </div>
<?php
get_footer();?>