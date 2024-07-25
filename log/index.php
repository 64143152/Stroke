<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <link rel="stylesheet" href="docter4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to retrieve totalScore from 12.php
            $.ajax({
                url: '12.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Once totalScore is retrieved, store it in a variable
                    var totalScore = data.totalScore;
                    // Now totalScore is available for use
                    console.log('Total Score:', totalScore);
                    // Update the value of the button with totalScore
                    $('.next').val('ดาวน์โหลดคะแนน (' + totalScore + ')');
                },
                error: function() {
                    console.error('Error retrieving totalScore.');
                }
            });
        });

        function downloadText() {
            // Retrieve totalScore from the button value
            var totalScoreText = $('.next').val().split(' ')[1]; // Extract the number from the button value
            // Create a Blob containing the totalScore
            var blob = new Blob([totalScoreText], { type: 'text/plain' });

            // Create an object URL for the Blob
            var url = URL.createObjectURL(blob);

            // Create an <a> element dynamically
            var link = document.createElement('a');
            link.href = url; // Set the object URL as the href attribute
            link.download = 'score.txt'; // Specify the file name

            // Append the link to the body
            document.body.appendChild(link);

            // Trigger the click event of the link
            link.click();

            // Clean up: remove the link and revoke the object URL from memory
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        }
    </script>
</head>

<body>
    <nav>
        <!-- Your navigation code -->
    </nav>

    <section class="ven"></section>

    <section class="hero">
        <!-- Your hero section code -->
    </section>

    <section class="blog">
        <div class="container">
            <!-- Your blog section code -->
            <div class="blog-item-one">
                <!-- Your form section -->
                <form action="" method="post">
                    <div class="itemone">
                        <!-- Your buttons and content -->
                    </div>
                    <center>
                        <!-- Button to trigger downloadText function -->
                        <input class="next" type="button" style="width:200px; height:100; font-size:25px;" onclick="downloadText()">
                    </center>
                </form>
            </div>
        </div>
    </section>

    <div class="footer-top">
        <!-- Your footer-top section code -->
    </div>

    <div class="footer-bottom">
        <!-- Your footer-bottom section code -->
    </div>

</body>

</html>
