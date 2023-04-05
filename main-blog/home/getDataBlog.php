<?php

include '../../login/db_conn.php';
// session_start();

$id = $_SESSION['id'];
$user_name = $_SESSION['user_name'];
$email = $_SESSION['email'];

$query = "SELECT * FROM blogs WHERE idUser = $id";
$sql = mysqli_query($conn, $query);
$showDatBlog = mysqli_fetch_all($sql, MYSQLI_ASSOC);