var clickID;
var cardID;
$(".card").draggable({
    containment:".field", scroll:false,
    drag:function (e) {
    },
    stop:function (e) {
        var id="#"+e.target.id;
        var posX=$(id).offset().left;
        var posY=$(id).offset().top;

        $.ajax({
            url: '/minds/set-card-pos', // Url to which the request is send
            type: "GET",             // Type of request to be send, called as method
            data: {id:e.target.id,posX:posX,posY:posY}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            // contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: true,
            // dataType: 'json',// To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                console.log('Success');
            }
        });
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
                },
                stop:function (e) {
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

$(document).on("click",".card-delete",function (e) {
    var id='#'+e.target.id;
    var element='.card'+id;
    $.ajax({
        url: '/minds/card-delete', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {id:e.target.id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        // dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            $(element).remove();
        }
    });
});