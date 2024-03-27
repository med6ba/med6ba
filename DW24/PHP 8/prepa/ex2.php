<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <div class="container">
        <form method="POST">
            <br>
            <h1 class="display-4">Tableau</h1>
            <br>
            <label>Nombre de lignes:</label>
            <br>
            <input type="number" name="lignes" class="form-control">
            <br>
            <br>
            <label>Nombre de colonnes:</label>
            <br>
            <input type="number" name="colonnes" class="form-control">
            <br>
            <br>
            <input type="submit" value="Afficher le tableau" class="btn btn-primary">
            <br>
            <br>
            
                <?php
                    extract($_POST);
                    if(isset($lignes))
                    {
                        echo "<table border=1 class='table table-striped table-hover table-responsive'>";
                        for ($i=1; $i<=$lignes; $i++)
                        {
                            echo"<tr>";
                            for ($j=1; $j<=$colonnes; $j++)
                                echo"<td>$j";
                        }
                        echo "</table>";
                    }
                ?>
        </form>
    </div>
</html>


