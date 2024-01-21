<?php
    session_start();
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
    <style>
        #heading h2{
            padding-left:20px;
        }
        /* Upcoming Vrsion Summary */
        .upcoming-summary{
            width:100%; height:480px;
            padding:20px 40px;
            overflow: scroll;
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow-y: scroll;
            margin-top:10px;
            text-align: justify;
        }
        .upcoming-summary::-webkit-scrollbar{
            display: none;
        }
</style>
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
                                            <h4><?php echo $_SESSION["username"]; ?></h4>
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
                                <p><script>
                                    var date = new Date();
                                    var day = date.getDate();
                                    var year = date.getFullYear();
                                    var month = date.getMonth() + 1;
                                    document.write( day + "," + month + "," + year);
                                </script></p>
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

                    <!-- Dashboard Body Content -->
                    <div class="dashboard-body" id="heading">
                        <h2>Upcoming Version: Embracing a Secure and Limitless Future</h2>

                        <!-- Upcoming Version Summanry -->
                        <div class="upcoming-summary">
                            <p>In the upcoming version of our web application, we are focused on creating a secure platform 
                                for seamless file and document sharing between organizations, companies, and departments. 
                                Our vision is to provide a robust and safe environment where users can share files with 
                                controlled and limited access. This update will introduce enhanced security measures, 
                                enabling stricter document access limitations. Our goal is to ensure a secure and 
                                fortified space for users to collaborate and exchange information, reinforcing the 
                                trust and confidentiality of shared documents.
                            </p><br>
                            <h4>What to Expect</h4><br>
                            <p><i>Enhanced Security Measures:</i><br>
                                We are intensifying document access limitations with 
                                advanced security protocols to fortify data integrity and confidentiality. 
                                Expect robust encryption and access controls that ensure only authorized personnel 
                                can interact with designated files.<br><br>
                                
                                <i>Streamlined User Protection:</i><br>
                                Our commitment extends to creating a more secure 
                                environment for all users. Multi-layered authentication and cutting-edge security 
                                features will be integrated to safeguard user data and interactions within the 
                                platform.<br><br>

                                <i>Seamless Collaboration:</i><br> 
                                Embrace a future where collaboration knows no bounds. 
                                Our aim is to foster seamless, yet secure, interaction among diverse entities, 
                                enabling efficient collaboration while upholding data protection and privacy.<br><Br>

                                Join us on this journey toward a future where secure file sharing is the norm, 
                                and access to sensitive information is meticulously controlled. This upcoming 
                                version signifies our unwavering dedication to pioneering a safer and more 
                                interconnected digital landscape for all.
                            </p>
                        </div>
                    </div>
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