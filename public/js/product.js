$("#descripcion h3").click(function () {

    var jqInner = $(this).next();
    if (jqInner.is(":visible"))
    {
        jqInner.slideUp()
        $(this).find('span').addClass('ion-plus');
        $(this).find('span').removeClass('ion-minus');
    }
    else
    {
        jqInner.slideDown()
        $(this).find('span').addClass('ion-minus');
        $(this).find('span').removeClass('ion-plus');
    }
})
