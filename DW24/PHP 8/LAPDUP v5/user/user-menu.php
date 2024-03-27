<?php
session_start();
$idemploye = $_SESSION['idemploye'];
require("../connexion.php");
$r = "select * from employe where idemploye = $idemploye";
$res = mysqli_query($con, $r);
$data = mysqli_fetch_assoc($res);
mysqli_close($con);
?>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <img src="../images/lap2.png" width="90px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($active==1) echo "text-primary bg-white"; ?>" href="user-moncompte.php" style="border-radius: 5px"><i class="fa-solid fa-user"></i> Mon compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active==2) echo "text-primary bg-white"; ?>" href="user-mespointages.php" style="border-radius: 5px"><i class="fa-solid fa-arrow-right"></i> Mes pointages</a>
                </li>
                
               
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href=# >
                        <?php 
                            echo "<img src='../employe/images/". $data['photo']."' style='width:30; border-radius:50%;'>";
                            echo " <span style='color:white;'>". $data['nom']. " ". $data['prenom']."</span></a>";
                        ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../deconnexion.php" ><i class="fa-solid fa-lock"></i> Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>