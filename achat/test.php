<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Rediriger vers login si non connecté
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Sécurisée</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark text-white">
    <div class="text-center">
        <h2>Bienvenue, <?php echo $_SESSION['username']; ?> !</h2>
        <form action="logout.php" method="post">
            <button type="submit" class="btn btn-danger mt-3">Déconnexion</button>
        </form>
    </div>
</body>
</html>