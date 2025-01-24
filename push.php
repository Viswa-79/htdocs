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
        function requestNotificationPermission() {
            if ("Notification" in window) {
                Notification.requestPermission().then(function (permission) {
                    if (permission === "granted") {
                        console.log("Notification permission granted.");
                    } else if (permission === "denied") {
                        console.log("Notification permission denied.");
                    } else {
                        console.log("Notification permission dismissed.");
                    }
                }).catch(function (error) {
                    console.error("Notification permission request failed:", error);
                });
            } else {
                console.log("This browser does not support notifications.");
            }
        }

        function showNotification() {
            if (Notification.permission === "granted") {
                const options = {
                    body: "This is a test notification"
                };
                const notification = new Notification("Hello! JK", options);
                console.log("Notification shown:", notification);
            } else {
                console.log("Notification permission is not granted.");
            }
        }

        document.getElementById("notifyBtn").addEventListener("click", function() {
            console.log("Button clicked");
            showNotification();
        });

        window.onload = requestNotificationPermission;
    </script>
</body>
</html>
