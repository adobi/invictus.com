/**
* Mat Marquis' Carousel
* http://matmarquis.com/carousel/
*/
(function($){
	$.fn.carousel = function(config) {
		var defaults = {
			slider: '.slider',
			slide: '.slide',
			prevSlide: '.prev',
			nextSlide: '.next',
			counter: '.counter',
			counterText: 'Slide {current} of {total}',
			secondary: '.secondary',
			speed: 500
		},
		$wrapper = $(this),
		opt = $.extend(defaults, config);

		carousel = {
			roundDown : function(leftmargin) {
				var leftmargin = parseInt(leftmargin, 10);

				return Math.ceil( (leftmargin - (leftmargin % 100 ) ) / 100) * 100;
			},
			transitionSupport : function() {
				var dStyle = document.body.style;

				return dStyle.webkitTransition !== undefined || 
						dStyle.mozTransition !== undefined ||
						dStyle.msTransition !== undefined ||
						dStyle.oTransition !== undefined ||
						dStyle.transition !== undefined;
			},
			currentPage : function($slider, leftmargin) {
				var current = -(leftmargin / 100),
					$slides = $slider.find(".slide"),
					$primaryslides = $slider.not('[id*=secondary]').find(".slide"),
					$pagination = $slider.parent().find('.carousel-tabs'),
					label = opt.counterText;

				$slides.removeClass("sl-active");
				$($slides[current]).addClass("sl-active");
				if($pagination) {

					var $container = $slider.parent(),
						$counterHeading = $container.find(opt.counter);

					if ($counterHeading) {
						var label = opt.counterText;
						label = label.replace("{current}", (current + 1));
						label = label.replace("{total}", $primaryslides.length);
						$counterHeading.text(label);
					}

					$pagination.find('li:nth-child(' + (current + 1 ) + ')')
						.addClass('current')
						.siblings()
							.removeClass('current');
				}
			},
			/* Adjustment to work around browser rounding errors */
			tweak : function($slider) {
				$slider.each(function() {
					var $slider = $(this),
						$container = $slider.parent(),
						$current = $slider.find(".sl-active");
				
					$current.each(function() {
						var $slide = $(this),
							diff = $container.width() - $slide.width(),
							$slides = $slider.find(".slide"),
							iMax = $slides.length;

						if (diff != 0) {
							for (var i = 0; i < iMax; i++) {
								$($slides[i]).css("left", (diff * i) + "px");
							}
						} else {
							$slides.css("left", 0);
						}
					});
				});
			},
			move : function($slider, moveTo) {
				if( !$slider ) {
					return;
				}
				if( carousel.transitionSupport() ) {
					$slider.css('marginLeft', moveTo + "%");
				} else {
					$slider.animate({ marginLeft: moveTo + "%" }, opt.speed);
				}
				carousel.currentPage($slider, moveTo);
				carousel.tweak($slider);
			}
		};
		
		var nextPrev = function($slider, dir, $secondary) {
			var leftmargin = ( $slider.attr('style') ) ? $slider.attr('style').match(/margin\-left:(.*[0-9])/i) && parseInt(RegExp.$1) : 0,
				$primaryslider = $slider.not('[id*="secondary"]'),
				$slide = $primaryslider.find(opt.slide),
				constrain = dir === 'prev' ? leftmargin != 0 : -leftmargin < ($slide.length - 1) * 100,
				$target = $( '[href*="#' + $primaryslider.attr('id') + '"]');

			if (!$slider.is(":animated") && constrain ) {

				if ( dir === 'prev' ) {
					leftmargin = ( leftmargin % 100 != 0 ) ? carousel.roundDown(leftmargin) : leftmargin + 100;
				} else {
					leftmargin = ( ( leftmargin % 100 ) != 0 ) ? carousel.roundDown(leftmargin) - 100 : leftmargin - 100;
				}

				carousel.move($slider, leftmargin);
				carousel.move($secondary, leftmargin);

				$target.removeClass('disabled');

				switch( leftmargin ) {
					case ( -($slide.length - 1) * 100 ):
						$target.filter(opt.nextSlide).addClass('disabled');
						break;
					case 0:
						$target.filter(opt.prevSlide).addClass('disabled');
						break;
				}
			} else {
				var reset = carousel.roundDown(leftmargin);

				carousel.move($slider, reset);
				if( $secondary !== null ) {
					carousel.move($secondary, reset);
				}
			}
		},
		nextPrevSetup = function(e) {
			var $el = $(e.target).closest(opt.prevSlide + ',' + opt.nextSlide),
				link = this.hash,
				dir = ( $el.is(opt.prevSlide) ) ? 'prev' : 'next',
				$slider = $( opt.slider ).filter(link),
				$secondary = ($(opt.slider).filter(link + '-secondary').length) ? $(opt.slider).filter(link + '-secondary') : null;

				if ( $el.is('.disabled') ) { 
					return false;
				}

				nextPrev($slider, dir, $secondary);

			e.preventDefault();	
		};

		$wrapper.parent().find(opt.nextSlide + ',' + opt.prevSlide)
			.bind('click', nextPrevSetup);

		$(opt.prevSlide).addClass('disabled');


		$('.carousel-tabs').find('a').click(function(e) {
			var $el = $(this),
				current = parseInt(this.hash.match(/\-slide(.*[0-9])/i) && RegExp.$1, 10),
				move = (100 * (current - 1)),
				$contain = $el.closest('.slidewrap'),
				$prev = $contain.find(opt.prevSlide),
				$next = $contain.find(opt.nextSlide),
				$target = $contain.find(opt.slider);

			$el.parent()
				.addClass('current')
				.siblings()
					.removeClass('current');

			carousel.move($target, -move);

			if(move == 0) {
				$prev.addClass('disabled');
			} else {
				$prev.removeClass('disabled');
			}

			if($el.parent().is(':last-child')) {
				$next.addClass('disabled');
			} else {
				$next.removeClass('disabled');
			}

			e.preventDefault();
		});

		//swipes trigger move left/right
		$wrapper.parent().bind( "dragSnap", function(e, ui){
			var $slider = $(this).find( opt.slider ),
				dir = ( ui.direction === "left" ) ? 'next' : 'prev';

			nextPrev($slider, dir);
		});

		return this.each(function() {
			var $wrap = $(this),
				secId;

			if(opt.secondary) {
				var $target = $wrap.find(opt.secondary);

				if($target.length > 1) {
					var secId = $wrap.find('.slider').attr('id') + '-secondary',
						$secWrap = $('<div class="secslidewrap" />'),
						$secSlider = $('<div class="secslider" />'),
						$secList = $('<ul class="slider" id="' + secId + '" />');
					$wrap.prepend($secWrap.append($secSlider.append($secList)));

					$target.each(function() {
						$('<li class="slide" />')
							.append($(this))
							.appendTo($secList);
					});
				}
			}

			var $slider = $wrap.find(opt.slider),
				$slide = $wrap.find(opt.slide),
				slidenum = $slide.length,
				speed = opt.speed / 1000;

			$slider.css({
				width: 100 * slidenum + "%"
			});

			$slide.css({
				width: (100 / slidenum) + "%"
			});

			carousel.currentPage($slider, 0);
			
			carousel.tweak( (secId ) ? $slider.not('#' + secId) : $slider);
			$wrapper.show();

		});
	};
})(jQuery);
