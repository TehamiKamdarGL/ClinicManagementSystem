<?php
if(isset($_FILES['image'])){
    $image = $_FILES['image'];

    print_r($image);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./demo.php" method="post">
        <input type="file" name="image" id="">
        <button type="Submit" name="btn">Upload</button>
    </form>
</body>
</html>