<?php
get_header();
?>


<?php 
// the query
$the_query = new WP_Query( array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3) ); ?>

                 <?php if ( $the_query->have_posts() ) : ?>
                 <div class="content">
	<div class="container">
    <div class="row">	<div class='col-md-9'>
<!-- pagination here -->

<!-- the loop -->
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
               <?php get_template_part('content','featured'); ?>
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
