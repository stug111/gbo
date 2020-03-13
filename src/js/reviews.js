import "slick-carousel"
import $ from "jquery"

$(document).ready(function() {
	$(".block-review__slider").slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		arrows: false,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
})
