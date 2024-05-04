$(document).ready(function () {

    $('.togglefaq').click(function (e) {
        e.preventDefault();
        var notthis = $('.active').not(this);
        notthis.find('.fa-plus').addClass('fa-plus').removeClass('fa-minus');
        notthis.toggleClass('active').next('.faqanswer').slideToggle(300);
        $(this).toggleClass('active').next().slideToggle("fast");
        $(this).children('i').toggleClass('fa-plus fa-minus');
    });

});


