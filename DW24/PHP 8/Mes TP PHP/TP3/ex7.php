<?php
    require("head.php");
    require("menu.php");
?>
<div class="container mt-8rem">
    <form method="POST">
        <h1 class="display-4">Entrez deux nombre:</h1>
        <br>
        <input type="number" name="nombre" class="form-control">
        <br>
        <input type="number" name="exposant" class="form-control">
        <br>
        <input type="submit" value="Afficher" class="btn btn-primary">
    </form>
    <?php
        extract($_POST);
        if(isset($nombre))
        {
            
            $p = 1;
            for ($i=1; $i<= $exposant; $i++)
                $p = $p * $nombre;


            echo "<div class='alert alert-info'>";
            echo "$nombre puissance $exposant est: $p";
            echo "</div>";
        }
    ?>
</div>