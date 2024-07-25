<nav class="navbar">
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
        </div>
    </nav>