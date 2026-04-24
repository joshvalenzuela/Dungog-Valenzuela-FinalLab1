<?php

session_start();

if (!isset($_SESSION['username'])) { //Check for session
    header("Location: index.php");
    exit();
}

date_default_timezone_set("Asia/Manila"); //Setting timezone(Manila used as reference)

$current_datetime = date("F d, Y - h:i A"); // Setting the date with the format: Month Day, Year - Hour:Minute AM/PM

$last_visit = "First time login";  
if (isset($_COOKIE['last_visit'])) { //check for previous visits
    $last_visit = $_COOKIE['last_visit'];
}

setcookie("last_visit", $current_datetime, time() + 86400, "/"); // store a visit in a cookie, expires in 24hrs
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .logout-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff2720;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .logout-btn:hover {
            background-color: #a00c07;
        } 
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Today is: <?php echo $current_datetime; ?></p>
    <p>Your last visit was: <?php echo $last_visit; ?></p>

    <a href="logout.php" class="logout-btn">Logout</a>

    <hr>
    <h3>Hands-On Activity: Daily Check-In Tracker</h3>
    <p><strong>KISH:</strong> Kirk + Josh .</p>
</body>
</html>
