<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
<body class="container">
    <form method="post">
        <br>
        <label class="display-6">Entrer votre age:</label>
        <br>
        <br>
        <input type="number" name="age" min="1" max="100" required class="form-control" style="width: 25%;">
        <br>
        <br>
        <input type="submit" value="Valider" class="btn btn-primary">
    </form>
</body>
</html>


<?php

extract($_POST);

if (isset($age))
{
    
    if($age < 6)
    $categorie = null;

    if ($age >=6 && $age <= 7)
    $categorie = "Poussin";

    if ($age >=8 && $age <= 9)
    $categorie = "Pupille";

    if ($age >=10 && $age <= 11)
    $categorie = "Minime";

    if ($age >=12 && $age <= 14)
    $categorie = "Cadet";

    if($age > 14)
    $categorie = "Ce n’est pas un enfant";
    
}

echo"<div class='alert alert-info'>";
echo "Votre catégorie est: $categorie" ;
echo"</div>";

?>