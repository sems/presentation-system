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

// Add an account
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
// Add an presentation
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

// Add an presentation
$(document).on('click', '.btn-add', function(e){
	e.preventDefault();

	var $this = $(e.target);

	$(".add-modal").addClass("open")
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);

	$('.overlay').on('click', function(){
		$(this).fadeOut(150, function(){
			$(this).remove();
		});
		$(".add-modal").removeClass("open");
	});

});

// Delete .
$(document).on('click', '.btn-del', function(e){
	e.preventDefault();

	var $this = $(e.target);
    var gotId = $this.val();

    $('input[name="idtodel"]').val(gotId);

	$(".del-modal").addClass("open");
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);

    $('.overlay').on('click', function(){
		$(this).fadeOut(150, function(){
			$(this).remove();
		});
		$(".del-modal").removeClass("open");
	});
});

// Edit
// NOTE: EDIT
$(document).on('click', '.user-table .btn-edit', function(e){
	e.preventDefault();

	var $this = $(e.target);
    var gotId = $this.val();

    $('input[name="idtoedit"]').val(gotId);

	$(".edit-modal").addClass("open");
	$("body").append('<div class="overlay"></div>');
	$(".overlay").fadeIn(150);

    $('.overlay').on('click', function(){
		$(this).fadeOut(150, function(){
			$(this).remove();
		});
		$(".edit-modal").removeClass("open");

        $('input[name="idtoedit"]').val();
	});
});
