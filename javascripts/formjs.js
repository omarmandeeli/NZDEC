/* Author: 

*/

$(".dropdown dt a").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});

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
            $('header').addClass('fixed-top');
        } else {
            $('header').addClass('fixed-top');
        }
    })
});

$( function() {
    $( "#datepicker" ).datepicker();
  } );


/*
  Dropdown with Multiple checkbox select with jQuery - May 27, 2013
  (c) 2013 @ElmahdiMahmoud
  license: http://www.opensource.org/licenses/mit-license.php
*/

