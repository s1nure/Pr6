<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management</title>
</head>
<body>
    <?php
    include 'controllers/CounterController.php';
    include 'controllers/FileController.php';

    $counterController = new CounterController();

    $File = new FileController();
    ?>

    <h2>Upload File</h2>
    <form action="/Pr6/File/uploadFile" method="post" enctype="multipart/form-data">
        <label for="file">Select File:</label>
        <input type="file" name="file" id="file" required>
        <br>
        <input type="submit" value="Upload">
    </form>

    <h2>Check File</h2>
    <form action="/Pr6/File/checkFile" method="post">
        <label for="filename">File Name:</label>
        <input type="text" name="filename" id="filename" required>
        <br>
        <label for="fileformat">File Format:</label>
        <input type="text" name="fileformat" id="fileformat" required>
        <br>
        <input type="submit" value="Check">
    </form>


    <?php
    $File->deleteFile(); // Викликаємо функцію видалення без форми
    ?>

    <?php $File->showFileList();
    $counterController->showCounter();
    ?>

</body>
</html>
