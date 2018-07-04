"use strict";
var list = [];
for (var i = 1; i <= 100; i++) {
    list.push(i);
}
console.log("Создан массив = " + list);

//Сортировка массива по убыванию
function compareNumeric(a, b) {
    return b - a;
}

list.sort(compareNumeric);
console.log("Массив отсортирован по убыванию = " + list);

//Подмассив из последних пяти элементов
var list1 = list.slice(list.length - 5, list.length + 1);
console.log("Последние пять элементов массива = " + list1);

//Подмассив из первых пяти элементов
var list2 = list.slice(0, 5);
console.log("Первые пять элементов массива = " + list2);
var sum = 0;

//Сумма четных элементов массива
for (i = 0; i < list.length; i++) {
    if (list[i] % 2 == 0) {
        sum += list[i];
    }
}
console.log("Сумма четных элементов массива = " + sum);

//Список квадратов чисел из массива
var list3 = []
for (i = 0; i < list.length; i++) {
    var element = Math.pow(list[i], 2);
    list3.push(element);
}

console.log("Список квадратов чисел из массива = " + list3);
