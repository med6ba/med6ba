<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<div class="container">
    <h1 class="display-4">Exercice 2</h1>
    <br>
    <form method="post">
    Saisir un prénom:<input type="text" name="prenom" class="form-control">
    <br>
    <input type="submit" value="Afficher mon prénom" class="btn btn-primary">
    </form>
<?php
    extract($_POST);
    if (isset($prenom))
        echo "<div class='alert alert-info'>Tu t'appelles $prenom !</div>";
?>
</div>