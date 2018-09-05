$(".card").draggable({
    containment:".field", scroll:false,
    drag:function () {
        var posX=$('.card').offset().left;
        var posY=$('.card').offset().top;
        $('.card').html(posX+"   "+posY);
    },
    stop:function () {
        $('.card').html('Меня отпустили!');
        $('.card').offset({top:600,left:600});
    }
});
$('.card').offset({top:600,left:600});
var card=
    '<div id="draggable" class="card ui-widget-content">'+
    '   <p>типа карточка</p>' +
    '</div>';

$(document).on("click", ".card-btn", function (e) {
    e.preventDefault();
    $(".field").prepend(card);
    $(".card").draggable({ containment:".field", scroll:false });
});