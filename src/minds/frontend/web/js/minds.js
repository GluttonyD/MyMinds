$(".card").draggable({ containment:".field", scroll:false });
var card=
    '<div id="draggable" class="card ui-widget-content">'+
    '   <p>типа карточка</p>' +
    '</div>';

$(document).on("click", ".card-btn", function (e) {
    e.preventDefault();
    $(".field").prepend(card);
    $(".card").draggable({ containment:".field", scroll:false });
});