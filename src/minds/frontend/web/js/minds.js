var clickID;
var cardID;
$(".card").draggable({
    containment:".field", scroll:false,
    drag:function () {
        var posX=$('.card').offset().left;
        var posY=$('.card').offset().top;
        $('.card').html(posX+"   "+posY);
    },
    stop:function () {
    }
});

$(document).ready(function () {
    $('.card-btn').click(function () {
        clickID = $(this).attr('id');
        console.log(clickID);
    });
});
$(document).on("click", ".card-btn", function (e) {
    e.preventDefault();

    cardID='.card#'+clickID;
    $.ajax({
        url: '/minds/add-card', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {field_id: clickID}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        // dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var card=
                '<div id="'+data+'" class="card ui-widget-content">'+
                '   <p>типа карточка</p>' +
                '</div>';
            $(".field").prepend(card);
            $(".card").draggable({
                containment:".field", scroll:false,
                drag:function (e) {
                    var id="#"+e.target.id;
                    $(id).html(e.target.id);
                },
                stop:function (e) {
                    var id="#"+e.target.id;
                    $(id).html('Отпустили');
                }
            });
        }
    });
});

$(document).on("click","#field-button",function (e) {
    e.preventDefault();
    $.ajax({
        url: '/minds/add-field', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        // dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var field='<li id="'+data+'" class="field-option"><a href="#">Выбор</a><button  id="'+data+'" class="btn btn-primary card-btn">+</button></li>'
            $("ul.list-unstyled").append(field)
        }
    });
});