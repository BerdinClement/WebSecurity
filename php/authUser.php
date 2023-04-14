<?php
require_once './connexion.php';
require_once './sendMail.php';
$bdd = getPDO();

$email = $_POST['email']??null;
$password = $_POST['password']??null;

if ($email && $password) {

    $password = hash('sha256', $password);

    $query = $bdd->prepare("SELECT * FROM users WHERE password = ? AND email = ?");
    $query->execute(array($password, $email));


    if ($query->rowCount() > 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        var_dump($user);

        if ($user['isVerify']==0) {
            $otp = rand(100000, 999999);

            $query = $bdd->query("UPDATE users SET otp = $otp AND otp_date = ".time()." WHERE id = ".$user['id']);

            var_dump($query);

            $to = $user['email'];
            $name = $user['name'] ." ". $user['firstname'];
            if(sendMail($to, $name, $otp)==1){
                echo '<script>alert("Mail envoyé")</script>';
            } else {
                echo '<script>alert("Erreur lors de l\'envoi du mail")</script>';
            }
            header('Location: ../otpMail.php?otp=1');
        } else {
            $location = 'Location: ../users.php?id='.$user['id'];
            header($location);
        }
    } else {
        echo '<script>alert("Mauvais mot de passe")</script>';
        header('Location: ../otpMail.php');
    }
}