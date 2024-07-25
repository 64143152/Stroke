<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 4</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice4 {
        list-style: none;
    }

    .choice4 li {
        margin-top: 0.5rem;
    }

    .choice4 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: 70px;
        margin-top: 1rem;
    }

    .choice4 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice4 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice4 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>2. การเคลื่อนไหวของตา (Best Gaze)</h4> 
    <h6>โดยมีคะแนน 0-2 คะแนน</h6>
</div>

<ul class="choice4">
    <li>
        <input type="button" class="3" onclick="changeBackgroundColor4(event, 'lightblue', 0, 'score4')" value=" 0 = มองตามได้เป็นปกติ">
    </li>
    <li>
        <input type="button" class="3" onclick="changeBackgroundColor4(event, 'lightblue', 1, 'score4')" value=" 1 = ตาข้างใดข้างหนึ่งหรือทั้ง 2 ข้าง เหลือบมองไปด้านข้างได้แต่ไม่สุด">
    </li>
    <li>
        <input type="button" class="3" onclick="changeBackgroundColor4(event, 'lightblue', 2, 'score4')" value=" 2 = เหลือบตามองไปด้านข้างไม่ได้เลย หรือมองไปด้านหนึ่งด้านใดจนสุด โดยไม่สามารถแก้ไขได้ด้วย oculocephalic maneuver">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score4">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor4')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor4');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score4 = localStorage.getItem('score4') ? parseInt(localStorage.getItem('score4')) : 0;
    document.getElementById('score4').textContent = score4;

    function changeBackgroundColor4(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score4 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score4').textContent = score4;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score4', score4);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor4', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice4 li input[type="button"]');
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
