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

    .choice3{
        list-style: none;
    }

    .choice3 li{
        margin-top: 0.5rem;
    }

    .choice3 li input{
        text-decoration: none;
        color: #000000;
        font-size: 18px;
        background-color: rgb(255, 255, 255);
        border-radius: 13%;
        width: 550px;
        height: 70px;
        margin-top: 1rem;
        }

    .choice3  li input:hover{
        background-color: #15c492;
        color: #ffffff;
        transform: all .3s;
        padding: 15px 50px;
        border-radius: 13%;
    }

    .choice3 li input {
        background-color: #ffffff; 
        color: #000000; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        margin: 1px; 
    }
    
    .choice3 li input.clicked {
        background-color: #15c492; 
        color: #ffffff; 
    }
</style>
</head>
<body>

<div class="itemone-con-con">
    <h4>1c. หลับตา-ลืมตา และกำมือ คลายมือข้างที่ไม่เป็นอัมพาตได้หรือไม่ (LOC Commands)</h4> 
    <h6>โดยมีคะแนน 0-2 คะแนน</h6>
</div>

<ul class="choice3">
    <li>
        <input type="button" class="2" onclick="changeBackgroundColor3(event, 'lightblue', 0, 'score3')" value=" 0 = ทำได้ถูกต้องทั้ง 2 อย่าง">
    </li>
    <li>
        <input type="button" class="2" onclick="changeBackgroundColor3(event, 'lightblue', 1, 'score3')" value=" 1 = ทำได้ถูกต้องเพียงอย่างเดียว">
    </li>
    <li>
        <input type="button" class="2" onclick="changeBackgroundColor3(event, 'lightblue', 2, 'score3')" value=" 2 = ไม่ทำตามคำสั่ง หรือทำไม่ถูกต้อง">
    </li>
</ul>

<!-- Element เพื่อแสดงคะแนน -->
<p style ="text-align: center;">คะแนน : <span id="score3">0</span></p>

<script>
    // ตรวจสอบว่ามีข้อมูลสีพื้นหลังที่เก็บไว้ใน localStorage หรือไม่
    if (localStorage.getItem('backgroundColor3')) {
        document.body.style.backgroundColor = localStorage.getItem('backgroundColor3');
    }

    // ตรวจสอบว่ามีข้อมูลคะแนนที่เก็บไว้ใน localStorage หรือไม่
    let score3 = localStorage.getItem('score3') ? parseInt(localStorage.getItem('score3')) : 0;
    document.getElementById('score3').textContent = score3;

    function changeBackgroundColor3(event, color, points, scoreId) {
        event.preventDefault(); // หยุดการโหลดหน้าใหม่จากลิงก์

        // อัปเดตคะแนน
        score3 = points;

        // อัปเดตคะแนนที่แสดงใน HTML
        document.getElementById('score3').textContent = score3;

        // บันทึกคะแนนลงใน localStorage
        localStorage.setItem('score3', score3);

        // เปลี่ยนสีพื้นหลังของ body
        document.body.style.backgroundColor = color;

        // เก็บสีพื้นหลังลงใน localStorage
        localStorage.setItem('backgroundColor3', color);

        // รีเซ็ตสีของทุกปุ่มที่ไม่ได้ถูกคลิก
        const buttons = document.querySelectorAll('.choice3 li input[type="button"]');
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
