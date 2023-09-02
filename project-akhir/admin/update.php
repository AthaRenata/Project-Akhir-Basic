<?php 
require_once "../system/config.php";

if(isset($_GET['id'])){
if(isset($_POST['save'])){
    try{
    $querySQL = "UPDATE articles SET title = :title, image = :image, content = :content WHERE id = :id";
    $statement = $connect->prepare($querySQL);
    $statement->execute([
        "title"=>$_POST['title'],
        "image"=>$_POST['image'],
        "content"=>$_POST['content'],
        "id"=>$_POST['id']
    ]);
    header("Location: index.php");
}catch(\Exception $e){
    die("Error : ".$e->getMessage());
}
}

$querySql = "SELECT * FROM articles WHERE id = :id";
$statement = $connect->prepare($querySql);
$statement->execute(["id"=>$_GET['id']]);
$article = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Project Akhir - KI Crocodic</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <form action="" method="post">
  <div class="container-sm p-5">
    <div class="d-flex justify-content-between mb-3">
      <h2 class="text-success">UBAH ARTIKEL</h2>
      <div>
      <a class="btn btn-secondary" href="index.php" role="button">Kembali</a>
      <input class="btn btn-success" type="submit" name="save" value="Simpan Perubahan">
      </div>
    </div>
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <label for="title" class="form-label">Judul</label>
    <input type="text" id="title" name="title" class="form-control" value="<?= $article['title'] ?>" placeholder="Judul Artikel" required>
    <label for="image" class="form-label">Gambar</label>
    <input type="url" id="image" name="image" class="form-control" value="<?= $article['image'] ?>" placeholder="Link gambar artikel" required>
    <label for="content" class="form-label">Konten</label>
    <textarea name="content" id="content" cols="30" rows="12" class="form-control" placeholder="Isi artikel" required><?= $article['content'] ?></textarea>
  </div>
  </form>
  <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php 
}else{
  header("location:index.php");
}
?>