<?php 
    include('inc/mysql.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT article_id, title, article, date FROM article WHERE article_id =".$id."";
        $r = $conn->query($sql);
        if ($r->num_rows > 0) {
            while($row = $r->fetch_assoc()) {
            }
          } else {
            echo "0 results";
          }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>First Quest!</title>
  </head>
  <body>
    <div class="container p-3">
        <a href="index.php"><h1>First Quest!</h1></a>
        <div class="py-3">
            <form method="post" class="py-2" action="deleteauthorprocess.php">
            <?php 
                $sql1 = "SELECT author_id, author FROM authors";
                $result = $conn->query($sql1);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo
                        "<div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' name='aid[]' value=".$row['author_id'].">
                            <label class='form-check-label' for='inlineCheckbox1'>".$row['author']."</label>
                        </div>";
                    }
                }
            ?>
            <br>
            <button class="btn btn-primary my-2" type="submit" value="submit">Delete</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>