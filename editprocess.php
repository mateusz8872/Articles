<?php include('inc/mysql.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $article = $_POST['article'];
  $date = date("Y-m-d H:i:sa");
  $id = $_POST['id'];
} 

$select = "SELECT article_id FROM article WHERE article_id = ". $id;
$result = $conn->query($select);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "ID - " . $row["article_id"]."<br>";
    $article_id=$row["article_id"];
    var_dump($article_id);
  }
} else {
    echo " 0 results <br>";
}

$sql = "UPDATE article SET title ='$title', article='$article', date='$date' WHERE article_id = ".$id;
if ($conn->query($sql) === TRUE) {
} else {
  echo "Error updating record: " . $conn->error;
}
$author_id = $_POST['aid'];
if(empty($author_id))
{
  echo("You didn't select any authors.");
}

$delete = "DELETE FROM article_authors WHERE article_id=".$id;
$conn->query($delete);
$i = count($author_id);
echo("You selected $i box(es) for <br> Article ID -  $article_id <br>");

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