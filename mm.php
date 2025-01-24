<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Push Notifications</title>
</head>
<body>
    <button id="notifyBtn">Show Notification</button>
    <script>
        // Function to request notification permission
        function requestNotificationPermission() {
            if ("Notification" in window) {
                Notification.requestPermission().then(function (permission) {
                    if (permission === "granted") {
                        console.log("Notification permission granted.");
                    } else {
                        console.log("Notification permission denied.");
                    }
                });
            } else {
                console.log("This browser does not support notifications.");
            }
        }

        // Function to show a notification
        function showNotification() {
            if (Notification.permission === "granted") {
                const options = {
                    body: "This is a test notification",
                    icon: "icon.png" // Optional: path to an icon image
                };
                new Notification("Hello!", options);
            } else {
                console.log("Notification permission is not granted.");
            }
        }

        // Event listener for the button to show a notification
        document.getElementById("notifyBtn").addEventListener("click", function() {
            showNotification();
        });

        // Request notification permission on page load
        window.onload = requestNotificationPermission;
    </script>
</body>
</html>