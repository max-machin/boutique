<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
</head>

   
<header>
    <nav class= "navbar">
        <form action="index.php" method="post" >
            <ul class="navul">

                    <?php
                    session_start();
                // balise php avec la condition de reconnaisance du profil user
              
                    echo('<li class="navli"><a href="index.php">Home</a></li>');
                    echo ('<li class="navli"><a href="users">Connexion</a></li>');
                    echo ('<li class="navli"><a href="users">Inscription</a></li>');
                    foreach ($categories as $categorie)  
                    {
                        echo ('<li class="navli"><a href="'. urlmac.'products/'.$categorie['name'].'">'.$categorie['name'].'</a></li>');
                    }
                
                ?>
            </ul>
        </form>
    </nav>
</header>
<body>
    <?php

    if ( isset ($_SESSION['user_data'] ) )
    {
    ?>
        <nav>
            <ul>
               
                <li><a href="<?= url ?>users/login">Connexion</a></li>
                <li><a href="<?= url ?>users/profil">Profil</a></li>
                <li><a href="<?= url ?>users/disconnect">Deconnexion</a></li>
            </ul>
        </nav>
    <?php
    } else {
    ?>
        <nav>
            <ul>
                <li><a href="<?= url ?>users/register">Inscription</a></li>
                <li><a href="<?= url ?>users/login">Connexion</a></li>
            </ul>
        </nav>
    <?php
    }

    ?>

<div class="container">
    <?= $content ?>
</div>



</body>
</html>