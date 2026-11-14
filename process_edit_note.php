<?php
    include __DIR__ . "/connect.php";
    session_start();

    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: login.php?message=not_logged_in");
        exit();
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    $query = mysqli_query($connect, "UPDATE notes SET title = '$title', content = '$content', date = '$date' WHERE id = '$id'");

    if($query) {
        header("Location: ../index.php");
        exit;
    } else {
        header("Location: ../index.php?message=failed");
        exit;
    }
?>