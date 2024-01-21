<?php
    session_start();
    include('connection_db.php');

    //Declare Variables for field values and error messages
    $username = $email = $message = "";
    $name_error = $email_error = $error = $message_error = "";

// Register User Form 
if(isset($_POST["submit"])){

    //Function to clean the submitted data
    function clean_input($field){
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);
        return $field;
    }

    //Assign form field values to variables and also apply clean function
    $username = clean_input($_POST['user_name']);
    $email = clean_input($_POST['user_email']);
    $message = clean_input($_POST['user_message']);

    //Check if all the required fields are submitted
    if(isset($username) && $username != "" && isset($email) && $email != "" && isset($message) && $message != "" ){
         
        // Check if field contains only letters and white spaces
        if(!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $name_error = "Enter Valid Name";
        }

        // Check valid email ID with built-in function
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Enter valid Email ID";
        }

        // Check Password Lenght
        if(strlen($message)>500){
            $message_error = "Message Length must not exceet 500 characters.";
        }

    }
    //If required fields are not submitted then show the error.
    else {
        $error = "You must fill all the fields";
    }

    //If there is no error then insert data
    if( !$error && !$name_error && !$email_error && !$message_error){
        
        $sql = "INSERT INTO user_feedback (user_name, user_email, user_message) 
            VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepare_stmt = mysqli_stmt_prepare($stmt, $sql);
        if($prepare_stmt){
            mysqli_stmt_bind_param($stmt, 'sss',$username,$email,$message);
            mysqli_stmt_execute($stmt);
            echo "<script>alert('Feedback Send Successfully');</script>";
        }
        else {
            echo "Error:" . $sql . "" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Panel</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="form-style.css">
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

                    <!-- Support Form -->
                    <div class="new-file">
                        <h1>Support Form</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="document-form">
                            <div>
                                <label for="fu_name">Name</label>
                                <input type="text" placeholder="Enter Name" id="fu_name" name="user_name" value="<?php $username ?>" />
                                    <?php if($name_error) { echo '<span class="error-box">'. $name_error.'</span>'; } ?>
                            </div>
                            <div>
                                <label for="fu_email">Email</label>
                                <input type="email" placeholder="Enter Email" id="fu_email" name="user_email" value="<?php echo $email ?>" >
                                    <?php   if($email_error) { echo '<span class="error-box">'.$email_error.'</span>'; } 
                                    ?>
                            </div>
                            <div>
                                <label for="fu_message">Message</label>
                                <textarea id="fu_message" name="user_message" placeholder="Write a Message..." value="<?php echo $message ?>"></textarea>
                                    <?php   if($error) { echo '<span class="error-box">'.$error.'</span>'; }
                                            if($message_error) { echo '<span class="error-box">'.$message_error.'</span>'; }
                                    ?>
                            </div>
                            <div>
                                <button type="submit" name="submit">Send Feedback</button>
                                <button type="reset">Reset</button>
                            </div>

                        </form>

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