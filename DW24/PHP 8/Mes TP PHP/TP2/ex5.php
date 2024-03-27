<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" class="container">
        <br>
        <label for="number1" class="display-6">Entrer le premier nombre:</label>
        <input type="number" name="nombre1" required class='form-control' style="width: 25%;">
        <label for="number2" class="display-6">Entrer le dexième nombre:</label>
        <input type="number" name="nombre2" required class='form-control' style="width: 25%;">
        <br>
        <button type="submit" class="btn btn-primary" style="width: 10%;">Calculer</button>
    </form>
</body>
</html>

<div class="container alert alert-info" style="width: 25%;">
<?php

    extract($_POST);

    $somme = $nombre1 + $nombre2;
    
    $soustraction = max($nombre1, $nombre2) - min($nombre1, $nombre2);

    echo "Le premier nombre est: $nombre1 <br>";
    echo "Le dexième nombre est: $nombre2 <br>";
    echo "La somme est: $somme<br>";
    echo "La soustraction est: $soustraction<br>";

    if ($nombre2 != 0)
    {
        $division = $nombre1 / $nombre2;
        echo "La division est: $division";
    }
    else{
        echo "Impossible de diviser par zero<br>";
    }

?>
</div>