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
                    <a href="sortauthors.php"><button type="button" class="m-1 btn btn-success float-right">Sort by authors</button></a><a href="index.php">
                    <a href="index.php"><button type="button" class="m-1 btn btn-success float-right">Sort by ID</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            include('inc/mysql.php');
            $sql1 ='SELECT *,count(*) as freq
            FROM article 
            LEFT JOIN article_authors
            ON article.article_id = article_authors.article_id
            LEFT JOIN authors
            ON authors.author_id = article_authors.author_id 
            WHERE date between date_sub(now(),INTERVAL 1 WEEK) and now()
            GROUP BY article_authors.author_id
            ORDER BY freq DESC LIMIT 3';
            $r = $conn->query($sql1);
            if ($r->num_rows > 0) {
                while($row = $r->fetch_assoc()) {
                    echo"
                    <div class='card col-12 my-1 table table-striped' '>
                        <h4>Author : ".$row["author"]." has ".$row["freq"]." articles since last week</h4>
                    </div>";
                }   
            } else {
            echo "<h2 class=' col-12 float-left mt-2 mb-5'>Authors don't have articles </h2>";
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>