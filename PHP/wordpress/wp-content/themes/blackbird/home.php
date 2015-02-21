<?php
/**
 * The template for displaying front page pages.
 *
 */
?>
<?php get_header(); ?>  
<div class="clear"></div>
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
                        <img  src="<?php echo get_template_directory_uri(); ?>/images/slider1.png" alt="Slide Image 1"/>
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
                            <p>Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use. </p>
                        <?php } ?>						 
                    </div>
                </li>
            <?php } ?>
            <!--End Slider-->
            <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring2 = blackbird_get_option('blackbird_slideimage2');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring2)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && blackbird_get_option('blackbird_slideimage2') != '') { ?>
                <li><?php echo blackbird_get_option('blackbird_slideimage2'); ?></li>
            <?php } else { ?>  
                <?php if (blackbird_get_option('blackbird_slideimage2') != '') { ?>
                    <li>  <?php if (blackbird_get_option('blackbird_slideimage2') != '') { ?>
                            <a href="<?php
                            if (blackbird_get_option('blackbird_Sliderlink2') != '') {
                                echo blackbird_get_option('blackbird_Sliderlink2');
                            }
                            ?>" >
                                <img src="<?php echo blackbird_get_option('blackbird_slideimage2'); ?>" alt="Slide Image 2"/> </a>
                            <?php
                        } else {
                            
                        }
                        ?>
                        <div class="flex-caption">
                            <?php if (blackbird_get_option('blackbird_sliderheading2') != '') { ?>
                                <h1><a href="<?php
                                    if (blackbird_get_option('blackbird_Sliderlink2') != '') {
                                        echo blackbird_get_option('blackbird_Sliderlink2');
                                    }
                                    ?>"><?php echo stripslashes(blackbird_get_option('blackbird_sliderheading2')); ?></a></h1>
                                    <?php
                                } else {
                                    
                                }
                                ?>
                                <?php if (blackbird_get_option('blackbird_sliderdes2') != '') { ?>
                                <p>					   
                                    <?php echo stripslashes(blackbird_get_option('blackbird_sliderdes2')); ?>
                                </p>
                                <?php
                            } else {
                                
                            }
                            ?>
                        </div>					
                    </li>
                    <?php
                }
            }
            ?>
            <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring3 = blackbird_get_option('blackbird_slideimage3');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring3)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && blackbird_get_option('blackbird_slideimage3') != '') { ?>
                <li><?php echo blackbird_get_option('blackbird_slideimage3'); ?></li>
            <?php } else { ?> 
                <?php if (blackbird_get_option('blackbird_slideimage3') != '') { ?>
                    <li> <?php if (blackbird_get_option('blackbird_slideimage3') != '') { ?>
                            <a href="<?php
                            if (blackbird_get_option('blackbird_Sliderlink3') != '') {
                                echo blackbird_get_option('blackbird_Sliderlink3');
                            }
                            ?>" >
                                <img  src="<?php echo blackbird_get_option('blackbird_slideimage3'); ?>" alt="Slide Image 3"/></a>
                        <?php } ?>
                        <div class="flex-caption">
                            <?php if (blackbird_get_option('blackbird_sliderheading3') != '') { ?>
                                <h1><a href="<?php
                                    if (blackbird_get_option('blackbird_Sliderlink3') != '') {
                                        echo blackbird_get_option('blackbird_Sliderlink3');
                                    }
                                    ?>"><?php echo stripslashes(blackbird_get_option('blackbird_sliderheading3')); ?></a></h1>
                                <?php } ?>
                                <?php if (blackbird_get_option('blackbird_sliderdes3') != '') { ?>
                                <p>					   
                                    <?php echo stripslashes(blackbird_get_option('blackbird_sliderdes3')); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <!--Start Slider-->
            <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring4 = blackbird_get_option('blackbird_slideimage4');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring4)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && blackbird_get_option('blackbird_slideimage4') != '') { ?>
                <li><?php echo blackbird_get_option('blackbird_slideimage4'); ?></li>
            <?php } else { ?>  
                <?php if (blackbird_get_option('blackbird_slideimage4') != '') { ?>
                    <li> <?php if (blackbird_get_option('blackbird_slideimage4') != '') { ?>
                            <a href="<?php
                            if (blackbird_get_option('blackbird_Sliderlink4') != '') {
                                echo blackbird_get_option('blackbird_Sliderlink4');
                            }
                            ?>" >
                                <img  src="<?php echo blackbird_get_option('blackbird_slideimage4'); ?>" alt="Slide Image 4"/></a>
                        <?php } ?>
                        <div class="flex-caption">
                            <?php if (blackbird_get_option('blackbird_sliderheading4') != '') { ?>
                                <h1><a href="<?php
                                    if (blackbird_get_option('blackbird_Sliderlink4') != '') {
                                        echo blackbird_get_option('blackbird_Sliderlink4');
                                    }
                                    ?>"><?php echo stripslashes(blackbird_get_option('blackbird_sliderheading4')); ?></a></h1>
                                <?php } ?>
                                <?php if (blackbird_get_option('blackbird_sliderdes4') != '') { ?>
                                <p>					   
                                    <?php echo stripslashes(blackbird_get_option('blackbird_sliderdes4')); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <!--End Slider-->

            <!--Start Slider-->
            <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring5 = blackbird_get_option('blackbird_slideimage5');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring5)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && blackbird_get_option('blackbird_slideimage5') != '') { ?>
                <li><?php echo blackbird_get_option('blackbird_slideimage5'); ?></li>
            <?php } else { ?>  
                <?php if (blackbird_get_option('blackbird_slideimage5') != '') { ?>
                    <li> <?php if (blackbird_get_option('blackbird_slideimage5') != '') { ?>
                            <a href="<?php
                            if (blackbird_get_option('blackbird_Sliderlink5') != '') {
                                echo blackbird_get_option('blackbird_Sliderlink5');
                            }
                            ?>" >
                                <img  src="<?php echo blackbird_get_option('blackbird_slideimage5'); ?>" alt="Slide Image 4"/></a>
                        <?php } ?>
                        <div class="flex-caption">
                            <?php if (blackbird_get_option('blackbird_sliderheading5') != '') { ?>
                                <h1><a href="<?php
                                    if (blackbird_get_option('blackbird_Sliderlink5') != '') {
                                        echo blackbird_get_option('blackbird_Sliderlink5');
                                    }
                                    ?>"><?php echo stripslashes(blackbird_get_option('blackbird_sliderheading5')); ?></a></h1>
                                <?php } ?>
                                <?php if (blackbird_get_option('blackbird_sliderdes5') != '') { ?>
                                <p>					   
                                    <?php echo stripslashes(blackbird_get_option('blackbird_sliderdes5')); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <!--End Slider-->


            <!--Start Slider-->
            <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring6 = blackbird_get_option('blackbird_slideimage6');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring6)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && blackbird_get_option('blackbird_slideimage6') != '') { ?>
                <li><?php echo blackbird_get_option('blackbird_slideimage6'); ?></li>
            <?php } else { ?>  
                <?php if (blackbird_get_option('blackbird_slideimage6') != '') { ?>
                    <li> <?php if (blackbird_get_option('blackbird_slideimage6') != '') { ?>
                            <a href="<?php
                            if (blackbird_get_option('blackbird_Sliderlink6') != '') {
                                echo blackbird_get_option('blackbird_Sliderlink6');
                            }
                            ?>" >
                                <img  src="<?php echo blackbird_get_option('blackbird_slideimage6'); ?>" alt="Slide Image 4"/></a>
                        <?php } ?>
                        <div class="flex-caption">
                            <?php if (blackbird_get_option('blackbird_sliderheading6') != '') { ?>
                                <h1><a href="<?php
                                    if (blackbird_get_option('blackbird_Sliderlink6') != '') {
                                        echo blackbird_get_option('blackbird_Sliderlink6');
                                    }
                                    ?>"><?php echo stripslashes(blackbird_get_option('blackbird_sliderheading6')); ?></a></h1>
                                <?php } ?>
                                <?php if (blackbird_get_option('blackbird_sliderdes6') != '') { ?>
                                <p>					   
                                    <?php echo stripslashes(blackbird_get_option('blackbird_sliderdes6')); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <!--End Slider-->





        </ul>
    </div>
</div>
<!--End Silder Wrapper-->
<div class="clear"></div>
<div class="seprator"></div>
<div class="content">
    <?php if (blackbird_get_option('blackbird_mainheading') != '') { ?>
        <h1><?php echo stripslashes(blackbird_get_option('blackbird_mainheading')); ?></h1>
    <?php } else { ?>
        <h1>  Black Bird Theme is one of the easiest theme to built your website. Easy website management through Options Panel .</h1>
    <?php } ?>
</div>
<div class="clear"></div>
<div class="feature-content">
    <div class="circle-content">
        <div class="grid_8 alpha">
            <div class="feature-content-inner one">
                <?php if (blackbird_get_option('blackbird_wimg1') != '') { ?>
                    <div class="circle"><a href="<?php
                        if (blackbird_get_option('blackbird_link1') != '') {
                            echo blackbird_get_option('blackbird_link1');
                        }
                        ?>"><img src="<?php echo blackbird_get_option('blackbird_wimg1'); ?>" alt="First Feature Image" /></a></div>
                    <?php } else { ?>
                    <div class="circle"><a href="<?php
                        if (blackbird_get_option('blackbird_link1') != '') {
                            echo blackbird_get_option('blackbird_link1');
                        }
                        ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img1.png" alt="First Feature Image" /></a></div>
                    <?php } ?>
                        <?php if (blackbird_get_option('blackbird_headline1') != '') { ?><h2><a href="<?php
                                if (blackbird_get_option('blackbird_link1') != '') {
                                    echo blackbird_get_option('blackbird_link1');
                                }
                                ?>"><?php echo stripslashes(blackbird_get_option('blackbird_headline1')); ?></a></h2>
                <?php } else { ?> <h2 class="feature-content-inner-heading"><a href="#">Fully Responsive WordPress Theme</a></h2>
                <?php } ?>
                <?php if (blackbird_get_option('blackbird_feature1') != '') { ?>
                    <p><?php echo stripslashes(blackbird_get_option('blackbird_feature1')); ?></p>
                <?php } else { ?>
                    <p>Blackbird  is a unique responsive WordPress theme. The theme design is fabulous enough giving your visitors the absolute reason to stay on your site.</p>
                <?php } ?>
                <a class="read-more" href="<?php
                if (blackbird_get_option('blackbird_link1') != '') {
                    echo blackbird_get_option('blackbird_link1');
                }
                ?>">Read More</a> </div>
        </div>
        <div class="grid_8">
            <div class="feature-content-inner two">
                <?php if (blackbird_get_option('blackbird_fimg2') != '') { ?>
                    <div class="circle"><a href="<?php
                        if (blackbird_get_option('blackbird_link2') != '') {
                            echo blackbird_get_option('blackbird_link2');
                        }
                        ?>"><img src="<?php echo blackbird_get_option('blackbird_fimg2'); ?>" alt="second Feature Image" /></a></div>
                    <?php } else { ?>
                    <div class="circle"><a href="<?php
                        if (blackbird_get_option('blackbird_link2') != '') {
                            echo blackbird_get_option('blackbird_link2');
                        }
                        ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/img2.png" alt="second Feature Image" /></a></div>
                    <?php } ?>
                        <?php if (blackbird_get_option('blackbird_headline2') != '') { ?><h2><a href="<?php
                                if (blackbird_get_option('blackbird_link2') != '') {
                                    echo blackbird_get_option('blackbird_link2');
                                }
                                ?>"><?php echo stripslashes(blackbird_get_option('blackbird_headline2')); ?></a></h2>
                <?php } else { ?> <h2 class="feature-content-inner-heading"><a href="#">Easy Website Customization </a></h2>
                <?php } ?>
                <?php if (blackbird_get_option('blackbird_feature2') != '') { ?>
                    <p><?php echo stripslashes(blackbird_get_option('blackbird_feature2')); ?></p>
                <?php } else { ?>
                    <p>You will definitely love the Theme. The speciality of the Theme is the easiness through which you can get the site ready for yourself or your client. </p>
                <?php } ?>
                <a class="read-more" href="<?php
                if (blackbird_get_option('blackbird_link2') != '') {
                    echo blackbird_get_option('blackbird_link2');
                }
                ?>">Read More</a> </div>
        </div>
        <div class=" grid_8 omega">
            <div class="feature-content-inner three">
                <?php if (blackbird_get_option('blackbird_fimg3') != '') { ?>
                    <div class="circle"><a href="<?php
                        if (blackbird_get_option('blackbird_link3') != '') {
                            echo blackbird_get_option('blackbird_link3');
                        }
                        ?>"><img src="<?php echo blackbird_get_option('blackbird_fimg3'); ?>" alt="Three Feature Image"/></a></div>
                    <?php } else { ?>
                    <div class="circle"><a href="<?php
                        if (blackbird_get_option('blackbird_link3') != '') {
                            echo blackbird_get_option('blackbird_link3');
                        }
                        ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/img3.png" alt="Three Feature Image" /></a></div>
                    <?php } ?>
                        <?php if (blackbird_get_option('blackbird_headline3') != '') { ?><h2><a href="<?php
                                if (blackbird_get_option('blackbird_link3') != '') {
                                    echo blackbird_get_option('blackbird_link3');
                                }
                                ?>"><?php echo stripslashes(blackbird_get_option('blackbird_headline3')); ?></a></h2>
                <?php } else { ?> <h2 class="feature-content-inner-heading"><a href="#">Stylish Color Schemes</a></h2>
                <?php } ?>
                <?php if (blackbird_get_option('blackbird_feature3') != '') { ?>
                    <p><?php echo stripslashes(blackbird_get_option('blackbird_feature3')); ?></p>
                <?php } else { ?>
                    <p> Easily controls the look and feel of your whole website and over 10+ stylish color schemes gives your website a <br/>fresh new look. </p>
                <?php } ?>
                <a class="read-more" href="<?php
                if (blackbird_get_option('blackbird_link3') != '') {
                    echo blackbird_get_option('blackbird_link3');
                }
                ?>">Read More</a> </div>
        </div>
    </div>
</div>			
<div class="clear"></div>
<!--Start testimonial-->
<?php
$testimonial = blackbird_get_option('blackbird_testimonial_option');
$testimonial_on = "on";
if ($testimonial === $testimonial_on) {
    ?>
    <div class="testimonial">
        <?php if (blackbird_get_option('blackbird_test_heading') != '') { ?>
            <h2><span class="titlebg"><?php echo stripslashes(blackbird_get_option('blackbird_test_heading')); ?></span></h2>
        <?php } else { ?>
            <h2><span class="titlebg">CLIENT TESTIMONIALS</span></h2>
        <?php } ?>
        <div id="slides_testimonial">
            <div class="slides_container">			
                <div class="slide">
                    <div class="item">
                        <?php if (blackbird_get_option('blackbird_test1') != '') { ?>
                            <p><?php echo stripslashes(blackbird_get_option('blackbird_test1')); ?></p>
                        <?php } else { ?>
                            <p>Themia WordPress Theme is the right choice You will definitely love the Theme. The speciality of the Theme is the easiness through which you can get the site ready for yourself or your client. It saves time and a lot of hassles. If you need a website that will perfectly represent your business, choice for you. Working with Themia is very simple and intuitive, even a beginner can handle it.&nbsp;&nbsp;&nbsp;	<b><i>By John Gonzalo</i></b>   </p>
                        <?php } ?>
                    </div>				
                </div>			
                <div class="slide">
                    <div class="item">
                        <?php if (blackbird_get_option('blackbird_test2') != '') { ?>
                            <p><?php echo stripslashes(blackbird_get_option('blackbird_test2')); ?></p>
                        <?php } else { ?>
                            <p>The speciality of the Theme is the easiness You will definitely love the Theme. The speciality of the Theme is the easiness through which you can get the site ready for yourself or your client. It saves time and a lot of hassles. If you need a website that will perfectly represent your business, for you. Working with Themia is very simple and intuitive, even a beginner can handle it. &nbsp;&nbsp;&nbsp;<b><i>By Endy Dolfin</i></b></p>
                        <?php } ?>
                    </div>
                </div>			
                <div class="slide">
                    <div class="item">
                        <?php if (blackbird_get_option('blackbird_test3') != '') { ?>
                            <p><?php echo stripslashes(blackbird_get_option('blackbird_test3')); ?></p>
                        <?php } else { ?>
                            <p>You will definitely love the Theme. The speciality of the Theme is the easiness through which you can get the site ready for yourself or your client. It saves time and a lot of hassles. If you need a website that will perfectly represent your business, Themia WordPress Theme is the right choice for you. Working with Themia is very simple and intuitive, even a beginner can handle it.&nbsp;&nbsp;&nbsp;<b><i>By James Kelvin</i></b></p>
                        <?php } ?>
                    </div>
                </div>
                <?php if (blackbird_get_option('blackbird_test4') != '') { ?>
                    <div class="slide">
                        <div class="item">
                            <?php if (blackbird_get_option('blackbird_test4') != '') { ?>
                                <p><?php echo stripslashes(blackbird_get_option('blackbird_test4')); ?></p>
                                <?php
                            } else {
                                
                            }
                            ?>
                        </div>
                    </div>	
                <?php } ?>
                <?php if (blackbird_get_option('blackbird_test5') != '') { ?>
                    <div class="slide">
                        <div class="item">
                            <?php if (blackbird_get_option('blackbird_test5') != '') { ?>
                                <p><?php echo stripslashes(blackbird_get_option('blackbird_test5')); ?></p>
                                <?php
                            } else {
                                
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div> 
    <?php
} else {
    
}
?>
<!--End testimonial-->
<div class="clear"></div>
<!--Start news in blog-->
<?php
$home_page_blog = blackbird_get_option('blackbird_home_blog_option');
$home_page_blog_on = "on";
if ($home_page_blog === $home_page_blog_on) {
    ?>
    <div class="feature-post">
        <?php if (blackbird_get_option('blackbird_blog_heading') != '') { ?>
            <h2><span class="titlebg"><?php echo stripslashes(blackbird_get_option('blackbird_blog_heading')); ?></span></h2>
        <?php } else { ?>
            <h2><span class="titlebg">NEWS IN BLOG</span></h2>
        <?php } ?>
        <?php
        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'caller_get_posts' => 1,
            'order' => 'DESC'
        );
        $query = new WP_Query($args);
        $count = 0;
        ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $content = $post->post_content;
            $searchimages = '~<img [^>]* />~';
            /* Run preg_match_all to grab all the images and save the results in $pics */
            preg_match_all($searchimages, $content, $pics);
            // Check to see if we have at least 1 image
            $iNumberOfPics = count($pics[0]);
            if (($iNumberOfPics > 0) && ($count < 5)) {
                $count++;
                ?>
                <div class="feature-box">
                    <div class="feature-post-inner"> <a href="<?php the_permalink() ?>"><?php blackbird_get_image(165, 130); ?> </a> 
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                <?php
                                $tit = the_title('', '', FALSE);
                                echo substr($tit, 0, 25);
                                if (strlen($tit) > 25)
                                    echo "...";
                                ?>
                            </a></h2>
                        <?php echo blackbird_custom_trim_excerpt(15); ?>
                    </div>
                </div>
                <?php
            }
        endwhile;
        ?>
        <?php
        // Reset Query
        wp_reset_query();
        ?>
    </div>
    <?php
} else {
    
}
?>
<!--End news in blog-->
<div class="clear"></div>
<!--Start Signup-->
<?php
$sign_up_section = blackbird_get_option('blackbird_sign_up_option');
$sign_up_section_on = "on";
if ($sign_up_section === $sign_up_section_on) {
    ?>
    <div class="signup">
        <?php if (blackbird_get_option('blackbird_signup_heading') != '') { ?>
            <h2><span class="titlebg"><?php echo stripslashes(blackbird_get_option('blackbird_signup_heading')); ?></span></h2>
        <?php } else { ?>
            <h2><span class="titlebg">SIGN UP FOR NEWSLETTER</span></h2>
        <?php } ?>
        <div class="signuparea">
            <div class="signuparea-top"></div>
            <div class="signup-content">
                <?php if (blackbird_get_option('blackbird_blockquote_desc') != '') { ?>
                    <div class="signupinfo"><?php echo stripslashes(blackbird_get_option('blackbird_blockquote_desc')); ?></div>
                <?php } else { ?>
                    <div class="signupinfo">Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use. Your Site is faster to built</div>
                <?php } ?>
                <div class="signuplogin">
                    <?php
                    $emailError = '';
                    if (isset($_POST['submitted'])) {
                        if (trim($_POST['email']) === '') {
                            $emailError = 'Please enter your email address.';
                            $hasError = true;
                        } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
                            $emailError = 'invalid email.';
                            $hasError = true;
                        } else {
                            $email = trim($_POST['email']);
                        }
                        if (!isset($hasError)) {
                            $emailTo = get_option('tz_email');
                            if (!isset($emailTo) || ($emailTo == '')) {
                                $emailTo = get_option('admin_email');
                            }
                            $subject = 'Newsletter Submission From ' . $name;
                            $body = "Email: $email";
                            $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
                            mail($emailTo, $subject, $body, $headers);
                            $emailSent = true;
                        }
                        echo "Your Newsletter Submitted Successfully.";
                    } else {
                        ?>
                        <form action="<?php get_template_directory(); ?>" id="contactForm1" class="signupform" method="post">   
                            <input onfocus="if (this.value == 'e-mail address') {
                                                this.value = '';
                                            }" onblur="if (this.value == '') {
                                                        this.value = 'e-mail address';
                                                    }" name="email" value="e-mail address" type="text" value="<?php
                                   if (isset($_POST['email']))
                                       echo $_POST['email'];
                                   ?>" id="email" />
                            <input type="submit" value="Sign Up" name="submit"/>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                            <?php if ($emailError != '') { ?>
                                <br/>
                                <span class="error"> <?php echo $emailError; ?> </span>
                            <?php } ?>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div class="signuparea-bottom"></div>
        </div>
    </div>
    <?php
} else {
    
}
?>           
<!--End Signup-->
</div>
</div>
</div>
</div>
<?php get_footer(); ?>