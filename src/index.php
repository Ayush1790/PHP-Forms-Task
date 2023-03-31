<!-- task 1 -->
<h1>Task 1 :Electricity Bill</h1>
<form action="index.php" method="GET">
    <input type="number" name="units">
    <br><br>
    <input type="submit" value="Calculate Bill">
</form>
<?php
if (isset($_GET['units'])) {
    $units = $_GET['units'];
    $amt = 0;
    if ($units > 0) {
        if ($units <= 50) {
            $amt = $units * 3.5;
        } elseif ($units <= 150) {
            $amt = 50 * 3.5 + ($units - 50) * 4;
        } elseif ($units <= 250) {
            $amt = 50 * 3.5 + 100 * 4 + ($units - 150) * 5.20;
        } else {
            $amt = 50 * 3.5 + 100 * 4 + 100 * 5.20 + ($units - 250) * 6.50;
        }
        echo "<h2>Your Total bill is $amt</h2>";
    } else {
        echo "The Value must be greater than zero";
    }
}
?>
<hr>
<!-- task 2 -->
<h1>Task 2 :Simple Calculator</h1>
<?php
if ((isset($_GET['first']) && ($_GET['second'])) || ($_GET['first'] >= 0 && $_GET['second'] >= 0)) {
    if ($_GET['first'] == "" || $_GET['second'] == "") {
        echo "Please Fill both values.<br><br>";
    } elseif (isset($_GET['add'])) {
        $res = $_GET['first'] + $_GET['second'];
    } elseif (isset($_GET['sub'])) {
        $res = $_GET['first'] - $_GET['second'];
    } elseif (isset($_GET['mul'])) {
        $res = $_GET['first'] * $_GET['second'];
    } elseif (isset($_GET['div'])) {
        if ($_GET['second'] == 0) {
            echo "Number can not be devide by zero";
        } else {
            $res = $_GET['first'] / $_GET['second'];
        }
    }
}
?>
<form action="#" method="GET">
    <label for="">Number 1:</label>
    <input type="number" name="first"><br><br>
    <label for="">Number 2:</label>
    <input type="number" name="second"><br><br>
    <label for="">Result : </label>
    <input type="number" name="result" disabled id="result" value="<?php echo $res; ?>"><br><br>
    <input type="submit" value="+" name="add">
    <input type="submit" value="-" name="sub">
    <input type="submit" value="*" name="mul">
    <input type="submit" value="/" name="div">
</form>
<hr>
<!-- task 3 -->
<h1>task 3:Area and Perimeter</h1>
<form action="#" method="GET">
    <label for="">Length Of Rectangle</label>
    <input type="number" name="length">mtr <br><br>
    <label for="">Width Of Rectangle</label>
    <input type="number" name="width">mtr <br><br>
    <input type="submit" value="Calculate Area and Perimeter">
</form>
<?php
if (isset($_GET['length']) && ($_GET['width'])) {
    if (($_GET['length'] > 0) && ($_GET['width'] > 0)) {
        echo "Area is " . $_GET['length'] * $_GET['width'] . "Sq. mtr.<br>";
        echo "Perimeter is " . 2 * ($_GET['length'] + $_GET['width']) . "Sq. mtr.<br>";
    } else {
        echo "length and width should be greater then zero.<br>";
    }
} elseif (isset($_GET['length']) || ($_GET['width'])) {
    echo "Please fill both the values.<br>";
}
?>
<hr>
<h1>Task 4 : Conversion</h1>
<form action="#" method="GET">
    <input type="number" name="conversionvValue"><br><br>
    <input type="radio" name="ctype" value="HoursTOMints">Hourse To Mintues
    <br>
    <input type="radio" name="ctype" value="HoursTOSeconds">Hourse To Seconds
    <br><br><input type="submit" value="Convert">
</form>
<?php
if (isset($_GET['conversionvValue'])) {
    if (isset($_GET['ctype']) && $_GET['ctype'] == 'HoursTOMints' && $_GET['conversionvValue'] > 0) {
        echo $_GET['conversionvValue'] . "Hour =" . $_GET['conversionvValue'] * 60 . "Mintues";
    } elseif (isset($_GET['ctype']) && $_GET['ctype'] == 'HoursTOSeconds' && $_GET['conversionvValue'] > 0) {
        echo $_GET['conversionvValue'] . "Hour =" . $_GET['conversionvValue'] * 60 * 60 . "Seconds";
    } else {
        echo "Please select any one of the given option.<br>";
    }
}else{
    echo "please fill value greater then zero";
}
?>
<hr>
<!-- task 5 -->
<h1>Task 5 : Upload Image</h1>
<form action="#" method="POST" enctype="multipart/form-data">
    <label for="">Select Image:</label>
    <input type="file" name="fileUpload" id="fileUpload "><br><br>
    <input type="submit" value="submit" name="submit">
</form>
<?php
if (isset($_FILES['fileUpload'])) {
    $f = $_FILES['fileUpload'];
    if ($f['type'] != "image/png") {
        echo "Image type should be png only.";//for img extension
    } else {
        if ($f['size'] >= 2 * 1024 * 1024) {
            echo "Image size should not exceed 2MB";//for image size
        } else {
            $target_dir = "photos/";
            $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
            move_uploaded_file($f['tmp_name'], $target_file);
            echo "File Uploaded Successfully";
        }
    }
}
?>