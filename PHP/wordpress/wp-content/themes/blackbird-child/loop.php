<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
        <!--post start-->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(esc_attr__('Permalink to %s', 'black-bird'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
            <hr/>
            <div class="post_content ">
                <div class="grid_8 alpha">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post_thumbnail', array('class' => 'postimg alignleft')); ?>
                        </a>
                    <?php } else { ?>

                        <?php blackbird_get_image(595, 300); ?> 
                        <?php
                    }
                    ?>
                </div>
                <div class="excerpt grid_8 omega">
                    <?php the_excerpt(); ?>
                </div>
                <div class="clear"></div>
                <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'black-bird') . '</span>', 'after' => '</div>')); ?>
                <?php if (has_tag()) { ?>
                    <div class="tag">
                        <?php the_tags(__('Post Tagged with ', ', ', '')); ?>
                    </div>
                <?php } ?>
                <a class="read-more alignright" href="<?php the_permalink() ?>"><?php _e('Повече', 'black-bird'); ?></a> </div>

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