<?php get_header(); ?>
<?php get_sidebar(1); ?>

	<div class="column-center">
		
		
		<?php if (have_posts()) : ?>
				
			<div class="title-page"><h2>Search results</h2></div>
	
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				<div class="clear"></div>
			</div>
	
					<?php while (have_posts()) : the_post(); ?>
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style=" width:auto;">
							<div class="indent">
								
									
								<div class="title">
									<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<div class="date">
										<?php the_time('l, F j, Y') ?>
									</div>
									<div class="author">
										posted by <?php the_author_link() ?>
									</div>
								</div>
									
								<div class="text-box">
									<?php the_content(''); ?>
								</div>
								<div class="postmetadata">
									<?php the_tags('Tags: ', ', ', '<br />'); ?>
								</div>
								<div class="comments"><?php comments_popup_link('comments (0)', 'comment (1) ', 'comments (%) '); ?></div>
								<div class="link-edit"><?php edit_post_link('Edit', ''); ?></div>
								
								
							</div>
						</div>
		
			
					<?php endwhile; ?>
			
				
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				<div class="clear"></div>
			</div>
			
		<?php else : ?>
			
				
				<div class="title-page"><h2>Search result</h2></div>
			
				<div class="text-box">
					<div class="search search_page">
						<p>No posts found. Try a different search?<p>
						<?php include (TEMPLATEPATH . "/searchform.php"); ?>
						
								
					</div><div class="clear"></div>
				</div>
		<?php endif; ?>
			
			


			</div>
<?php get_footer(); ?>
