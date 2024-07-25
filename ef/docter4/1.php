<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 1</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice1{
        list-style: none;
    }

    .choice1 li{
        margin-top: 0.5rem;
    }

    .choice1 li input{
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: 70px;
        margin-top: 1rem;
        }

    .choice1  li input:hover{
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice1 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice1 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>1a. ระดับความรู้สึกตัว (Level of Consciousness, LOC)</h4> 
    <h6>โดยมีคะแนน 0-3 คะแนน</h6>
</div>

<ul class="choice1">
    <li>
        <input type="button" class="1b" onclick="changeBackgroundColor1(event, 'lightblue', 0, 'score1')" value="0 = รู้สึกตัวดี">
    </li>
    <li>
        <input type="button" class="1b" onclick="changeBackgroundColor1(event, 'lightblue', 1, 'score1')" value="1 = ไม่รู้สึกตัว แต่สามารถปลุกให้ตื่นได้">
    </li>
    <li>
        <input type="button" class="1b" onclick="changeBackgroundColor1(event, 'lightblue', 2, 'score1')" value="2 = ไม่รู้สึกตัว ต้องกระตุ้นซ้ำหรือทำให้เจ็บ">
    </li>
    <li>
        <input type="button" class="1b" onclick="changeBackgroundColor1(event, 'lightblue', 3, 'score1')" value="3 = ไม่รู้สึกตัว ตอบสนองเฉพาะรีเฟล็กซ์">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style ="text-align: center;">คะแนน : <span id="score1">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor1')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor1');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score1 = localStorage.getItem('score1') ? parseInt(localStorage.getItem('score1')) : 0;
    document.getElementById('score1').textContent = score1;

    function changeBackgroundColor1(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score1 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score1').textContent = score1;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score1', score1);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor1', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice1 li input[type="button"]');
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
