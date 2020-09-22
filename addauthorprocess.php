<?php include('inc/mysql.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author = $_POST['author'];
    $sql = "INSERT INTO authors (author) VALUES ('$author')";
}

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: index.php');
?>