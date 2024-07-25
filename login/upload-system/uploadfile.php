<?php 
    session_start();
    include_once 'dbConfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่ทบทความ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .note {
            font-size: 14px;
            color: #777;
        }

        .border-dashed {
            border-style: dashed;
            border-width: 2px;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
            border-color: #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1>เพิ่ทบทความ</h1>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="border-dashed">
                        <h6 class="my-2">Select image file to upload</h6>
                        <input type="file" name="file" class="form-control" accept="image/gif, image/jpeg, image/png">
                        <p class="note my-2"><b>Note:</b> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                    </div>
                
                    <div class="form-group mt-3">
                        <label>Section</label>
                        <input type="text" name="section" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Upload" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
