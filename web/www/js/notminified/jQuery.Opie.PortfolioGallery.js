(function($) {
	"use strict";
	$.fn.OpiePortfolioGallery = function(options, args) {
	
		var defaults = 
		{
			boxSelector: ".o-box",
			innerWrapperSelector: ".o-inner-wrapper",
			bigImageSelector: "img.o-big-image",
			thumbImageSelector: "img.o-thumb-image",
			extraInfoSelector: ".o-extra-info",
			enlargeButtonSelector: ".o-enlarge",
			maxBoxSize: 195,
			loaderFadeInDuration: 150,
			loaderFadeOutDuration: 450,
			boxMovementDuration: 300,
			delayIncrease: 0,
			delayStart: 0,
			maxDelay: 0,
			scrollingAid: true,
			boxPositionEasing: "linear",
			extraInfoOpenEasing: "linear",
			extraInfoCloseEasing: "linear",
			boxOpenEasing: "linear",
			boxCloseEasing: "linear",
			boxOpenDuration: 300,
			boxCloseDuration: 300,
			filterNavSelector: false,
			
			dontResizeThumbs: false,
			useCentering: false,
			
			userCSS3Accelerate: true,
			showMore: 12
		};
		var Opt = new Opts($.extend(defaults, options), $);
		
		var PG;
		this.each(function() {
			PG = new $.OpiePortfolioGallery(Opt, $(this), arguments);
			if (options === "initCSS3") 
			{
				IS.initCSS3.apply(PG, args);
			}
			else 
			{
				PG.init();
			}
		});
		
		return this;
	}
	
	$.OpiePortfolioGallery = function(Opt, $Wrapper, allArgs) {
	
		var me = this;
		var $Boxes = $Wrapper.find(Opt.string("boxSelector"));
		var $Inner = $Wrapper.find(Opt.string("innerWrapperSelector"));
		var maxBoxSize = Opt.number("maxBoxSize");
		var boxSize = 0;
		var maxBottom = 0;
		var currentButtom = 0;
		var activeFilterName = false;
		var leftOverRight = 0;
		var userCSS3Accelerate = Opt.bool("userCSS3Accelerate");
		var boxCloseDuration = Opt.number("boxCloseDuration");
		var boxCloseEasing = Opt.get("boxCloseEasing");
		var boxMovementDuration = Opt.number("boxMovementDuration");
		var boxPositionEasing = Opt.get("boxPositionEasing");
		var delayIncrease = Opt.number("delayIncrease");
		var boxOpenEasing = Opt.get("boxOpenEasing");
		var boxOpenDuration = Opt.get("boxOpenDuration");
		
		this.init = function() {
		
			this.initCSS3();
			
			if (Opt.string("filterNavSelector") !== false) 
			{
				var $NavItems = $(Opt.string("filterNavSelector"));
				var $ActiveFIlterNav = $NavItems.filter(".active");
				if ($ActiveFIlterNav.size() > 0) 
				{
					activeFilterName = $ActiveFIlterNav.getAttr("filter");
				}
				$NavItems.click(function() {
					$NavItems.removeClass("active");
					$(this).addClass("active");
					activeFilterName = $(this).getAttr("filter");
					me.fillTiles(false, true);
				});
			}
			
			$Boxes.each(function() {
				var $th = $(this);
				$th.parseFilters();
				if ($th.find(Opt.string("extraInfoSelector")).size() > 0) 
				{
					$th.find(Opt.string("bigImageSelector")).wrap('<div class="o-big-image-wrapper" />');
					$th.find(".o-big-image-wrapper").append('<a href="#" class="o-enlarge closed"><span>Enlarge</span></a>');
				}
				$th.setData("positionData", false);
				$th.append('<div class="loader" />');
			});
			$Boxes.find(Opt.string("enlargeButtonSelector")).click(function() {
				var $a = $(this);
				var $box = $(this).parents(Opt.string("boxSelector"));
				if ($Wrapper.hasClass("inMotion")) 
				{
					return false;
				}
				if ($box.hasClass("doEnlarge")) 
				{
					$box.replaceClass("doEnlarge", "doReduce");
					$a.replaceClass("opened", "closed");
				}
				else 
				{
					$a.replaceClass("closed", "opened");
					$box.replaceClass("doReduce", "doEnlarge");
				}
				me.fillTiles(false, false);
				return false;
			});
			$Boxes.click(function() {
				if ($Wrapper.hasClass("inMotion")) 
				{
					return false;
				}
				var $th = $(this);
				if ($th.hasClass("o-show-more")) 
				{
					me.showMore();
				}
				else 
				{
					$Boxes.removeClass("doReduce doEnlarge");
					
					if ($th.hasClass("active")) 
					{
						$th.removeClass("active").addClass("preDeActive");
					}
					else 
					{
						$th.addClass("preactive");
					}
					me.loader($Boxes.filter(".active").addClass("wasActive"), true);
					me.loader($th, true);
					me.fillTiles(true, false, true);
					return false;
				}
			});
			me.initSizes();
			var delay = (function() {
				var timer = 0;
				return function(callback, ms) {
					clearTimeout(timer);
					timer = setTimeout(callback, ms);
				};
			})();
			var x, y;
			var w = $(window).resize(function() {
				var newx = w.width();
				var newy = w.height();
				if (x != newx || y != newy) 
				{
					delay(function() {
						$Boxes.removeClass("active doEnlarge doReduce");
						$Boxes.find(Opt.string("bigImageSelector")).css("width", "").css("height", "");
						me.initSizes();
					}, 300);
				}
				x = newx;
				y = newy;
			});
			
		}
		
		this.initCSS3 = function() {
			if (userCSS3Accelerate)
			{
				if (Is.defined(window.location.protocol) && (window.location.protocol == "file:" || window.location.protocol == "file"))
				{
					console.log("OpiePortFolioScript : you cannot use userCSS3Accelerate in local machine, cause google chrome cannot access stylesheets");
					userCSS3Accelerate = false;
				}
			}
			
			if (userCSS3Accelerate && $.support.transition) 
			{
				JsCss.init();
				var transistion = "all " + (boxMovementDuration / 1000) + "s cubic-bezier(" + CSS3Easings[boxPositionEasing] + ")";
				JsCss.addRuleStyle(".opie-portfolio .o-box.moving", 
				{
					"-webkit-transition": transistion,
					"-moz-transition": transistion,
					"-o-transition": transistion,
					"-ms-transition": transistion,
					"transition": transistion
				});
				
				var transistion = "all " + (boxOpenDuration / 1000) + "s cubic-bezier(" + CSS3Easings[boxOpenEasing] + ")";
				JsCss.addRuleStyle(".opie-portfolio .o-box.opening", 
				{
					"-webkit-transition": transistion,
					"-moz-transition": transistion,
					"-o-transition": transistion,
					"-ms-transition": transistion,
					"transition": transistion
				});
			}
		}
		
		this.initSizes = function() {
			$Boxes.setData("positionData", false);
			
			var innerWidth = $Wrapper.outerWidth(true) - ($Wrapper.outerWidth() - $Wrapper.width());
			$Inner.width(innerWidth);
			
			var op = innerWidth / maxBoxSize;
			
			var tmpSp = Utils.roundNumber(op, 2).toString().replace(/,/g, ".").split(".");
			var dontResizeThumbs = Opt.bool("dontResizeThumbs");
			if (dontResizeThumbs === false) 
			{
				if (Is.defined(tmpSp[1]) && tmpSp[1] < 50) 
				{
					var maxPerRow = Math.ceil(op);
				}
				else 
				{
					var maxPerRow = Math.floor(op);
				}
			}
			else 
			{
				var maxPerRow = tmpSp[0].toNumber();
			}
			
			
			var con = true;
			boxSize = Math.floor((((100 / maxPerRow) / 100) * innerWidth));
			if (dontResizeThumbs === false) 
			{
				while (con) 
				{
					if (boxSize > maxBoxSize) 
					{
						maxPerRow++;
						boxSize = (((100 / maxPerRow) / 100) * innerWidth);
					}
					else 
					{
						con = false;
					}
				}
			}
			if (boxSize > maxBoxSize) 
			{
				boxSize = maxBoxSize;
				var rowWidth = (maxBoxSize * maxPerRow);
				if (innerWidth > rowWidth && Opt.bool("useCentering") === true) 
				{
					leftOverRight = innerWidth - rowWidth;
					$Inner.width((innerWidth - leftOverRight));
				}
			}
			me.fillTiles(false, true);
		}
		
		this.loadThumbs = function($tuhmbs) {
			if (!Is.defined($tuhmbs)) 
			{
				$tuhmbs = $Boxes.not(".o-hidden");
			}
			$tuhmbs.each(function() {
				var $th = $(this);
				var $img = $(this).find(Opt.string("thumbImageSelector"));
				var imageLoaction = $img.getAttr("src");
				var isAuto = false;
				if (imageLoaction) 
				{
					if (imageLoaction == "auto") 
					{
						isAuto = true;
						imageLoaction = $th.find(Opt.string("bigImageSelector")).getAttr("src");
						$img.addClass("auto");
					}
					$img.unbind("load").load(function() {
						$img.removeAttr("opie-src");
						if (isAuto) 
						{
							if (this.naturalWidth > this.naturalHeight && isAuto) 
							{
								$img.addClass("height");
								$img.css("marginLeft", (this.width / 2) * -1);
							}
							else 
							{
								$img.addClass("width");
								$img.css("marginTop", (this.height / 2) * -1);
							}
						}
						$img.addClass("loaded");
						me.loader($th, false);
					}).attr("src", imageLoaction);
				}
				$th.hover(function() {
					$(this).replaceClass("mouseOut", "mouseOn");
				}, function() {
					$(this).replaceClass("mouseOn", "mouseOut");
				})
			});
		}
		
		this.loader = function($box, showHide) {
			if (showHide == true) 
			{
				$box.find("div.loader").each(function() {
					$(this).stop().fadeIn(Opt.number("loaderFadeInDuration"));
				})
			}
			else 
			{
				$box.find("div.loader").each(function() {
					$(this).stop().stop().fadeOut(Opt.number("loaderFadeOutDuration"));
				})
			}
		}
		
		this.rePosImg = function(wrapperWidth, wrapperHeight, imgWidth, imgHeight) {
			var animCss = {}
			if (imgWidth > wrapperWidth) 
			{
				var newSize = Utils.calcNewImageSize(imgWidth, imgHeight, (wrapperWidth - (wrapperHeight - imgHeight) * 2), "auto");
				imgWidth = newSize.w;
				imgHeight = newSize.h;
				animCss.width = imgWidth;
				animCss.height = imgHeight;
			}
			animCss.marginLeft = (wrapperWidth - imgWidth) / 2;
			animCss.marginTop = (wrapperHeight - imgHeight) / 2;
			$(this).css(animCss)
		}
		
		this.fillTiles = function(onlyFiltered, resetPositionData, clicked) {
			if ($Wrapper.hasClass("inMotion")) 
			{
				return false;
			}
			
			$Wrapper.addClass("inMotion");
			maxBottom = 0;
			var lTop = 0;
			var lLeft = 0;
			var i = 0;
			var innerWidth = $Inner.innerWidth();
			var activeLeft = 0;
			var activeRight = 0;
			var activeTop = 0;
			var activeBottom = 0;
			var activeCount = $Boxes.filter(".preactive,.doEnlarge,.doReduce").size();
			var maxDelay = Opt.number("maxDelay");
			if (maxDelay == 0) 
			{
				maxDelay = 999999999;
			}
			var delay = Opt.number("delayStart");
			
			var fillThumbTiles = function($tmpBoxes, d) {
				var filterOutLeft = true;
				$tmpBoxes.addClass("moving");
				for (var i = 0; i < $tmpBoxes.length; i++) 
				{
				
					var $th = $($tmpBoxes[i]);
					if (!$th.hasFilter(activeFilterName) && !$th.hasClass("o-show-more")) 
					{
						$th.addClass("filterOut");
					}
					else 
					{
						$th.removeClass("filtered");
					}
					if ((!$th.hasClass("preactive") && !$th.hasClass("doEnlarge") && !$th.hasClass("doReduce")) || $th.hasClass("filterOut")) 
					{
						var animCss = 
						{
							width: boxSize,
							height: boxSize
						};
						var animConfig = {}
						if ($th.hasClass("filterOut") || $th.hasClass("filtered") || $th.hasClass("o-hidden")) 
						{
							if (!$th.hasClass("filtered")) 
							{
								if (filterOutLeft == true) 
								{
									animCss.left = boxSize.toNegative();
									filterOutLeft = false;
								}
								else 
								{
									animCss.left = innerWidth + boxSize;
									filterOutLeft = true;
								}
								animCss.top = boxSize.toNegative();
								$th.addClass("filtered");
							}
						}
						else 
						{
							animCss.left = lLeft;
							animCss.top = lTop;
							
							var newRight = lLeft + boxSize;
							if (newRight > innerWidth) 
							{
								lTop += boxSize;
								lLeft = 0;
							}
							
							newRight = lLeft + boxSize;
							newBottom = lTop + boxSize;
							if (activeCount > 0) 
							{
								var con = true;
								while (con) 
								{
									if ((Is.between(lLeft, activeLeft, (activeRight - 1)) && Is.between(lTop, activeTop, (activeBottom - 1))) ||
									(Is.between((newRight - 1), activeLeft, (activeRight - 1)) && Is.between((newBottom - 1), activeTop, (activeBottom - 1)))) 
									{
										lLeft = activeRight;
										var newRight = lLeft + boxSize;
										if (newRight > innerWidth) 
										{
											lTop += boxSize;
											lLeft = 0;
											con = true;
										}
										else 
										{
											con = false;
										}
									}
									else 
									{
										con = false;
									}
								}
							}
							var newRight = lLeft + boxSize;
							if (newRight > innerWidth) 
							{
								lTop += boxSize;
								lLeft = 0;
							}
							
							animCss.left = lLeft;
							animCss.top = lTop;
							lLeft += boxSize;
							
							maxBottom = Math.max(maxBottom, (lTop + boxSize));
						}
						
						if ($th.hasClass("preDeActive") || $th.hasClass("active")) 
						{
							animConfig.duration = boxCloseDuration;
							animConfig.easing = boxCloseEasing;
						}
						else 
						{
							animConfig.duration = boxMovementDuration;
							animConfig.easing = boxPositionEasing;
						}
						
						animConfig.complete = function() {
							var $th = $(this);
							if ($th.hasClass("active") || $th.hasClass("o-show-more") || $th.hasClass("preDeActive")) 
							{
								me.loader($th, false);
							}
							$th.removeClass("preDeActive active moving");
							if ($th.hasClass("last")) 
							{
								me.afterLastAnimation();
							}
						}
						if (resetPositionData == true) 
						{
							$th.setData("positionData", 
							{
								left: animCss.left,
								top: animCss.top
							});
						}
						if (userCSS3Accelerate && $.support.transition) 
						{
							$th.css.eBind($th, [animCss]).delay(delay);
							animConfig.complete.eBind($th).delay((delay + animConfig.duration));
						}
						else 
						{
							animConfig.queue = false;
							$th.delay(delay).animate(animCss, animConfig);
						}
						if (delay < maxDelay) 
						{
							delay += delayIncrease;
						}
					}
					else 
					{
						$th.removeClass("activated moving");
					}
				}
			}
			
			
			$Boxes.removeClass("filterOut");
			var $tmpBoxes = (onlyFiltered) ? $Boxes.not(".filtered,.filterOut") : $Boxes;
			$Boxes.removeClass("last");
			$tmpBoxes.last().addClass("last");
			
			var $Enlarge = $tmpBoxes.filter(".doEnlarge");
			if ($Enlarge.size() > 0) 
			{
				var animCss = {};
				var animConfig = 
				{
					duration: Opt.number("extraInfoOpenDuration")
				}
				$Enlarge.setData("beforeEnlargeHeight", $Enlarge.height());
				var newWidth = $Enlarge.outerWidth(true);
				var newHeight = $Enlarge.outerHeight(true) + $Enlarge.find(Opt.string("extraInfoSelector")).outerHeight(true);
				
				var op = Math.ceil((newHeight / boxSize));
				newHeight += ((op * boxSize) - newHeight);
				animCss.height = newHeight;
				var thPos = $Enlarge.position();
				animCss.left = thPos.left;
				animCss.top = thPos.top;
				activeLeft = animCss.left;
				activeRight = activeLeft + newWidth;
				activeTop = animCss.top;
				activeBottom = activeTop + newHeight;
				
				maxBottom = Math.max(maxBottom, activeBottom);
				
				animConfig.easing = Opt.get("extraInfoCloseEasing");
				$Enlarge.delay(delay).animate(animCss, animConfig);
				if (delay < maxDelay) 
				{
					delay += Opt.number("delayIncrease");
				}
				if (!$Enlarge.hasFilter(activeFilterName)) 
				{
					$Enlarge.addClass("filterOut");
				}
				$Enlarge = false;
			}
			var $Reduce = $tmpBoxes.filter(".doReduce");
			if ($Reduce.size() > 0) 
			{
				var animCss = {};
				var animConfig = 
				{
					duration: Opt.number("extraInfoCloseDuration")
				}
				var newWidth = $Reduce.outerWidth(true);
				var newHeight = $Reduce.getData("beforeEnlargeHeight");
				
				animCss.height = newHeight;
				var thPos = $Reduce.position();
				animCss.left = thPos.left;
				animCss.top = thPos.top;
				activeLeft = animCss.left;
				activeRight = activeLeft + newWidth;
				activeTop = animCss.top;
				activeBottom = activeTop + newHeight;
				
				maxBottom = Math.max(maxBottom, activeBottom);
				
				animConfig.easing = Opt.get("extraInfoOpenEasing");
				$Reduce.animate(animCss, animConfig);
				if (!$Reduce.hasFilter(activeFilterName)) 
				{
					$Reduce.addClass("filterOut");
				}
				$Reduce = false;
			}
			
			var $Preactive = $tmpBoxes.filter(".preactive");
			if ($Preactive.size() > 0) 
			{
				$Preactive.addClass("opening");
				var animCss = {};
				var animConfig = 
				{
					duration: boxOpenDuration
				}
				var newWidth = boxSize * 4;
				var newHeight = boxSize * 2;
				if (newWidth > innerWidth) 
				{
					newWidth = innerWidth;
				}
				
				
				animCss.width = newWidth;
				animCss.height = newHeight;
				
				
				var PosData = $Preactive.getData("positionData");
				if (PosData !== false && $Preactive.hasClass("last") && $Preactive.prevAll(Opt.string("boxSelector") + ".wasActive").size() > 0 || $Preactive.nextAll(Opt.string("boxSelector") + ".wasActive").size() > 0) 
				{
					animCss.left = PosData.left;
					animCss.top = PosData.top;
				}
				else 
				{
					var thPos = $Preactive.position();
					animCss.left = thPos.left;
					animCss.top = thPos.top;
				}
				$Boxes.removeClass("wasActive");
				
				var newRight = animCss.left + newWidth;
				var newBottom = animCss.top + newHeight;
				if (newRight > innerWidth) 
				{
					var c = innerWidth - newWidth;
					animCss.left = c;
					if (animCss.left < 0) 
					{
						animCss.left = 0;
					}
				}
				
				activeLeft = animCss.left;
				activeRight = activeLeft + newWidth;
				activeTop = animCss.top;
				activeBottom = activeTop + newHeight;
				
				
				maxBottom = Math.max(maxBottom, activeBottom);
				
				if (Opt.bool("scrollingAid")) 
				{
					var scrollTop = $(window).scrollTop();
					var innerOffset = $Inner.offset();
					
					var viewPortBottom = $(window).height() + scrollTop;
					var actualBottom = innerOffset.top + activeBottom;
					if (actualBottom > viewPortBottom) 
					{
						$('html, body').animate(
						{
							scrollTop: "+=" + ((actualBottom - viewPortBottom) + (newHeight / 2))
						}, 300);
					}
					var actualTop = innerOffset.top + activeTop;
					if (actualTop < scrollTop) 
					{
						$('html, body').animate(
						{
							scrollTop: actualTop - (newHeight / 2)
						}, 300);
					}
				}
				
				animConfig.complete = function() {
					var $box = $(this);
					var $img = $box.find(Opt.string("bigImageSelector"));
					if ($img.attr("opie-src")) 
					{
						var imageLoaction = $img.getAttr("src");
						$img.unbind("load").load(function() {
							$img.setData("width", this.naturalWidth);
							$img.setData("height", this.naturalHeight);
							me.rePosImg.call($img, newWidth, newHeight, this.naturalWidth, this.naturalHeight);
							$box.replaceClass("preactive", "active");
							$img.removeAttr("opie-src");
						}).attr("src", imageLoaction)
					}
					else 
					{
						me.rePosImg.call($img, newWidth, newHeight, $img.getData("width"), $img.getData("height"));
						$box.replaceClass("preactive", "active");
					}
					$box.removeClass("opening").find(Opt.string("enlargeButtonSelector")).removeClass("opened");
					me.loader($box, false);
					if ($box.hasClass("last")) 
					{
						me.afterLastAnimation();
					}
				}
				
				animConfig.easing = boxOpenEasing;
				
				if (userCSS3Accelerate && $.support.transition) 
				{
					$Preactive.css.eBind($Preactive, [animCss]).delay(delay);
					animConfig.complete.eBind($Preactive).delay((delay + animConfig.duration));
				}
				else 
				{
					animConfig.queue = false;
					$Preactive.delay(delay).animate(animCss, animConfig);
				}
				
				if (!$Preactive.hasFilter(activeFilterName)) 
				{
					$Preactive.addClass("filterOut");
				}
				if (delay < maxDelay) 
				{
					delay += Opt.number("delayIncrease");
				}
				fillThumbTiles($Preactive.prevAll().reverse());
				delay = 0;
				fillThumbTiles($Preactive.nextAll(), true);
				$Preactive = false;
			}
			else 
			{
				fillThumbTiles($tmpBoxes);
			}
			
			me.fixPortSize(false);
		}
		
		this.showMore = function() {
			var showMoreThumbs = $Boxes.filter(".o-hidden").slice(0, Opt.number("showMore")).removeClass("o-hidden");
			me.fillTiles(false, true);
		}
		
		this.afterLastAnimation = function() {
			$Wrapper.removeClass("inMotion");
			window.setTimeout(me.loadThumbs, 100);
			me.fixPortSize(true);
			if ($Boxes.filter(".o-hidden").size() <= 0) 
			{
				$Boxes.filter(".o-show-more").hide();
			}
		}
		
		this.fixPortSize = function(calledInAnimationComplete) {
			var innerBottom = $Inner.position().top + $Inner.innerHeight();
			if (maxBottom > innerBottom) 
			{
				var animHeight = "+=" + (maxBottom - innerBottom);
			}
			else 
			{
				var animHeight = "-=" + (innerBottom - maxBottom);
				
			}
			if (calledInAnimationComplete == false && currentButtom > maxBottom) 
			{
				return false;
			}
			$Inner.stop().animate(
			{
				"height": animHeight
			}, "fast");
			currentButtom = maxBottom;
		}
		
	}
})(jQuery);
