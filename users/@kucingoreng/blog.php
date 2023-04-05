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
    <script src="../../js/ckeditor/ckeditor.js"></script>
    <title>Document</title>
    <!-- <style>
        
    </style> -->
</head>
<body>
    <form action="../insert-blog.php" method="post">
        <h1>SELAMAT DATANG <?= strtoupper($_SESSION['user_name']) ?></h1>
        <div class="con">
            <textarea class="ckeditor" name="editor" cols="30" rows="10"></textarea>    
            <input type="submit">
        </div>
    </form>
</body>
</html>