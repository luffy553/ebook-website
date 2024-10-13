<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['filename'];
    $filePath = 'uploads/' . $file;

    if (file_exists($filePath)) {
        unlink($filePath); // Deletes the file
        echo "File deleted successfully.";
    } else {
        echo "File does not exist.";
    }
}

// Redirect back to admin page after processing
header("Location: admin.html");
exit;
?>
