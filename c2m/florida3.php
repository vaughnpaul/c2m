<?php include("$_SERVER[DOCUMENT_ROOT]/global-inc.php"); ?>
<?php include('blog/wp-blog-header.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $mainTitle; ?> - Web Design, Web Development and Strategic Consulting</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<script src="maxheight.js" type="text/javascript"></script>
    <!--[if IE]>
    <script type="text/javascript" src="ie_png.js"></script>
       <script type="text/javascript">
           DD_belatedPNG.fix('.png');
       </script>
    <![endif]-->
</head>
<body id="page-1" onload="new ElementMaxHeight();">
<!-- ClickTale Top part -->
<script type="text/javascript">
var WRInitTime=(new Date()).getTime();
</script>
<!-- ClickTale end of Top part -->

	<div class="top-tail"></div>
    <div class="bottom-tail">
        <div id="main">
        <!--header -->
            <div id="header">
                <div class="wrapper">
                    <div class="logo float-l"><a href="/"><img alt="" src='images/logo.gif' /></a></div>
                    <div class="float-l">
                        <ul class="wrapper">
                            <li><a href="/"><img src="images/m1-act.gif" alt="" /></a></li>
                            <li><a href="<?php echo $profileLink; ?>"><img src="images/page-1-m2.gif" alt="" /></a></li>
                            <li><a href="<?php echo $portfolioLink; ?>"><img src="images/m3.gif" alt="" /></a></li>
                            <li><a href="<?php echo $solutionsLink; ?>"><img src="images/m4.gif" alt="" /></a></li>
                            <li><a href="<?php echo $contactLink; ?>"><img src="images/m5.gif" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <img class="slogan" alt="" src='images/slogan.jpg' />
            </div>
        <!--header end-->
            <div id="content">
            	<div class="row-1">                
                    <div class="box-left">
                        <div class="box-right">
                            <div class="box-top-left">
                                <div class="box-top-right">
                                    <div class="box-bot-left">
                                        <div class="box-bot-right">
                                            <h2><a href="/">Home</a> <?php include("$_SERVER[DOCUMENT_ROOT]/addThis.php"); ?></h2>
                                            <div class="inner">
                                                <div class="wrapper">                                        	
                                                    <div class="col-1 maxheight">
                                                        <h3 class="title1">Welcome!</h3>
                                                        <p>Why C2M?  Business development is the process of bringing products and services from Concept-To-Market (C2M).  With that focus on <em>business development</em> at the core of our philosophy, <?php echo $companyName; ?> provides the best possible internet solutions to advance your business.</p>
														<p>Some of the many solutions we provide:</p>
                                                        <div class="wrapper">
                                                            <ul class="float-l">
                                                                <li>Professional Web Presence</li>
                                                                <li>Blogs</li>
                                                                <li>Search Engine Optimization (SEO)</li>
                                                                <li>Marketing</li>
                                                            </ul>
                                                            <ul class="float-r">
                                                                <li>Custom Development </li>
                                                                <li>Web 2.0</li>
                                                                <li>Traffic Analysis and Metrics</li>
                                                                <li>Communications</li>
                                                            </ul>
                                                        </div> 
														<div class="link"><br /><a href="<?php echo $solutionsLink; ?>">Read more</a></div>                                                   
                                                    </div>
                                                    <div class="col-2 maxheight">
                                                        <h3 class="rss">What’s New in the Blog<!--<a href="#"><img alt="" src='images/rss.gif' /></a> --></h3>
                                                        
														<?php query_posts('showposts=2&category_name=Featured&orderby=date&order=DEC'); ?>
                                                            <?php while (have_posts()) : the_post(); ?>
                                                        		<h4><?php the_time('m.d.y'); ?></h4>
                                                                <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                                                <?php the_content(); ?>
                                                            <?php endwhile; ?>
                                                        <!--<div class="link"><a href="#">Read more news</a></div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row-2">
                	<div class="box-left-tail">
                    	<div class="box-right-tail">
                        	<div class="box-left">
                                <div class="box-right">
                                    <div class="box-top-left">
                                        <div class="box-top-right">
                                            <div class="box-bot-left">
                                                <div class="box-bot-right">
                                                    <div class="inner">
													
                                                        <!--<h3 class="title2">Features</h3> -->
                                                        <div class="wrapper">
                                                          <div class="float-l">
                                                                <img src='images/page-img1.png' alt="" width="107" height="89" class="png" /><br />
                                                                <!--<a href="#" class="link">Costs</a> -->
                                                          </div>
                                                            <div class="float-l">
                                                                <img src='images/page-img2.png' alt="" width="103" height="89" class="png" /><br />
                                                                <!--<a href="#" class="link">Info Center</a> -->
                                                          </div>
                                                            <div class="float-l">
                                                                <img src='images/page-img3.png' alt="" width="106" height="89" class="png" /><br />
                                                                <!--<a href="#" class="link">Destinations</a> -->
                                                          </div>
                                                            <div class="float-l">
                                                                <img src='images/page-img4.png' alt="" width="111" height="89" class="png" /><br />
                                                                <!--<a href="#" class="link">Subscription</a> -->
                                                          </div>
                                                            <div class="extra">
                                                                <img src='images/page-img5.png' alt="" width="107" height="89" class="png" /><br />
                                                                <!--<a href="#" class="link">Partners</a> --><br /><br />
                                                          </div>
                                                        </div>
														 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  	        
        </div>
	<!-- ClickTale Bottom part -->
<div id="ClickTaleDiv" style="display: none;"></div>
<script type="text/javascript">
if(document.location.protocol!='https:')
  document.write(unescape("%3Cscript%20src='http://s.clicktale.net/WRb6.js'%20type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
if(typeof ClickTale=='function') ClickTale(242,1,"www07");
</script>
<!-- ClickTale end of Bottom part -->
	
<?php include("$_SERVER[DOCUMENT_ROOT]/footer.php"); ?>
