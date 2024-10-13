<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 5000000) { // Limit file size to 5MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (!in_array($fileType, ['jpg', 'png', 'jpeg', 'gif', 'pdf', 'docx'])) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, & DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Redirect back to admin page after processing
header("Location: admin.html");
exit;
?>
