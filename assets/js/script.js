$(document).ready(function () {
  $('#enough').click(function () {
    $('#myButton').prop("disabled", !$("#enough").prop("checked")); 
  });

  $('.click-box').click(function(){
    $(this).addClass('c-code'); 
    
    setTimeout(function() {
      $('.click-box').removeClass('c-code'); 
      }, 1000);

  });

});

// preloader
// $(window).on("load", function () {
//   var preloader = $(".preloader");
//   preloader.fadeOut(2000);
// });

// preloader
jQuery(window).on('load', function() {
    preloader();
});

// progress-bar 
var skills = {
ht: 100
};

$.each(skills, function(key, value) {
var skillbar = $("." + key);

skillbar.animate(
  {
    width: value + "%"
  },
  1500,
  function() {
    $(".speech-bubble").fadeIn();
  }
);
}); 

// copy-code

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}


function preloader(){
  var preloader = $("#page-preloader");
  preloader.fadeOut('fast');
}