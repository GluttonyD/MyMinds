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
                console.log('xPox='+posX+'  yPox='+posY);
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
                '<div id="' + data + '" class="card ui-widget-content">' +
                '<div class="row">' +
                '<div  id="' + data + '" class="card-delete glyphicon glyphicon-remove"></div> ' +
                '</div>' +
                '<div class="row">' +
                '<div id="' + data +'"  class="card-text"></div> '+
                '<textarea id="' + data + '" class="card-textarea" ></textarea>'+
                '</div>';
            $(".field").prepend(card);
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
                            console.log('xPox='+posX+'  yPox='+posY);
                        }
                    });
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
            var field='<li id="'+data+'" class="field-option"><a id="'+data+'" href="#">default</a><button  id="'+data+'" class="btn btn-primary card-btn">+</button></li>'
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
            console.log($(element).attr('id'));
            $(element).remove();
        }
    });
});

$(document).on("click",".card-text",function (e) {
    var element='#'+e.target.id;
    var element_text='.card-text'+element;
    var element_textarea='.card-textarea'+element;
    var text_div=$('.field').find(element_text);
    var textarea=$('.field').find(element_textarea);
    text_div.css('display','none');
    textarea.css('display','block');

});

$(document).on("change",".card-textarea",function (e) {
    console.log('Чото поменяли');
    var element='#'+e.target.id;
    var element_text='.card-text'+element;
    var element_textarea='.card-textarea'+element;
    var text_div=$('.field').find(element_text);
    var textarea=$('.field').find(element_textarea);
    text_div.css('display','block');
    textarea.css('display','none');
    text_div.html(textarea.val());
    $.ajax({
        url: '/minds/card-textchange', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {id:e.target.id,text:textarea.val()}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        // dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
        }
    });
});

$(document).on("click",".field-option a",function (e) {
    console.log(e.target.id);
    $.ajax({
        url: '/minds/get-field', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {id:e.target.id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var i;
            console.log(data['cards']);
            $('.field').html('');
            for(i=0;i<data['cards'].length;i++){
                var x=data['cards'][i]['xPos']-218;
                var y=data['cards'][i]['yPos']-74;
                var card=
                    '<div id="' + data['cards'][i]['id'] + '" class="card ui-widget-content" style="top : '+y +'px; left : '+x +'px;">' +
                    '<div class="row">' +
                    '<div  id="' +  data['cards'][i]['id']  + '" class="card-delete glyphicon glyphicon-remove"></div> ' +
                    '</div>' +
                    '<div class="row">' +
                    '<div id="' +  data['cards'][i]['id']  +'"  class="card-text">'+data['cards'][i]['text'] +'</div> '+
                    '<textarea id="' +  data['cards'][i]['id']  + '" class="card-textarea" >'+data['cards'][i]['text'] +'</textarea>'+
                    '</div>';
                $('.field').prepend(card);
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
                                console.log('xPox='+posX+'  yPox='+posY);
                            }
                        });
                    }
                });
            }
        }
    });
});
