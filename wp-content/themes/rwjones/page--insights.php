<?php
/*
*Template Name: Insights
*/

get_header();
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile; // End of the loop.
?>
<?php //get_template_part( '/template-parts/banner' ); ?>
<?php get_template_part( 'template-parts/content', 'insights' ); ?>


<?php get_footer(); ?>