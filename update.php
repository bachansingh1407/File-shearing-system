<?php
    session_start();

    include('connection_db.php');

    //Declare Variables for field values and error messages
    $current_name = $new_name = "";
    $current_name_error = $new_name_error = $error = "";

// Update File Form 
if(isset($_POST['submit'])){

    //Function to clean the submitted data
    function clean_input($field){
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);
        return $field;
    }

    //Assign form field values to variables and also apply clean function
    $current_name = clean_input($_POST['current_name']);
    $new_name = clean_input($_POST['new_name']);
    $user_id = $_SESSION['user_id'];

    //Check if all the required fields are submitted
    if(isset($current_name) && $current_name != "" && isset($new_name) && $new_name != "" ){
         
        // Check valid current File name 
        if(!preg_match("/^[a-zA-Z0-9 ]*$/",$current_name)) {
            $current_name_error = "Enter Valid Current Name";
        }

        // Check valid New File name
        if(!preg_match("/^[a-zA-Z0-9 ]*$/",$new_name)) {
            $new_name_error = "Enter valid New Name";
        }
    }
    //If required fields are not submitted then show the error.
    else {
        $error = "You must fill all the fields";
    }

    
    //If there is no error then insert data
    if( !$error && !$current_name_error && !$new_name_error){
        
        $sql = "UPDATE user_files SET file_name = '$new_name' WHERE file_name = '$current_name' AND user_identify = '$user_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Data Updated Successfully');</script>";
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

                    <!-- Add New File Form -->
                    <div class="new-file">
                        <h1>Update File Name</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="document-form">
                            <div>
                                <label for="name">Current Title</label>
                                <input type="text" placeholder="Current Name" id="name" name="current_name" />
                                <?php if($current_name_error) { echo '<span class="error-box">'. $current_name_error.'</span>'; } ?>
                            </div>
                            <div>
                                <label for="new_name">New Title</label>
                                <input type="text" placeholder="New Name" id="new_name" name="new_name" />
                                <?php if($new_name_error) { echo '<span class="error-box">'.$new_name_error.'</span>'; } 
                                          if($error) { echo '<span class="error-box">'.$error.'</span>';}
                                    ?>
                            </div>
                            <div>
                                <button type="submit" name="submit">Update File</button>
                                <button type="reset">Reset</button>
                            </div>

                        </form>

                        <!-- Guidelines Block -->
                        <div class="guidelines-file">
                            <h4>Important Guidelines <sup>*</sup></h4>
                            <ul>
                                <li>&#9679; All Fields are Maindatory.</li>
                            </ul>
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