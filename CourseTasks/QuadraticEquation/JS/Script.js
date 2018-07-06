"use strict";
document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("buttonOn")
    addButton.addEventListener("click", function () {
        var a = document.getElementById("a").value;
        var b = document.getElementById("b").value;
        var c = document.getElementById("c").value;
        var d = Math.pow(b, 2) - 4 * a * c;

        if (a == 0 && b == 0 && c == 0) {
            result = "Х любое число";
        } else if (a == 0 && b == 0) {
            result = "Решений нет";
        } else if (a == 0) {
            x1 = -c / b;
            result = x1;
        } else if (d > 0) {
            var x1 = (-b - Math.sqrt(d)) / (2 * a);
            var x2 = (-b + Math.sqrt(d)) / (2 * a);
            var result = "x1 = " + x1 + ", x2 = " + x2;
        } else if (d == 0) {
            x1 = -b / (2 * a);
            result = x1;
        } else {
            result = "Решений нет";
        }

        var resultInHtml = document.getElementById("result");
        resultInHtml.innerHTML = result;
    });
});
