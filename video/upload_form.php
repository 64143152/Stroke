<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
    <link rel="stylesheet" href="upload_form.css">
</head>
<body><center>
    <div class="header">
    <h2>Upload Video</h2>
    </div>
    <br><br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="section">Section:</label><br>
        <input type="text" id="section" name="section" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>
        
        <label for="video">Select video to upload:</label><br>
        <input type="file" id="video" name="video" accept="video/mp4"><br><br>
        
        <input type="submit" value="Upload" name="submit">
    </form>
    </center>
</body>
</html>
