<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 5</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice5 {
        list-style: none;
    }

    .choice5 li {
        margin-top: 0.5rem;
    }

    .choice5 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: 70px;
        margin-top: 1rem;
    }

    .choice5 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice5 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice5 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>3. การมองเห็น (Visual Fields)</h4> 
    <h6>โดยมีคะแนน 0-3 คะแนน</h6>
</div>

<ul class="choice5">
    <li>
        <input type="button" class="4" onclick="changeBackgroundColor5(event, 'lightblue', 0, 'score5')" value=" 0 = ลานสายตาปกติ">
    </li>
    <li>
        <input type="button" class="4" onclick="changeBackgroundColor5(event, 'lightblue', 1, 'score5')" value=" 1 = ลานสายตาผิดปกติบางส่วน (Partial Hemianopia)">
    </li>
    <li>
        <input type="button" class="4" onclick="changeBackgroundColor5(event, 'lightblue', 2, 'score5')" value=" 2 = ลานสายตาผิดปกติครึ่งซีก (Complete Hemianopia)">
    </li>
    <li>
        <input type="button" class="4" onclick="changeBackgroundColor5(event, 'lightblue', 3, 'score5')" value=" 3 = มองไม่เห็นทั้ง 2 ตา (ตาบอด)">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score5">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor5')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor5');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score5 = localStorage.getItem('score5') ? parseInt(localStorage.getItem('score5')) : 0;
    document.getElementById('score5').textContent = score5;

    function changeBackgroundColor5(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score5 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score5').textContent = score5;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score5', score5);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor5', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice5 li input[type="button"]');
        buttons.forEach(button => {
            button.classList.remove('clicked');
        });

        // เปลี่ยนสถานะของปุ่มที่ถูกคลิก
        const clickedButton = event.target;
        clickedButton.classList.add('clicked');
    }
</script>

</body>
</html>
