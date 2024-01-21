<?php
include('connection_db.php');
$total_files = "";

$user_identify = $_SESSION['user_id'];
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM user_files WHERE user_identify = '$user_identify' ORDER BY id DESC");
      $total_files = mysqli_num_rows($rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="user-profile-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- PROFILE SECTION -->
    <div id="profile">

        <!-- Profile block -->
        <div class="profile-block">
            <h2>My Profile</h2>

            <!-- Profile Image -->
            <div class="profile-img">
                <img src="user.jpg" alt="" class="user-img">
            </div>

            <!-- Profile Username -->
            <h1 class="username"><?php echo $_SESSION["username"]; ?></h1>

            <!-- Profile Email Address -->
            <p class="email"><?php echo $_SESSION["email"]; ?></p>
        </div>

        <!-- Profile Navigation Block -->
        <div class="profile-nav">

            <!-- Main Menu -->
            <div class="menu-bar">

                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-o" aria-hidden="true"></i>
                            <span><?php echo $total_files; ?> Document(s)</span>
                        </a>
                    </li>
                    <li>
                        <?php 
                        $email = $_SESSION["email"];
                        $sql = "SELECT * FROM user_info WHERE user_email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if ($user){
                            
                        ?>
                        <a href="update-profile.php?<?php echo $user['user_email']  ?>">
                            <i class="fa fa-braille" aria-hidden="true"></i>
                            <span>Manage Account</span>
                        </a>
                        <?php
                        }
                        ?>
                    </li>
                    <li>
                        <a href="privacy-policy.php">
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- SUPPORT AND LOGOUT (Additional Links) -->
        <div class="additional-links">

            <!-- Main Menu -->
            <div class="menu-bar">

                <ul>
                    <li>
                        <a href="support.php">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            <span>Support</span>
                        </a>
                    </li>
                    <li>
                        <a href="login-user.php" class="logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</body>
</html>