<?php get_header(); ?>
<?php get_sidebar(1); ?>

	<div class="column-center">
		
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>">
								<div class="indent border-bottom">
									
									<div class="title-page">
										<h2><?php the_title(); ?></h2>
									</div>
									
									<div class="text-box">
										<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
									</div>
									<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
									<div class="link-edit"><?php edit_post_link('Edit', ''); ?></div>
								
								
								</div>
							</div>
						<?php endwhile; endif; ?>
		

			
	</div>
<?php get_footer(); ?>
