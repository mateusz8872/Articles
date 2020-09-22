<?php include('inc/mysql.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $article = $_POST['article'];
    $date = date("Y-m-d H:i:sa");
    $sql = "INSERT INTO article (title,article,date) VALUES ('$title','$article','$date')";
}

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully <br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}    

$author_id = $_POST['id'];
if(empty($author_id)){
  echo("You didn't select any authors.");
}

$i = count($author_id);
$id = "SELECT article_id FROM article ORDER BY article_id DESC LIMIT 1";
$idresult = $conn->query($id);
if ($idresult->num_rows > 0) {
  while($row = $idresult->fetch_assoc()) {
      $article_id=$row['article_id'];

  }
} else {
  echo "0 results";
}

echo("You selected $i box(es): $article_id <br>");
for($j = 0; $j < $i; $j++){   
  $sql1 = "INSERT INTO article_authors (article_id, author_id) VALUES ('".$article_id."','".$author_id[$j]."')";
  if($conn->query($sql1) === TRUE) {
      echo' Added '.$article_id,' '.$author_id[$j].'<br>';
  } else {
      echo"Error";
  }
}

header('Location: index.php');
?>