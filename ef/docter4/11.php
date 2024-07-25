<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 15</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice15 {
        list-style: none;
    }

    .choice15 li {
        margin-top: 0.5rem;
    }

    .choice15 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice15 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice15 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice15 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>11. การขาดความสนใจในด้านใดด้านหนึ่งของร่างกาย (Extinction and Inattention)</h4> 
    <h6>โดยมีคะแนน 0-2 คะแนน</h6>
</div>

<ul class="choice15">
    <li>
        <input type="button" class="14" onclick="changeBackgroundColor15(event, 'lightblue', 0, 'score15')" value=" 0 = ไม่พบความผิดปกติ">
    </li>
    <li>
        <input type="button" class="14" onclick="changeBackgroundColor15(event, 'lightblue', 1, 'score15')" 
        value=" 1 = มีความผิดปกติอย่างใดอย่างหนึ่งของการรับรู้
        ในด้านการมองเห็น การสัมผัส การได้ยิน 
        เมื่อมีการกระตุ้น 2 ข้างพร้อมๆ กัน">
    </li>
    <li>
    <input type="button" class="114" onclick="changeBackgroundColor15(event, 'lightblue', 2, 'score15')" 
    value=" 2 = มีความผิดปกติในด้านการรับรู้ มากกว่า 1 อย่าง
    หรือผู้ป่วยไม่รับรู้ว่าเป็นมือของตัวเอง 
    หรือสนใจต่อสิ่งเร้าเพียงด้านเดียว">

    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score15">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor15')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor15');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score15 = localStorage.getItem('score15') ? parseInt(localStorage.getItem('score15')) : 0;
    document.getElementById('score15').textContent = score15;

    function changeBackgroundColor15(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score15 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score15').textContent = score15;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score15', score15);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor15', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice15 li input[type="button"]');
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
