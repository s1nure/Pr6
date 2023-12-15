<?php

class FileController {
    private $uploadDir = 'files/';

    public function uploadFile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedFile = $_FILES['file']['name'];
            $uploadPath = $this->uploadDir . $uploadedFile;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)) {
                echo "File uploaded successfully!";
            } else {
                echo "Error uploading file.";
            }
        }
    }

    public function checkFile() {
        $filename = $_POST['filename'];
        $fileformat = $_POST['fileformat'];
        $filePath = $this->uploadDir . "$filename.$fileformat";

        if (file_exists($filePath)) {
            echo "File exists on the server.";
        } else {
            echo "File does not exist on the server.";
        }
    }

   public function deleteFile() {
    if (isset($_GET['filename'])) {
        $filename = $_GET['filename'];

        if (!empty($filename)) {
            $filePath = $this->uploadDir . $filename;

            if (file_exists($filePath)) {
                unlink($filePath);
                echo "File deleted successfully.";
            } else {
                echo "File not found.";
            }
        } else {
            echo "Filename is empty.";
        }
    } else {
        echo "Filename not provided.";
    }
}


    public function showFileList() {
        $files = scandir($this->uploadDir);

        echo "<h2>File List</h2>";
        echo "<table border='1'>";
        echo "<tr><th>File Name</th><th>Delete</th></tr>";

        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                echo "<tr><td>$file</td><td><a href='index.php/File/deleteFile?filename=$file'>Delete</a></td></tr>";
            }
        }

        echo "</table>";
    }
}

?>
