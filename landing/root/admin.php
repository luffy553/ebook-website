<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Files</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    <main>
        <section id="upload">
            <h2>Upload File</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
                <input type="file" name="file" required>
                <button type="submit">Upload</button>
            </form>
            <div id="uploadMessage"></div> <!-- To display messages -->
        </section>
        
        <script>
            document.getElementById('uploadForm').addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission
        
                const formData = new FormData(this);
        
                // Optional: Show a loading message
                document.getElementById('uploadMessage').innerHTML = 'Uploading...';
        
                fetch('upload.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Display the server response (success or error message)
                    document.getElementById('uploadMessage').innerHTML = data;
                    // Optionally reset the form
                    this.reset();
                })
                .catch(error => {
                    document.getElementById('uploadMessage').innerHTML = 'An error occurred: ' + error.message;
                });
            });
        </script>
        

        <section id="files">
            <h2>Existing Files</h2>
            <ul id="file-list">
                <?php include 'file-list.php'; ?>
            </ul>
        </section>
    </main>
</body>
</html>
