<?php
// staring the session
session_start();
?>
<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- styling content -->
    <style>
        img {
            width: 400px;
            height: 350px;
            display: flex;
        }

        .main {
            padding: 0px 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .main__span {
            display: block;
            margin: 10px;
        }
    </style>
</head>

<body>
    <!-- content section -->
    <h1>Image gallery</h1>
    <p>This Page displays the list of uploaded image</p>
    <button id="button">Upload More</button>
    <form action="#" method="POST" id="form" enctype="multipart/form-data">
        <br>
        <label for="">Select Image</label>
        <input type="file" name="img"><br>
        <input type="submit" name="submit" value="submit">
        <br><br><br>
    </form>
</body>
<script src="./JS/script.js"></script>

</html>
<?php
//creating the array for only first time
if (!isset($_SESSION['gallery'])) {
    $_SESSION['gallery'] = array();
}
if (isset($_POST['submit'])) {
    if (isset($_FILES['img'])) {
        $imgvalue = $_FILES['img'];
        //checking the img is valid or not
        if ($imgvalue['size'] > 0) {
            $target_dir = "photos/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file); //moving temp location to a specified folder
            array_push($_SESSION['gallery'], $imgvalue['name']);
            echo "File Uploaded Sussessfully";
        } else {
            echo "Please select valid file";
        }
    } else {
        echo "file not set";
    }
}
//pring the values
echo "<div class='main'>";
foreach ($_SESSION['gallery'] as $key => $value) {
    echo "<span class='main__span'><img src='./photos/$value' alt='image not found'>$value</span>";
}
echo "</div>";
?>
<br><br><br>
<!-- link for destroying the session -->
<a href="destroy.php">Destroy Session</a>