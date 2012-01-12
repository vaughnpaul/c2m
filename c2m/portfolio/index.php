<?php include("$_SERVER[DOCUMENT_ROOT]/global-inc.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title><?php echo $mainTitle; ?> - Portfolio</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- begin tonic code --> 
<link rel="stylesheet" type="text/css" href="styles/colorbox.css">  
<link href="styles/screen.css" type="text/css" rel="stylesheet" media="screen,projection" />

<!--[if lt IE 7]>
<link href="styles/screen-ie6.css" type="text/css" rel="stylesheet" media="screen,projection" />
<![endif]-->


<script type="text/javascript" src="script/jquery-1.4.js"></script>  
<script type="text/javascript" src="script/jquery-easing.js"></script> 

<!--
<script type="text/javascript" src="script/jquery.colorbox-min.js"></script> 
-->
<script type="text/javascript" src="script/framework.js"></script></script>

<!-- end tonic code -->    
<link href="/style.css" rel="stylesheet" type="text/css" />

<link href="/layout.css" rel="stylesheet" type="text/css" />

<script src="/maxheight.js" type="text/javascript"></script>

    <!--[if IE]>

    <script type="text/javascript" src="ie_png.js"></script>

       <script type="text/javascript">

           DD_belatedPNG.fix('.png');

       </script>

    <![endif]-->
<style type="text/css">

        	#lightbox{
				display:none;
        		background:#000000;
				opacity:0.9;
				filter:alpha(opacity=90);
        		position:fixed;
				top:0px;
				left:0px;
				min-width:100%;
				height:100%;
				z-index:1000;
				margin:0;
        	}
			#lightpanel{
				display:none;
				position:absolute;
				top:100px;

				left:50%;
				margin-left:-400px;
				width:800px;

				text-align:center;

				background:#FFFFFF;
				padding:10px 15px 10px 15px;
				border:2px solid #CCCCCC;
				z-index:1001;
			}
			#lightpanel #close-panel{
                top:-10px;
				left:100%;
				position:absolute;
				margin-right:-10px;
				color:red;
				font-size:20px;
				display:block;
				width:40px;
			}

	   #lightpanel img{
				width:400px;
				margin:0px;
				float:left;
			 }
       #desc{
		   margin:10px;
		   text-align:left;
	   }
	   #desc a.gotosite{
		   display:block;
		   width:150px;
		   float:left;
	   }
	   #desc a.viewfull{
		   display:block;
		   width:150px;
		   float:right;
		   text-align:right;
	   }
	   .imgwrapper {
			border:10px solid #FFFFFF;
			float:left;
			height:300px;
			overflow:hidden;
	   }
	   .imgwrapouter{
       border:3px solid pink;
	   margin-right:10px;
	   float:left;
	   }

	   .cat_desc_hidden{
		   display:none;
	   }
	   #cat_desc{
		   margin-bottom:5px;
		   background:url("images/bg_img_description.jpg") no-repeat center top transparent;
		   padding:10px 12px 0px 12px;
	   }
			
		ul#filter li {
			background:url("images/arrow.png") no-repeat scroll left 5px transparent;
			padding:1px 0 6px 22px;
			border:0;
		}
		</style>

		<script type="text/javascript">
			$(document).ready(function(){

				$('#lightpanel>img').wrap('<div class="imgwrapper" />'); 
				$('.imgwrapper').wrap('<div class="imgwrapouter" />');



				$("a[rel='xprod']").click(function(){
				   $("#lightbox").fadeIn(300);
					$(this).parent().children("#lightpanel").fadeIn(300);
				});

				$("a#close-panel, #lightbox").click(function(){
					$(".fade").fadeOut(300);
				})

					$("#filter > li >a").click(function(){
						$("#cat_desc").html($(this).next(".cat_desc_hidden").html());
					});
			})
		</script>
</head>

<body id="page-6">
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

                    <div class="logo float-l"><a href="/"><img alt="" src='/images/logo.gif' /></a></div>

                    <div class="float-l">

                        <ul class="wrapper">

                            <li><a href="/"><img src="/images/m1.gif" alt="" /></a></li>

                            <li><a href="<?php echo $profileLink; ?>"><img src="/images/page-3-m2.gif" alt="" /></a></li>

                            <li><a href="<?php echo $portfolioLink; ?>"><img src="/images/m3-act.gif" alt="" /></a></li>

                            <li><a href="<?php echo $solutionsLink; ?>"><img src="/images/page-3-m4.gif" alt="" /></a></li>

                            <li><a href="<?php echo $contactLink; ?>"><img src="/images/m5.gif" alt="" /></a></li>

                        </ul>

                    </div>

                </div>

                <img class="slogan" alt="" src='/images/slogan.jpg' />

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

                                                  <div class="col-1">

                                                        <h3 class="title1">Portfolio</h3>

                                                       

<div id="container">
<p>Be it small and simple, or elaborate and complex, C2M Interactive takes care the business needs of one-man shops to major national brands.  And best of all, we won't try to oversell you, so you'll get your money’s worth...  <br><br>Here are some samples of what we can do for you!</p>

  <!-- strat callouts -->

<div class="callout">
                                                          <h5 class="text"><strong>QUESTIONS? IDEAS?</strong><br />
                                                          Chat online live with a specialist standing by to assist you.</h5>                                                       </div>
                                                        <!-- start chat widget -->
                                                      <div><a href="" target="_blank" onClick="window.open(encodeURI('https://oggchat.icoa.com/cp?font=Verdana&fontsize=10pt&bgcolor=FFFFFF&cid=c094a3a22d75cbb1012d79b9b06b01d6&website=c2m&text=_oc-c&height=450&width=380&r='+document.referrer), 'OggChat', 'toolbar=0,scrollbars=1,location=0,status=0,menubar=0,resizable=1,width=380,height=450');return false;"><img src="https://oggchat.icoa.com/cb?cid=c094a3a22d75cbb1012d79b9b06b01d6&link=_oc-c" border="0" /></a><!-- OggChat Monitor -->
                                                        <script type="text/javascript">//<![CDATA[
function mon(){var url = 'https://oggchat.icoa.com/mon?act=c094a3a22ba214c1012bad9f3e92042f&cid=c094a3a22d75cbb1012d79b9b06b01d6&f=Verdana&fs=10';var e = document.createElement('script');e.src = url;e.type ='text/javascript';document.getElementsByTagName('head')[0].appendChild(e);}if (window.addEventListener){window.addEventListener('load',mon, false);}else if(window.attachEvent){window.attachEvent('onload',mon);}
//]]></script>
                                                        <!-- End OggChat Monitor -->
                                                        <!-- end chat widget -->
                                                      <a href="/contact.php"><img  border="0" src="/index_images/leavemessage.gif" alt="Contact Us" /></a></div>
													  <!-- end callouts -->


	<ul id="filter">
		<li class="current"><a href="#">All</a>
		<div class="cat_desc_hidden" > </div>
		</li>
		<li><a href="#">Basic Websites</a>
		<div class="cat_desc_hidden" >
		Basic low budget starter website with few pages. Good for when elaborate designs is not necessary or desired. This category of site is important because it satisfies basic no-nonsense, no-frills business needs. The benefit of getting a basic website through us is that through professional consultation, we will alert you to any opportunities and hazards that can be vital to your business goals. 
		</div>
		</li>
		<li><a href="#">Brochure Websites</a>
		<div class="cat_desc_hidden" >
		 These are sites where internet presence, brand identity, and design are a little more important. More attention is paid to site design and logo. It is often necessary to match existing marketing materials. The sites describe a business' products and services and typically don't change very often.  
		</div>
		</li>
        <li><a href="#">eCommerce</a>
		<div class="cat_desc_hidden" >
		Dynamic, database-driven, shopping cart applications that most of the time have some capability to takke orders and process financial transactions online. Depending on desire and budget, shopping carts can have varying degrees of customization.  
		</div>
		</li>
		<li><a href="#">Blog CMS</a>
		<div class="cat_desc_hidden" >
		Websites that have a blog such as WordPress or some other type of Content Management System (CMS). Joomla or Drupal are popular CMS platforms that we can develop in. These sites can be extended to include very powerful add-on features. They can support memberships, paid subscriptions, directories, event calendars, social communities, online booking and appointment making, etc, etc, etc. 
		</div>
		</li>
        <li><a href="#">Real Estate</a>
		<div class="cat_desc_hidden" >
		Site with a custom property management system that can manage property listing for multiple agents. This can be extended with IDX/MLS imports and Google maps. 
		</div>
		</li>
		<li><a href="#">Small Business</a>
		<div class="cat_desc_hidden" >
		Websites and projects catering to the needs of small businesses and entrepreneurs. 
		</div>
		</li>
		
		<li><a href="#">Home Improvement</a>
		<div class="cat_desc_hidden" >
		Be it for Indoor or outdoor home improvement, these projects will with focus on service offerings or will showcase past works.
		</div>
		</li>
		
		<li><a href="#">Entertainment</a>
		<div class="cat_desc_hidden" >
		Sites relating to the arts, entertainment, leisure or creative fields. These designs will have a more lively, informal and colorful feel than their corporate cousins.
		</div>
		</li>
		
		 
	</ul>
<div style="clear:both" ></div>
<div id="cat_desc">
</div>

	<ul id="portfolio">
	
	<li class="blog-cms small-business home-improvement">
		<a rel="xprod" href="#" title="biospherela .com"><img src="images/biosphere-thumbnail.jpg" alt="biospherela.com" height="115" width="200" />Biosphere Landscape Design</a>
		<div id="lightpanel" class="fade">
				    <img src="images/biosphere.jpg" alt="biospherela.com"/>
					 
					<div id="desc">
					<h1>Biosphere Landscape Design</h1>
					<p>
					A landscape architectural firm based in Chestnut Ridge, NJ needed a website that reflected the high end quality of their landscape projects
					</p>
					<a href="http://biospherelandscapedesign.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/biosphere.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		
		<li class="brochure-websites small-business home-improvement">
		<a rel="xprod" href="#" title="suzannefletcherinteriors.com"><img src="images/suzanne-thumbnail.jpg" alt="suzannefletcherinteriors.com" height="115" width="200" />Suzanne Fletcher Interiors</a>
		<div id="lightpanel" class="fade">
				    <img src="images/suzanne.jpg" alt="suzannefletcherinteriors.com"/>
					 
					<div id="desc">
					<h1>Suzanne Fletcher Interiors</h1>
					<p>
					This local interior designer needed a simple website that showcased some of her past work, described her services, and reflected her design aesthetic.
					</p>
					<a href="http://suzannefletcherinteriors.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/suzanne.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		
		
		
		<li class="small-business entertainment ">
		<a rel="xprod" href="#" title="mannyigrejas.com"><img src="images/manny-thumbnail.jpg" alt="mannyigrejas.com" height="115" width="200" />Manny Igrejas</a>
		<div id="lightpanel" class="fade">
				    <img src="images/Manny-Igrejas--Playwright.jpg" alt="mannyigrejas.com"/>
					 
					<div id="desc">
					<h1>Manny Igrejas</h1>
					<p>
					Manny Igrejas is an award winning playwright and needed a website to showcase his works in preparation for upcoming publicity.  We settled on a design that reflected the energy of his sector of the entertainment industry.
					</p>
					<a href="http://mannyigrejas.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Manny-Igrejas--Playwright.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		
		
		<li class="small-business">
		<a rel="xprod" href="#" title="cwmetro.com"><img src="images/cartridge_world_thumbnail.jpg" alt="cwmetro.com" height="115" width="200" />CW Metro</a>
		<div id="lightpanel" class="fade">
				    <img src="images/cartridge_world.jpg" alt="cwmetro.com"/>
					 
					<div id="desc">
					<h1>Cartridge World Metro</h1>
					<p>
					Cartridge World is a vendor of quality replacement printer ink cartridges.  This client needed a website that reflected the brand standards of the corporate mother site. While at the same time this gives him full editorial control to direct his message.
					</p>
					<a href="http://cwmetro.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/cartridge_world.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		
		
		<li class="basic-websites brochure-websites">
		<a rel="xprod" href="#" title="cbmglobalfreight.com/"><img src="images/cbm-global-thumbnail.jpg" alt="cbmglobalfreight.com" height="115" width="200" />CBM Global Freight</a>
		<div id="lightpanel" class="fade">
				    <img src="images/CBM-Global-Freight-Corp.jpg" alt="cbmglobalfreight.com"/>
					 
					<div id="desc">
					<h1>CBM Global Freight</h1>
					<p>
					This client needed a simple starter website to announce their services and collect different types of quote information from prospects.
					</p>
					<a href="http://cbmglobalfreight.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/CBM-Global-Freight-Corp.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		
		
		<li class="basic-websites brochure-websites home-improvement">
		<a rel="xprod" href="#" title="garcny.com"><img src="images/garc-thumbnail.jpg" alt="garcny.com" height="115" width="200" />Garcny</a>
		<div id="lightpanel" class="fade">
				    <img src="images/GARC-Roofing-Professional.jpg" alt="garcny.com"/>
					 
					<div id="desc">
					<h1>GARC Roofing</h1>
					<p>
					This client needed a basic  and attractive website to advertise their roofing services and coincide with their marketing campaigns.
					</p>
					<a href="http://garcny.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/GARC-Roofing-Professional.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		

		<li class="basic-websites small-business">
		<a rel="xprod" href="#" title="Midland Ave Automotive">
			<img src="images/midlandaveauto_thumb.jpg" alt="" height="115" width="200" />
			Midland Ave Automotive
		</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_midland.jpg" />
					 
					<div id="desc">
					<h1>MIDLAND AVENUE AUTOMOTIVE</h1>
					<p>
					Midland Avenue is a full-service automotive repair shop in Paramus, NJ. It needed a simple landing site to establish its search presence online. And, it also needed tracking to measure the interest of online visitors in each of his different offerings, from repair services to selling racing parts.
					</p>
					<a href="http://www.midlandaveauto.com" class="gotosite" target="_blank">Go to site </a>
					<a href="images/Img_full_midland.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>	
        </div>
		</li>





		<li class="brochure-websites small-business">
		<a rel="xprod" href="#" title="Infinity Solar">
			<img src="images/infinitysolar.jpg" alt="Infinity Solar" height="115" width="200" />
			Infinity Solar
		</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/img_full_infinity.jpg" />
					 
					
					<div id="desc">
					<h1>Infinity Solar</h1>
					<p>Infinity Solar Systems, L.L.C., is an electrical contractor and solar energy provider catering to commercial and residential clients.  They needed a web design to enhance their brand identity and establish a professional web presence
					</p>
					<a href="http://www.infinitysolarnj.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/midlandaveauto_full.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
      

	    <li class="ecommerce">
		<a rel="xprod" href="#" title="Clava"><img src="images/clava_thumb.jpg" alt="" height="115" width="200" />Clava</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_clava.jpg" />
					 
					<div id="desc">
					<h1>CLAVA</h1>
					<p>
					CLAVA is an online leather goods store that designs and delivers affordable leather bags.  Because of its wide catalog of leather goods available, they needed online assistance and maintenance of their e-commerce legacy software, database and website.  And yes, they also needed to redesign their website. 
					</p>
					<a href="http://www.clava.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_clava.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		<li class="ecommerce small-business">
		<a rel="xprod" href="#" title="Kids Bedroom Furniture Online"><img src="images/kidsfurniture_thumb.jpg" alt="" height="115" width="200" />Kids Bedroom Furniture Online</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_kids.jpg" />
					 
					<div id="desc">
					<h1>KIDS BEDROOM FURNITURE ONLINE</h1>
					<p>
					Kids Bedroom Furniture Online is relatively new in the web.  They needed a website design that would both appeal to kids and their family.  It was also the right time for them to have some custom software modifications to fit its business, such as analytics and other e-commerce applications.
					</p>
					<a href="http://www.kidsbedroomfurnitureonline.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_kids.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		<li class="ecommerce small-business">
		<a rel="xprod" href="#" title="Right Match Clothing"><img src="images/rightmatchclothing_thumb.jpg" alt="" height="115" width="200" />Right Match Clothing </a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_rightmatch.jpg" />
					 
					<div id="desc">
					<h1>RIGHT MATCH CLOTHING CORP</h1>
					<p>
					Right Match Clothing Corp. is an online fashion store specializing in high-end fashion for men.  For their e-commerce requirement, they needed a website design that is attractive, stylish and fully functionalfrom the time a customer checks in to the time a sale is closed.
					</p>
					<a href="http://www.rightmatchclothing.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_rightmatch.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		<li class="ecommerce small-business">
		<a rel="xprod" href="#" title="Equipment Authority"><img src="images/equipmentauthority_thumb.jpg" alt="" height="115" width="200" />Equipment Authority</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_ea.jpg" />
					 
					<div id="desc">
					<h1>TheEquipmentAuthority.com</h1>
					<p>
					The Equipment Authority is an online store specializing in digital thermometers, testers and detectors. They needed e-commerce applications and analytics from content management down to shopping cart administration.
					</p>
					<a href="http://www.theequipmentauthority.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_ea.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

		<li class="blog-cms">
		<a rel="xprod" href="#" title="Notabilia"><img src="images/notabilia.gif" alt="" height="115" width="200" />Notabilia</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_notabilia.jpg" />
					 
					<div id="desc">
					<h1>NOTABILIA</h1>
					<p>Informal Wordpress blog of noteworthy news, facts and information
					</p>
					<a href="http://notabilia.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_notabilia.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

		<li class="blog-cms">
		<a rel="xprod" href="#" title="C2M Interactivity Blog"><img src="images/Img_thumb_c2mblog.jpg" alt="C2M Interactivity Blog" height="115" width="200" />C2M Interactivity Blog</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_c2mblog.jpg" />
					 
					<div id="desc">
					<h1>C2M Interactivity Blog</h1>
					<p>Blog of company communications and information vital to making the internet a success for businesses
					</p>
					<a href="http://www.c2minteractive.com/blog/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_c2mblog.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>


		<li class="blog-cms">
		<a rel="xprod" href="#" title="BNI Synergy"><img src="images/bnisynergy_thumb.jpg" alt="" height="115" width="200" />BNI Synergy</a>
		<div id="lightpanel" class="fade">
				    <img src="http://dev.c2minteractive.com/portfolio/images/Img_full_bni.jpg" />
					 
					<div id="desc">
					<h1>BNI SYNERGY</h1>
					<p>
					BNI is the largest business networking organization in the world.  The BNI Synergy chapter of Paramus NJ needed a website with a member based content management system (CMS) plus a membership directory and event calendar that would keep their members up-to-date with the group's activities.  
					</p>
					<a href="http://www.bnisynergy.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/Img_full_bni.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

		<li class="real-estate">
		<a rel="xprod" href="#" title="Loan Mod Confidential"><img src="images/loanmodconfidential.jpg" alt="" height="115" width="200" />Loan Mod Confidential</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_loanmod.jpg" alt="Loan Mod Confidential"/>
					 
					<div id="desc">
					<h1>Loan Mod Confidential</h1>
					<p>
					Foreclosure preventsion loan modification service
					</p>
					<a href="http://www.loanmodconfidential.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_loanmod.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

        <li class="real-estate">
		<a rel="xprod" href="#" title="Open Gate Properties"><img src="images/opengate.gif" alt="" height="115" width="200" />Open Gate Properties</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_open_gate.jpg" alt="Open Gate Properties"/>
					 
					<div id="desc">
					<h1>Open Gate Properties</h1>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<a href="http://www.opengateproperties.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_open_gate.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>


        <li class="">
		<a rel="xprod" href="#" title="UPS"><img src="images/ups.jpg" alt="" height="115" width="200" />UPS</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_ups.jpg" alt="UPS"/>
					 
					<div id="desc">
					<h1>UPS</h1>
					<p>
					ups.com is a large scale multi-tierd j2ee-based application framework. 
					</p>
					<a href="http://www.ups.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_ups.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>




       <li class="">
		<a rel="xprod" href="#" title="Skittles"><img src="images/skittles.jpg" alt="Skittles" height="115" width="200" />Skittles</a>
		<div id="lightpanel" class="fade">
				    <img src="images/skittles_full.jpg" alt="Skittles"/>
					 
					<div id="desc">
					<h1>Skittles</h1>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<a href="http://www.skittles.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/skittles_full.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>





<li class="">
		<a rel="xprod" href="#" title="Starburst"><img src="images/starburst.jpg" alt="Starburst" height="115" width="200" />Starburst</a>
		<div id="lightpanel" class="fade">
				    <img src="images/starburst_full.jpg" alt="Starburst"/>
					 
					<div id="desc">
					<h1>Starburst</h1>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<a href="http://www.starburst.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/starburst_full.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>





<li class="">
		<a rel="xprod" href="#" title="Bright Ideas"><img src="images/brightideas.jpg" alt="Bright Ideas" height="115" width="200" />Bright Ideas</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_bright_ideas.jpg" alt="Bright Ideas"/>
					 
					<div id="desc">
					<h1>Bright Ideas</h1>
					<p>
					This is the recipe site for Mars foods. 
					</p>
					<a href="http://www.brightideas.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_bright_ideas.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>





<li class="">
		<a rel="xprod" href="#" title="M&M's"><img src="images/mms.jpg" alt="" height="115" width="200" />M&amp;M's</a>
		<div id="lightpanel" class="fade">
				    <img src="images/mm_full.jpg" alt="M&M's"/>
					 
					<div id="desc">
					<h1>M&amp;M's</h1>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<a href="http://www.mms.com" class="gotosite" target="_blank">Go to site</a>
					<a href="images/mm_full.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>











<li class="">
		<a rel="xprod" href="#" title="CantorFamilies.com"><img src="images/cantorfamilies.gif" alt="" height="115" width="200" />CantorFamilies.com</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_cantorfamilies.jpg" alt="CantorFamilies.com"/>
					 
					<div id="desc">
					<h1>CantorFamilies.com</h1>
					<p>
					This is a website of tributes to our employees that perished in the World Trade Center. 
					</p>
					<a href="http://www.cantorfamilies.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_cantorfamilies.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>





<li class="">
		<a rel="xprod" href="#" title="Art show invitation flyer"><img src="images/nyack_invite_feb05.gif" alt="" height="115" width="200" />Art show invitation flyer</a>
		<div id="lightpanel" class="fade">
				    <img src="http://motyar.com/placeholder/800-1000-00FFFF-969696" alt="Art show invitation flyer"/>
					 
					<div id="desc">
					<h1>Art show invitation flyer</h1>
					<p>
					This flyer was designed for an art show of a local artist. Took a sample of the artist's work and infused it with the event information. I chose the old-world typewriter style fonts to coincide with the early-20th century feel of the artist's work. The "What a Mess" font in the heading was chosen to coincide with the fractured style of the image.
					</p>
					<a href="#" class="gotosite" target="_blank">Go to site</a>
					<a href="images/" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>




<li class="">
		<a rel="xprod" href="#" title="eSpeed GUI Login Screen"><img src="images/eSpeedLogin.jpg" alt="eSpeed GUI Login Screen" height="115" width="200" />eSpeed GUI Login Screen</a>
		<div id="lightpanel" class="fade">
				    <img src="images/eSpeedLogin.jpg" alt="eSpeed GUI Login Screen"/>
					 
					<div id="desc">
					<h1>eSpeed GUI Login Screen</h1>
					<p>
					This screen was created as a login screen for the eSpeed GUI. Space was left on the screen to allow for placement of GUI elements. And the screen was designed to coincide with existing design standards.
					</p>
					<a href="#" class="gotosite" target="_blank">Go to site</a>
					<a href="images/eSpeedLogin.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

		<li class="">
		<a rel="xprod" href="#" title="eSpeed.com"><img src="images/eSpeed_com.gif" alt="eSpeed.com" height="115" width="200" />eSpeed.com</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_espeed.jpg" alt="eSpeed.com"/>
					 
					<div id="desc">
					<h1>eSpeed.com</h1>
					<p>
					eSpeed.com is a dynamic web site built on a XML/XSL-parsed JSP architecture. 
					</p>
					<a href="http://www.espeed.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_espeed.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

		<li class="">
		<a rel="xprod" href="#" title="cantor.com"><img src="images/cantor_com.gif" alt="cantor.com" height="115" width="200" />cantor.com</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_cantor_com.jpg" alt="cantor.com"/>
					 
					<div id="desc">
					<h1>cantor.com</h1>
					<p>
					cantor.com is a dynamic web site built on a XML/XSL-parsed JSP architecture. 
					</p>
					<a href="http://www.cantor.com/" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_cantor_com.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>

		<li class="">
		<a rel="xprod" href="#" title="eSpeed.com Marketing Mailer"><img src="images/eSpeed_emailMarketer.gif" alt="" height="115" width="200" />eSpeed.com Marketing Mailer</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_espeed_emailmarket.jpg" alt="eSpeed.com Marketing Mailer"/>
					 
					<div id="desc">
					<h1>eSpeed.com Marketing Mailer</h1>
					<p>
					Designed this page to be used as a email marketing mass mailer for company announcements. Wrote a perl script that took this html template, the content, and a list of email addresses as input. The script then composed the appropriate headers and mail parts, and sent out the email via a unix server. 
					</p>
					<a href="#" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_espeed_emailmarket.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>


		<li class="">
		<a rel="xprod" href="#" title="G-Cubed.org"><img src="images/g-cubed.gif" alt="G-Cubed.org" height="115" width="200" />G-Cubed.org</a>
		<div id="lightpanel" class="fade">
				    <img src="images/img_full_gcubed.jpg" alt="G-Cubed.org"/>
					 
					<div id="desc">
					<h1>G-Cubed.org</h1>
					<p>
					Wrote Perl script to parse scientific papers submitted and convert text from LaTeX to QuarkXpress 
					</p>
					<a href="#" class="gotosite" target="_blank">Go to site</a>
					<a href="images/img_full_gcubed.jpg" class="viewfull" target="_blank">View full size image</a>
					</div>
					<a id="close-panel" href="#">X</a>
        </div>
		</li>
		
		
				

	</ul>
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

				<div class="row-2">                

                    <img alt="" src='/images/box3-bot.jpg' />

                </div>

            </div>  	        
        </div>
<div id="lightbox" class="fade"></div>
<?php include("$_SERVER[DOCUMENT_ROOT]/footer.php"); ?>

<script src="http://cdn.wibiya.com/Toolbars/dir_0699/Toolbar_699614/Loader_699614.js" type="text/javascript"></script><noscript><a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a></noscript> 
