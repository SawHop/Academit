"use strict";
document.addEventListener("DOMContentLoaded", function () {
    var button = document.getElementById("TODO-Button");
    var input = document.getElementById("TODO-Input");

    var list = document.getElementById("TODO-ul");

    button.addEventListener("click", function () {
        var text = input.value;

        var listItem = document.createElement("li")
        listItem.innerText = text;
        var buttonDelete = document.createElement("button")
        buttonDelete.innerText = "Delete";

        buttonDelete.addEventListener("click", function () {
            listItem.remove();
            buttonDelete.remove();
        });

        list.appendChild(listItem);
        list.appendChild(buttonDelete);
        input.value = "";
    });
});