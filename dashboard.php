<?php
session_start();

if (!isset($_SESSION['user'])) { //Check for session
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dashboard-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }
        .dashboard-container h2 {
            color: #333;
            margin-bottom: 30px;
        }
        .info-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }
        .logout-btn {
            background-color: #ff2720;
        }
        .logout-btn:hover {
            background-color: #a00c07;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
        
        <div class="info-box">
            <p><strong>Today is:</strong> <?php echo $current_datetime; ?></p>
        </div>
        
        <div class="info-box">
            <p><strong>Last Visit:</strong> <?php echo $last_visit; ?></p>
        </div>

        <a href="logout.php" class="btn logout-btn text-white w-100">Logout</a>

        <hr class="my-4">
        <h5>Hands-On Activity: Daily Check-In Tracker</h5>
        <p><strong>KISH:</strong> Kirk + Josh</p>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
