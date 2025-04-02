<?php

$db = new PDO('mysql:host=localhost;dbname=corteiz', 'root', 'root');
$db->exec('SET NAMES "UTF8"');


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);  

   
    $sql = 'SELECT * FROM `liste` WHERE `id` = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();


    $produit = $query->fetch();

  
    if (!$produit) {
        $_SESSION['erreur'] = "Produit non trouvé.";
        header('Location: index.php');  
        exit;
    }
} else {
   
    $_SESSION['erreur'] = "ID manquant.";
    header('Location: index.php');  
    exit;
}

require_once('close.php');
?>

<?php include( './component/header.php') ?>
<style>
 
body {
    background: linear-gradient(to right, #000000, #494949);
    font-family: 'Arial', sans-serif;
    color: #f8f9fa;
    margin: 0;
    padding: 0;
}


main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}


.card {
    background-color: #1c1c1c;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    overflow: hidden;
    max-width: 1200px;
    width: 100%;
    display: flex;
    flex-direction: column;
    color: #d4af37; 
}


.card img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-bottom: 4px solid #d4af37;
}


.card-body {
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
}


.card-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
}


.card-body h4 {
    font-size: 1.5rem;
    margin: 15px 0;
    color: #ffcc00; 
}


.card-text {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 20px;
    color: #ddd; 
}

/* Quantité disponible */
.card-body .disponibility {
    font-size: 1.2rem;
    font-weight: 600;
    margin-top: 10px;
    color:rgb(255, 255, 255); 
}


.btn {
    background-color: #d4af37;
    color: #000;
    font-weight: bold;
    border: none;
    padding: 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #ffcc00;
    color: #fff;
}

@media (max-width: 768px) {
    .card {
        width: 100%;
        max-width: 90%;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
    }

    .card-body h4 {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .card-title {
        font-size: 1.2rem;
    }

    .card-body h4 {
        font-size: 1rem;
    }

    .card-body .disponibility {
        font-size: 1rem;
    }
}

</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php include( './component/nav.php') ?>

<main>
    <div class="card" style="width: 50rem;">
        <img class="at" src="uploads/<?= $produit['image'] ?>" alt="" width="50%">
        <div class="card-body">
            <h2 class="card-title"><?= $produit['produit'] ?></h2>
            <?= $produit['prix'] ?> $<br>
            <p class="card-text"><?= $produit['Description'] ?></p>
            <?= $produit['nombre'] ?> de disponible<br>
        </div>
    </div>
</main>

<?php include( './component/footer.php') ?>    
</body>
</html>
