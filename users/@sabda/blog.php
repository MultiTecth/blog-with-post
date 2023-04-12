<?php
session_start();
include '../../login/db_conn.php';
// $_SESSION['user_name'] = $row['user_name'];
// $_SESSION['name'] = $row['name'];
// $_SESSION['id']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/ckeditor/ckeditor.js">
    </script>
    <title>Document</title>
    <!-- <style>
        
    </style> -->
</head>

<body>
    <h1>SELAMAT DATANG <?= strtoupper($_SESSION['user_name']) ?></h1>
    <form action="../insert-blog.php" method="post">
        <table style="padding-bottom: 5px;">
            <tr>
                <td>Thumbnail </td>
                <td>: <input type="text" name="thumb"><br></td>
            </tr>
            <tr>
                <td>Judul </td>
                <td>: <input type="text" name='title'></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <div class="con">
                        <textarea class="ckeditor" name="editor" cols="30" rows="10"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    : <select name="category">
                        <option value=""></option>
                        <option value="news">berita</option>
                        <option value="novel">novel</option>
                        <option value="shortStory">cerpen</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tags</td>
                <td>: <input type="text" name='tags'></td>
            </tr>
        </table>
        <input type="submit">
    </form>
</body>

</html>