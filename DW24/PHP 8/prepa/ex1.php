<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <div class="container">
        <form method="POST">
            <br>
            <h1 class="display-4">Convertisseur</h1>
            <br>
            <label>Montant en DH:</label>
            <br>
            <input type="number" name="montant" class="form-control">
            <br>
            <label><input type="radio" name="devise" value="d" class="form-check-input"> Dollar</label>
            <label><input type="radio" name="devise" value="e" class="form-check-input"> Euro</label>
            <br>
            <br>
            <input type="submit" value="Convertir" class="btn btn-primary">
            
                <?php
                    extract($_POST);
                    if(isset($montant))
                    {
                        if ($devise == 'e')
                        {
                            $euro = $montant  / 10.62;
                            echo "<br>";
                            echo "<br>";
                            echo "<div class='alert alert-primary'>";
                            echo "Le montant en EURO est: " .$euro;
                            echo "</div>";
                        }

                        if ($devise == 'd')
                        {
                            $dollars = $montant  / 9.57;
                            echo "<br>";
                            echo "<br>";
                            echo "<div class='alert alert-primary'>";
                            echo "Le montant en DOLLAR est: " .$dollars;
                            echo "</div>";
                        }
                    }
                ?>
        </form>
    </div>
</html>


