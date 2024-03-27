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
        <label><h5>J'ai une carte de réduction</h5>
        <input type="checkbox" name="reduction" class="form-check-input">
        </label>
        <br>
        <br>
        <input type="submit" value="Tarif" class="btn btn-primary">
    </form>
</body>
</html>

<?php

extract($_POST);

if (isset($age))
{

}

?>