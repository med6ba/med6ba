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
            for($i=0; $i<=$nombre; $i++)
            echo $i. " ";    
        }
    ?>
</div>