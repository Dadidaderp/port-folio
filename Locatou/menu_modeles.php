<?php
    session_start();
?>
<html>
    <head>
        <title>Locatou</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href= "style.css"/>

    <header>
        <p class="titre">
            <a href="index.php"> <img src="images/titre.png" alt="Titre" /> </a>
        </p>
        <div id="login">
            
                
                <br>
                
                <?php
                
                if(!isset($_SESSION['login'])) {
                    ?>
                
                    <input type="button" name="inscription" value="Inscription" onclick="self.location.href ='inscription.html'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick> 
                    <input type="button" name="login" value="Se connecter" onclick="self.location.href='login.php'">
                    
                <?php
                
                } else {
                    echo 'Bonjour ' . $_SESSION['login'];
                    echo '<br>';
                ?>
                    <input class="inscrit" type="button" value="Deconnection" onclick="self.location.href='deconnection.php'">
                
                <?php 
                    
                    if($_SESSION['admin']==1)
                    {
                        ?>
                        <br><input class="inscrit" type="button" value="Administration" onclick="self.location.href='admin.php'">
                <?php
                }
                }
                
                ?>
        </div>

         <ul id="menu-principal">
            <li><a href="menu_modeles.php">Location</a>
                <ul>
                    <li><a href="audi.php">Audi</a></li>
                    <li><a href="bmw.php">BMW</a></li>
                    <li><a href="mini.php">Mini</a></li>
                    <li><a href="nissan.php">Nissan</a></li>
                </ul>
            </li>
            <li><a href="#">A propos</a>
                <ul>
                    <li><a href="contact.php">Nous contacter</a></li>
                    <li><a href="plan_du_site.php">Nos agences</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </li>
            <li><a href="#">Mon compte</a>
                <ul>
                    <li><a href="commandes.php">Mes commandes</a></li>
                    <li><a href="moncompte.php">Mon compte</a></li>
                </ul>
            </li>

        </ul>
    </header>

</head>

<body>

    <br>
    <br>
    <br>
<img class="sous_titre_modele" src="images/soustitremarques.png" alt="sous_titre_modele" />
    <div id="audi-logo">
        <a href="audi.php"> <img class="logo" src="images/audi-logo.png" alt="audi-logo" height="100px"> </a>
    </div>

    <div id="bmw-logo">
        <a href="bmw.php"> <img class="logo" src="images/bmw-logo.png" alt="bmw-logo" height="200px"> </a>
    </div>

    <div id="mini-logo">
        <a class="logo" href="mini.php"> <img src="images/mini-logo.png" alt="mini-logo" height="170px"> </a>
    </div>

    <div id="nissan-logo">
        <a href="nissan.php"><img class="logo" src="images/nissan-logo.png" alt="nissan-logo" height="200px">
            </div>
            </body>
            </html>