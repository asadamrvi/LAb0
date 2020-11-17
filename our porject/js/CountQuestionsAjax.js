$(document).ready(function bucle(event) {

    mispreguntas = 0;
    preguntas = 0;
    var em = $("#email").val();

    $.ajax({
        type: 'GET',
        url: '../xml/Questions.xml',
        cache: false,
        dataType: 'xml',
        success: function (xml) {
            setTimeout(function () { bucle(event); }, 10000);
            var node = 'assessmentItem',
                mispreguntass = $(xml).find(node).each(function () {
                    var email = $(this).attr('author');
                    if (email == em) {
                        mispreguntas++;
                    }
                }),
                count = $(xml).find(node).length;
                $("#preg").html(mispreguntas + " / " + count)
            
        },
        error: function (r) {
            console.error(r);
        }
    });

});
