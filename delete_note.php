<?php
    include __DIR__ . "/connect.php";
    session_start();

    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php?message=not_logged_in");
        exit();
    }

    $id = $_GET['id'];

    $query = mysqli_query($connect, "DELETE FROM notes WHERE id = '$id'");

    if($query) {
        header("Location: ../index.php");
        exit;
    }
?>