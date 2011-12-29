<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php //comments_popup_script(600, 600); ?>



<script src="<?php bloginfo('stylesheet_directory'); ?>/jquery.js" type="text/javascript"></script>



<script src="<?php bloginfo('stylesheet_directory'); ?>/script.js" type="text/javascript"></script>



<?php wp_head(); ?>



	<!--[if IE]>

	  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/ie_png.js"></script>

	   <script type="text/javascript">

		   ie_png.fix('.png, .menu');

	   </script>

	<![endif]-->

	

<script type="text/javascript">

	jQuery(document).ready(function(){

		

		jQuery('#parallax').jparallax({});

		$(document).pngFix();

	

	});

	

</script>



</head><body>

	

		

	<div class="right-bg"></div>

	<div class="main"><div class="main-width">

		<div class="header">

			

			<div id="parallax">

               <div class="layer-1" style="position: absolute; left: 42.4694%; margin-left: -400.911px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/layer_1_clouds.png"/></div>

               <div class="layer-2" style="position: absolute; left: 42.4694%; margin-left: -364.387px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/layer_2_drops.png"/></div>

               <div class="layer-3" style="position: absolute; left: 42.4694%; margin-left: -282.846px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/layer_3_drops.png"/></div>

               <div class="layer-4" style="position: absolute; left: 42.4694%; margin-left: -330.412px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/layer_4_drops.png"/></div>

           </div>

			

		        <!--<ul>

                            <li><a href="http://c2minteractive.com/">C2MI HOME</a></li>

                            <li><a href="http://c2minteractive.com/blog">C2MI BLOG</a></li>

                            <li><a href="http://c2minteractive.com/profile.php">C2MI PROFILE</a></li>

                        </ul> -->

			<?php wp_page_menu('show_home=0&sort_column=menu_order, post_title&link_before=<span><span>&link_after=</span></span>');

			?>

	

			<div class="logo">

				<div class="indent">

					<h1 onclick="location.href='<?php echo get_option('home'); ?>/'"><?php bloginfo('name'); ?></h1>

				</div>

			</div>

			

			<div class="search">

				<?php get_search_form(); ?>

			</div>

			

		

		</div>

		

		<div class="content">