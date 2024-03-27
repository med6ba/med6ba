<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="container">
<meta charset="UTF-8">
<form method="POST">
    <br>
    <br>
    <label><input type="radio" name="age" value="moin_18"> Moins de 18 ans</label>
    <br>
    <label><input type="radio" name="age" value="entre_18_35"> 18 à 35 ans</label>
    <br>
    <label><input type="radio" name="age" value="plus_35"> Plus de 35 ans</label>
    <br>
    <br>
    <input type="submit" value="Vérifier" class="btn btn-primary">
</form>
<?php
extract($_POST);
    if (isset($age))
    {
        if ($moin_18 = 1)
        $message="Désolé, vous n'avez pas l'âge requis pour accéder à ce site";

        if ($entre_18_35 = 1 && $moin_18 = 0)
        $message="Bienvenue sur le site ! Vous avez l'âge requis pour accéder";

        if ($plus_35 = 1 && ($moin_18 = 0 || $entre_18_35 = 0))
        $message="Bienvenue sur le site ! Vous avez l'âge requis pour accéder";
    }
    echo"<div class='alert alert-info'>";
    echo $message ;
    echo"</div>";
?>
</div>
