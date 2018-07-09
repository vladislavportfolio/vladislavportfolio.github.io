$().ready(function() {
  $('.menu-trigger').click(function() {
    $('nav ul').toggleClass('hide'); 
  });//end slide toggle

  $("li").click(function() {
  $("ul").toggleClass('hide');
});


  $(window).resize(function() {   
    if ($(window).width() > 800 ) {     
      $('nav ul').removeAttr('style');
     }
  });//end resize
});//end ready