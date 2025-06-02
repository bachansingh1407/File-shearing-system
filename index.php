<?php
    session_start();
    if (!isset($_SESSION['email']) ||(trim ($_SESSION['email']) == '')) {
        header('location: login-user.php');
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Panel</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="toggle-menu-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>
</head>
<body>
    
    <!-- Main Conatainer -->
    <div id="main-container">

        <!-- SIDEBAR SECTION -->
        <div id="sidebar-container">
            <?php include("sidebar.php"); ?>
        </div>

        <!-- BODY SECTION -->
        <div id="body-container">

            <!-- BODY CONTENT -->
            <div id="body-content">

                <!-- BODY HEAD CONTENT -->
                <div id="body-head">

                    <!-- HEADER BLOCK -->
                    <header class="header">
                        <div class="header-content">
                            <div class="hc-left">
                            <!-- Menu Toggle Button -->
                            <div class="toggle-btn">  
                                <a href="#" onclick="toggleMenu()" class="menu-toggle-btn"><i class="fa fa-bars" aria-hidden="true"></i></a>

                                <div class="sub-menu-wrap">
                                    <div class="sub-menu" id="sub-menu">
                                        <div class="user-info">
                                            <img src="user.jpg" alt="">
                                            <h4><?php echo $_SESSION['username']; ?></h4>
                                        </div>
                                        <hr>
                                        <div class="sub-menu-link">
                                            <a href="index.php" alt="">
                                                <i class="fa fa-home left-icon" aria-hidden="true"></i>
                                                <p>Home</p>
                                                <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                        <div class="sub-menu-link">
                                            <a href="sidebar.php" alt="">
                                                <i class="fa fa-align-right left-icon" aria-hidden="true"></i>
                                                <p>Main Menu</p>
                                                <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                        <div class="sub-menu-link">
                                            <a href="login-user.php" alt="">
                                                <i class="fa fa-sign-out left-icon" aria-hidden="true"></i>
                                                <p>Logout</p>
                                                <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Block Content -->
                            <div class="hc-left-inner">
                                <h2>Dashboard</h2>
                                <p>
                                <script>
                                    var date = new Date();
                                    var day = date.getDate();
                                    var year = date.getFullYear();
                                    var month = date.getMonth() + 1;
                                    document.write( day + "," + month + "," + year);
                                </script>
                                </p>
                            </div>
                            </div>

                            <?php $generatelink = 'localhost/documo/access-files.php?id=' .$_SESSION["user_id"]; ?>
                            <!-- Genrate Link -->
                            <div class="link-generate">
                                <a href="#" onclick="copyToClipboard('<?php echo $generatelink; ?>')">
                                    <i class="fa fa-share" aria-hidden="true"></i>
                                    <span> Generate link</span>
                                </a>
                            </div>

                            <script>
                                function copyToClipboard(text) {
                                    var dummy = document.createElement("textarea");
                                    document.body.appendChild(dummy);
                                    dummy.value = text;
                                    dummy.select();
                                    document.execCommand("copy");
                                    document.body.removeChild(dummy);
                                    alert("Link is Generated");
                                }
                            </script>
                        </div>
                    </header>
                </div>

                <!-- BODY INNER CONTENT -->
                <div id="body-inner">
                    <?php include("dashboard.php"); ?>
                </div>
            </div>

            <!-- PROFILE CONTENT -->
            <div id="profile-content">
                <?php include("user-profile.php"); ?>
            </div>
        </div>


    </div>
</body>
</html>
