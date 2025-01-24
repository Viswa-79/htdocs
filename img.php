<!DOCTYPE html>
<html>
<head>
  <title>Image Compression</title>
</head>
<body>
  <input type="file" id="fileInput" accept="image/*">
  <button onclick="compressAndSave()">Compress and Save</button>
  <br>
  <img id="originalImage" src="" style="max-width: 400px;">
  <br>
  <img id="compressedImage" src="" style="max-width: 400px;">
  
  <script>
    async function compressAndSave() {
      const fileInput = document.getElementById('fileInput');
      const originalImage = document.getElementById('originalImage');
      const compressedImage = document.getElementById('compressedImage');
      
      const file = fileInput.files[0];
      const reader = new FileReader();
      
      reader.onload = function(e) {
        const image = new Image();
        image.src = e.target.result;
        originalImage.src = e.target.result;
        
        image.onload = function() {
          const canvas = document.createElement('canvas');
          const ctx = canvas.getContext('2d');
          canvas.width = image.width;
          canvas.height = image.height;
          
          ctx.drawImage(image, 0, 0);
          
          canvas.toBlob(async function(blob) {
            const compressedFile = new File([blob], file.name, {
              type: 'image/jpeg', // You can change the type as per your requirement
              lastModified: Date.now()
            });
            
            const formData = new FormData();
            formData.append('file', compressedFile);
            
            // Send the compressed file to the server
            fetch('/upload', {
              method: 'POST',
              body: formData
            })
            .then(response => {
              if (response.ok) {
                console.log('Image saved successfully!');
              } else {
                console.error('Failed to save image.');
              }
            })
            .catch(error => {
              console.error('Error:', error);
            });
            
            const compressedDataURL = URL.createObjectURL(compressedFile);
            compressedImage.src = compressedDataURL;
          }, 'image/jpeg', 0.7); // Adjust the quality (0.7 is 70%)
        }
      };
      
      reader.readAsDataURL(file);
    }
  </script>
</body>
</html>
<script>
   const express = require('express');
const app = express();
const fs = require('fs');
const bodyParser = require('body-parser');
const multer = require('multer');

// Multer configuration
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, './photos/'); // Save compressed images to 'photos' folder
  },
  filename: function (req, file, cb) {
    cb(null, file.originalname);
  }
});
const upload = multer({ storage: storage });

app.use(bodyParser.urlencoded({ extended: true }));

// Serve HTML file
app.get('/', function(req, res) {
  res.sendFile(__dirname + '/index.html');
});

// Handle image upload
app.post('/upload', upload.single('file'), function(req, res) {
  if (!req.file) {
    return res.status(400).send('No files were uploaded.');
  }
  res.send('File uploaded successfully.');
});

const port = 3000;
app.listen(port, function() {
  console.log(`Server is running on port ${port}`);
});


     </script>
