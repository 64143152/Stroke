<?php
session_start();
include_once 'dbConfig.php'; // Include your database configuration file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $section = $_POST["section"];
    $content = $_POST["content"];
    
    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["video"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('mp4');
    
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFilePath)) {
            // Insert video file details into database
            $insert = $db->query("INSERT INTO videos (file_name, section, content) VALUES ('$fileName', '$section', '$content')");
            if ($insert) {
                echo "The file $fileName has been uploaded successfully.";
                // Redirect to a success page or back to the upload form
                header("Location: video.php");
                exit();
            } else {
                echo "Error: " . $db->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only MP4 files are allowed.";
    }
}
?>
