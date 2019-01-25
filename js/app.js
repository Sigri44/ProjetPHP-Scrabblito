$("#letters").sortable();

$("send-button").on("click", function () {
    //récupère la valeur tapée dans l'input
    var answer = $("#answer").val()

    $.ajax({
        url: "server.php",
        data: {
            action: 'answer',
            answer: answer
        }
    })
        .done(function (response) {
            console.log(response)
        })
})

$("#new-game").on("click", function () {
    $.ajax({
        url: "server.php?action=new-game"
    })
        .done(function (response) {
            console.log(response)

            //vide les lettres précédentes
            $("#letters").empty()

            for (var i = 0; i < response.letters.length; i++) {
                $("#letters").append('<div>' + response.letters[i].toUpperCase() + '</div>')
            }
        })
});