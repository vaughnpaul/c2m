<?php get_header(); ?>
<div class="art-contentLayout">
<div class="art-content">


	<?php if (have_posts()) : ?>

<div class="art-Post">
		    <div class="art-Post-body">
		<div class="art-Post-inner art-article">
		
<div class="art-PostContent">
        
        
		<h2><?php _e('Search Results', 'kubrick'); ?></h2>

		<?php
		$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', 'kubrick'));
		$next_link = get_next_posts_link(__('&laquo; Older Entries', 'kubrick'));
		?>

		<?php if ($prev_link || $next_link): ?>
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>
		<?php endif; ?>


		</div>
		<div class="cleared"></div>
		

		</div>
		
		    </div>
		</div>
		


		<?php while (have_posts()) : the_post(); ?>
<div class="art-Post">
			    <div class="art-Post-body">
			<div class="art-Post-inner art-article">
			<h2 class="art-PostHeaderIcon-wrapper">
			<span class="art-PostHeader"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
			<?php the_title(); ?>
			</a></span>
			</h2>
			<?php ob_start(); ?>
			<?php $icons = array(); ?>
			<?php if (!is_page()): ?><?php ob_start(); ?><img src="<?php bloginfo('template_url'); ?>/images/PostDateIcon.png" width="17" height="18" alt="" />
			<?php the_time(__('F jS, Y', 'kubrick')) ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page()): ?><?php ob_start(); ?><img src="<?php bloginfo('template_url'); ?>/images/PostAuthorIcon.png" width="14" height="14" alt="" />
			<?php _e('Author', 'kubrick'); ?>: <a href="#" title="<?php _e('Author', 'kubrick'); ?>"><?php the_author() ?></a>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (current_user_can('edit_post', $post->ID)): ?><?php ob_start(); ?><img src="<?php bloginfo('template_url'); ?>/images/PostEditIcon.png" width="14" height="14" alt="" />
			<?php edit_post_link(__('Edit', 'kubrick'), ''); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
			<div class="art-PostHeaderIcons art-metadata-icons">
			<?php echo implode(' | ', $icons); ?>
			
			</div>
			<?php endif; ?>
			<?php $metadataContent = ob_get_clean(); ?>
			<?php if (trim($metadataContent) != ''): ?>
			<div class="art-PostMetadataHeader">
			<?php echo $metadataContent; ?>
			
			</div>
			<?php endif; ?>
			<div class="art-PostContent">
			<?php if (is_search()) the_excerpt(); else the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
			
			</div>
			<div class="cleared"></div>
			<?php ob_start(); ?>
			<?php $icons = array(); ?>
			<?php if (!is_page()): ?><?php ob_start(); ?><img src="<?php bloginfo('template_url'); ?>/images/PostCategoryIcon.png" width="18" height="18" alt="" />
			<?php printf(__('Posted in %s', 'kubrick'), get_the_category_list(', ')); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page() && get_the_tags()): ?><?php ob_start(); ?><img src="<?php bloginfo('template_url'); ?>/images/PostTagIcon.png" width="18" height="18" alt="" />
			<?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', ' '); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page() && !is_single()): ?><?php ob_start(); ?><img src="<?php bloginfo('template_url'); ?>/images/PostCommentsIcon.png" width="18" height="18" alt="" />
			<?php comments_popup_link(__('No Comments &#187;', 'kubrick'), __('1 Comment &#187;', 'kubrick'), __('% Comments &#187;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
			<div class="art-PostFooterIcons art-metadata-icons">
			<?php echo implode(' | ', $icons); ?>
			
			</div>
			<?php endif; ?>
			<?php $metadataContent = ob_get_clean(); ?>
			<?php if (trim($metadataContent) != ''): ?>
			<div class="art-PostMetadataFooter">
			<?php echo $metadataContent; ?>
			
			</div>
			<?php endif; ?>
			
			</div>
			
			    </div>
			</div>
			
		<?php endwhile; ?>

		<?php if ($prev_link || $next_link): ?>
		
<div class="art-Post">
		    <div class="art-Post-body">
		<div class="art-Post-inner art-article">
		
<div class="art-PostContent">
        
        
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>
		

		</div>
		<div class="cleared"></div>
		

		</div>
		
		    </div>
		</div>
		
		
		<?php endif; ?>

	<?php else : ?>
<div class="art-Post">
		    <div class="art-Post-body">
		<div class="art-Post-inner art-article">
		
<div class="art-PostContent">
        
        
        <h2><?php _e('Search Results', 'kubrick'); ?></h2>
		<h2 class="center"><?php _e('No posts found. Try a different search?', 'kubrick'); ?></h2>
		<?php if(function_exists('get_search_form')) get_search_form(); ?>
		

		</div>
		<div class="cleared"></div>
		

		</div>
		
		    </div>
		</div>
		

	<?php endif; ?>

</div>
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>