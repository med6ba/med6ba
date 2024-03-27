<?php
session_start();
?>
<head>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->    
    <link rel="icon" type="image/png" sizes="16x16"  href="images/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <title>LaPduP</title>
    <style type="text/css">
        
        input{
        	margin-bottom: 10px;
        }
        .alert.alert-danger{
        	width: 400px;
        	margin:auto;
        }
        .container{
        	width: 500px;
        	margin: auto;
        }

body {
    background-image: url('images/bg.jpg');
    background-size: cover; /* Pour redimensionner l'image pour remplir l'arrière-plan */
    background-position: center; /* Pour centrer l'image */
}
        </style>

</head>
<body>
<div class="container">
	<div class="authentification">
	<center><img src="images/lap2.png"></center>
	<label 
	style="font-family: Arial, sans-serif; 
    font-size: 16px; 
    color: white; 
    background-color: black; 
    padding: 5px 10px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    width: 100%;
    text-align: center;">
	Espace Admin | Espace Employé</label>
	<form method="POST">
		<label>Login</label>
		<input type="text" name="login" class="form-control">
		<label>Mot de passe</label>
		<input type="password" name="mdp" class="form-control">
		<input type="submit" value="Entrée" class="btn btn-primary">
	</form>
	<div class="alert alert-info">
		<b>LaPduP</b> : Application de la gestion de la paie du personnel
		<ul>
			<li>Gestion des services, des employés, des affectations et des pointages</li>
		</ul>
	</div>
	</div>
</div>
<?php
extract($_POST);
if (isset($mdp))
{
	if ($login == "admin" && $mdp=="admin")
	{
		$_SESSION['v_session']=1;
		require("fonctions.php");
		redirection("pointage/pointage-list.php");
	}
	else 
	{
		//recherche si c'est une connexion de l'employe
		require("connexion.php");
		$r = "select * from employe where nom = '" . $login . "' and motdepasse = '" . sha1($mdp) . "'";
		$res = mysqli_query($con, $r);
		$data_employe = mysqli_fetch_assoc($res);
		$nombredeligne = mysqli_num_rows($res);

		if ($nombredeligne == 1)
		{
			$_SESSION['v_session']=1;
			$_SESSION['idemploye']=$data_employe['idemploye'];
			require("fonctions.php");
			redirection("user/user-mespointages.php");
		}
		else
    echo "<div class='alert alert-danger'><i class='fa-solid fa-triangle-exclamation'></i> <b>LaPduP</b> : Echec de connexion...</div>";
	}
}
?>
</body>