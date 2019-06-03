<?php
get_header();
?>
<div class="container">
    <div class="row">	
<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts()) :
				the_post(); 
				get_template_part( 'content', 'single' );
?>
<hr/>
<?php
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							/* translators: %s: parent post link */
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
						)
					);
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<button class="meta-nav btn btn-sm btn-success  " style="margin-bottom:10px; float:right"  aria-hidden="true">' . __( 'Next Post', 'mytheme' ) . ' ' .
								'<br/>' .
								'%title</button>',
							'prev_text' => '<button class="meta-nav btn btn-sm btn-danger" style="margin-bottom:10px; float:left" aria-hidden="true">' . __( 'Previous Post', 'mytheme' ) . '' .
								'' .  ' <br/>' .
								'%title</button>',
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				/*if ( comments_open() || get_comments_number() ) {
					comments_template();
				}*/

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->
</div>
</div>
    <?php
get_footer();
?>