<?php
    session_start();
    include_once 'dbConfig.php'; // Assuming this file has your database connection logic
    include_once '../dbConfig_2.php'; // Assuming this file has your database connection logic
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STROKE FIGHTER</title>
    <link rel="stylesheet" href="video.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Include necessary CSS and JavaScript -->
    <!-- Slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        .video-section {
            margin: auto;
            text-align: center;
            padding: 20px 0px;
        }
        .credit {
            padding: 10px;
        }
        h5 {
            padding: 20px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <nav>
    <div class="container">
            <div class="nav-con">
                <div class="logo">
                    <h3 href="#">STROKE FIGHTER</h3>
                </div>
                <ul class="menu">
                    <li class="li-1">
                        <a
                            href="../index.php">หน้าหลัก</a>
                    </li>

                    <li><a 
                            href="../login/upload-system/article.php">บทความ</a>
                    </li>
                    <li><a
                            href="../video/video.php">วิดิโอ</a>
                    </li>
                    <li><a href="../dl/dl.php">ดาวน์โหลด</a>
                    </li>
                    <li><a
                            href="../ef/ef.php">ประเมิน</a>
                    </li>
                    <!-- search bar -->
                    <div class="searchbar">
                        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
                            <input
                                type="text"
                                name="search"
                                placeholder="ค้นหาบทความ"
                            />
                            <button
                                type="submit"
                                name="submit-search"
                            >
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <section class="ven">

    </section>

    <section class="hero">
        <div class="container">
            <div class="hero-con">
                <?php 
                // $query = $db2->query("SELECT * FROM tb_stoke_vdo ");
                $sql = "SELECT * FROM tb_stoke_vdo";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM tb_stoke_vdo left join tb_article on tb_article.article_id = tb_stoke_vdo.article_id WHERE tb_article.article_topic LIKE '%$search%'";
                }
                $query = $db2->query($sql);
                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $article_sql = "SELECT * FROM tb_article WHERE article_id = $row[article_id]";
                        $article_result = $db2->query($article_sql);
                        $article = $article_result->fetch_assoc();
                        $section = isset($article['article_topic']) ? $article['article_topic'] : '';
                        $content = isset($article['article_short']) ? $article['article_short'] : '';
                        $video_id = explode('/watch?v=', $row['stoke_vdo_url'])[1];
                ?>
                    <div class="box-con">
                    <h5><?php echo $section ?></h5>

                        <div class="hero-video video-section">
                            
                        <iframe src="<?php echo 'https://www.youtube.com/embed/'.$video_id.''; ?>" allowfullscreen></iframe>
                        </div>
                        <div class="hero-info">

                            <p><?php echo $content ?></p>
                        </div>
                        <!-- credit -->
                        <div class="credit">
                            <p>ที่มา: <?php echo $row['stoke_vdo_url'] ?></p>
                        </div>
                    </div>
                <?php 
                    }
                } else { ?>
                    <p>No video found...</p>
                <?php } ?>
            </div>
        </div>
        <center>
            <div class="add-btn">
                <a href="login/login.php" class="btn btn-primary">เพิ่มวิดิโอ</a>
            </div>
        </center>
    </section>

    </section>

    <section class="box">

    </section>



    <div class="footer-top" id="contact">
        <div class="container">
            <div class="footer-top-con">
                <div class="footer-top-item">
                    <h4>ช่องทางติดต่อ</h4>
                    <div class="footer-top-item-con">
                        <div class="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
</svg>
                        <a href="https://www.facebook.com/yourpage" target="_blank"><i class="bi bi-facebook" width="50" height="50"></i></a>
                        </div>
                        <div class="info">
                            <span class="info-title">Facebook</span><br>
                            <span class="info-desc">waranyu thammason</span>
                        </div>
                    </div>

                    <div class="footer-top-item-con">
                        <div class="date">
                        <i class="bi bi-telephone"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg>
                        </div>
                        <div class="info">
                            <span class="info-title">เบอร์โทรติดต่อ</span><br>
                            <span class="info-desc">099-999-9999</span>
                        </div>
                    </div>

                    <div class="footer-top-item-con">
                        <div class="date">
                        <i class="bi bi-envelope-at-fill"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
  <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
  <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
</svg>
                        </div>
                        <div class="info">
                            <span class="info-title">อีเมลติดต่อ</span><br>
                            <span class="info-desc">2bDpC@example.com</span>
                        </div>
                    </div>

                </div>

                <div class="footer-top-item">
                    <h4>ที่อยู่</h4>
                    <p>152 หมู่11 ต.บัวน้อย อ.นามาก จ.เชียงใหม่</p>
                </div>

                <div class="footer-top-item">
                <div id="map" style="height: 200px;"></div>
    <script>
        var address = "ที่อยู่ที่ต้องการแสดง";

        var mymap = L.map('map').setView([18.7929, 99], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        var marker = L.marker([0, 0]).addTo(mymap);

        var geocoder = L.Control.Geocoder.nominatim();

        geocoder.geocode(address, function(results) {
            var latLng = new L.LatLng(results[0].center.lat, results[0].center.lng);
            marker.setLatLng(latLng);
            mymap.setView(latLng);
        });
    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>Copyright 2024.All right reserved Bloom web design.</p>
    </div>

</body>

</html>