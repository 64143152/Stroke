<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Background Color - 6</title>
<style>
    body {
        transition: background-color 0.3s ease; 
    }

    .choice6 {
        list-style: none;
    }

    .choice6 li {
        margin-top: 0.5rem;
    }

    .choice6 li input {
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: auto;
        margin-top: 1rem;
    }

    .choice6 li input:hover {
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice6 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice6 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>4. การเคลื่อนไหวของกล้ามเนื้อใบหน้า (Facial Palsy)</h4> 
    <h6>โดยมีคะแนน 0-3 คะแนน</h6>
</div>

<ul class="choice6">
    <li>
        <input type="button" class="5" onclick="changeBackgroundColor6(event, 'lightblue', 0, 'score6')" value=" 0 = ไม่พบมีอาการอ่อนแรงของกล้ามเนื้อใบหน้า 
        สามารถเคลื่อนไหวกล้ามเนื้อใบหน้าได้เป็นปกติ">
    </li>
    <li>
        <input type="button" class="5" onclick="changeBackgroundColor6(event, 'lightblue', 1, 'score6')" value=" 1 = กล้ามเนื้อใบหน้าอ่อนแรงเล็กน้อย 
        พอสังเกตเห็นมุมปากตก 
        หรือไม่เท่ากันเมื่อยิ้ม">
    </li>
    <li>
        <input type="button" class="5" onclick="changeBackgroundColor6(event, 'lightblue', 2, 'score6')" value=" 2 = กล้ามเนื้อใบหน้าอ่อนแรงมาก 
        แต่ยังพอเคลื่อนไหวกล้ามเนื้อได้บ้าง">
    </li>
    <li>
        <input type="button" class="5" onclick="changeBackgroundColor6(event, 'lightblue', 3, 'score6')" value=" 3 = ไม่สามารถเคลื่อนไหวกล้ามเนื้อใบหน้าในข้างใด
        หรือทั้ง 2 ข้างได้เลย">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style="text-align: center;">คะแนน : <span id="score6">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor6')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor6');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score6 = localStorage.getItem('score6') ? parseInt(localStorage.getItem('score6')) : 0;
    document.getElementById('score6').textContent = score6;

    function changeBackgroundColor6(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score6 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score6').textContent = score6;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score6', score6);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor6', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice6 li input[type="button"]');
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
