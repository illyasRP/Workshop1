
<body onload="togglePopup()">

<header>



<script>
  // Sélectionner les éléments nécessaires
  const sidebarOpen = document.querySelector('.sidebarOpen');
  const menu = document.querySelector('.menu');
  const body = document.querySelector('body');

  // Ajouter un écouteur d'événement au bouton hamburger
  sidebarOpen.addEventListener('click', () => {
    // Ajouter ou supprimer la classe "active" à la navbar pour afficher ou cacher le menu
    body.classList.toggle('active');
  });
</script>





<nav>
        <div class="nav-bar">
            
            
            <span class="logo navLogo">
                
                <a href="index.php"><img src="./img/logoH1.png" alt="vvvv" width="40%"></a>
            </span>

                <ul class="nav-links">
                    <li><a href="about.php">About</a></li>
                    <li><a href="panier.php">Panier</a></li> 
                   
                      <?php if (isset($_SESSION['id'])) : ?>
                        <li>
                <form action="logout.php" method="post" style="display:inline;">
                    <a href="logout.php" type="submit" class="">Déconnexion</a>
                </form>
            </li>
        <?php else : ?>
    
            <li><a href="login.php" class="">Connexion</a></li>

        <?php endif; ?>

                </ul>

            </div>


        </div>
    </nav>

    