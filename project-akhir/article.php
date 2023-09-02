<?php
if (isset($_GET['id'])) {
  require_once "system/config.php";
  $querySql = "SELECT * FROM articles WHERE id = :id";
  $statement = $connect->prepare($querySql);
  $statement->execute(["id" => $_GET['id']]);
  $article = $statement->fetch(PDO::FETCH_ASSOC);

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Project Akhir - KI Crocodic</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-secondary-subtle">
    <div class="container-sm p-5 my-5 bg-white shadow-lg">
      <div class="w-100">
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
        <h1 class="fw-bold mt-3"><?= $article['title'] ?></h1>
        <div class="text-center mt-4">
          <img src="<?= $article['image'] ?>" alt="<?= $article['title'] ?>" width="900px" height="500px" class="img-fluid">
        </div>
        <p class="mt-4"><?= nl2br($article['content']) ?></p>
      </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
  </body>

  </html>

<?php }else{
  header("location:index.php");
} ?>