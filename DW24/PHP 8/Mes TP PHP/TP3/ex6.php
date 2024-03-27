<?php
    require("head.php");
    require("menu.php");
?>
<div class="container mt-8rem">
    <form method="POST">
        <h1 class="display-4">Entrez un nombre</h1>
        <br>
        <input type="number" name="nombre" class="form-control">
        <br>
        <input type="submit" value="Afficher" class="btn btn-primary">
    </form>
    <?php
        extract($_POST);
        if(isset($nombre))
        {
            $s = 0; 
            for ($i=1; $i<=$nombre; $i++)
            $s = $s + $i;
            echo "<div class='alert alert-info'>";
            echo "La somme des nombres de 1 à $nombre est: $s";
            echo "</div>";


            $f = 1;
            for ($i=1; $i<=$nombre; $i++)
                $f = $f * $i;
            echo "<div class='alert alert-info'>";
            echo "Le factoriel de $nombre est: $f";
            echo "</div>";

        }
    ?>
</div>