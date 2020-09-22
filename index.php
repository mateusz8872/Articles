<?php include('inc/mysql.php');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>First Quest!</title>
  </head>
  <body>
    <div class="container-fluid p-3">
        <a href="index.php"><h1>First Quest!</h1></a>
        <div class="row py-3">
            <div class="col-12 p-3">
                <div class="col-12">
                    <a href="addarticle.php"><button type="button" class="m-1 btn btn-success float-right" >Add article</button></a>
                    <a href="deleteauthor.php"><button type="button" class="m-1 btn btn-danger float-right">Delete author</button></a>
                    <a href="addauthor.php"><button type="button" class="m-1 btn btn-success float-right">Add author</button></a>
                </div>    
                <div class="col-12"> 
                    <a href="sortauthors.php"><button type="button" class="m-1 btn btn-success float-right">Sort by authors</button></a>
                    <a href="sorttop.php"><button type="button" class="m-1 btn btn-success float-right">Get top 3 authors in last week</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql = 'SELECT article.article_id,article.title,article.article,article.date,GROUP_CONCAT(authors.author) AS author 
            FROM article 
            LEFT JOIN article_authors
            ON article.article_id = article_authors.article_id
            LEFT JOIN authors
            ON authors.author_id = article_authors.author_id 
            GROUP BY article.article_id ORDER BY article.article_id ASC  ';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo"
                    <div class='card col-12 my-1 table table-striped' id='selectedColumn''>
                        <div class='card-body'>
                            <p class=' float-left col-6'>ID: ".$row["article_id"]."</p>
                            <p class=' float-left col-3'>Author: ".$row["author"]." </p>
                            <p class=' float-right col-2'>Date: ".$row["date"]."</p><br>
                            <form method='post' action='delete.php'>
                                <input class='form-control 'hidden name='id' value=".$row["article_id"].">
                                    <button type='submit' class=' col-1 m-1 btn btn-danger float-right' value='submit'>Delete</button>
                                </input>
                            </form>
                            <form method='post' action='edit.php'>
                                <input class='form-control 'hidden name='id' value=".$row["article_id"].">
                                    <button type='submit' class=' col-1 m-1 btn btn-warning float-right' value='submit'>Edit</button>
                                </input>
                            </form>
                            <h3 class='float-left col-12'>".$row["title"]."</h3>
                            <p class='float-left p-3 col-12 card-text'>".$row["article"]."</p>
                        </div>
                    </div>";}
            } else {
            echo "<h2 class=' col-12 float-left mt-2 mb-5'>Add authors and articles </h2>";
            }
             ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>