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

$(document).on('click', '.btn-pre-add', function(e){
	e.preventDefault();

	var $this = $(e.target);

	$(".pre-add-modal").addClass("open")
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);

	$('.overlay').on('click', function(){
		$(this).fadeOut(150, function(){
			$(this).remove();
		});
		$(".pre-add-modal").removeClass("open");
	});

});

$(document).on('click', '.btn-del-user', function(e){
	e.preventDefault();

	var $this = $(e.target);
    var gotId = $this.val();

    console.log(gotId);
    $('input[name="idtodel"]').val(gotId);

	$(".del-modal").addClass("open");
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);
});

$(document).on('click', '.btn-edit-user', function(e){
	e.preventDefault();

	var $this = $(e.target);
    var gotId = $this.val();

    console.log(gotId);
    $('input[name="idtodel"]').val(gotId);

	$(".edit-modal").addClass("open");
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);

});
