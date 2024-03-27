<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
<body class="container">
    <form method="post">
        <br>
        <label class="display-6">Entrer votre note:</label>
        <br>
        <br>
        <input type="number" name="note" min="0" max="20" required class="form-control" style="width: 25%;">
        <br>
        <input type="submit" value="Afficher mon mention" class="btn btn-primary">
    </form>
</body>

<?php

extract($_POST);
if (isset($note))
{
    if ($note == 0)
    echo "Tu es un idiot 😒";

    if($note<10 && $note>0)
    $mention="Faible 😔";

    if($note>=10 && $note<12)
    $mention="Passable 🤷‍♂️";

    if($note>=12 && $note<14)
    $mention="Assez bien 👍";

    if($note>=14 && $note<16)
    $mention="Bien 😉";

    if($note>=16 && $note<18)
    $mention="Très bien 😍";

    if($note>=18 && $note<=20)
    $mention="Excellent 😘🤗";
}

    echo $mention;

?>





