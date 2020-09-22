<?php
include('inc/mysql.php');
if(isset($_POST['aid'])){
    $id = $_POST['aid'];
    $i = count($id);
    for($j = 0; $j < $i; $j++){   
        $sql1 = "DELETE FROM authors WHERE author_id =" .$id[$j];    
        var_dump($id[$j]);
        echo 'es <br>';
        $conn->query($sql1);
    }
}else{
    echo 'Error ';
}
header('Location: index.php');
?>