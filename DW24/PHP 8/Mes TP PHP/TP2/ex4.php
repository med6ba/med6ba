<!-----INPUT----->

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class='container'>
    <form method="post">
        <label class = 'display-4'>Entrer un nombre:</label>
        <input type="number" name="nombre" style="width: 25%;" min="0" max="9999" required class='form-control'>
        <br>
        <input type="submit" value="Calculer" class= 'btn btn-primary'>
    </form>
</body>

<!-----TRAITEMENT----->

<div class='container'>
<?php
    extract($_POST);
    if (isset($nombre))
    {

    $carre = $nombre * $nombre;
    $cube = $nombre * $nombre * $nombre;
    $racine = sqrt($nombre);

//-----OUTPUT-----
    echo"<div class='alert alert-info'>";
    echo"<div class='display-6'><br>Résultat</div>";
    echo "<br> Nombre: $nombre<br>";
    echo "Carré: $carre<br>";
    echo "Cube: $cube<br>";
    echo "Racine carré: " .number_format($racine, 2);
    echo"</div>";
    }
?>
</div>