// untuk go-to-top
$(document).ready(function(){
    $('.go-to-top').click(function(){
        $('html').animate({
            scrollTop: 0
        }, 500);
    });

    var card = $('.card-deck .card');

    $.each(card, function(index, item){
        setTimeout(function(){
            card.eq(index).css({
                opacity: 1
            });
        }, (index + 1) * 300);
    });

    // alert ketika item bertambah
    $('.add-to-cart i').click(function(){
       
    });
})