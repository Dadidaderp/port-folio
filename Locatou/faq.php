<?php
    session_start();
?>
<!DOCTYPE html>
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
    
    <img class="sous_titre" src="images/sous_titre.png" alt="SousTitre">
</head>

<body>

    <div class="faq">
        "Quelles sont les conditions à remplir pour pouvoir louer une voiture sur votre site ?"
        <br>
        <br>
        Pour pouvoir louer un véhciule proposé par notre site de location Locatou, il faut :
        - que vous soyez titulaire du permis de conduire depuis plus de 3 ans
        - que vous soyez assuré tout risque   
    </div>



    <div class="faq">
        "Que se passe-t-il si je dépasse le kilométrage prévu initialement sur le contrat ?"
        <br>
        <br>
        Notre système de kilométrage est simple, lorsque vous louez une voiture, les paliers kilométriques sont par 100, allant de 100 à 300 kilomètres par jour.
        Si vous dépassez le kilométrage prévu par jour, vous serez facturés au palier supérieur (valable uniquement si le dépassement de kilomètres est conséquent).   
    </div>

    <div class="faq">
        "Que se passe-t-il si je ramène le véhicule loué en mauvais état ? (Rayures, carrosserie abimée ...)"
        <br>
        <br>
        Pour commencer, lors de la livraison du véhicule nous vous demandons une caution de 500€ (tous les modes de paiement sont acceptés).
        Si vous ramenez le véhicule en mauvais état, contactez votre assurance.
        Tant que les dommages n'ont pas été remboursés, la caution n'est pas rendue au titulaire du contrat.

    </div>

</body>

<?php

