
<div class="sidebar stopped">   
    
    <div class="header-info">
        <?php if (blackbird_get_option('blackbird_topright_cell') != '') { ?>
            <p class="cell"><img src="<?php echo get_template_directory_uri(); ?>/images/call-us.png"  class="call-us" />&nbsp; <?php echo stripslashes(blackbird_get_option('blackbird_topright_cell')); ?></p>
        <?php } else { ?>
            <p class="cell"><img src="<?php echo get_template_directory_uri(); ?>/images/call-us.png"  class="call-us" />&nbsp;Call Us (111) 234 - 5678</p>
            <?php } ?>
            <?php if (blackbird_get_option('blackbird_topright_text') != '') { ?>
            <p><?php echo stripslashes(blackbird_get_option('blackbird_topright_text')); ?></p>
        <?php } else { ?>
            <p><?php _e('21/B, London Campus, British Road, Birmingham, UK', 'black-bird'); ?></p>
        <?php } ?>
    </div>

    <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
        <?php get_search_form(); ?>
        <h3>
            <?php _e('Categories', 'black-bird'); ?>
        </h3>
        <ul>
            <?php wp_list_categories('title_li'); ?>
        </ul>
        <h3>
            <?php _e('Archives', 'black-bird'); ?>
        </h3>
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul>        
    <?php endif; // end primary widget area ?>
    <?php
// A second sidebar for widgets, just because.
    if (is_active_sidebar('secondary-widget-area')) :
        ?>
        <?php dynamic_sidebar('secondary-widget-area'); ?>
    <?php endif; ?>    
</div>