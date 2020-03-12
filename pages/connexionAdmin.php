<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="style/connexion.css">
  <link rel="shortcut icon" type="image/png" href="img/icone.png"/>
</head>


<body>
<?php
session_start();
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    if($username&&$password)
    {
        
        $pdo = new PDO('mysql:host=localhost;dbname=atlantide', 'root', '');

        $stmt = $pdo->prepare('SELECT * FROM users WHERE username=:u AND  password=:p');
        $stmt->bindParam(':u', $username);
        $stmt->bindParam(':p', $password);
        $stmt->execute();
           
        if($stmt->rowCount() !== 0)
        {
            $_SESSION['username']=$username;
header('Location:admin.html');
        }else echo '<p class="style_css"><h1>Identifiant ou mot de passe incorrect</h1></p>';
}
}
?>




    <fieldset>
        <form action="connexionAdmin.php" method="POST">
        <h1>Connexion</h1>
            <label><b>Identifiant :</b></label>
            <input type="text" name="username" required /><br /><br />
            <label><b>Mot de passe :</b></label>
            <input type="password" name="password" required /><br /><br />
            <input type="submit" value="Se connecter" name="submit"/>
        </form><br /><br />
		<center>
            <a href="../index.html"><button>Page d'acceuil</button></a>
            </center>
    </fieldset>	
</body>
</html>