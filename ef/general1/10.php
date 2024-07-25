<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 12</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice12 {
        list-style: none;
    }

    .choice12 li {
        margin-top: 0.5rem;
    }

    .choice12 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice12 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice12 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice12 li input.clicked {
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

<ul class="choice12">
    <li>
        <input type="button" class="11" onclick="changeBackgroundColor12(event, 'lightblue', 0, 'score12')" value=" 0 = พูดได้ชัดเจนเป็นปกติ">
    </li>
    <li>
        <input type="button" class="11" onclick="changeBackgroundColor12(event, 'lightblue', 1, 'score12')" 
        value=" 1 = พูดไม่ชัดเล็กน้อยถึงปานกลาง 
        (ผู้ป่วยพูดไม่ชัด เป็นบางคำโดยผู้ตรวจพอเข้าใจได้)">
    </li>
    <li>
        <input type="button" class="11" onclick="changeBackgroundColor12(event, 'lightblue', 2, 'score12')" 
        value=" 2 = พูดไม่ชัดอย่างมากหรือผู้ป่วยไม่พูด 
        ผู้ตรวจไม่สามารถเข้าใจคำพูดของผู้ป่วยได้ 
        (โดยที่ไม่มีความผิดปกติของความสามารถทางภาษา)">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score12">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor12')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor12');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score12 = localStorage.getItem('score12') ? parseInt(localStorage.getItem('score12')) : 0;
    document.getElementById('score12').textContent = score12;

    function changeBackgroundColor12(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score12 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score12').textContent = score12;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score12', score12);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor12', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice12 li input[type="button"]');
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
