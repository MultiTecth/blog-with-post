<?php
session_start();
include('../login/db_conn.php');

$uname = $_SESSION['user_name'];
$id = $_SESSION['idUser'];
$thumbnail = $_POST['thumb'];
$title = $_POST['title'];
$Blog = $_POST['editor'];
$category = $_POST['category'];
$tags = $_POST['tags'];

// echo $thumbnail . "<br>" . $title . "<br> " . $Blog . "<br> " . $category . "<br> " . $tags;

// $dateNow = date('Y-m-d');

$query = mysqli_query($conn, "INSERT INTO blogs(thumbnail,title,description,category,tags,idUser) VALUES('$thumbnail','$title','$Blog','$category','$tags',$id)");

if ($query) {
    echo 'done';
    $fileBlog = './@' . $uname . '/datBlog.txt';
    $checkBlog = mysqli_query($conn, "SELECT * FROM blogs");
    $showDat = mysqli_fetch_all($checkBlog, MYSQLI_ASSOC);
    foreach ($showDat as $result) {
        if (file_get_contents($fileBlog)) {
            if ($result['idUser'] == $id) {
                $file = file_get_contents($fileBlog);
                $dbBlog = unserialize($file);
                $dbBlog[] = [
                    [
                        'id' => $result['id'], 
                        'thumbnail' => $result['thumbnail'],
                        'description' => $result['description'], 
                        'category' => $result['category'],
                        'tags' => $result['tags'],
                        'idUser' => $result['idUser'],
                    ]
                ];
                $data = serialize($dbBlog);
                file_put_contents($fileBlog, $data);
                break;
            }
        } else {
            if ($result['idUser'] == $id) {
                $dbBlog[] = [
                    [
                        'id' => $result['id'], 
                        'thumbnail' => $result['thumbnail'],
                        'description' => $result['description'], 
                        'category' => $result['category'],
                        'tags' => $result['tags'],
                        'idUser' => $result['idUser'],
                    ]
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


// header('Location: ./@' . $uname);
