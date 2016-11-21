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
    
    <?php
    
        if(isset($_SESSION['login'])) {
    
        try
        {
	$bdd = new PDO('mysql:host=localhost;dbname=locatou;charset=utf8', 'root', 'root');
        }
        
        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }




$reponse = $bdd->query("SELECT * FROM user WHERE login='".$_SESSION['login']."'");

while ($donnees = $reponse->fetch())
{
    
    echo "<div class='location'>";
    echo "<fieldset>";
    echo "<legend><strong>Mon Compte</strong></legend><br>";
    echo "Nom : " .$donnees['NomClient']."<br>";
    echo "Prenom : " .$donnees['PrenomClient']."<br>";
    echo "Mon login : ".$donnees['login']."<br>";
    echo "Mail : ".$donnees['MailClient']."<br>" ;
    echo "Adresse : ".$donnees['AdresseClient']."<br>";
    echo "Code postal : " .$donnees['CodePostalClient']."<br>";
    echo "Téléphone : " .$donnees['TelephoneClient']."<br>";
    echo "</div>";
    
   
    
}
} else {
            
             echo 'Vous n\'êtes pas connecté, accés interdit !</h1> <meta http-equiv="refresh" content="0; URL=redirection.php">';
          
        }
    
    ?>
    
    
</body>

</html>