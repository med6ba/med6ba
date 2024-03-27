<?php

//1-Variables in PHP

	//strings
		$name = "Mohamed ben abdessadak";
		$food = "Pizza";
		$email = "mohamedbenabdessadak.personel@gmail.com";
	//integers
		$age =  18;
		$users = 2;
		$quantity = 3;
	//floats
		$gpa = 2.5;
		$price = 4.99;
		$tax_rate = 5.1;
	//booleans
		$employed = true;
		$online = false;
		$for_sale = true;
	//quality
		$total = null;
		$total = $quantity * $price;
	//print = echo
		echo"Hello {$name}<br>";
		echo"You like {$food}<br>";
		echo"Your email is: {$email}<br>";
		echo"You are {$age} years old<br>";
		echo"There are {$users} users online<br>";
		echo"You would like to buy {$quantity} items<br>";
		echo"Your gpa is: {$gpa}<br>";
		echo"Your pizza is: \$ {$price}<br>";
		echo"Your tax rate is: {$tax_rate}%<br>";
		echo"You have ordered {$quantity} x {$food}s <br>";
		echo"Your total is: \${$total} <br>";

//2-Operators

// Arithmetic operators
// + - * / ** %

	$x = 10;
	$y = 2;
	$z = null;
	//$z = $x + $y;
	//$z = $x - $y;
	//$z = $x * $y;
	//$z = $x / $y;
	//$z = $x ** $y;
	//$z = $x % $y;
	echo $z;

// Increment/decrement operators
// ++ --

	$counter = 0;
	$counter = $counter + 1;
	echo $counter;
//=======>
	$counter = 0;
	$counter++;
	echo $counter;
//------------------------------
	$counter = 0;
	$counter = $counter - 1;
	echo $counter;
//=======>
	$counter = 0;
	$counter--;
	echo $counter;
//------------------------------
	$counter = 0;
	$counter += 2;
	echo $counter;
//------------------------------
	$counter = 0;
	$counter -= 3;
	echo $counter;

// Operator precedence
// ()
// ** power is not working ironow
// * / %
// + -

	$total = 1 + 2 - 3 * 4 / 5;
	echo $total;

?>