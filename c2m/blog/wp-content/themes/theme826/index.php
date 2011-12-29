<?php get_header(); ?>
<?php get_sidebar(1); ?>
	<div class="column-center">
	
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style=" float:none; ">
					<div class="indent">
						
						
						<div class="title">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
						<div class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
						<div class="comments"><?php comments_popup_link('comments (0)', 'comment (1) ', 'comments (%) '); ?></div>
						<div class="link-edit"><?php edit_post_link('Edit', ''); ?></div>
					
					
					</div>
				</div>
			<?php endwhile; ?>
		
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				<div class="clear"></div><br />
			</div>
		<?php else : ?>
			<h2 class="pagetitle">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	
		

			</div>
<?php get_footer(); ?>