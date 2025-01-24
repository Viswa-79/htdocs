<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get IP and Browser Info</title>
</head>
<body>
    <h1>Device Info</h1>
    <div id="info"></div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['ip'])) {
            $ipAddress = $data['ip'];

            $dbHost = 'localhost'; // Your MySQL host
            $dbUsername = 'root'; // Your MySQL username
            $dbPassword = ''; // Your MySQL password
            $dbName = 'cradence'; // Your MySQL database name

            // Create database connection
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            // Save IP address in the database
            $stmt = $conn->prepare('INSERT INTO login (ip_address) VALUES (?)');
            $stmt->bind_param('s', $ipAddress);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => $stmt->error]);
            }

            // Close database connection
            $stmt->close();
            $conn->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'IP address not set']);
        }
        exit;
    }
    ?>

    <script>
        // Function to get browser information
        function getBrowserInfo() {
            return {
                userAgent: navigator.userAgent,
                appName: navigator.appName,
                appVersion: navigator.appVersion,
                platform: navigator.platform,
                language: navigator.language,
            };
        }

        // Function to get the IP address using an external API
        async function getIPAddress() {
            try {
                const response = await fetch('https://api.ipify.org?format=json');
                const data = await response.json();
                return data.ip;
            } catch (error) {
                console.error('Error fetching IP address:', error);
                return 'Unavailable';
            }
        }

        // Function to display the information
        async function displayInfo() {
            const browserInfo = getBrowserInfo();
            const ipAddress = await getIPAddress();

            // Send IP address to the server
            await saveIPAddress(ipAddress);

            const infoDiv = document.getElementById('info');
            infoDiv.innerHTML = `
                <p><strong>IP Address:</strong> ${ipAddress}</p>
                <p><strong>Browser Info:</strong></p>
                <ul>
                    <li><strong>User Agent:</strong> ${browserInfo.userAgent}</li>
                    <li><strong>App Name:</strong> ${browserInfo.appName}</li>
                    <li><strong>App Version:</strong> ${browserInfo.appVersion}</li>
                    <li><strong>Platform:</strong> ${browserInfo.platform}</li>
                    <li><strong>Language:</strong> ${browserInfo.language}</li>
                </ul>
            `;
        }

        // Function to send IP address to the server
        async function saveIPAddress(ip) {
            try {
                await fetch('', { // Empty URL as it's the same PHP file
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ ip: ip })
                });
            } catch (error) {
                console.error('Error saving IP address:', error);
            }
        }

        // Call the displayInfo function when the page loads
        window.onload = displayInfo;
    </script>
</body>
</html>
