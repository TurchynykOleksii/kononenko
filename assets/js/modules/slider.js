const swiper = new Swiper('.swiper', {
	slidesPerView: "auto",
	watchOverflow: true,
	loop: true,
	pagination: {
		el: '.swiper-pagination',
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	spaceBetween: 20,
	autoHeight: true,
	breakpoints: {
		// when window width is >= 992px
		992: {
			slidesPerView: 4,
			spaceBetween: 40
		}
  }
});


// $('.swiper-button-prev').remove();
// $('.swiper-button-next').remove();

// const swiper = new Swiper('.swiper', {
// 	slidesPerView: 1,
// 	watchOverflow: true,
// 	pagination: {
// 		el: '.swiper-pagination',
// 	},
// 	navigation: {
// 		nextEl: '.swiper-button-next',
// 		prevEl: '.swiper-button-prev',
// 	},
// 	spaceBetween: 20,
// 	autoHeight: true
// });