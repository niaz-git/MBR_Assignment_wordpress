							<div class="col-md-4 praesent">
								<div class="l_g_r">
									<div class="dapibus">
										<h2><a href="<?php echo  get_the_permalink();?>"><?php the_title(); ?></a></h2>
										<p class="adm">Posted by <a href="#">Admin</a>  | <?php the_time('F jS, Y'); ?>,in <?php the_Category(); ?></p>
										<div style="overflow:hidden"><?php the_post_thumbnail(); ?></div>
										<p><?php the_excerpt(); ?> </p>
										<a href="<?php echo  get_the_permalink();?>" class="link">Read More</a>
                                        <div class="entry-content">
	                                    </div><!-- .entry-content -->
                                	</div>
								</div>
							</div>
