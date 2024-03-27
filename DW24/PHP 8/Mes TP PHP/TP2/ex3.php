<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<div class="container">
    <h1 class="display-4">Exercice 3</h1>
    <br>
    <form method="post">
    Saisir votre année de naissance:<input type="number" min="1900" max="2023" name="date1" class="form-control">
    <br>
    <input type="submit" value="Afficher mon age" class="btn btn-primary">
    </form>
<?php

    extract($_POST);
    $date2 = date("Y");
    $age = $date2 - $date1;

    if (isset($age))
        echo "<div class='alert alert-info'>Tu as $age ans!</div>";
?>
</div>