<div id="shaft">
    <div class="sidebar stopped">      
        <div class="header-cust">
            <img class="aligncenter" src="//localhost:3000/wordpress/wp-content/uploads/2015/03/logo-30.03-48x48.png" alt='Лого' title="Асансьорен сервиз - Автоматизация Трейд"/>        

        </div>
        <div class="content">
            <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
                <h3 >
                    <?php _e('Категории', 'black-bird'); ?>
                </h3>
                <ul>
                    <?php wp_list_categories('title_li'); ?>
                </ul>               
            <?php endif; // end primary widget area ?>
            <?php
// A second sidebar for widgets, just because.
            if (is_active_sidebar('secondary-widget-area')) :
                ?>
                <?php dynamic_sidebar('secondary-widget-area'); ?>
            <?php endif; ?> 
        </div>
        <div class="footer-cust">
            <?php if (blackbird_get_option('blackbird_topright_cell') != '') { ?>
                <p class="important"><span class="icon-phone"></span>&nbsp; <?php echo stripslashes(blackbird_get_option('blackbird_topright_cell')); ?></p>
            <?php } else { ?>
                <p class="important"><span class="icon-phone"></span>&nbsp;Call Us (111) 234 - 5678</p>
            <?php } ?>
        </div>
    </div>
</div>