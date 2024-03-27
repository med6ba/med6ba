<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<div class="container bg-info">
<?php
    echo "<h1 class='display-4'>Date:</h1>";
    $lyoum = date("d/m/Y");
    echo "Lyoum: $lyoum";

    $sa3a = date("h:i:s");
    echo "<br>Sa3a: $sa3a";
?>
</div>