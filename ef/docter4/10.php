<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 14</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice14 {
        list-style: none;
    }

    .choice14 li {
        margin-top: 0.5rem;
    }

    .choice14 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice14 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice14 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice14 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>10. การออกเสียง (Dysarthria)</h4> 
    <h6>โดยมีคะแนน 0-2 คะแนน</h6>
</div>

<ul class="choice14">
    <li>
        <input type="button" class="13" onclick="changeBackgroundColor14(event, 'lightblue', 0, 'score14')" value=" 0 = พูดได้ชัดเจนเป็นปกติ">
    </li>
    <li>
        <input type="button" class="13" onclick="changeBackgroundColor14(event, 'lightblue', 1, 'score14')" 
        value=" 1 = พูดไม่ชัดเล็กน้อยถึงปานกลาง 
        (ผู้ป่วยพูดไม่ชัด เป็นบางคำโดยผู้ตรวจพอเข้าใจได้)">
    </li>
    <li>
        <input type="button" class="13" onclick="changeBackgroundColor14(event, 'lightblue', 2, 'score14')" 
        value=" 2 = พูดไม่ชัดอย่างมากหรือผู้ป่วยไม่พูด 
        ผู้ตรวจไม่สามารถเข้าใจคำพูดของผู้ป่วยได้ 
        (โดยที่ไม่มีความผิดปกติของความสามารถทางภาษา)">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score14">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor14')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor14');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score14 = localStorage.getItem('score14') ? parseInt(localStorage.getItem('score14')) : 0;
    document.getElementById('score14').textContent = score14;

    function changeBackgroundColor14(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score14 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score14').textContent = score14;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score14', score14);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor14', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice14 li input[type="button"]');
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
