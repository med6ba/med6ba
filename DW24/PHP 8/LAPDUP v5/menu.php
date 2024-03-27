
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <img src="../images/lap2.png" width="90px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($active==1) echo "text-primary bg-white"; ?>" href="../service/service-list.php" style="border-radius: 5px"><i class="fa-solid fa-city"></i> Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active==2) echo "text-primary bg-white"; ?>" href="../employe/employe-list.php" style="border-radius: 5px"><i class="fa-solid fa-user"></i> Employé</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active==3) echo "text-primary bg-white"; ?>" href="../affecter/affecter-list.php" style="border-radius: 5px"><i class="fa-solid fa-person-walking-arrow-right"></i> Affecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active==4) echo "text-primary bg-white"; ?>" href="../pointage/pointage-list.php" style="border-radius: 5px"><i class="fa-regular fa-hand-pointer"></i> Pointage</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../deconnexion.php" ><i class="fa-solid fa-lock"></i> Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>