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
    <img class="sous_titre" src="images/sous_titre.png" alt="SousTitre">
</head>

<body>
    
    <br>
    <br> 
    
    <?php
    
        if (isset($_COOKIE['login'])){
            session_start();
            $_SESSION['login'] = $_COOKIE['login'];
}
    
        if(!isset($_SESSION['login'])) {
        echo 'Vous n\'êtes pas connecté, accés interdit !</h1> <meta http-equiv="refresh" content="0; URL=redirection.php">';
}
    
    ?>

    <div class="louer">

        

        <form method="post" action="location.php">
            <fieldset>
                <legend>Formulaire de commande</legend>
                <input type="hidden" name="marque" value="Audi">
                <input type="hidden" name="modele" value ="S5">
                <input type="hidden" name="prixBase" value="200">
                <label>Date de location désirée : </label><input type="text" name="permierJour" autofocus="" required="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}"><br><br>
                <label>Durée de la location en jour : </label><input type="number" name="dureeLocation" autofocus="" required=""><br><br>
                <label>Kilomètre par jour : </label><select name="kilometrage">
                    <option>100</option>
                    <option>200</option>
                    <option>300</option>
                </select>

                <br>
                <label>Nom du conducteur :</label><input type="text" name ="nom" autofocus="" required=""><br><br>
                <label>Prenom du conducteur :</label><input type="text" name="prenom" autofocus="" required=""><br><br>


                <label>Moyen de paiment : </label><select name="moyenPaiment">
                    <optgroup label="Choissiez votre moyen de paiment">
                        <option>Carte bancaire</option>
                        <option>Espèce</option>
                        <option>Chèque</option>
                    </optgroup>
                </select>
                <br>
                <br>

                <input class="boutonCommander" type="submit" value="Commander"/>
            </fieldset> 
        </form>

    </div>
</body>

</html>

