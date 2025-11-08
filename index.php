<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    .custom-container {
      width: 100%;
      max-width: 425px;
      margin: 0 auto;
      text-align: center;
    }

    .swiper-container {
      width: 100%;
      height: auto;
      overflow: hidden;
    }

    .swiper-slide img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .btn-custom {
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      border-radius: 15px;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      gap: 15px;
      text-decoration: none;
      color: black;
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
      justify-content: start;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .btn-custom:hover {
      background-color: #e9ecef;
      text-decoration: none;
      transform: scale(1.02);
    }

    .btn-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-top: 50px;
      padding: 0 15px;
    }

    .btn-custom img {
      width: 24px;
      height: 24px;
    }

    .btn-custom span {
      font-size: 16px;
    }
  </style>

  <title>incleen.autocare</title>
  <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>

  <?php
  // Konfigurasi Database
  $host = "localhost";
  $user = "root";
  $pass = "EST.1106";
  $database = "incleen";

  // Koneksi ke database
  $db = new mysqli($host, $user, $pass, $database);

  // Cek koneksi
  if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
  }

  $baseUrl = "http://localhost/incleen/landingpage";
  $baseImagePath = "$baseUrl/uploads/incleen/produk/";

  // Query untuk mengambil data dari tabel produk
  $query = "SELECT gambar1 FROM produks";
  $result = $db->query($query);
  ?>

  <div class="custom-container">
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <!-- Slide pertama -->
        <div class="swiper-slide"><img src="img/(25).JPG" alt="incleen.autocare"></div>
        <!-- Slide dari database -->
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $gambar = !empty($row['gambar1'])
              ? $baseImagePath . htmlspecialchars($row['gambar1'])
              : $baseUrl . '/img/default.jpg';

            echo ' <div class="swiper-slide">
                    <img src="' . $gambar . '" alt="incleen.autocare">
                  </div>
                  ';
          }
        } else {
          echo '<div class="swiper-slide"><p>Tidak ada produk</p></div>';
        }
        ?>
      </div>
    </div>

    <!-- Konten -->
    <h1 class="pt-4 text-center">INCLEEN Auto Care</h1>
    <p class="text-center"><small>Temukan produk kendaraan premium terbaik kami!</small></p>

    <!-- Tombol -->
    <div class="btn-grid">
      <a href="https://shopee.co.id/incleen.autocare/" target="_blank" class="btn-custom" style="background-color: #1877F2; color: white;">
        <img src="https://img.icons8.com/color/48/shopee.png" alt="Shopee">
        <span>Shopee</span>
      </a>
      <a href="https://www.lazada.co.id/shop/pt-intisariparfume-2?spm=a2o4j.searchlist.search.12.46de150erhzMFF" target="_blank" class="btn-custom" style="background-color: #F6F6F6; color: black;">
        <img src="https://img.icons8.com/plasticine/100/lazada.png" alt="Lazada">
        <span>Lazada</span>
      </a>
      <a href="https://www.instagram.com/incleen.autocare/" target="_blank" class="btn-custom" style="background-color: #E4405F; color: white;">
        <img src="https://img.icons8.com/fluency/48/instagram-new.png" alt="Instagram">
        <span>Instagram</span>
      </a>
      <a href="https://www.tiktok.com/@incleen.autocare/" target="_blank" class="btn-custom" style="background-color: #010101; color: white;">
        <img src="https://img.icons8.com/color/48/tiktok--v1.png" alt="TikTok">
        <span>TikTok</span>
      </a>
      <a href="https://api.whatsapp.com/send?phone=6282119041464" target="_blank" class="btn-custom" style="background-color: #25D366; color: white;">
        <img src="https://img.icons8.com/color/48/whatsapp.png" alt="WhatsApp">
        <span>WhatsApp</span>
      </a>
      <a href="https://incleenautocare.com/" target="_blank" class="btn-custom" style="background-color: #000; color: white;">
        <img src="img/logo1.png" alt="Website">
        <span>Website</span>
      </a>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    });
  </script>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>