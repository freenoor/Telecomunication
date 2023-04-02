<?php get_header();
//Template Name: Kontakt
?>

<div class="contactus">
    <div class="container">

        <div class="title__contactus">
            <h3>Kontaktiere uns</h3>
        </div>

        <?php dynamic_sidebar('contact');?>

        <?php the_content();?>
    </div>
</div>

<?php get_footer();?>