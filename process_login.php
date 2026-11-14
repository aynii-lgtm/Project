<?php
    include "/backend/connect.php";
    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM account WHERE username = '$username'";
        $result = mysqli_query($connect, $query);
        
        // Cek username
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Cek password cocok
            if ($password == $row['password']) {
                // Login berhasil
                $_SESSION['status'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                header('Location: ../index.php');
                exit;
            } else {
                // Password salah
                header('Location: ../login.php?message=false');
                exit;
            }
        } else {
            // Username tidak ditemukan
            header('Location: ../login.php?message=false');
            exit;
        }
    }
?>