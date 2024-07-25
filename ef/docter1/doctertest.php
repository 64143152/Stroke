
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <link rel="stylesheet" href="doctertest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            href="../../index.php">หน้าหลัก</a>
                    </li>

                    <li><a 
                            href="../../login/upload-system/article.php">บทความ</a>
                    </li>
                    <li><a
                            href="../../video/video.php">วิดิโอ</a>
                    </li>
                    <li><a href="../../dl/dl.php">ดาวน์โหลด</a>
                    </li>
                    <li><a
                            href="../../ef/ef.php">ประเมิน</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="ven"></section>

    <section class="hero">
        <div class="container">
            <div class="hero-con">
                <div class="hero-info">
                    <center>
                        <h5>ประเมินโรคหลอดเลือดสมอง
                        </h5>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">

            <div class="blog-con">
                <div class="blog-item-one">
                    <center>
                        <br>
                        <h2>ประวัติผู้ป่วย</h2>
                    </center>
                    <form action="doctertest.php" method="post">

                      <div class="item-con">
                        <div class="itemone">
                            <br>
                            <br>
                        <center>✅</center>
                        </div>
                        <div class="itemone">
                            <h3>ชื่อ : <?php echo $_POST['name'] ?></h3>
                            <h3>โรงพยาบาล : <?php echo $_POST['hospitel'] ?></h3>
                            <h3>อายุ : <?php echo $_POST['age'] ?></h3>
                            <h3>เพศ : <?php echo $_POST['sex'] ?></h3>
                            <h3>น้ำหนัก : <?php echo $_POST['weight'] ?></h3>
                            ____________________________________________
                            <br>
                            <h3>เวลาที่เริ่มมีอาการ  : <?php echo $_POST['time'] ?></h3>
                            <h3>เวลาที่มาถึงโรงพยาบาล  : <?php echo $_POST['tohospitel'] ?></h3>
                            <h3>เวลาที่ใช้ย่สลายลิ่มเลือด  : <?php echo $_POST['takemedicine'] ?></h3>
                          
                        </div>
                        <center>
                            <input class="next" type="submit" style="width:200px; height:100; font-size:25px;" value="หน้าถัดไป"></a>
                        </center>
                      </div>
                   </form>

                </div>
            </div>
        </div>
    </section>



    <div class="footer-top">
        <div class="container">
            <div class="footer-top-con">
                <div class="footer-top-item">
                    <h4>Latesr posts</h4>
                    <div class="footer-top-item-con">
                        <div class="date">
                            JULY <br>
                            27
                        </div>
                        <div class="info">
                            <span class="info-title">Lorem ipsum dolor sit amet</span>
                            <span class="info-desc">Lorem ipsum dolor sit amet consectetur</span>
                        </div>
                    </div>

                    <div class="footer-top-item-con">
                        <div class="date">
                            JULY <br>
                            27
                        </div>
                        <div class="info">
                            <span class="info-title">Lorem ipsum dolor sit amet</span>
                            <span class="info-desc">Lorem ipsum dolor sit amet consectetur</span>
                        </div>
                    </div>

                    <div class="footer-top-item-con">
                        <div class="date">
                            JULY <br>
                            27
                        </div>
                        <div class="info">
                            <span class="info-title">Lorem ipsum dolor sit amet</span>
                            <span class="info-desc">Lorem ipsum dolor sit amet consectetur</span>
                        </div>
                    </div>

                </div>

                <div class="footer-top-item">
                    <h4>About</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente rerum et odit inventore
                        incidunt alias aliquam, molestias perspiciatis repellendus voluptatem aliquid nobis, repellat
                        iste debitis beatae unde sequi voluptas. Ad!</p>
                </div>

                <div class="footer-top-item">
                    <h4>Stay Connected</h4>
                    <p><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</p>
                    <P><i class="fa fa-twitter-square" aria-hidden="true"></i>Twitter</P>
                    <p><i class="fa fa-rss-square" aria-hidden="true"></i>RSS</p>
                    <p><i class="fa fa-google-plus-square" aria-hidden="true"></i>Google+</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>Copyright 2024.All right reserved Bloom web design.</p>
    </div>

</body>

</html>