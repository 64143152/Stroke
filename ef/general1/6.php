<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 8</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice8 {
        list-style: none;
    }

    .choice8 li {
        margin-top: 0.5rem;
    }

    .choice8 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice8 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice8 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice8 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>6. กำลังของกล้ามเนื้อขา (Motor Leg)</h4> 
    <h6>โดยมีคะแนน 0-4 คะแนน</h6>
</div>

<ul class="choice8">
    <li>
        <input type="button" class="7" onclick="changeBackgroundColor8(event, 'lightblue', 0, 'score8')" 
        value=" 0 = สามารถยกขาข้างที่อ่อนแรงขึ้นให้สะโพกทำมุม 30 องศา
        กับพื้นในท่านอนหงาย และคงตำแหน่งที่ต้องการได้ตลอด 5 วินาที">
    </li>
    <li>
        <input type="button" class="7" onclick="changeBackgroundColor8(event, 'lightblue', 1, 'score8')" 
        value=" 1 = สามารถยกขาข้างที่อ่อนแรงขึ้นให้สะโพกทำมุม 30 องศา
        กับพื้นในท่านอนหงายได้ครู่เดียว โดยไม่ถึง 5 วินาที 
        ก็ต้องลดขาลงมา แต่ขาไม่ตกลงบนเตียง">
    </li>
    <li>
        <input type="button" class="7" onclick="changeBackgroundColor8(event, 'lightblue', 2, 'score8')" 
        value=" 2 = ยกขาขึ้นได้บ้างในท่านอนหงายแต่ไม่ถึงตำแหน่งที่ต้องการ 
        ขาตกลงบนเตียงก่อน 5 วินาที">
    </li>
    <li>
        <input type="button" class="7" onclick="changeBackgroundColor8(event, 'lightblue', 3, 'score8')" value=" 3 = ไม่สามารถยกขาขึ้นจากเตียงได้ในท่านอนหงาย">
    </li>
    <li>
        <input type="button" class="7" onclick="changeBackgroundColor8(event, 'lightblue', 4, 'score8')" value=" 4 = ไม่มีการเคลื่อนไหวของกล้ามเนื้อขา">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score8">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor8')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor8');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score8 = localStorage.getItem('score8') ? parseInt(localStorage.getItem('score8')) : 0;
    document.getElementById('score8').textContent = score8;

    function changeBackgroundColor8(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score8 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score8').textContent = score8;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score8', score8);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor8', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice8 li input[type="button"]');
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
