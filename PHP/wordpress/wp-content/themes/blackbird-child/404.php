<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<div class="grid_24">
<div class="page-heading">
    <h1 class="entry-title">
        <?php _e('Съжаляваме, грешен адрес?', 'black-bird'); ?>
    </h1>
</div>
<div class="clear"></div>
<!--Start Page Content -->
<div class="page-content-container">
    <div class="page-content">
        <div class="grid_16 alpha">
            <div class="content-bar">               
                <?php the_content(); ?>	
                <header class="entry-header">               
                </header>
                <p>
                    <?php _e('Не можахме да намерим страницата, която търсихте. Опитайте с нашата търсачка', 'black-bird'); ?>
                </p>
                <?php get_search_form(); ?>
                <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10,'title'=>'Скорошни постове'), array('widget_id' => '404')); ?>
                <div class="widget">
                    <h2 class="widgettitle">
                        <?php _e('Най-посещавани категори', 'black-bird'); ?>
                    </h2>
                    <ul>
                        <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                    </ul>
                </div>
                <?php
                /* translators: %1$s: smilie */
                $archive_content = '<p>' . sprintf(__('Опитайте с нашите месечни архиви. %1$s', 'black-bird'), convert_smilies(':)')) . '</p>';
                the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1,'title'=>'Архиви'), array('after_title' => '</h2>' . $archive_content));
                ?>
              
            </div>
        </div>
        <div class="grid_8 omega">
            <!--Start Sidebar-->
            <?php get_sidebar(); ?>
            <!--End Sidebar-->
        </div> 
    </div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>