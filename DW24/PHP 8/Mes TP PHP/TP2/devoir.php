<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
<body class="container">
    <form method="post">
        <br>
        <br>
        <label class="display-6">Entrer le premier nombre</label>
        <br>
        <br>
        <input type="number" name="a" required class="form-control" style="width:40%;">
        <br>
        <br>
        <label class="display-6">Entrer le dexième nombre</label>
        <br>
        <br>
        <input type="number" name="b" required class="form-control" style="width: 40%;">
        <br>
        <br>
        <label class="display-6">Entrer le troisième nombre</label>
        <br>
        <br>
        <input type="number" name="c" required class="form-control" style="width: 40%;">
        <br>
        <br>
        <input type="submit" value="Afficher du plus petit au plus grand" class="btn btn-primary">
    </form>
</body>
</html>

<?php
extract($_POST);
if(isset($a))
{
    if($a<$b && $a<$c) $pp = $a;
    if($b<$a && $b<$c) $pp = $b;
    if($c<$a && $c<$b) $pp = $c;

    if($a>$b && $a>$c) $pg = $a;
    if($b>$a && $b>$c) $pg = $b;
    if($c>$a && $c>$b) $pg = $c;

    if($a>$b && $a<$c) $m = $a;
    if($b>$a && $b<$c) $m = $b;
    if($c>$a && $c<$b) $m = $c;
}

$chaine = $pp . " - " . $m . " - " . $pg;

echo"<div class='alert alert-info'>";
echo "Les nombres sont: $chaine" ;
echo"</div>";

?>