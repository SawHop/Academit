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
var list1 = list.slice(list.length - 5);
console.log("Последние пять элементов массива = " + list1);

//Подмассив из первых пяти элементов
var list2 = list.slice(0, 5);
console.log("Первые пять элементов массива = " + list2);
var sum = 0;

//Сумма четных элементов массива
var list3 = list.filter(function (x) {
    return x % 2 === 0;
});

var result = list3.reduce(function (sum, current) {
    return sum + current;
}, 0);
console.log("Сумма четных элементов массива = " + result);

//Список квадратов чисел из массива
var list3 = list.map(function (x) {
    return Math.pow(x, 2);
});
console.log("Список квадратов чисел из массива = " + list3);

