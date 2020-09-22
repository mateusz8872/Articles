<?php
include('inc/mysql.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM article WHERE article_id=".$id;
    $conn->query($sql);
    $sql1 = "DELETE FROM article_authors WHERE article_id=".$id;
    $conn->query($sql1);
    }else{
}
header('Location: index.php');
?>