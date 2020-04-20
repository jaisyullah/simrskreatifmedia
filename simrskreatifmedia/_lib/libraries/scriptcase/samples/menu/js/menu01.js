$(function(){
    $('.menu').hover(function(){
        $(this).toggleClass('open');
    });
    /*
    $('.menu').click(function(){
        $(this).toggleClass('open');
    })
    
    $(document).click(function(e) {
        if(!$(event.target).closest('.menu').length) {
            if($('.menu').hasClass("open")) {
                $('.menu').removeClass('open');
            }
        }
    });
    */
    
})