<?php
require 'connection_db.php';
session_start();
    if (!isset($_SESSION['admin_email']) ||(trim ($_SESSION['admin_email']) == '')) {
        header('location: login-admin.php');
       }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- Header Section -->
    <header id="header">
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <div class="nav-bar">
            <a href="#user-list" class="nav-item">users</a>
            <a href="#feedback-review" class="nav-item">Review Feedback</a>
            <a href="login-admin.php" class="logout-admin">Logout</a>
        </div>
    </header>

    <!-- Main Body Section -->
    <section id="main">

        <!-- User Details Block -->
        <div id="user-list">
            <h2>User's Information</h2><br>

            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = mysqli_query($conn, "SELECT * FROM user_info ORDER BY id DESC");
                    foreach ($rows as $row) :
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["user_name"] ?></td>
                        <td><?php echo $row["user_email"] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Feedback Review Block -->
        <div id="feedback-review">
            <h2>Feedback</h2><br>
            
            <?php
                 $rows = mysqli_query($conn, "SELECT * FROM user_feedback ORDER BY id DESC");
                 foreach ($rows as $row) :
                ?>
            <div class="review-fb">
                <div class="user-det">
                    <h4><?php echo $row["user_name"] ?></h4>
                    <p><?php echo $row["user_email"] ?></p>
                </div>
                <div class="user-msg">
                    <p><?php echo $row["user_message"] ?></p>
                </div>
            </div><br><br>
            
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
