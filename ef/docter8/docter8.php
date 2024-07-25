<?php
session_start(); // Start the session

// Display the stored values
$rtPA_quantity = isset($_SESSION['rtPA_quantity']) ? $_SESSION['rtPA_quantity'] : '';
$rtPA_quantity1 = isset($_SESSION['rtPA_quantity1']) ? $_SESSION['rtPA_quantity1'] : '';
$rtPA_quantity2 = isset($_SESSION['rtPA_quantity2']) ? $_SESSION['rtPA_quantity2'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <link rel="stylesheet" href="docter8.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
                        <a href="../../index.php">หน้าหลัก</a>
                    </li>
                    <li>
                        <a href="../../login/upload-system/article.php">บทความ</a>
                    </li>
                    <li>
                        <a href="../../video/video.php">วิดิโอ</a>
                    </li>
                    <li>
                        <a href="../../dl/dl.php">ดาวน์โหลด</a>
                    </li>
                    <li>
                        <a href="../../ef/ef.php">ประเมิน</a>
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
                        <h5>ประเมินโรคหลอดเลือดสมอง</h5>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="blog-con">
                <a href="../docter7/docter7.php">ย้อนกลับ</a>
                <div class="blog-item-one">
                    <center>
                        <br>
                        <h2>รายงานผล</h2>
                    </center>
                    <form action="" method="post">
                    <div class="item-con">
                            <div class="itemone">
                
                                
                            </div>
                            
                            <div>
                                <h3>ข้อมูลทั่วไป</h3>
                                <br>
                                <div class="info">
                                    <?php

                                        if (isset($_SESSION['formData'])) {
                                            $formData = $_SESSION['formData'];
                                            echo "ชื่อ: " . $formData['name'] . "<br>";
                                            echo "โรงพยาบาล: " . $formData['hospitel'] . "<br>";
                                            echo "อายุ: " . $formData['age'] . "<br>";
                                            echo "เพศ: " . $formData['sex'] . "<br>";
                                            echo "น้ำหนัก: " . $formData['weight'] . "<br>";
                                            echo "ความดันโลหิต: " . $formData['blood'] . "<br>";
                                            echo "ระดับน้ำตาลในเลือด: " . $formData['sugar'] . "<br>";
                                            echo "เวลาที่เริ่มมีอาการ: " . $formData['time'] . "<br>";
                                            echo "เวลาที่มาถึงโรงพยาบาล: " . $formData['tohospitel'] . "<br>";
                                            echo "เวลาที่ใช้ยาละลายลิ่มเลือด: " . $formData['takemedicine'] . "<br>";

                                    ?>
                                </div>

                                <br>
                                <h3>โรคประจำตัว</h3> 
                                <br>
                                <div class="info">
                                    <?php       
                                            // เช็คว่ามีข้อมูลที่เก็บใน session หรือไม่
                                            if (isset($_SESSION['selectedDiseases'])) {
                                                // ดึงข้อมูลที่เก็บไว้ใน session
                                                $selectedDiseases = $_SESSION['selectedDiseases'];

                                                // ตรวจสอบว่ามีข้อมูลใน $selectedDiseases หรือไม่
                                                if (!empty($selectedDiseases)) {
                                                    // แสดงหัวข้อ
                                                    
                                                    // แสดงข้อมูลโรคที่เลือก
                                                    echo "<ul>";
                                                    foreach ($selectedDiseases as $disease) {
                                                        echo "<li>" . htmlspecialchars($disease) . "</li>"; // htmlspecialchars เพื่อป้องกัน XSS attacks
                                                    }
                                                    echo "</ul>";
                                                } else {
                                                    echo "<p>ยังไม่มีข้อมูลโรคประจำตัวที่เลือก</p>";
                                                }
                                            } else {
                                                echo "<p>ไม่มีข้อมูลโรคประจำตัวที่เลือก</p>";
                                            }

                                        } else {
                                        // If no session data, redirect
                                        header("Location: ../docter2/docter2.php");
                                        exit();
                                        }
                                    ?>
                                </div>

                                <br>
                                <h3>แบบประเมิน NIHSS</h3>
                                <br>
                                <div class="info">
                                    <p>ผลรวมคะแนน: <span id="totalScore"><?php echo $_SESSION['totalScore']; ?></span></p>
                                    <div class="severity-text">ความรุนแรงของอาการ:</div>
                                    <div class="severity" id="strokeSeverity"></div>
                                </div>            

                                    <script>
                                        // Retrieve total score from sessionStorage
                                        let totalScore = sessionStorage.getItem('totalScore');

                                        // Display total score
                                        document.getElementById('totalScore').textContent = totalScore;

                                        // Determine stroke severity based on total score
                                        let severityElement = document.getElementById('strokeSeverity');
                                        let bodyElement = document.body;
                                        if (totalScore === '0') {
                                            severityElement.textContent = "No Stroke";
                                            bodyElement.classList.add('no-stroke');
                                        } else if (totalScore > '0' && totalScore < '5') {
                                            severityElement.textContent = "Minor Stroke";
                                            bodyElement.classList.add('minor-stroke');
                                        } else if (totalScore >= '5' && totalScore < '16') {
                                            severityElement.textContent = "Moderate Stroke";
                                            bodyElement.classList.add('moderate-stroke');
                                        } else if (totalScore >= '16' && totalScore < '21') {
                                            severityElement.textContent = "Moderate to Severe Stroke";
                                            bodyElement.classList.add('moderate-severe-stroke');
                                        } else if (totalScore >= '21') {
                                            severityElement.textContent = "Severe Stroke";
                                            bodyElement.classList.add('severe-stroke');
                                        }
                                    </script>

                                <br>
                                <h3>อาการ</h3>
                                <br>
                                <div class="info">
                                    <?php
                                        // Check if session data exists
                                        if (isset($_SESSION['formData2'])) {
                                            $formData2 = $_SESSION['formData2'];

                                            // แสดงข้อมูลที่รับมาจากฟอร์ม
                                            echo "Balance: เวียนศรีษะ เดินเซ = " . htmlspecialchars($formData2['Balance']) . "<br>";
                                            echo "Eye: ตาดับทันทีทันใด/มองเห็นภาพเฉียบพลัน = " . htmlspecialchars($formData2['Eye']) . "<br>";
                                            echo "Face: หน้าเบี้ยวเฉียบพลัน = " . htmlspecialchars($formData2['Face']) . "<br>";
                                            echo "Arm :อ่อนแรงแขน/ขาฉับพลัน = " . htmlspecialchars($formData2['Arm']) . "<br>";
                                            echo "Speech: พูดลำบาก/พูดไม่ชัด/นึกคำพูดไม่ออกเฉียบพลัน = " . htmlspecialchars($formData2['Speech']) . "<br>";
                                            echo "visual: การมองเห็น = " . htmlspecialchars($formData2['Visual']) . "<br>";
                                            echo "Time: เวลา = " . htmlspecialchars($formData2['Time']) . "<br>";
                                            echo "Aphasia: การเข้าใจภาษา = " . htmlspecialchars($formData2['Aphasia']) . "<br>";
                                            echo "Negelct: ไม่สนใจร่างกายหนึ่งด้าน = " . htmlspecialchars($formData2['Neglect']) . "<br>";
                                        } else {
                                            // If no session data, redirect or handle as needed
                                            echo "ไม่มีข้อมูลฟอร์มที่ส่งมา";
                                        }
                                    ?>
                                </div>
                     
                                <br>
                                <h3>ข้อบ่งชี้/ข้อห้าม</h3>
                                <br>
                                <div class="info">
                                    <?php
                                        // Check if session data exists
                                        if (isset($_SESSION['formData3'])) {
                                            $formData3 = $_SESSION['formData3'];

                                            // แสดงข้อมูลที่รับมาจากฟอร์ม
                                            echo "มีอาการหลอดเลือดสมองตีบภายใน4.5 ชั่วโมง = " . htmlspecialchars($formData3['a1']) . "<br>";
                                            echo "อายุมากกว่า 18 ปี = " . htmlspecialchars($formData3['a2']) . "<br>";
                                            echo "ผล CT brain ไม่พบว่าเลือดออกในสมอง = " . htmlspecialchars($formData3['a3']) . "<br>";
                                            echo "บาดเจ็บศรีษะรุนแรงหรือมีประวัติเป็นโรคหลอดเลือดสมองภายใน 3 เดือน = " . htmlspecialchars($formData3['a4']) . "<br>";
                                            echo "มีอาการว่ามีเลือดออกชั้นใต้เยื่อหุ้มสมอง = " . htmlspecialchars($formData3['a5']) . "<br>";
                                            echo "มีประวัติเคยเคยเลือดออกในกระโหลกศรีษะ = " . htmlspecialchars($formData3['a6']) . "<br>";
                                            echo "มีอาการเนื้องอกในสมอง(Intracranical neoplasm),Aneurysm หรือ Arteriovenous malformation(AVM) = " . htmlspecialchars($formData3['a7']) . "<br>";
                                            echo "มีการแทงหลอดเลือดแดงขนาดใหญ่ในตำแหน่งที่ไม่สามารถกดได้ภายใน7วัน = " . htmlspecialchars($formData3['a8']) . "<br>";
                                            echo "มีการได้รับการผ่าตัดกระโหลกศรีษะหรือกระดูกสันหลังภายใน 3 เดือน = " . htmlspecialchars($formData3['a9']) . "<br>";
                                            echo "มีความดันโลหิตช่วงก่อนให้การรักษาสูงและไม่สามารถลดความดันโลหิตลงได้ก่อนให้ยาละลายลิ่มเลือด = " . htmlspecialchars($formData3['a10']) . "<br>";
                                        } else {
                                            // If no session data, redirect or handle as needed
                                            echo "ไม่มีข้อมูลฟอร์มที่ส่งมา";
                                        }
                                    ?>
                                </div>

                                
                                    <?php
                                            // Access stored values
                                        $b1_text = isset($_SESSION['b1_text']) ? $_SESSION['b1_text'] : '';
                                        $b2_text = isset($_SESSION['b2_text']) ? $_SESSION['b2_text'] : '';
                                    ?>
                                    <br>
                                    <div class="">
                                        <div>
                                            <h3>ผลก่อนการรักษา</h3>
                                            <div class="info">
                                            <p><?php echo htmlspecialchars($b1_text); ?></p>
                                            </div>
                                        </div>

                                        <div>
                                            <h3>ผลหลังการรักษา</h3>
                                            <div class="info">
                                            <p><?php echo htmlspecialchars($b2_text); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                
                                <br>

                                <div class="">
                                    <h3>ปริมาณยา</h3>
                                    <div class="info">
                                        <p>ปริมาณยาละลายลิ่มเลือด (rt-PA): <?php echo $rtPA_quantity; ?> กรัม</p>
                                        <p>แบ่งให้ <?php echo $rtPA_quantity1; ?> มิลลิกรัม ทางหลอดเลือดำใน 1 นาที</p>
                                        <p>และให้ <?php echo $rtPA_quantity2; ?> มิลลิกรัม ทางหลอดเลือดำใน 60 นาที</p>
                                    </div>
                                </div>

                                <?php
if (isset($_SESSION['formData'])) {
    $formData = $_SESSION['formData'];
    $formData2 = $_SESSION['formData2'];
    $formData3 = $_SESSION['formData3'];

    // Additional variables needed for your code (assumed to be defined elsewhere)
    $rtPA_quantity = $_SESSION['rtPA_quantity'];
    $rtPA_quantity1 = $_SESSION['rtPA_quantity1'];
    $rtPA_quantity2 = $_SESSION['rtPA_quantity2'];
    $b1_text = $_SESSION['b1_text'];
    $b2_text = $_SESSION['b2_text'];
    // print_r($_SESSION);
    // die;

    function getSeverity($value) {
        // if (totalScore === '0') {
        //     severityElement.textContent = "No Stroke";
        //     bodyElement.classList.add('no-stroke');
        // } else if (totalScore > '0' && totalScore < '5') {
        //     severityElement.textContent = "Minor Stroke";
        //     bodyElement.classList.add('minor-stroke');
        // } else if (totalScore >= '5' && totalScore < '16') {
        //     severityElement.textContent = "Moderate Stroke";
        //     bodyElement.classList.add('moderate-stroke');
        // } else if (totalScore >= '16' && totalScore < '21') {
        //     severityElement.textContent = "Moderate to Severe Stroke";
        //     bodyElement.classList.add('moderate-severe-stroke');
        // } else if (totalScore >= '21') {
        //     severityElement.textContent = "Severe Stroke";
        //     bodyElement.classList.add('severe-stroke');
        // }
        if ($value === '0') {
            return "No Stroke";
        } elseif ($value > '0' && $value < '5') {
            return "Minor Stroke";
        } elseif ($value >= '5' && $value < '16') {
            return "Moderate Stroke";
        } elseif ($value >= '16' && $value < '21') {
            return "Moderate to Severe Stroke";
        } elseif ($value >= '21') {
            return "Severe Stroke";
        }
    }

    // Prepare data for download
    $data = "ข้อมูลผู้ป่วย\n" .
            "ชื่อ: " . $formData['name'] . "\n" .
            "โรงพยาบาล: " . $formData['hospitel'] . "\n" .
            "อายุ: " . $formData['age'] . "\n" .
            "เพศ: " . $formData['sex'] . "\n" .
            "น้ำหนัก: " . $formData['weight'] . "\n" .
            "ความดันโลหิต: " . $formData['blood'] . "\n" .
            "ระดับน้ำตาลในเลือด: " . $formData['sugar'] . "\n" .
            "เวลาที่เริ่มมีอาการ: " . $formData['time'] . "\n" .
            "เวลาที่มาถึงโรงพยาบาล: " . $formData['tohospitel'] . "\n" .
            "เวลาที่ใช้ยาละลายลิ่มเลือด: " . $formData['takemedicine'] . "\n\n" .

            "ข้อมูลแบบประเมิน NIHSS\n" .
            "คะแนนสะสม: " .$_SESSION['totalScore'] . "\n" .
            "ความรุนแรง: " .getSeverity($_SESSION['totalScore']) . "\n" .

            "ข้อมูลอาการผู้ป่วย NIHSS\n" .
            "Balance: เวียนศรีษะ เดินเซ = " . $formData2['Balance'] . "\n" .
            "Eye: ตาดับทันทีทันใด/มองเห็นภาพเฉียบพลัน = " . $formData2['Eye'] . "\n" .
            "Face: หน้าเบี้ยวเฉียบพลัน = " . $formData2['Face'] . "\n" .
            "Arm :อ่อนแรงแขน/ขาฉับพลัน = " . $formData2['Arm'] . "\n" .
            "Speech: พูดลำบาก/พูดไม่ชัด/นึกคำพูดไม่ออกเฉียบพลัน = " . $formData2['Speech'] . "\n" .
            "visual: การมองเห็น = " . $formData2['Visual'] . "\n" .
            "Time: เวลา = " . $formData2['Time'] . "\n" .
            "Aphasia: การเข้าใจภาษา = " . $formData2['Aphasia'] . "\n" .
            "Negelct: ไม่สนใจร่างกายหนึ่งด้าน = " . $formData2['Neglect'] . "\n\n".

            "ข้อบ่งชี้/ข้อห้าม\n" .
            "มีอาการหลอดเลือดสมองตีบภายใน4.5 ชั่วโมง = " . $formData3['a1'] . "\n" .
            "อายุมากกว่า 18 ปี = " . $formData3['a2'] . "\n" .
            "ผล CT brain ไม่พบว่าเลือดออกในสมอง = " . $formData3['a3'] . "\n" .
            "บาดเจ็บศรีษะรุนแรงหรือมีประวัติเป็นโรคหลอดเลือดสมองภายใน 3 เดือน = " . $formData3['a4'] . "\n" .
            "มีอาการว่ามีเลือดออกชั้นใต้เยื่อหุ้มสมอง = " . $formData3['a5'] . "\n" .
            "มีประวัติเคยเคยเลือดออกในกระโหลกศรีษะ = " . $formData3['a6'] . "\n" .
            "มีอาการเนื้องอกในสมอง(Intracranical neoplasm),Aneurysm หรือ Arteriovenous malformation(AVM) = " . $formData3['a7'] . "\n" .
            "มีการแทงหลอดเลือดแดงขนาดใหญ่ในตำแหน่งที่ไม่สามารถกดได้ภายใน7วัน = " . $formData3['a8'] . "\n" .
            "มีการได้รับการผ่าตัดกระโหลกศรีษะหรือกระดูกสันหลังภายใน 3 เดือน = " . $formData3['a9'] . "\n" .
            "มีความดันโลหิตช่วงก่อนให้การรักษาสูงและไม่สามารถลดความดันโลหิตลงได้ก่อนให้ยาละลายลิ่มเลือด = " . $formData3['a10'] . "\n\n".

            "ปริมาณยา\n" .
            "ปริมาณยาละลายลิ่มเลือด (rt-PA): " . $rtPA_quantity . "กรัม" . "\n" .
            "แบ่งให้ " . $rtPA_quantity1 . " มิลลิกรัม ทางหลอดเลือดำใน 1 นาที" . "\n" .
            "และให้ " . $rtPA_quantity2 . " มิลลิกรัม ทางหลอดเลือดำใน 60 นาที". "\n\n" .

            "ผลการรักษา\n" .
            "ผลก่อนการรักษา: " . $b1_text . "\n" .
            "ผลหลังการรักษา: " . $b2_text . "\n" ;

    // Write data to file
    // delete previous data
    $file = fopen("data.txt", "w");
    fwrite($file, "");
    fclose($file);
    $file = fopen("data.txt", "a");

    fwrite($file, $data);
    fclose($file);

    // Provide a link to download the file
    echo '<a href="data.txt" download>ดาวน์โหลดข้อมูล</a>';

} else {
    // If no session data or total score, redirect or handle as needed
    echo "ไม่พบข้อมูลสำหรับการดาวน์โหลด";
}
?>

                        <br><br><br>

                            <!-- <center>
                                <a href="data.txt" download class="next" style="width:200px; height:100px; font-size:25px;">โหลดข้อมูล
                                    
                                </a>
                            </center> -->
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
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
