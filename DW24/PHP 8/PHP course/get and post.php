<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="get and post.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Log in">
    </form>
    <!-------------------------------------------->
    <form action="get and post.php" method="post">
        <label>Quantity:</label><br>
        <input type="number" name="quantity">
        <input type="submit" value="Total">
    </form>
</body>

</html>

<?php

// $_GET, $_POST=special variables used to collect data from an HTML form
// data is sent to the file in the action attribute of <form>
// <form action="some_file.php" method="get">

//$_GET = Data is appended to the url
// NOT SECURE
// Char limit
// Bookmark is possible w/ values
// GET requests can be cached
// Better for a search page

//$_POST = Data is packaged inside the body of HTTP request
// MORE SECURE
// No data limit
// Cannot bookmark
// GET requests are not cached
// Better for submitting credentials

	echo "{$_POST["username"]} <br>";
	echo "{$_POST["password"]} <br>";

    $item = "Pizza";
    $price = 5.99;
    $quantity = $_POST["quantity"];
    $total = null;
    $total = $quantity * $price;

    echo"You have ordered {$quantity}x{$item}/s <br>";
    echo"Your total is: \${$total}";
?>