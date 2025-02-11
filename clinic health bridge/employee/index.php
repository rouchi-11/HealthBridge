<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login Success</title>
    <style>
        /* Style for the success notification */
        .notification {
            display: none;  /* Hidden by default */
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            opacity: 0;
            animation: fadeInOut 3s ease-in-out forwards;
        }

        /* Animation for showing and hiding the notification */
        @keyframes fadeInOut {
            0% {
                opacity: 0;
                top: 10px;
            }
            30% {
                opacity: 1;
                top: 20px;
            }
            100% {
                opacity: 0;
                top: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Success Notification -->
    <div id="success-notification" class="notification">
        Patient Login Successful!
    </div>

    <script>
        // Show the success notification when the page loads
        window.onload = function() {
            var notification = document.getElementById("success-notification");
            notification.style.display = "block"; // Make it visible
        }
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Button</title>
</head>
<body>
    <button onclick="logout()">Logout</button>

    <script>
        function logout() {
            // Redirect to the logout.php file
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Animated Text</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding-top: 50px;
        }

        .animated-text {
            font-size: 50px;
            font-weight: bold;
            color: #e74c3c;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 1;
            }
        }

        .tutorial-link {
            margin-top: 20px;
            font-size: 24px;
        }

        .tutorial-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .tutorial-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="animated-text">Read Me Important</div>

    <div class="tutorial-link">
        To get the full tutorial, <a href="https://procoderarifbd.blogspot.com/" target="_blank">click here</a>.
    </div>
    <div class="text">
        <p>Its not a full project. </p><p> You need to purchase by Spend <h3 class="text-success">25$</h3> </p> or you will be done that from playlist Totally free of cost.</p>
    </div>

</body>
</html>
