
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Score Display</title>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: #f0f0f0;
    }

    .score-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-top: 50px;
    }

    h2 {
        color: #333333;
    }

    .score {
        font-size: 24px;
        margin-top: 20px;
    }

    .score a {
        text-decoration: none;
        color: #ffffff;
        font-size: 1.5rem;
        font-weight: bold;
        margin-left: 1rem;
        margin-bottom: 1rem;
        background-color: #0f65c8;
        border-radius: 10%;
        padding: 10px 20px;
        margin-top: 10rem;
    }

    /* Additional styles for severity levels */
    .no-stroke {
        background-color: #4CAF50; /* Green */
    }

    .minor-stroke {
        background-color: #FFEB3B; /* Yellow */
    }

    .moderate-stroke {
        background-color: #FF9800; /* Orange */
    }

    .moderate-severe-stroke {
        background-color: #FF5722; /* Darker Orange */
    }

    .severe-stroke {
        background-color: #D32F2F; /* Red */
    }
</style>
</head>
<body>

<div class="score-container">
    <a href="docter4.php">ย้อนกลับ</a><h2>ผลคะแนน NIHSS</h2>
    <form action="../docter5/docter5.php" method="post">
    <div class="score">
        <p>ผลรวมคะแนน: <span id="totalScore">0</span></p>
        ความรุนแรง:<p id="strokeSeverity"></p>
        <center>
            <!-- Hidden input field to pass total score to next page -->
            <input type="hidden" id="totalScoreInput" name="totalScore" value="0">
            <input class="next" type="submit" style="width:200px; height:100; font-size:25px;" name="next" value="หน้าถัดไป">

        </center>
    </div>
</form>

<script>
    // Function to set total score value before submitting the form
    document.getElementById('totalScoreInput').value = document.getElementById('totalScore').textContent;

    // Retrieve total score from localStorage and calculate
    let score1 = localStorage.getItem('score1') ? parseInt(localStorage.getItem('score1')) : 0;
    let score2 = localStorage.getItem('score2') ? parseInt(localStorage.getItem('score2')) : 0;
    let score3 = localStorage.getItem('score3') ? parseInt(localStorage.getItem('score3')) : 0;
    let score4 = localStorage.getItem('score4') ? parseInt(localStorage.getItem('score4')) : 0;
    let score5 = localStorage.getItem('score5') ? parseInt(localStorage.getItem('score5')) : 0;
    let score6 = localStorage.getItem('score6') ? parseInt(localStorage.getItem('score6')) : 0;
    let score7 = localStorage.getItem('score7') ? parseInt(localStorage.getItem('score7')) : 0;
    let score8 = localStorage.getItem('score8') ? parseInt(localStorage.getItem('score8')) : 0;
    let score9 = localStorage.getItem('score9') ? parseInt(localStorage.getItem('score9')) : 0;
    let score10 = localStorage.getItem('score10') ? parseInt(localStorage.getItem('score10')) : 0;
    let score11 = localStorage.getItem('score11') ? parseInt(localStorage.getItem('score11')) : 0;
    let score12 = localStorage.getItem('score12') ? parseInt(localStorage.getItem('score12')) : 0;
    let score13 = localStorage.getItem('score13') ? parseInt(localStorage.getItem('score13')) : 0;
    let score14 = localStorage.getItem('score14') ? parseInt(localStorage.getItem('score14')) : 0;
    let score15 = localStorage.getItem('score15') ? parseInt(localStorage.getItem('score15')) : 0;

    let totalScore = score1 + score2 + score3 + score4 + score5 + score6 + score7 + score8 + score9 + score10 + score11 + score12 + score13+ score14+ score15;

    // Display total score
    document.getElementById('totalScore').textContent = totalScore;
    document.getElementById('totalScoreInput').value = totalScore;

    // Clear scores stored in localStorage
    localStorage.removeItem('score1');
    localStorage.removeItem('score2');
    localStorage.removeItem('score3');
    localStorage.removeItem('score4');
    localStorage.removeItem('score5');
    localStorage.removeItem('score6');
    localStorage.removeItem('score7');
    localStorage.removeItem('score8');
    localStorage.removeItem('score9');
    localStorage.removeItem('score10');
    localStorage.removeItem('score11');
    localStorage.removeItem('score12');
    localStorage.removeItem('score13');
    localStorage.removeItem('score14');
    localStorage.removeItem('score15');

    // Determine stroke severity based on total score
    if (totalScore === 0) {
        document.getElementById('strokeSeverity').textContent = "No Stroke";
        document.body.style.backgroundColor = "#4CAF50"; // Green background
    } else if (totalScore > 0 && totalScore < 5) {
        document.getElementById('strokeSeverity').textContent = "Minor Stroke";
        document.body.style.backgroundColor = "#FFEB3B"; // Yellow background
    } else if (totalScore >= 5 && totalScore < 16) {
        document.getElementById('strokeSeverity').textContent = "Moderate Stroke";
        document.body.style.backgroundColor = "#FF9800"; // Orange background
    } else if (totalScore >= 16 && totalScore < 21) {
        document.getElementById('strokeSeverity').textContent = "Moderate to Severe Stroke";
        document.body.style.backgroundColor = "#FF5722"; // Darker Orange background
    } else if (totalScore >= 21) {
        document.getElementById('strokeSeverity').textContent = "Severe Stroke";
        document.body.style.backgroundColor = "#D32F2F"; // Red background
    }
    
    sessionStorage.setItem('totalScore', totalScore.toString());
</script>




</body>
</html>
