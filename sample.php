<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <form id="uploadForm" action="upload2.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="photo" id="photo">
        <button type="button" id="compressBtn">Compress Image</button>
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <script>
        document.getElementById("compressBtn").addEventListener("click", function() {
            const fileInput = document.getElementById("photo");
            const file = fileInput.files[0];
            if (file) {
                const maxSize = 500; // Maximum width or height for compressed image
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(event) {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = function() {
                        let width = img.width;
                        let height = img.height;
                        if (width > height) {
                            if (width > maxSize) {
                                height *= maxSize / width;
                                width = maxSize;
                            }
                        } else {
                            if (height > maxSize) {
                                width *= maxSize / height;
                                height = maxSize;
                            }
                        }
                        const canvas = document.createElement("canvas");
                        canvas.width = width;
                        canvas.height = height;
                        const ctx = canvas.getContext("2d");
                        ctx.drawImage(img, 0, 0, width, height);
                        const compressedDataUrl = canvas.toDataURL("image/jpeg", 0.7); // JPEG format with 0.7 quality
                        const compressedFile = dataURLtoFile(compressedDataUrl, 'compressed_image.jpg');
                        const formData = new FormData();
                        formData.append('photo', compressedFile);
                        fetch('upload2.php', {
                            method: 'POST',
                            body: formData
                        }).then(response => {
                            if (response.ok) {
                                console.log('Image compressed and saved successfully.');
                            } else {
                                console.error('Failed to save compressed image.');
                            }
                        }).catch(error => {
                            console.error('Error occurred during image compression and save:', error);
                        });
                    };
                };
            }
        });

        function dataURLtoFile(dataurl, filename) {
            const arr = dataurl.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], filename, { type: mime });
        }
    </script>
</body>
</html>
