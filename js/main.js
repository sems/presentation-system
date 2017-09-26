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
