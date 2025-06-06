<!DOCTYPE html>
<html>
 
<head>
    <title>
        How to use web share API for native 
        share options in HTML and JavaScript?
    </title>
</head>
 
<body style="text-align: center;">
    <h1 style="color: green;">GeeksforGeeks</h1>
 
    <h2>Web Share API Demonstration</h2>
 
    <button id="shareBtn">Share</button>
 
    <script>
        document.querySelector('#shareBtn')
        .addEventListener('click', event => {
 
            // Fallback, Tries to use API only
            // if navigator.share function is
            // available
            if (navigator.share) {
                navigator.share({
 
                    // Title that occurs over
                    // web share dialog
                    title: 'GeeksForGeeks',
 
                    // URL to share
                    url: 'https://geeksforgeeks.org'
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(err => {
 
                    // Handle errors, if occurred
                    console.log(
                    "Error while using Web share API:");
                    console.log(err);
                });
            } else {
 
                // Alerts user if API not available 
                alert("Browser doesn't support this API !");
            }
        })
    </script>
</body>
 
</html>