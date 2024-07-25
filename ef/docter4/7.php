<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 11</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice11 {
        list-style: none;
    }

    .choice11 li {
        margin-top: 0.5rem;
    }

    .choice11 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: 70px;
        margin-top: 1rem;
    }

    .choice11 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice11 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice11 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>7. การประสานงานของแขนขา (Limb Ataxia)</h4> 
    <h6>โดยมีคะแนน 0-2 คะแนน</h6>
</div>

<ul class="choice11">
    <li>
        <input type="button" class="10" onclick="changeBackgroundColor11(event, 'lightblue', 0, 'score11')" value=" 0 = การประสานงานของแขนขาทั้ง 2 ข้าง เป็นปกติ">
    </li>
    <li>
        <input type="button" class="10" onclick="changeBackgroundColor11(event, 'lightblue', 1, 'score11')" value=" 1 = พบมีปัญหาของการประสานงานของแขนหรือขา 1 ข้าง">
    </li>
    <li>
        <input type="button" class="10" onclick="changeBackgroundColor11(event, 'lightblue', 2, 'score11')" value=" 2 = พบมีปัญหาของการประสานงานของแขนหรือขา 2 ข้าง">
    </li>
    <li>
        <input type="button" class="10" onclick="changeBackgroundColor11(event, 'lightblue', 0, 'score11')" value=" UN = แขนหรือขาพิการหรือถูกตัด 
        หรือพบมีปัญหาข้อติดยึดที่ไม่สามารถแปลผลการตรวจได้">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score11">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor11')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor11');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score11 = localStorage.getItem('score11') ? parseInt(localStorage.getItem('score11')) : 0;
    document.getElementById('score11').textContent = score11;

    function changeBackgroundColor11(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score11 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score11').textContent = score11;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score11', score11);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor11', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice11 li input[type="button"]');
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
