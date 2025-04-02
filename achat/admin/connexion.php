<?php

session_start();

if(isset($_post['valider'])){
    if(!empty($_post['pseudo']) AND !empty($_post['mdp'])){
        $pseudo_par_defaut = "admin";
        $mot_de_passe_par_defaut = "admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mot_de_passe_par_defaut){
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: adminer.php');

        }else{
            echo "kekekbekb elkbnekribn";
        }

    }else{
        echo "vriv,rivrvnrik";
    }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

</head>
<body>

<form action="" method="POST" align="center">
    <input type="text" name="pseudo" autocomplete="off">
    <br>
    <input type="password" name="mdp">
    <br><br>
    <input type="submit" name="valider">
</form>
</body>
</html>