<?php
/**
 * The Template for displaying all single posts.
 * 
 */
?>
<?php get_header(); ?>

<!--Start Page Content -->
<div class="page-heading">
    <h1 class="page-title"><?php the_eldest_category(); ?></h1>
    <div class="clear"></div>
</div>
<div class="page-content-container">
    <div class="page-content single">
        <div class="grid_16 alpha">
            <div class="content-bar">
                <!-- Start the Loop. -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
                        <!--post start-->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1 class="post_title single"><span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(esc_attr__('Permalink to %s', 'black-bird'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a><span></h1>
                                        <div class="post_content">
                                            <?php the_content(); ?>
                                            <div class="clear"></div>

                                            <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'black-bird') . '</span>', 'after' => '</div>')); ?>
                                            <?php if (has_tag()) { ?>
                                                <div class="tag">
                                                    <?php the_tags(__('Post Tagged with ', ', ', '')); ?>
                                                </div>
                                            <?php } ?>
                                        </div>                              
                                        </div>
                                        <!--End Post-->
                                        <?php
                                    endwhile;
                                else:
                                    ?>
                                    <div class="post">
                                        <p>
                                            <?php _e('Sorry, no posts matched your criteria.', 'black-bird'); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                                <!--End Loop-->
                                <nav id="nav-single"> <span class="nav-previous">
                                        <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'black-bird')); ?>
                                    </span> <span class="nav-next">
                                        <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'black-bird')); ?>
                                    </span> </nav>

                                </div>
                                </div>
                                <div class="grid_8 omega">
                                    <!--Start sidebar-->
                                    <?php get_sidebar(); ?>
                                    <!--End sidebar-->
                                </div>
                                </div>
                                </div>
                                <!--End Page Content -->
                                </div>
                                </div>
                                </div>
                                <!--End Page Container -->
                                <?php get_footer(); ?> 