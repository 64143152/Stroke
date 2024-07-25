<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 7</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice7 {
        list-style: none;
    }

    .choice7 li {
        margin-top: 0.5rem;
    }

    .choice7 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice7 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice7 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice7 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>5. กำลังของกล้ามเนื้อแขน (Motor Arm)</h4> 
    <h6>โดยมีคะแนน 0-4 คะแนน</h6>
</div>

<ul class="choice7">
    <li>
        <input type="button" class="6" onclick="changeBackgroundColor7(event, 'lightblue', 0, 'score7')" 
        value=" 0 = ยกแขนสูง 90 องศาทำมุมกับลำตัวในท่านั่ง หรือ 
        45 องศาในท่านอนหงาย และสามารถคงไว้ในตำแหน่ง
        ที่ต้องการได้ตลอด 10 วินาที">
    </li>
    <li>
        <input type="button" class="6" onclick="changeBackgroundColor7(event, 'lightblue', 1, 'score7')" 
        value=" 1 = ยกแขนสูง 90 องศาทำมุมกับลำตัวในท่านั่ง 
        หรือ 45 องศาในท่านอนหงายและสามารถคงไว้ในตำแหน่ง
        ที่ต้องการได้เพียงครู่เดียวไม่ถึง 10 วินาที 
        โดยที่แขนไม่ตกลงบนเตียง">
    </li>
    <li>
        <input type="button" class="6" onclick="changeBackgroundColor7(event, 'lightblue', 2, 'score7')" 
        value=" 2 = ยกแขนขึ้นได้บ้างแต่ไม่ถึงหรือไม่สามารถคงไว้ใน
        ตำแหน่งที่ต้องการได้ จากนั้นแขนตกลงบนเตียง">
    </li>
    <li>
        <input type="button" class="6" onclick="changeBackgroundColor7(event, 'lightblue', 3, 'score7')" value=" 3 = ไม่สามารถยกแขนขึ้นได้">
    </li>
    <li>
        <input type="button" class="6" onclick="changeBackgroundColor7(event, 'lightblue', 4, 'score7')" value=" 4 = ไม่มีการเคลื่อนไหวของกล้ามเนื้อแขน">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score7">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor7')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor7');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score7 = localStorage.getItem('score7') ? parseInt(localStorage.getItem('score7')) : 0;
    document.getElementById('score7').textContent = score7;

    function changeBackgroundColor7(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score7 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score7').textContent = score7;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score7', score7);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor7', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice7 li input[type="button"]');
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
