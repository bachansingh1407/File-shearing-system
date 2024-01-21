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
    <link rel="stylesheet" type="text/css" href="policy-style.css">
    <link rel="stylesheet" type="text/css" href="toggle-menu-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>
</head>
<body>
    
    <!-- Main Conatainer -->
    <div id="main-container">

        <!-- SIDEBAR SECTION -->
        <div id="sidebar-container">
            <?php include("sidebar.php"); ?></div>

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

                    <!-- Privacy Policy Section -->
                    <div class="privacy-policy">
                        <h1>Privacy Policy</h1>

                        <!-- Policy Block -->
                        <div class="policy">
                            <p>This privacy notice for DOCUMO,
                                describes how and why we might collect, store, use, and/or share ("process") 
                                your information when you use our services ("Services"), such as when you:
                                Download and use our mobile application (DOCUMO), or any other application of 
                                ours that links to this privacy notice Engage with us in other related ways, 
                                including any sales, marketing, or events Questions or concerns? Reading this 
                                privacy notice will help you understand your privacy rights and choices. 
                                If you do not agree with our policies and practices, please do not use our Services.
                            </p><br>
                            <h4>Summary</h4><br>
                            <p>This summary provides key points from our privacy notice, but you can find out more 
                                details about any of these topics by clicking the link following each key point or 
                                by using our table of contents below to find the section you are looking for.<br><br>

                                What personal information do we process? When you visit, use, or navigate our Services, we may process personal information depending
                                on how you interact with us and the Services, the choices you make, and the products and features you use. Learn more about personal 
                                information you disclose to us.<br><br>
                                Do we process any sensitive personal information? We do not process sensitive personal information.<br><br>
                                Do we receive any information from third parties? We do not receive any information from third parties.<br><br>
                                How do we process your information? We process your information to provide, improve, and administer our Services,
                                communicate with you, for security and fraud prevention, and to comply with law. We may also process your information 
                                for other purposes with your consent. We process your information only when we have a valid legal reason to do so. 
                                Learn more about how we process your information.<br><br>
                                In what situations and with which parties do we share personal information? We may share information in specific situations and 
                                with specific third parties. Learn more about when and with whom we share your personal information.<br><br>
                                How do we keep your information safe? We have organizational and technical processes and procedures in place to protect 
                                your personal information. However, no electronic transmission over the internet or information storage technology can 
                                be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized 
                                third parties will not be able to defeat our security and improperly collect, access, steal, or modify your information. 
                                Learn more about how we keep your information safe.<br><br>
                                What are your rights? Depending on where you are located geographically, the applicable privacy law may mean 
                                you have certain rights regarding your personal information. Learn more about your privacy rights.<br><br>
                                How do you exercise your rights? The easiest way to exercise your rights is by visiting Documo, or by contacting us. 
                                We will consider and act upon any request in accordance with applicable data protection laws.<br><br>
                                Want to learn more about what we do with any information we collect? Review the privacy notice in full.
                            </p><br><br>
                            <h4>Important Points</h4><br>
                            <p><i>1. WHAT INFORMATION DO WE COLLECT?</i><br>
                                We collect personal information that you voluntarily provide to us when you register on the Services, express 
                                an interest in obtaining information about us or our products and Services, when you participate in activities 
                                on the Services, or otherwise when you contact us. Personal Information Provided by You. 
                                The personal information we collect may include the following:
                                <i>names, phone number, email address, password</i><br>
                                All personal information that you provide to us must be true, complete, and accurate, and you must notify us of 
                                any changes to such personal information.<br><br>
                                    
                                <i>2. HOW DO WE PROCESS YOUR INFORMATION?</i><br>
                                We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, 
                                and to comply with law. We may also process your information for other purposes with your consent.
                                We may process your information as part of our efforts to keep our Services safe and secure, including fraud monitoring and prevention.<br><Br>

                                <i>3. WHEN AND WITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?</i><br>
                                In Short: We may share information in specific situations described in this section and/or with the following third parties.
                                We may need to share your personal information in the following situations:
                                Business Transfers. We may share or transfer your information in connection with, or during negotiations of, any merger, 
                                sale of company assets, financing, or acquisition of all or a portion of our business to another company.<br><br>
                                
                                <i>4. HOW LONG DO WE KEEP YOUR INFORMATION?</i><br>
                                We keep your information for as long as necessary to fulfill the purposes outlined in this privacy notice unless otherwise required by law.<br><br>
                                
                                <i>5. HOW DO WE KEEP YOUR INFORMATION SAFE?</i><br>
                                We aim to protect your personal information through a system of organizational and technical security measures.
                                We have implemented appropriate and reasonable technical and organizational security measures designed to protect the security 
                                of any personal information we process.<br><br>

                                <i>7. WHAT ARE YOUR PRIVACY RIGHTS?</i><br>
                                You may review, change, or terminate your account at any time.<br><br>
                                
                                <i>8. HOW CAN YOU REVIEW, UPDATE, OR DELETE THE DATA WE COLLECT FROM YOU?</i><br>
                                You have the right to request access to the personal information we collect from you, change that information, or delete it. 
                                To request to review, update, or delete your personal information, please click on link below.<br><br>

                                If you have questions or comments about this notice, you may contact us by click on: <a href="">Contact Us</a>
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