<?php

$email = $_POST['email']??null;
$otp = $_POST['otp']??null;

if ($email && $otp) {
    $bdd = getPDO();
    $query = $bdd->prepare("SELECT * FROM users WHERE otp = ? AND email = ?");
    $query->execute(array($otp, $email));

    if ($query->rowCount() > 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $query = $bdd->prepare("UPDATE users SET isVerify = 1 WHERE id = ?");
        $query->execute(array($user['id']));
        header('Location: ../users.php?id='.$user['id']);
    } else {
        echo '<script>alert("Mauvais OTP")</script>';
    }
}