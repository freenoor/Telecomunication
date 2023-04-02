<?php get_header();
//Template Name: Hilfe
?>

<div class="hilfe-page">
    <div class="container">
        <?php the_post();?>
        <?php the_content();?>
        <?php the_field('useful_q');?>
    </div>
</div>

<?php get_footer();?>