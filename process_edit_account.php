<?php
    include "/backend/connect.php";
    session_start();

    $id = trim($_POST['id']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $cek_query = mysqli_query($connect, "SELECT * FROM account WHERE username = '$username'");
    
    if(mysqli_num_rows($cek_query) > 0) {
        $row = mysqli_fetch_assoc($cek_query);

        if($row['id'] != $id) {
            header('Location: ../account.php?message=used_username');
            exit;
        } 
    }

    if(empty($password)) {
        $query = mysqli_query($connect, "UPDATE account SET username = '$username', email = '$email' WHERE id = '$id'");
    } else {
        $query = mysqli_query($connect, "UPDATE account SET username = '$username', email = '$email', password = '$password' WHERE id = '$id'");
    }
           
    if($query) {
        header('Location: ../edit_account.php?message=edit_successful');
        exit;
    } else {
        header('Location: ../edit_account.php?message=failed');
        exit;
    }
?>