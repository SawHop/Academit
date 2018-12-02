"use strict"

$('#submit').click(function () {
    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();

    if (name == "") {
        $("#message").text("Введите ваше имя");
    }
    else if (email == "") {
        $("#message").text("Введите email");
    }
    else if (password == "") {
        $("#message").text("Введите пароль");
    }
    console.log(name + '\n' + email + '\n' + password);
});

$(document).ready(function () {
    $("#submitt").bind("click", function () {
        var text = $("#textarea").val();
        $("#mes").text(text);
        document.getElementById("textarea").value = "";
    });
});
