<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
	<input type="text" class="text" value="<?php the_search_query(); ?>" name="s" id="s" /><input class="but" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/search.gif" value="submit" />
</form>
