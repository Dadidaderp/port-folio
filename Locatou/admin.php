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
    
    <br><br>
    
    <fieldset>
            <legend><strong>Rechercher des commandes par</strong></legend>
            
            
                <form method="post" action="recherche.php">
                    <label>Numero</label>
                    <input type="text" name="code" required="">
                    <input type="submit" name="rechercher" value="Rechercher">
                </form>
            
                <form method="post" action="recherche.php">
                    <label>Conducteur (nom)</label>
                    <input type="text" name="nom" required="">
                    <input type="submit" name="rechercher" value="Rechercher">
                </form>
            
                <form method="post" action="recherche.php">
                    <label>Date de location</label>
                    <input type="text" name="date" required="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}">
                    <input type="submit" name="rechercher" value="Rechercher">
                </form>
                
            
    </fieldset>
    <br><br>
    <div class="commandes">
        
        <br>

        <h1>Toutes les commandes</h1>
        
        <br>
    
    <?php
    
        if($_SESSION['admin']!=1) {
            echo '<div class="error"><br> <strong>Page reservé aux administrateurs !</strong>';
            echo '<meta http-equiv="refresh" content="5; URL=index.php"></div>';
            
        } else {
            
            try
        {
	$bdd = new PDO('mysql:host=localhost;dbname=locatou;charset=utf8', 'root', 'root');
        }
        
        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
            
        $reponse = $bdd->query("SELECT * FROM Contrat");
        
        while ($donnees = $reponse->fetch()){
            echo "<div class='location'>";
            echo "<fieldset>";
            echo "<legend>Commande numéro <f><strong>" .$donnees['NumeroContrat']."</strong></f></legend>";
            echo "<br>";
            echo "Marque du véhicule loué : " .$donnees['MarqueContrat'];
            echo "<br>";
            echo "Modele du véhicule loué : " .$donnees['ModeleContrat'];
            echo '<br>';
            echo "<br>";
            echo "Nom du conducteur : " .$donnees['NomConducteur'];
            echo "<br>";
            echo "Prenom du conducteur : " .$donnees['PrenomConducteur'];
            echo "<br><br>";                        
            echo "Durée de la location : " . $donnees['DureeLocation'] . " jours";
            echo "<br>";
            echo "Premier jour de la location : " . $donnees['PremierJourContrat'];
            echo "<br>";
            echo "Kilometrage total : " .$donnees['Kilometrage'] . " Km";
            echo "<br>";
            echo "Prix de la location : " .$donnees['PrixTotal']. " €" ;
            echo "<br>";
            if($donnees['MoyenPaiment']=="ChÃ¨que"){
                $donnees['MoyenPaiment']="Chèque";
            }
            echo "Moyen de paiement : " .$donnees['MoyenPaiment'];
            echo "<br><br>";
            echo "Validation de la commande  ";
            if($donnees['validation']==1){
                echo "<strong><v>Validée</v></strong>";
                echo "<br>";
            } else {
                echo "<br>";
                echo "<strong>En attente<strong>";
                echo"<br>";
                echo '<br>';
                echo '<form method="post" action="validerContrat.php">';
                echo '<input type="hidden" name="statut" value="'.$donnees['NumeroContrat'].'">';
                echo '<input class="inscrit" type="submit" name="valider" value="Valider la commande">';
                echo '</form>'; 
            }
            
            echo '<br>';
            echo '<form method="post" action="supprimerContrat.php">';
            echo '<input type="hidden" name="statut" value="'.$donnees['NumeroContrat'].'">';
            echo '<input class="supprimer" type="submit" name="supprimer" value="Supprimer la commande">';
            echo '</form>';
            echo "</div>";
        
        }
        }
    
    ?>
        <br>
    </div>
    
</body>

</html>