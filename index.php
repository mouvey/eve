<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "pkl";
$conn = mysqli_connect($host, $user, $pass, $db);

$pesan_sukses = "";

// Proses form hanya jika request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = htmlspecialchars(trim($_POST['name']));
    $surname  = htmlspecialchars(trim($_POST['surname']));
    $email    = filter_var(trim($_POST['your_email']), FILTER_VALIDATE_EMAIL);
    $messages = htmlspecialchars(trim($_POST['messages']));

    if ($email) {
        $stmt = $conn->prepare("INSERT INTO pertanyaan (name, surname, your_email, messages) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $messages);

        // Hanya jalankan sekali
        if ($stmt->execute()) {
          $_SESSION['status'] = "sukses";
          $pesan_sukses = "Data berhasil dikirim!";
        } else {
          $pesan_sukses = "Gagal menyimpan data: " . $stmt->error;
        }
      } else {
        echo "Email tidak valid!";
        exit();
    }
}


// Ambil data dari database
$data = mysqli_query($conn, "SELECT * FROM pertanyaan ORDER BY tanggal DESC");
?>

<?php if (!empty($_GET['status']) && $_GET['status'] == 'sukses'): ?>
    <p style="color: green;">Pertanyaan berhasil dikirim</p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <title>RafaRefa</title>
    <link rel="icon" type="image/jpeg" href="assets/images/meng.jpeg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

  <!-- ***** Preloader Start ***** 
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
 ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>Rafa<span>Refa</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About Us</a></li>
              <li class="scroll-to-section"><a href="#services">Our Work</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Certificates</a></li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Welcome to RafaRefa Web!</h6>
                <h2>Kami <em>siswi</em> <span>SMK </span>PKL</h2>
                <p>Website ini kami buat dengan tujuan menyelesaikan proyek yang ada di tempat PKL.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
                <img src="assets/images/profil.jpg" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="about-section">
        <h2>About Us</h2>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <img src="assets/images/gamis.jpeg" alt="person graphic">
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="services">
            <div class="row">
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="right-text">
                    <h4>Asal Sekolah</h4>
                    <p>Kami bersekolah di SMK Teratai Putih Global 3 Bekasi</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <div class="right-text">
                    <h4>Kelas</h4>
                    <p>Saat ini kami duduk di bangku kelas 12 SMK </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                  <div class="right-text">
                    <h4>Jurusan</h4>
                    <p>Kami Mempelajari tentang teknik jaringan komputer dan telekomunikasi atau yang biasa disingkat sebagai TJKT</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="right-text">
                    <h4>Harapan</h4>
                    <p>Harapan kami kedepannya setelah mempelajari tentang jaringan komputer dan telekomunikasi ini bisa berguna di kemudian  hari, baik untuk diri sendiri maupun orang orang disekitar kita bahkan lebih luas lagi.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="assets/images/lobster.jpeg" alt="our-work">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>Pekerjaan kami selama 17 tahun <em>adalah</em> <span>Memancing</span></h2>
            <p>Memancing adalah salah satu hobby kami, dan kami menjadikan memancing sebagai pekerjaan freelance kami yang kita lakukan pada hari sabtu dan minggu saja. Disamping ini adalah hasil tangkap kami di Selat Sunda.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2> Certificates </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4>Certificates</h4>
                <p>KOSONG!</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/meng.jpeg" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="hidden-content">
                <h4>Certificates</h4>
                <p>KOSONG!</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/meng.jpeg" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="hidden-content">
                <h4>Certificates</h4>
                <p>KOSONG!</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/meng.jpeg" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="hidden-content">
                <h4>Certificates</h4>
                <p>KOSONG!</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/meng.jpeg" alt="">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Jangan ragu hubungi kami</h2>
            <p>Untuk kritik dan saran silahkan kunjungi nomor yang tertera di bawah.</p>
            <div class="phone-info">
              <h4>Call Us: <span><i class="fa fa-phone"></i> <a href="#">021-6666-0987</a></span></h4>
            </div>
          </div>
        </div>

<!-- ***** tabel pertanyaan ***** -->
<div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
<div class="contact-section">   <!-- Background merah -->
<form id="contact" action="" method="post">
  <div class="row">
    <div class="col-lg-6">
      <fieldset>
        <input type="text" name="name" id="name" placeholder="Name" autocomplete="on" required>
      </fieldset>
    </div>
    <div class="col-lg-6">
      <fieldset>
        <input type="text" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
      </fieldset>
    </div>
    <div class="col-lg-12">
      <fieldset>
        <input type="email" name="your_email" id="email" placeholder="Your Email" required>
      </fieldset>
    </div>
    <div class="col-lg-12">
      <fieldset>
        <textarea name="messages" class="form-control" id="messages" placeholder="Messages" required></textarea>  
      </fieldset>
    </div>
    <div class="col-lg-12">
      <fieldset>
        <button type="submit" id="sendBtn" class="main-button">Send Messages</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <div class="modal-content">
      </fieldset>
      <div class="overlay" id="popupOverlay">
        <div class="overlay" id="popupOverlay">
        </div>
      </div>
    </div>
  </form>
<hr>
<h2>Daftar Pertanyaan</h2>
<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr style="background-color: #f0f0f0;">
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Messages</th>
        <th>Tanggal</th>
    </tr>
    <?php $no= 1; ?>
    <?php while($row = mysqli_fetch_assoc($data)): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['name']) . " " . htmlspecialchars($row['surname']) ?></td>
        <td><?= htmlspecialchars($row['your_email']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['messages'])) ?></td>
        <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</div>
</div>
</div>
</div>
</div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2021 Space Dynamic Co. All Rights Reserved. 
          
          <br>Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/templatemo-custom.js"></script>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      <?php if(isset($_SESSION['status'])): ?>
      
        swal("Sukses!", "Suskses menambah data!", "success");
        <?php unset($_SESSION['status']); ?>
      <?php endif; ?>
    </script>

</body>
</html>
