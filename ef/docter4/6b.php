<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 10</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice10 {
        list-style: none;
    }

    .choice10 li {
        margin-top: 0.5rem;
    }

    .choice10 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice10 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice10 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice10 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>6b. กำลังของกล้ามเนื้อขาขวา (Motor right Leg)</h4> 
    <h6>โดยมีคะแนน 0-4 คะแนน</h6>
</div>

<ul class="choice10">
    <li>
        <input type="button" class="9" onclick="changeBackgroundColor10(event, 'lightblue', 0, 'score10')" 
        value=" 0 = สามารถยกขาข้างที่อ่อนแรงขึ้นให้สะโพกทำมุม 30 องศา
        กับพื้นในท่านอนหงาย และคงตำแหน่งที่ต้องการได้ตลอด 5 วินาที">
    </li>
    <li>
        <input type="button" class="9" onclick="changeBackgroundColor10(event, 'lightblue', 1, 'score10')" 
        value=" 1 = สามารถยกขาข้างที่อ่อนแรงขึ้นให้สะโพกทำมุม 30 องศา
        กับพื้นในท่านอนหงายได้ครู่เดียว โดยไม่ถึง 5 วินาที 
        ก็ต้องลดขาลงมา แต่ขาไม่ตกลงบนเตียง">
    </li>
    <li>
        <input type="button" class="9" onclick="changeBackgroundColor10(event, 'lightblue', 2, 'score10')" 
        value=" 2 = ยกขาขึ้นได้บ้างในท่านอนหงายแต่ไม่ถึงตำแหน่งที่ต้องการ 
        ขาตกลงบนเตียงก่อน 5 วินาที">
    </li>
    <li>
        <input type="button" class="9" onclick="changeBackgroundColor10(event, 'lightblue', 3, 'score10')" value=" 3 = ไม่สามารถยกขาขึ้นจากเตียงได้ในท่านอนหงาย">
    </li>
    <li>
        <input type="button" class="9" onclick="changeBackgroundColor10(event, 'lightblue', 4, 'score10')" value=" 4 = ไม่มีการเคลื่อนไหวของกล้ามเนื้อขา">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score10">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor10')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor10');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score10 = localStorage.getItem('score10') ? parseInt(localStorage.getItem('score10')) : 0;
    document.getElementById('score10').textContent = score10;

    function changeBackgroundColor9(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score10 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score10').textContent = score10;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score10', score10);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor10', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice10 li input[type="button"]');
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
