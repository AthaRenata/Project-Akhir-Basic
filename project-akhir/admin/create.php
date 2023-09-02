<?php 
require_once "../system/config.php";

if(isset($_POST['save'])){
    try{
    $querySQL = "INSERT INTO articles VALUES (NULL, :title, :image, :content)";
    $statement = $connect->prepare($querySQL);
    $statement->execute([
        "title"=>$_POST['title'],
        "image"=>$_POST['image'],
        "content"=>$_POST['content']
    ]);
    header("Location: index.php");
}catch(\Exception $e){
    die("Error : ".$e->getMessage());
}
}
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
      <h2 class="text-success">BUAT ARTIKEL</h2>
      <div>
      <a class="btn btn-secondary" href="index.php" role="button">Kembali</a>
      <input class="btn btn-success" type="submit" name="save" value="Simpan">
      </div>
    </div>
    <label for="title" class="form-label">Judul</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Judul Artikel" required>
    <label for="image" class="form-label">Gambar</label>
    <input type="url" id="image" name="image" class="form-control" placeholder="Link gambar artikel" required>
    <label for="content" class="form-label">Konten</label>
    <textarea name="content" id="content" cols="30" rows="12" class="form-control" placeholder="Isi artikel" required></textarea>
  </div>
  </form>
  <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>