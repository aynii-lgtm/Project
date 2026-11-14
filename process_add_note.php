<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: ../login.php");
        exit;
    }

    include __DIR__ . "/connect.php";

    $id_account = trim($_POST['id']);
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $date = trim($_POST['date']);

    $query = mysqli_query($connect, "INSERT INTO notes (title, content, date, id_account) VALUES ('$title', '$content', '$date', '$id_account')");

    if($query) {
        header('Location: ../index.php');
        exit;
    } else {
        echo "Your notes failed. <a href = '../index.php'>Back to index</a>";
        exit;
    }
?>