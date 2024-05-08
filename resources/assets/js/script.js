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

  function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
  }


 



  


  
