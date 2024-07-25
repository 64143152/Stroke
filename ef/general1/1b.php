<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 2</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice2{
        list-style: none;
    }

    .choice2 li{
        margin-top: 0.5rem;
    }

    .choice2 li input{
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: 70px;
        }

    .choice2  li input:hover{
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice2 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice2 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>1b. สามารถบอกเดือน และอายุได้ (LOC Questions)</h4> 
    <h6>โดยมีคะแนน 0-2 คะแนน</h6>
</div>

<ul class="choice2">
    <li>
        <input type="button" class="1c" onclick="changeBackgroundColor2(event, 'lightblue', 0, 'score2')" value=" 0 = ตอบได้ถูกต้องทั้ง 2 ข้อ">
    </li>
    <li>
        <input type="button" class="1c" onclick="changeBackgroundColor2(event, 'lightblue', 1, 'score2')" value=" 1 = ตอบถูกเพียง 1 ข้อ">
    </li>
    <li>
        <input type="button" class="1c" onclick="changeBackgroundColor2(event, 'lightblue', 2, 'score2')" value=" 2 = ไม่สามารถตอบคำถามได้หรือตอบผิดทั้ง 2 ข้อ">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style ="text-align: center;">คะแนน : <span id="score2">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor2')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor2');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score2 = localStorage.getItem('score2') ? parseInt(localStorage.getItem('score2')) : 0;
    document.getElementById('score2').textContent = score2;

    function changeBackgroundColor2(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score2 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score2').textContent = score2;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score2', score2);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor2', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice2 li input[type="button"]');
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
