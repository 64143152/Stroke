<?php 

    session_start();
    include_once 'dbConfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STROKE FIGHTER</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- slider -->
    <!-- เชื่อมโยง jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- เชื่อมโยง Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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
                            href="#">หน้าหลัก</a>
                    </li>

                    <li><a 
                            href="login/upload-system/article.php">บทความ</a>
                    </li>
                    <li><a
                            href="video/video.php">วิดิโอ</a>
                    </li>
                    <li><a href="dl\dl.php">ดาวน์โหลด</a>
                    </li>
                    <li><a
                            href="ef/ef.php">ประเมิน</a>
                    </li>
                </ul>
                <button id="toggleChatButton">Chat with Bot</button>

<div id="chatModal" class="chat-modal hidden">
    <div class="chat-modal-content">
        <div class="chat-header">
            <h3>Chat with Bot</h3>
            <span id="closeChatButton" class="close-button">&times;</span>
        </div>
        <div class="chat-body" id="chatBody">
            <!-- Messages will be dynamically added here -->
        </div>
        <div class="chat-footer">
            <input type="text" id="chatInput" placeholder="Type a message...">
            <button id="sendButton" >Send</button>
        </div>
    </div>
</div>
            </div>
        </div>
    </nav>

    <section class="hero container1">
        <div class="container">
            <div class="hero-con">
                <div class="hero-info">
                    <h1>แอพพลิเคชั่นประเมินคะแนนความรุนแรงของโรคหลอดเลือดสมองบนระบบปฏิบัติการแอนดรอยด์</h1>
                    <a href="#article" class="hero-btn">บทความ</a>
                    <a href="#video" class="hero-btn">วิดิโอ</a>
                    <a href="#download" class="hero-btn">ดาวน์โหลด</a>
                    <a href="#contact" class="hero-btn">ติดต่อ</a>
                </div>

                <div class="hero-img">
                    <img src="images\1.jpg"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    

<script src="script.js"></script>

    <section id="article" class="blog">
        <div class="container-article">
            <center>
                <h2>บทความ</h2>
                <br><br><br>
                <div class="blog-item">
                        <div class="itemone">
                        <?php 
                $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC limit 1");
                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $imageURL = 'login/upload-system/uploads/'.$row['file_name'];
                    ?>
                    <div class="box-con">
                        <br>
                        <div class="hero-img-article">
                            <img src="<?php echo $imageURL ?>" alt="" width="100%" height="100%" class="card-img">
                        </div>
                    </div>
                <?php 
                    }
                } else { ?>
                <p>ไม่มีบทความ</p>
                <?php } ?>
                        </div>
                        <div class="itemone">
                        <?php 
                $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC limit 1");
                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $section = $row['section'];
                        $content = $row['content'];
                        
                    ?>
                        <div class="hero-info-article">
                            <br>
                            <h3>
                                <?php echo $section ?> 
                                <br></h3>
                                <p><?php echo $content ?></p>
                            
                        </div>
                    </div>
                <?php 
                    }
                } else { ?>
                <p>ไม่มีบทความ</p>
                <?php } ?>
                
                        </div>
                </div>
            </center>
        </div>
    </section>
        
    <section id="video" class="blog-ab">
        <div class="container-video">
            <div class="blog-item-ab">
                <center>
                    <h2>วิดิโอเกี่ยวกับโรคหลอดเลือดสมอง</h2>
                    <br><br>
                <div class="hero-video-con">
                    <div class="hero-video">
                       <iframe width="560" height="315" src="https://www.youtube.com/embed/jKV2lDW6pvw?si=X4zEJZL96SuaJw3k"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                </center>
            </div>
        </div>
    </section>

    <section id="download" class="blog">
        <div class="container-download">
            <center>
                <div class="blog-item-dl">
                    <h2>แอปพลิเคชันป้องกันและประเมินโรคหลอดเลือดสมองบนระบบปฏิบัติการแอนดรอยด์</h2>
                    
                    <div class="imgdowload">
                    <a href="#"> <img src="images/download.png"> </a>
                    </div>
                </div>
            </center>
        </div>
        
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