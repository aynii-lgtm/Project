<?php
    include "/backend/connect.php";
    session_start();

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $cek_query = mysqli_query($connect, "SELECT * FROM account WHERE username = '$username'");
    
    if (mysqli_num_rows($cek_query) > 0) {
        header('Location: ../signup.php?message=used_username');
        exit;
    } else {
        $query = mysqli_query($connect, "INSERT INTO account (username, email, password) VALUES ('$username', '$email', '$hashed_password')");
    }
           
    if ($query) {
        header('Location: ../login.php?message=account_created');
        exit;
    } else {
        header('Location: ../signup.php?message=failed');
        exit;
    }
?>