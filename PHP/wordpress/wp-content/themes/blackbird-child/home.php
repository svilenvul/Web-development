<?php
/**
 * The template for displaying front page pages.
 *
 */
?>
<?php get_header(); ?>  


<!--Start Page Contentent-->
<div class="page-content">
    <!--Start Left Contentainer-->

    <!--Start Slider Wrapper--> 
    <div class="slider-wrapper"> 
        <input type="hidden" id="txt_slidespeed" value="<?php if (blackbird_get_option('blackbird_slide_speed') != '') { ?> <?php echo stripslashes(blackbird_get_option('blackbird_slide_speed')); ?>
               <?php } else { ?>3000<?php } ?>"/>               
        <div class="flexslider">
            <ul class="slides">
                <!--Start Slider-->
                <?php
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring1 = blackbird_get_option('blackbird_slideimage1');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring1)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && blackbird_get_option('blackbird_slideimage1') != '') { ?>
                    <li><?php echo blackbird_get_option('blackbird_slideimage1'); ?></li>
                <?php } else { ?>  
                    <li>  <?php if (blackbird_get_option('blackbird_slideimage1') != '') { ?>
                            <a href="<?php
                            if (blackbird_get_option('blackbird_Sliderlink1') != '') {
                                echo blackbird_get_option('blackbird_Sliderlink1');
                            }
                            ?>" >
                                <img  src="<?php echo blackbird_get_option('blackbird_slideimage1'); ?>" alt="Slide Image 1"/></a>
                        <?php } else { ?>
                            <img  src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" alt="Slide Image 1"/>
                        <?php } ?>
                        <div class="flex-caption">
                            <?php if (blackbird_get_option('blackbird_sliderheading1') != '') { ?>
                                <h1><a href="<?php
                                    if (blackbird_get_option('blackbird_Sliderlink1') != '') {
                                        echo blackbird_get_option('blackbird_Sliderlink1');
                                    }
                                    ?>"><?php echo stripslashes(blackbird_get_option('blackbird_sliderheading1')); ?></a></h1>
                                <?php } else { ?>
                                <h1><a href="#">Black Bird Theme</a></h1>
                            <?php } ?>
                            <?php if (blackbird_get_option('blackbird_sliderdes1') != '') { ?>
                                <p>					   
                                    <?php echo stripslashes(blackbird_get_option('blackbird_sliderdes1')); ?>
                                </p>
                            <?php } else { ?>
                                <p><?php _e('Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use.', 'black-bird'); ?></p>
                            <?php } ?>						 
                        </div>
                    </li>
                <?php } ?>
                <!--End Slider-->


            </ul>
        </div>
    </div>
    <!--End Silder Wrapper-->
    <div class="clear"></div>
    <div class="grid_16 alpha">
        <div class="seprator"></div>
        <div class="content grid_16 alpha omega">
            <?php if (blackbird_get_option('blackbird_mainheading') != '') { ?>
                <h1><?php echo stripslashes(blackbird_get_option('blackbird_mainheading')); ?></h1>
            <?php } else { ?>
                <h1> <?php _e('Black Bird Theme is one of the easiest theme to built your website. Easy website management through Options Panel .', 'black-bird'); ?></h1>
            <?php } ?>
        </div>
        <div class="clear"></div>
        <!--Start Feautere Content-->
        <div class="feature-content grid_16 alpha omega">
            <div class="circle-content">

                <div class="feature-content-inner one">
                    <div class="grid_6 alpha">
                        <?php if (blackbird_get_option('blackbird_wimg1') != '') { ?>
                            <div class="circle "><a href="<?php
                                if (blackbird_get_option('blackbird_link1') != '') {
                                    echo blackbird_get_option('blackbird_link1');
                                }
                                ?>"><img src="<?php echo blackbird_get_option('blackbird_wimg1'); ?>" alt="First Feature Image" /></a></div>
                            <?php } else { ?>
                            <div class="circle"><a href="<?php
                                if (blackbird_get_option('blackbird_link1') != '') {
                                    echo blackbird_get_option('blackbird_link1');
                                }
                                ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img1.jpg" alt="First Feature Image" /></a></div>
                            <?php } ?>
                    </div>
                    <div class=" grid_10 omega">
                        <?php if (blackbird_get_option('blackbird_headline1') != '') { ?><h2><a href="<?php
                                if (blackbird_get_option('blackbird_link1') != '') {
                                    echo blackbird_get_option('blackbird_link1');
                                }
                                ?>"><?php echo stripslashes(blackbird_get_option('blackbird_headline1')); ?></a></h2>
                        <?php } else { ?> <h2 class="feature-content-inner-heading"><a href="#"><?php _e('Fully Responsive WordPress Theme', 'black-bird'); ?></a></h2>
                        <?php } ?>
                        <?php if (blackbird_get_option('blackbird_feature1') != '') { ?>
                            <p><?php echo stripslashes(blackbird_get_option('blackbird_feature1')); ?></p>
                        <?php } else { ?>
                            <p><?php _e('Blackbird  is a unique responsive WordPress theme. The theme design is fabulous enough giving your visitors the absolute reason to stay on your site.', 'black-bird'); ?></p>
                        <?php } ?>
                        <a class="read-more" href="<?php
                        if (blackbird_get_option('blackbird_link1') != '') {
                            echo blackbird_get_option('blackbird_link1');
                        }
                        ?>"><?php _e('Повече', 'black-bird'); ?></a> 
                    </div></div>

                <div class="feature-content-inner two">
                    <div class="grid_6 alpha">
                        <?php if (blackbird_get_option('blackbird_fimg2') != '') { ?>
                            <div class="circle "><a href="<?php
                                if (blackbird_get_option('blackbird_link2') != '') {
                                    echo blackbird_get_option('blackbird_link2');
                                }
                                ?>"><img src="<?php echo blackbird_get_option('blackbird_fimg2'); ?>" alt="second Feature Image" /></a></div>
                            <?php } else { ?>
                            <div class="circle"><a href="<?php
                                if (blackbird_get_option('blackbird_link2') != '') {
                                    echo blackbird_get_option('blackbird_link2');
                                }
                                ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img2.jpg" alt="second Feature Image" /></a></div>

                        <?php } ?>
                    </div>
                    <div class="grid_10 omega">
                        <?php if (blackbird_get_option('blackbird_headline2') != '') { ?><h2><a href="<?php
                                if (blackbird_get_option('blackbird_link2') != '') {
                                    echo blackbird_get_option('blackbird_link2');
                                }
                                ?>"><?php echo stripslashes(blackbird_get_option('blackbird_headline2')); ?></a></h2>
                        <?php } else { ?> <h2 class="feature-content-inner-heading"><a href="#"><?php _e('Easy Website Customization ', 'black-bird'); ?></a></h2>
                        <?php } ?>
                        <?php if (blackbird_get_option('blackbird_feature2') != '') { ?>
                            <p><?php echo stripslashes(blackbird_get_option('blackbird_feature2')); ?></p>
                        <?php } else { ?>
                            <p><?php _e('You will definitely love the Theme. The speciality of the Theme is the easiness through which you can get the site ready for yourself or your client. ', 'black-bird'); ?> </p>
                        <?php } ?>
                        <a class="read-more" href="<?php
                        if (blackbird_get_option('blackbird_link2') != '') {
                            echo blackbird_get_option('blackbird_link2');
                        }
                        ?>"><?php _e('Повече', 'black-bird'); ?></a> </div></div>

                <div class="feature-content-inner three">
                    <div class="grid_6 alpha">
                        <?php if (blackbird_get_option('blackbird_fimg3') != '') { ?>
                            <div class="circle "><a href="<?php
                                if (blackbird_get_option('blackbird_link3') != '') {
                                    echo blackbird_get_option('blackbird_link3');
                                }
                                ?>"><img src="<?php echo blackbird_get_option('blackbird_fimg3'); ?>" alt="Three Feature Image"/></a></div>
                            <?php } else { ?>
                            <div class="circle"><a href="<?php
                                if (blackbird_get_option('blackbird_link3') != '') {
                                    echo blackbird_get_option('blackbird_link3');
                                }
                                ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/img3.jpg" alt="Three Feature Image" /></a></div>
                            <?php } ?> 
                    </div>
                    <div class="grid_10 omega">
                        <?php if (blackbird_get_option('blackbird_headline3') != '') { ?><h2><a href="<?php
                                if (blackbird_get_option('blackbird_link3') != '') {
                                    echo blackbird_get_option('blackbird_link3');
                                }
                                ?>"><?php echo stripslashes(blackbird_get_option('blackbird_headline3')); ?></a></h2>
                        <?php } else { ?> <h2 class="feature-content-inner-heading"><a href="#"><?php _e('Stylish Color Schemes', 'black-bird'); ?></a></h2>
                        <?php } ?>
                        <?php if (blackbird_get_option('blackbird_feature3') != '') { ?>
                            <p><?php echo stripslashes(blackbird_get_option('blackbird_feature3')); ?></p>
                        <?php } else { ?>
                            <p> <?php _e('Easily controls the look and feel of your whole website and over 10+ stylish color schemes gives your website a <br/>fresh new look. ', 'black-bird'); ?></p>
                        <?php } ?>
                        <a class="read-more" href="<?php
                        if (blackbird_get_option('blackbird_link3') != '') {
                            echo blackbird_get_option('blackbird_link3');
                        }
                        ?>"><?php _e('Повече', 'black-bird'); ?></a> 

                    </div></div>

            </div>
        </div>	
        <!--End Feautere Content-->

        <div class="clear"></div>
    </div>
    <!--End Left Contentainer-->
    <div class="grid_8 omega">
        <!--Start Sidebar-->
        <?php get_sidebar(); ?>
        <!--End Sidebar-->
    </div> 
</div>
<!--End Page Content-->
</div>
</div>
</div>
<!--End Page Container -->
<?php get_footer(); ?>