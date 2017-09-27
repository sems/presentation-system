$(document).ready(function() {

  $(window).resize(function() {
    if($(window).width() < 701) {
      $('nav').addClass("closed");
      $('nav').click(function() {
         $(this).toggleClass("open closed");
      });
    }

   })
   .resize();

   $("#navItem_Title").keyup(function(){
       var text=$(this).val();
       $(this).val(text.replace(/[^A-Za-z]/g,''));
   })



});

$(document).on('click', '.btn-modal', function(e){
	e.preventDefault();

	var $this = $(e.target);

	$(".modal").addClass("open")
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);

	$('.overlay').on('click', function(){
		$(this).fadeOut(150, function(){
			$(this).remove();
		});
		$(".modal").removeClass("open");
	});

});
