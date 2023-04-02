<?php get_header();
//Template Name: At Home
?>


<div class="int-welc" id="int-welc">
    <div class="welcome-page">
        <div class="img-bgrpage">
            <?php the_post(); ?>
            <?php the_content(); ?>
        </div>	
    </div>
        

        <div class="unsere__one">
        <?php
        $the_query = new WP_Query( array(
        'post_type' => 'categorys',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'tax_query' => array(
        array (
        'taxonomy'  => 'offerstax',
        'field'  => 'slug',
        'terms'  => array('at-home'),
        'operator'=> 'IN'
        ),
        ),
        ) );   
        while ( $the_query->have_posts() ) :
        $the_query->the_post();
        ?>  
            <div class="unsere__soloout">
                <div class="unsere__title__cat">
                    <?php the_title();?>
                </div>

                <div class="undertitle__r_l">
                    <div class="under__l">
                        <?php the_field('solo_cat_desc'); ?>
                    </div>

                    <div class="under__r">
                        <div class="unsere__prices">
                            <div class="prices">
                                <h1 style="color: #eb5a5c"><?php the_field('old'); ?></h1>
                                <?php if( get_field('price') ): ?>
                                    <h2><?php the_field('price'); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="periodinfo">
                            <?php the_excerpt();?>
                        </div>
                    </div>
                </div>

                <div class="pagebutton-green pg-button-color">
                <a href="https://www.instagram.com/puzzle_enterprise/">Jetzt Bestellen</a>
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
        </div>


        <div class="under__desc__page">
            <div class="container">
                <?php the_field('under__welcomepage');?>
            </div>
        </div>

        <div class="third_section">
            <div class="third__sec third__sec__green">
                <div class="container">
                    <?php the_field('section_3');?>
                </div>
            </div>
        </div>

        <div class="fourth_section">
                <div class="container">
                <h4><?php the_field('title_freq'); ?></h4>
                    <?php the_field('section_4');?>
            </div>
        </div>

<?php get_footer();?>