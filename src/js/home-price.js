import "slick-carousel"
import $ from "jquery"

$(document).ready(function() {
	$(".home-price__carousel").slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		arrows: false,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					centerMode: true,
				},
			},
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
