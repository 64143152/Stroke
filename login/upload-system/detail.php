<?php
include_once '../../dbConfig_2.php';

$article_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$conn = $db2;

if ($article_id > 0) {
    $sql = "SELECT * FROM tb_article WHERE article_id = $article_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $article_topic = $row['article_topic'];
        $article_short = $row['article_short'];
        $article_detail = $row['article_detail'];
        $video_sql = "SELECT * FROM tb_stoke_vdo WHERE article_id = $article_id";
        $video_result = $conn->query($video_sql);
        $video = $video_result->fetch_assoc();
        // $video_id = $video['stoke_vdo_url'].split("https://www.youtube.com/watch?v=")[1];
        $video_id = explode('/watch?v=', $video['stoke_vdo_url'])[1];
        // $pdf_url = $row['pdf_url'];
        $pdf_sql = "SELECT * FROM tb_stoke_file WHERE article_id = $article_id";
        $pdf_result = $conn->query($pdf_sql);
        $pdf = $pdf_result->fetch_assoc();

        $imageURL = 'http://fighter.nstroke.com/uploads/'.$row['article_img'];
    } else {
        echo "No article found.";
        exit;
    }
} else {
    echo "Invalid article ID.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article_topic); ?></title>
    <link rel="stylesheet" href="article.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .article-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .article-header h1 {
            font-size: 2em;
            color: #2c3e50;
            margin: 0;
        }
        .article-short {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #34495e;
            margin: auto;
            text-align: center;
        }
        .article-detail {
            line-height: 1.8;
            margin-bottom: 30px;
        }
        .video-container, .pdf-container {
            margin: 20px 0;
            padding: 10px;
            background-color: #ecf0f1;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
        }
        .video-container iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 4px;
        }
        .pdf-container a {
            display: inline-block;
            padding: 10px 15px;
            color: #fff;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .pdf-container a:hover {
            background-color: #2980b9;
        }
        .pdf-container i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <?php
    include_once 'navbar.php';
    ?>
    <div class="container">
        <div class="article-header">
            <h1><?php echo htmlspecialchars($article_topic); ?></h1>
        </div>
        <div class="article-short">
            <img src="<?php echo htmlspecialchars($imageURL); ?>" alt="Article Image">
            
        </div>
        <div class="article-detail">
            <?php echo nl2br($article_detail); ?>
        </div>
        
        <?php if (!empty($video['stoke_vdo_url'])): ?>
        <div class="video-container">
            <h2>Watch Video</h2>
            <iframe src="<?php echo 'https://www.youtube.com/embed/'.$video_id.''; ?>" allowfullscreen></iframe>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($pdf['stoke_file_pdf'])): ?>
        <div class="pdf-container">
            <h2>Download PDF</h2>
            <a target="_blank" href="<?php echo 'http://fighter.nstroke.com/uploads/pdf/'.$pdf['stoke_file_pdf'].''; ?>" download>
                <i class="fa fa-file-pdf-o"></i> Download PDF
            </a>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
