/* Author: 

*/


WebFontConfig = {
    google: { families: [ 'Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
})();

$('.parallax').parallax({
  speed : 0.6
});

$(window).resize(function(){
  var windowHeight = $(window).height();
  $('#header').css({
    'height':windowHeight
  });
}).resize();

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 60
        }, 500);
        return false;
      }
    }
  });
});

$(document).ready(function(){
  $('#menu').slicknav();
});

$(window).scroll(function() {
  if (  document.documentElement.clientHeight + 
        $(document).scrollTop() >= document.body.offsetHeight )
  { 
      // Display alert or whatever you want to do when you're 
      //   at the bottom of the page. 
  }
});

$(function () {
    $(window).scroll(function () {
        var top_offset = $(window).scrollTop();
        if (top_offset == 0) {
            $('header').removeClass('fixed-top');
        } else {
            $('header').addClass('fixed-top');
        }
    })
});
