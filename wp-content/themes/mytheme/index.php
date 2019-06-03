<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://github.com/itsmeNiyaz
 *
 * @package WordPress
 * @subpackage mytheme
 * @since 1.0.0
 */

?>
<?php
get_header();
?>


<?php 
// the query
$the_query = new WP_Query( array('post_type'=>'post', 'post_status'=>'publish') ); ?>

                 <?php if ( $the_query->have_posts() ) : ?>
                 <div class="content">
	<div class="container">
    <div class="row">	<div class='col-md-9'>
<!-- pagination here -->

<!-- the loop -->
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
               <?php get_template_part('content','main'); ?>
<?php endwhile; ?>
<!-- end of the loop -->




<!-- pagination here -->

<?php wp_reset_postdata(); ?>

<?php else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
	<!-- pagination here -->
    <div class='col-md-3'>
<?php get_sidebar(); ?>
</div>
</div>

	

<?php
get_footer();
?>
