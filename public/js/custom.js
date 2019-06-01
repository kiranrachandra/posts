$(document).ready(function(){

    $("#gotop").hide();

    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 80) {
                $('#gotop').fadeIn();
            } else {
                $('#gotop').fadeOut();
            }
        });

        $('#gotop').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    
    /**
    * show loading gif
    */
   $.fn.startLoad = function() {		
       $("#loading-box").fadeIn();		
   }

   /**
    * hide loading gif 
    */
   $.fn.stopLoad = function() {
       $("#loading-box").fadeOut();
   }

});

$(window).load(function() {
    $(".spinner").delay(300).fadeOut();
    $(".loader").delay(600).fadeOut("slow");
    $(".wrapper").fadeIn();
});