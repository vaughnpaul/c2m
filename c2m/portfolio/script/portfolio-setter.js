/**
 * Portfolio setter- parses the portfolio item data from a XML file, displays the items separated
 * by pages and adds a category filter functionality.
 * @author Pexeto
 * http://pexeto.com 
 */


(function($){
	$.fn.portfolioSetter=function(options){
		var defaults={
			//default settings
			itemsPerPage: 9, //the number of items per page
			pageWidth: 800,  //the width of each page
			pageHeight:430,  //the height of each page
			itemMargin:30,  //margin of each of the portfolio items
			showCategories: true,  // if set to false, the categories will be hidden
			allText: 'ALL', //the ALL text displayed before the categories names
			easing: 'easeOutExpo', //the animation easing
			animationSpeed: 800, //the speed of the animation of the pagination
			navButtonWidth:21,  //the width of the pagination button 
			wavyAnimation:false, //if set the true, all the elements will fade in consecutively with a wavy effect
			xmlSource : 'portfolio.xml',  //the XML file from which the data is exctracted
			pageWrapperClass: 'page_wrapper',  //the class of the div that wraps the items in order to set a page
			navigationId: 'portfolio_pagination',  //the ID of the pagination div
			categoriesId: 'portfolio_categories', //the ID of the categories div
			itemClass: 'portfolio_item' //the class of the div that wraps each portfolio item data
		};
		
		var options=$.extend(defaults, options);
		options.pageHolder=$(this);
		
		//define some helper variables
		var categories=[], items=[], pageWrappers=[], imagesLoaded=0, counter=0, ie=false, categoryHolder;
		
		var root=$('<div />').css({width:(options.pageWidth*2), height:options.pageHeight, float:'left'});
		$(this).css({width:options.pageWidth, height:'auto', overflow:'hidden'}).append(root);
		var parentId=$(this).attr('id');

		
	init();
	function init() {
		root.parent().append('<div class="loading"></div>');
		loadItems();
	}
	
	/**
	 * Parses the XML portfolio item data.
	 */
	function loadItems(){
		$.ajax({
			type:'GET',
			url: options.xmlSource,
			dataType:'xml',
			success:function(xml){
			
				//get the settings
				if($(xml).find('show_categories:first').text()==='off'){
					options.showCategories=false;
				}				
			
				if(options.showCategories){
					//get the portfolio categories
					$(xml).find('categories').eq(0).find('category').each(function(i){
						var current=$(this);
						var category = {
							id:	current.attr('id'),
							name: current.text()
						};
						categories.push(category);
					});
				}
				
				//get the portfolio items
				$(xml).find('item').each(function(i){
					var current=$(this);
					var thum=current.find('thumbnail:first').text();
					var prev = current.find('preview:first').text();
					var cat=current.find('category:first').text().split(',');
					var desc = current.find('description:first').text();
					
					var item = {
						thumbnail:thum,
						preview:prev,
						category:cat,
						description:desc,
						obj:$('<div class="'+options.itemClass+'"><a rel="lightbox_'+parentId+'" class="single_image" href="'+prev+'" title="'+desc+'"><img src="'+thum+'" /></a></div>')
					};
					items.push(item);
				});
			
				setSetter();
			}
		});
	}
	
	/**
	 * Calls the main functions for setting the portfolio items.
	 */
	function setSetter(){
		 
		if($.browser.msie){
			ie=true;
		}
		root.siblings('.loading').remove();
		root.after('<div id="'+options.navigationId+'"><ul></ul></div>');
		if(options.showCategories){
			displayCategories();
		}
		loadImages();
		
	}
	
	/**
	 * Displays the categories.
	 */
	function displayCategories(){
		
		categoryHolder=$('<div id="'+options.categoriesId+'"></div>');	
		categoryHolder.append('<div id="portfolio_categories_left"></div><ul></ul><div id="portfolio_categories_right"></div>');
		root.before(categoryHolder);
		var catUl=categoryHolder.find('ul');
		
		
		//add the ALL link
		var allLink= $('<li>'+options.allText+'</li>');
		catUl.append(allLink);
		showSelectedCat(allLink);
		
		//bind the click event
		allLink.bind({
			'click': function(){
				displayItems();
				showSelectedCat($(this));
			},
			'mouseover':function(){
				$(this).css({cursor:'pointer'});
			}
		});
		
		//add all the category names to the list
		var catNumber=categories.length;
		for(var i =0; i<catNumber; i++)(function(i){
			var category = $('<li>'+categories[i].name+'</li>');
			catUl.append(category);
			
			//bind the click event
			category.bind({
				'click': function(){
					displayItems(categories[i].id);
					showSelectedCat($(this));
				},
				'mouseover':function(){
					$(this).css({cursor:'pointer'});
				}
			});
		})(i);
	}
	
	function showSelectedCat(selected){
		//hide the previous selected element
		var prevSelected=categoryHolder.find('ul li.selected');
		if(prevSelected[0]){
			var prevHtml=prevSelected.find('div.port_cat').html();
			prevSelected.html(prevHtml);
			prevSelected.removeClass('selected');
		}
		
		//show the new selected element
		var html = selected.html();
		selected.html('<div class="port_cat_active"><div class="port_cat_l"></div><div class="port_cat">'+html+'</div><div class="port_cat_r"></div> </div>');
		selected.addClass('selected');
	}
	
	/**
	 * Loads the images. When all the images are loaded calls the displayItems 
	 * function to display the images.
	 */
	function loadImages(){
		var imageCount=items.length;
		for(var i in items){
			if(items.hasOwnProperty(i)){
			 var img = new Image();
				$(img).load(function() {
					imagesLoaded++;
					if(imagesLoaded===imageCount){
						//all the images are loaded, display them all
						displayItems();
					}
				}).attr('src', items[i].thumbnail);  
			}
		}
	}
	
	/**
	 * Displays the portfolio items.
	 */
	function displayItems(){
		
		var filterCat=arguments.length===0?false:true;
				
		//reset the divs and arrays
		
		root.html('');
		root.width(200);
		pageWrappers=[];
		root.animate({marginLeft:0});
		
		var length=items.length;	

		counter=0;
		var catId=arguments[0];
		for ( var i = 0; i < length; i++)
			(function(i, filterCat, catId) {
				
				if(!filterCat || (filterCat && items[i].category.contains(catId))){
					if(counter%options.itemsPerPage===0){
						//create a new page wrapper and make the holder wider
						root.width(root.width()+options.pageWidth+20);
						var wrapper=$('<div class="'+options.pageWrapperClass+'"></div>').css({float:'left', width:options.pageWidth+options.itemMargin, height:options.pageHeight});
						pageWrappers.push(wrapper);
						root.append(wrapper);
					}
					
					if(ie){
						//var obj=$('<div class="'+options.itemClass+'" style="background-image:url('+items[i].thumbnail+');" ><a rel="lightbox" class="single_image" href="'+items[i].preview+'" title="'+items[i].description+'"></a><img class="hidden" /></div>');
						var obj=$('<div class="'+options.itemClass+'" ><a rel="lightbox_'+parentId+'" class="single_image" href="'+items[i].preview+'" title="'+items[i].description+'"><img src="'+items[i].thumbnail+'" /></a></div>');
						pageWrappers[pageWrappers.length-1].append(obj.css({display:'none'}));
						items[i].obj=obj;
					}else{
						pageWrappers[pageWrappers.length-1].append(items[i].obj.css({display:'none'}));
					}

					var timeout=counter>=options.itemsPerPage?0:100;
					
					if(counter>=options.itemsPerPage || !options.wavyAnimation){
						items[i].obj.fadeIn().animate({opacity:1},0);
					}else{
						setTimeout(function() {
							//display the image by fading in
							items[i].obj.fadeIn().animate({opacity:1},0);
						},counter*100);
					}

					counter++;
				}
		})(i,filterCat, catId);
		
		//call the lightbox plugin
		$('a[rel="lightbox_'+parentId+'"]').colorbox({current:"{current}/{total}"});
				
		//show the navigation buttons
		showNavigation();
		setHoverFunctionality();
				
	}
	
	
	/**
	 * Displays the navigation buttons.
	 */
	function showNavigation(){
		//reset the divs and arrays
		var navUl=root.siblings('#'+options.navigationId).find('ul');
		navUl.html('');
		
		var pageNumber=pageWrappers.length;
		if(pageNumber>1){
			for(var i=0; i<pageNumber; i++)(function(i){
				var li = $('<li></li>');
				navUl.append(li);
				//bind the click handler
				li.bind({
					'click': function(){
						var marginLeft=i*options.pageWidth+i*options.itemMargin-2;
						
						//set a bigger margin for IE6
						if ($.browser.msie && $.browser.version.substr(0,1)<7) {
							marginLeft+=i*options.itemMargin;
						}
						root.animate({marginLeft:[-marginLeft,options.easing]}, options.animationSpeed);
						
						navUl.find('li.selected').removeClass('selected');
						$(this).addClass('selected');
					},
					'mouseover':function(){
						$(this).css({cursor:'pointer'});
					}
				});
			})(i);
			
			navUl.find('li:first').addClass('selected');
			
			//center the navigation
			var marginLeft=(options.pageWidth)/2-pageNumber*options.navButtonWidth/2;
			navUl.css({marginLeft:marginLeft});
		}
	}
	
	function setHoverFunctionality(){
		$('.portfolio_item').hover(function(){
			$(this).stop().animate({opacity:0.8}, 300);
		}, function(){
			$(this).stop().animate({opacity:1}, 300);
		});
	}
	};
}(jQuery));


/**
 * Declare a function for the arrays that checks
 * whether an array contains a value.
 * @param value the value to search for
 * @return true if the array contains the value and false if the
 * array doesn't contain the value
 */
Array.prototype.contains=function(value){
	var length=this.length;
	for(var i=0; i<length; i++){
		if(this[i]===value){
			return true;
		}
	}
	return false;
};
