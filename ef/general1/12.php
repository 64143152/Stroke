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
        margin-top: 2rem;
        display: inline-block;
        cursor: pointer; /* Add cursor pointer for better UX */
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
    <h2>ผลคะแนน NIHSS</h2>
    <div class="score">
        <p>ผลรวมคะแนน: <span id="totalScore">0</span></p>
        ความรุนแรง: <p id="strokeSeverity"></p>
        <a id="shareEmailButton" onclick="shareViaEmail()" style="background-color: #0f65c8;">แชร์ผลคะแนนผ่านอีเมล</a>
        <a id="shareFacebookButton" onclick="shareToFacebook()" style="background-color: #3b5998;">แชร์ผลคะแนนไปที่ Facebook</a>
        <a id="shareLineButton" onclick="shareToLine()" style="background-color: #00c300;">แชร์ผลคะแนนไปที่ Line</a>
        <a href="javascript:history.back()">ย้อนกลับ</a>
    </div>
</div>

<script>
    // Check if there are scores stored in localStorage
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

    // Calculate total score
    let totalScore = score1 + score2 + score3 + score4 + score5 + score6 + score7 + score8 + score9 + score10 + score11 + score12 + score13;

    // Display total score
    document.getElementById('totalScore').textContent = totalScore;

    // Clear stored scores in localStorage for next use
    for (let i = 1; i <= 13; i++) {
        localStorage.removeItem('score' + i);
    }

    // Determine stroke severity based on total score and set background color
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

    // Function to share score via email
    function shareViaEmail() {
        let textData = `Total Score: ${totalScore}\nStroke Severity: ${document.getElementById('strokeSeverity').textContent}`;
        let shareURL = 'mailto:?subject=Stroke%20Score&body=' + encodeURIComponent(textData);
        window.open(shareURL);
    }

    // Function to share score via Facebook
    // Function to share score via Facebook Messenger
function shareToFacebook() {
    let totalScore = document.getElementById('totalScore').textContent;
    let strokeSeverity = document.getElementById('strokeSeverity').textContent;
    let textData = `ผลคะแนน NIHSS\nผลรวมคะแนน: ${totalScore}\nความรุนแรง: ${strokeSeverity}`;
    
    let shareURL = 'fb-messenger://share?text=' + encodeURIComponent(textData);

    // Open Messenger share dialog
    window.open(shareURL, '_blank');
}


    // Function to share score to Line
    function shareToLine() {
        let textData = `ผลคะแนน NIHSS\nผลรวมคะแนน: ${totalScore}\nความรุนแรง: ${document.getElementById('strokeSeverity').textContent}`;
        let shareURL = 'https://social-plugins.line.me/lineit/share?url=&text=' + encodeURIComponent(textData);

        // Open share dialog
        window.open(shareURL, '_blank');
    }
</script>

</body>
</html>
