							<?php
							$alert_flag = get_the_alert();

							if($alert_flag  == 1 )
							{   

								echo '<script type="text/javascript"> alert("'.get_option("alert_text").'")</script>';
								echo "<h3 style='text-align:center; padding-top:25px;'>Admin working on this Document</h3>";
								die();
								
							}
							?>
							
							<div class="col-md-2 praesent">
                            <div style="overflow:hidden"><?php the_post_thumbnail(array(150,150)); ?></div>

                            </div>
                            <div class="col-md-10 ">
                        
								<div class="l_g_r">
									<div class="dapibus">
										<h2><a href="<?php echo  get_the_permalink();?>"><?php the_title();  ?></a></h2>
										<p class="adm">Posted by <a href="#">Admin</a>  | <?php the_time('F jS, Y'); ?>,in <?php the_category(); ?></p>
										<p><?php the_content(); ?> </p>
                                        <div class="entry-content">
										<hr />
										<h3 style="font-size:14px">Contributors </h3>
										<?php
										/* while ($normal_query->have_posts()) {
									$normal_query->the_post(); */
									$post_id =get_the_ID();
									$my_meta = get_post_meta($post_id, 'contributors_key',true);
									//print_r($my_meta);
foreach($my_meta as $met){
	$user = get_user_by('ID', $met);
     echo "<a href='../../author/".get_the_author_meta('display_name')  ."' style='padding:5px;border-bottom:1px solid #ededed;' target='_blank'>".$user->user_nicename."</a>";
}



									//echo $my_meta['contributors_key']
									// The value you want is in $related_link variable.
						?>

	                                    </div><!-- .entry-content -->
                                	</div>
								</div>
							</div>
