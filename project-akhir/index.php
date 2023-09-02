<?php
require_once "system/config.php";

$querySql = "SELECT id, title, image, CASE
WHEN CHAR_LENGTH(content) <= 250 THEN content
ELSE CONCAT(SUBSTRING(content, 1, 250), '...')
END AS content FROM articles";
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
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="bg-danger bg-opacity-10" id="beranda">
  <!-- NAVIGATION -->
  <nav class="navbar navbar-expand-lg bg-body shadow-sm sticky-top">
    <div class="container-fluid container-sm">
      <a class="navbar-brand text-danger fw-bold" href="#">ATHA RENATA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" aria-current="page" href="#beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="#profil" class="nav-link active link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Profil</a>
          </li>
          <li class="nav-item">
            <a href="#artikel" class="nav-link active link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Artikel</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="admin" class="nav-link active link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO SECTION -->
  <div class="hero">
    <div class="py-5 bg-primary bg-gradient w-75 rounded-circle shadow-lg position-absolute top-50 start-50 translate-middle">
      <div class="py-5">
        <h1 class="text-white text-center display-3" style="font-family: Cambria, serif">SELAMAT DATANG!</h1>
        <h2 class="text-white text-center display-4" style="font-family: Cambria, serif">di Website Saya 🙂</h2>
      </div>
    </div>
  </div>

  <!-- PROFILE SECTION -->
  <div class="py-5 bg-danger bg-opacity-25 bg-gradient vh-120 shadow-lg" id="profil">
    <div class="container pt-5 pb-4 d-flex justify-content-center gap-5">
      <div class="rounded-circle overflow-hidden bg-secondary-subtle" style="width: 280px; height: 280px">
        <img src="img/profile.png" alt="Profil" class="w-100 h-100 object-fit-cover" />
      </div>
      <div class="w-50">
        <h2 class="text-danger my-4">Hai, Saya Atha Renata</h2>
        <table class="table table-borderless">
          <tr>
            <th class="px-4" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">Asal Sekolah</th>
            <td style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">: SMK Negeri 9 Semarang</td>
          </tr>
          <tr>
            <th class="px-4" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">Email</th>
            <td style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">: atharenata1@gmail.com</td>
          </tr>
          <tr>
            <th class="px-4" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">No. HP</th>
            <td style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">: +62 858-1118-7679</td>
          </tr>
          <tr>
            <th class="px-4" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">Alamat</th>
            <td style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">: Wonodri Joho I RT 05 / RW 03, Semarang</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="card border-info mb-5 container">
      <div class="card-header">
        <h5>Tentang Saya</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
          Saya termasuk orang yang tertarik dengan dunia pemrograman. Banyak bahasa pemrograman yang sudah saya coba pelajari antara lain PHP, JavaScript, SQL, C++, Java, dan Python. Untuk saat ini saya sedang fokus menekuni <i>web development</i> dan sudah dapat membuat <i>website application</i> menggunakan HTML, CSS, PHP, Javascript, dan
          SQL. Selain itu saya juga dapat menggunakan beberapa <i>frameworks</i> seperti Bootstrap dan TailwindCSS. Saya juga pernah mencoba framework Laravel. Saya sangat tertarik dengan permainan logika dan matematika. Itulah alasan mengapa saya suka pemrograman dan akan mencoba untuk terus berusaha meningkatkan kemampuan di bidang ini.
        </p>
      </div>
    </div>
  </div>

  <!-- BLOG SECTION -->
  <div class="p-5" id="artikel">
    <h1 class="fw-bold text-center py-5 text-primary">ARTIKEL</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      foreach ($articleList as $article) {
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?= $article['image'] ?>" class="card-img-top" alt="<?= $article['title'] ?>" />
            <div class="card-body">
              <h5 class="card-title mb-3"><?= $article['title'] ?></h5>
              <p class="card-text text-over overflow-hidden">
                <?= $article['content'] ?>
              </p>
              <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Baca Selengkapnya &raquo;</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="bg-white shadow-lg mt-5">
    <p class="text-center mb-0 py-2 cr">Copyright © 2023 Atha Renata</p>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>