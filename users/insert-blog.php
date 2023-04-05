<?php
session_start();
include('../login/db_conn.php');

$uname = $_SESSION['user_name'];
$id = $_SESSION['idUser'];
$dataBlog = $_POST['editor'];

$dateNow = date('Y-m-d');

if (mysqli_query($conn, "INSERT INTO blogs(idUser,blog,date) VALUES($id,'$dataBlog' , '$dateNow')")) {
    $fileBlog = './@' . $uname . '/datBlog.txt';
    $checkBlog = mysqli_query($conn, "SELECT * FROM blogs");
    $showDat = mysqli_fetch_all($checkBlog, MYSQLI_ASSOC);
    foreach ($showDat as $result) {
        if (file_get_contents($fileBlog)) {
            if ($result['idUser'] == $id) {
                $file = file_get_contents($fileBlog);
                $dbBlog = unserialize($file);
                $dbBlog[] = [
                    ['id' => $result['id'], 'blog' => $result['blog'], 'idUser' => $result['idUser'], 'date' => $result['date']]
                ];
                $data = serialize($dbBlog);
                file_put_contents($fileBlog, $data);
                break;
            }
        } else {
            if ($result['idUser'] == $id) {
                $dbBlog = [
                    ['id' => $result['id'], 'blog' => $result['blog'], 'idUser' => $result['idUser'], 'date' => $result['date']]
                ];
                $data = serialize($dbBlog);
                file_put_contents($fileBlog, $data);
                break;
            }
        }
    }
} else {
    echo "not done";
}


header('Location: ./@' . $uname);
