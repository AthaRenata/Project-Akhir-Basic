<?php 
require_once "../system/config.php";

  $querySql = "SELECT * FROM articles";
  $statement = $connect->prepare($querySql);
  $statement->execute();
  $articleList = $statement->fetchAll(PDO::FETCH_ASSOC);

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
  <body class="bg-success bg-opacity-10">
    <div class="container-xxl p-5">
    <div class="d-flex justify-content-between">
      <h2 class="text-primary">DAFTAR ARTIKEL</h2>
      <div>
      <a class="btn btn-secondary" href="../index.php" role="button">Kembali</a>
      <a class="btn btn-primary" href="create.php" role="button">&plus; Artikel Baru</a>
      </div>
    </div>
    <table class="table table-striped table-bordered align-middle table-hover mt-4">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">ID</th>
          <th class="text-center">Gambar</th>
          <th class="text-center">Judul</th>
          <th class="text-center">Konten</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach($articleList as $article){
        ?>
        <tr>
          <td class="text-center text-nowrap px-2"><?= $no++ ?></td>
          <td class="text-center text-nowrap px-2"><?= $article['id'] ?></td>
          <td class="text-center text-nowrap px-2"><img src="<?= $article['image'] ?>" alt="<?= $article['title'] ?>" width="200" height="100"></td>
          <td class="td-over text-nowrap overflow-hidden px-2"><?= $article['title'] ?></td>
          <td class="td-over text-nowrap overflow-hidden px-2"><?= $article['content'] ?></td>
          <td class="text-nowrap px-2 text-center">
            <a class="btn btn-warning" href="update.php?id=<?=$article['id']?>" role="button">Ubah</a>
            <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?=$article['id']?>">Hapus</button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
</table>
    </div>

    <!-- MODAL DELETE CONFIRMATION -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin akan Hapus Data Ini ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Data yang dihapus tidak bisa dikembalikan
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <form action="delete.php" method="post">
        <input type="hidden" name="id" id="id">
        <button type="submit" class="btn btn-danger">Yakin</a>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/script.js"></script>
  </body>
</html>