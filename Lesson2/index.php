<?php


echo 'Задание 1<br/>';
// если $a и $b положительные, вывести их разность;
// если $а и $b отрицательные, вывести их произведение;
// если $а и $b разных знаков, вывести их сумму;

$a = -4;
$b = -2;

if ($a >= 0 && $b >= 0) {
  echo $a - $b;
}
elseif ($a < 0 && $b < 0) {
  echo $a * $b;
}
else {
  echo $a + $b;
};

echo '<br/>Задание 2<br/>';
// Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.

$a = 12;
echo '<br>';
switch ($a) {
	case 1: 
		echo '1';
		echo '<br/>';
	
	case 2: 
		echo '2';
		echo '<br/>';

	case 3: 
		echo '3';
		echo '<br/>';

	case 4: 
		echo '4';
		echo '<br/>';
	
	case 5: 
		echo '5';
		echo '<br/>';
	
	case 6: 
		echo '6';
		echo '<br/>';

	case 7: 
		echo '7';
		echo '<br/>';

	case 8: 
		echo '8';
		echo '<br/>';

	case 9: 
		echo '9';
		echo '<br/>';
	
	case 10: 
		echo '10';
		echo '<br/>';

	case 11: 
		echo '11';
		echo '<br/>';

	case 12: 
		echo '12';
		echo '<br/>';
	
	case 13: 
		echo '13';
		echo '<br/>';
	
	case 14: 
		echo '14';
		echo '<br/>';

	case 15: 
		echo '15';
		echo '<br/>';
		break;

	default: 
		echo 'число за пределом диапазона';
		echo '<br/>';


};

echo '<br/>Задание 3<br/>';
// 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.

$x = 3;
$y = 4;

echo 'x = ',$x,'<br/>y = ',$y;

function sum($x,$y) {
	return $x + $y;
};

function dif($x,$y) {
	return $x - $y;
};

function mult($x,$y) {
	return $x * $y;
};

function div($x,$y) {
	return $x / $y;
};

echo '<br/>Сумма x и y = ',sum($x,$y);
echo '<br/>Разность x и y = ',dif($x,$y);
echo '<br/>Произведение x и y = ',mult($x,$y);
echo '<br/>Деление x и y = ',div($x,$y);

echo '<br/><br/>Задание 4<br/>';
// 3. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
	switch ($operation) {
		case 'sum':
			return sum ($arg1,$arg2);
			break;
		case 'dif':
			return dif ($arg1,$arg2);
			break;
		case 'mult':
			return mult ($arg1,$arg2);
			break;
		case 'div':
			return div ($arg1,$arg2);
			break;
		default:
			echo 'Неизвестная операция.';

	}
};

echo '<br/><br/>',mathOperation(30,15,mult);

echo '<br/><br/>Задание 6<br/>';
// 6. С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow) {
	if ($pow > 1) {
	return $val * power($val, $pow-1);
	}
	else return $val;
// для упрощения логики считаем, что возведение в нулевую и отрицательную степень должно давать на выходе исходное число $val.
};

echo '<br/>Возведение в степень: ', power(3,4);


echo '<br/><br/>Задание 7<br/>';
// 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты

echo date("G:i").'<br/>';
echo currenttime();

function currenttime () {
	$hour = date("G");
	switch ($hour) {
		case 1: case 21:
			return $hour.' час';
			break;
		case 2: case 3: case 4: case 22: case 23:
			return $hour.' часa';
			break;
		case 5: case 6: case 7: case 7: case 8: case 9: case 10: case 11: case 12: case 13: case 14: case 15: case 16: case 17: case 18: case 19: case 20:
			return $hour.' часов';
			break;
	}
};

?>