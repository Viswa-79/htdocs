<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Compression and Upload</title>
</head>
<body>
    <h1>Upload and Compress Images</h1>
    <form id="uploadForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <input type="file" id="imageInput" name="images[]" multiple>
        <button type="button" id="compressBtn">Compress Images</button>
        <button type="submit" id="submitBtn" disabled>Submit</button>
    </form>
    <div id="progress"></div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const compressBtn = document.getElementById('compressBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressDiv = document.getElementById('progress');

        compressBtn.addEventListener('click', async () => {
            const files = imageInput.files;
            if (files.length > 0) {
                const formData = new FormData();
                Array.from(files).forEach(file => {
                    formData.append('images[]', file);
                });
                try {
                    const response = await fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
                        method: 'POST',
                        body: formData
                    });
                    if (response.ok) {
                        const data = await response.json();
                        if (data.success) {
                            progressDiv.textContent = `Compression Completed: ${data.images.length} images compressed`;
                            submitBtn.disabled = false;
                        } else {
                            alert('Image upload failed.');
                        }
                    } else {
                        alert('Image upload failed.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Image upload failed.');
                }
            } else {
                alert('Please select images to compress.');
            }
        });
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images'])) {
        require_once 'vendor/autoload.php'; // Include the Composer autoloader
        // Intervention\Image\ImageManagerStatic as Image;

        $total = count($_FILES['images']['name']);
        for ($i = 0; $i < $total; $i++) {
            $fileTmpPath = $_FILES['images']['tmp_name'][$i];
            $fileName = $_FILES['images']['name'][$i];

            // Compress the image
            $compressedImage = Image::make($fileTmpPath)->encode('jpg', 70); // Adjust quality as needed (70 is just an example)

            // Save the compressed image to the database
            $pdo = new PDO('mysql:host=localhost;dbname=cradence', 'root', '');
            $stmt = $pdo->prepare("INSERT INTO image (image) VALUES (:image)");
            $stmt->bindParam(':image', $compressedImage->stream()->__toString());
            $stmt->execute();
        }
        echo '<script>document.getElementById("submitBtn").disabled = false;</script>';
        echo '<script>document.getElementById("progress").textContent = "Compression Completed: ' . $total . ' images compressed";</script>';
    }
    ?>
</body>
</html>
