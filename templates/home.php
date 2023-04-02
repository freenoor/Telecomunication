<?php
/**
 * Template Name: Home
 */
get_header(); 
$mypost= $post;
?>

<section class="unsere" id="sectionscroll">
    <div class="container">
        <div class="unsere__titletop">
        <h1>Unsere Abos</h1>
        </div>
        
        <div class="unsere__three">
           <div class="swiper-container2" style="overflow: hidden;">
        <div class="swiper-wrapper">
            <?php
                $the_query = new WP_Query( array(
                'post_type' => 'categorys',
                'posts_per_page' => '-1',
                'order' => 'ASC',
                'tax_query' => array(
                array (
                'taxonomy'  => 'offerstax',
                'field'  => 'slug',
                'terms'  => array('at-home','europe','smart-swiss'),
                'operator'=> 'IN'
                ),
                ),
                ) );   
                while ( $the_query->have_posts() ) :
                $the_query->the_post();
                ?>  

                    <div class="swiper-slide">
                    <div class="unsere__soloout">
                        <div class="unsere__img__top">
                            <?php the_content();?>
                        </div>

                        <div class="unsere__title__cat">
                            <?php the_title();?>
                        </div>

                        <div class="unsere__prices">
                            <div class="prices">
                                    
                                
                                <h1><?php the_field('old'); ?></h1>
                                

                                <?php if( get_field('price') ): ?>
                                    <h2><?php the_field('price'); ?></h2>
                                <?php endif; ?>
                                
                            </div>
                        </div>

                        <div class="periodinfo">
                            <?php the_excerpt();?>
                        </div>

                        <div class="pagebutton">
                            <?php the_field('button-page'); ?>
                        </div>
                    </div>
                    </div>

                <?php
                $count++;
                if($count == $the_query->post_count){
                $post_id = get_the_ID();
                }
                endwhile;
                wp_reset_postdata();
            ?> 
        </div>
        <div class="swiper-pagination"></div>
        </div>
        </div>

    </div>
</section>


<section class="adventages">
    <div class="container">
                
            <div class="adventages__titletop">
            <h1>Die Vorteile mit</h1> 
            <!-- <?php dynamic_sidebar('logo_header');?> -->
            <h3>Puzzle Ep</h3>
            </div>

            <div class="adventages__three">
                
                <?php
                $args = array(
                'post_type' => 'adventages',
                'posts_per_page' => '-1',
                'order' => 'ASC',
                );
                $loop = new WP_Query($args);
                while($loop->have_posts()): $loop->the_post();
                ?>

                <div class="col-lg-4">
                    <div class="inner__adventages">
                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                        <h5><?php the_title();?></h5>
                        <h4><?php the_content();?></h4>
                    </div>
                </div>

                <?php
                endwhile; wp_reset_postdata();
                ?>

            </div>
    </div>
</section>


<section class="unsere-angebot"> 
    <div class="container">

        <h1><?php the_field('title_unsere'); ?></h1>

        <h2><?php the_field('description_unsere'); ?></h2>

        <h3><?php the_field('weitere_info'); ?></h3>

        <?php the_field('weitere_info_bottom'); ?>

        <div class="freq-question">
            <h4><?php the_field('title_freq'); ?></h4>
            <?php the_field('frequently_question'); ?>
        </div>

        <div class="under-freq-question">
            <?php the_field('under_frequently_question'); ?>
        </div>

    </div>
</section>
<?php get_footer(); ?>
