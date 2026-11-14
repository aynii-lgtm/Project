<?php
    include __DIR__ . "/connect.php";   
    session_start();

    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php");
        exit();
    }

    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM account WHERE id = '$id'");
    
    session_destroy();

    header("Location: ../login.php?message=account_deleted");
    exit;
?>