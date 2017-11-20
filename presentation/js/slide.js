var slider = $('.slider');

slider.slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  prevArrow: '',
  nextArrow: '',
  fade: true,
  speed: 1000
});

var durationList = $('.slider__item').map(function(index, item) {
  return item.getAttribute('data-time');
});

var slideIndex = 0;
var changeSlide = function(timing) {
  setTimeout(function() {
    if (timing !== 0) {
      slider.slick('slickNext');
    }
    if (slideIndex >= durationList.length) slideIndex = 0;
    changeSlide(durationList[slideIndex++]);

  }, timing);
}
changeSlide(0);
