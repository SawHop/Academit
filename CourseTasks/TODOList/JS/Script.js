"use strict";
document.addEventListener("DOMContentLoaded", function () {
    var button = document.getElementById("todo-button");
    var input = document.getElementById("todo-input");

    var list = document.getElementById("todo-ul");

    button.addEventListener("click", function () {
        var text = input.value;

        if (text != +"") {
            var listItem = document.createElement("li")
            listItem.innerText = text;
            var buttonDelete = document.createElement("button")
            buttonDelete.innerText = "Delete";

            buttonDelete.addEventListener("click", function () {
                listItem.remove();
                buttonDelete.remove();
            });

            list.appendChild(listItem);
            listItem.appendChild(buttonDelete);
            input.value = "";
        }
    });
});