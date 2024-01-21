
<?php
    include('connection_db.php');

    //Declare Variables for field values and error messages
    $username = $email = $password = "";
    $name_error = $email_error = $error = $password_error = $email_check_error = "";

// Register User Form 
if(isset($_POST['submit'])){

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
    $password = clean_input($_POST['user_password']);

    //Check if all the required fields are submitted
    if(isset($username) && $username != "" && isset($email) && $email != "" && isset($password) && $password != "" ){
         
        // Check if field contains only letters and white spaces
        if(!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $name_error = "Enter Valid Name";
        }

        // Check valid email ID with built-in function
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Enter valid Email ID";
        }

        // Check Password Lenght
        if(strlen($password)<8){
            $password_error = "Password Must be more than 8 characters.";
        }

        // Email Already Exists
        $sql = "SELECT * FROM user_info WHERE user_email = '$email'";
        $result = mysqli_query($conn,$sql);
        $showError = mysqli_num_rows($result);
        if($showError>0){
            $email_check_error = "Email Already Erists!";
        }
    }
    //If required fields are not submitted then show the error.
    else {
        $error = "You must fill all the fields";
    }

    //If there is no error then insert data
    if( !$error && !$name_error && !$email_error && !$password_error && !$email_check_error){
        
        $sql = "INSERT INTO user_info (user_name, user_email, user_password ) 
            VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepare_stmt = mysqli_stmt_prepare($stmt, $sql);
        if($prepare_stmt){
            mysqli_stmt_bind_param($stmt, 'sss',$username,$email,$password);
            mysqli_stmt_execute($stmt);
            echo "<script>alert('Registered successfully');</script>";
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
    <title>Log In : Account Documo</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="user-account-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- LOGIN MAIN CONTAINER -->
    <section class="account-container">

        <!-- Login Section -->
        <div class="account-access">

            <!-- Header Account Block -->
            <div class="header">
                <a href="#" class="logo">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> 
                    <span>Documo</span>
                </a>
            </div>

            <!-- Acccount Block -->
            <div class="account">
                <h1>Join Us</h1>
                <p>Register yourself to secure your documents.</p>

                <!-- Account Form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="account-form">

                <div>
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="user_name" placeholder="Enter Name" value="<?php echo $username ?>" >
                    <?php if($name_error) { echo '<span class="error-box">'. $name_error.'</span>'; } ?>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="user_email" placeholder="Enter Email" value="<?php echo $email ?>" >
                    <?php if($email_error) { echo '<span class="error-box">'.$email_error.'</span>'; } 
                          if($email_check_error) { echo '<span class="error-box">'.$email_check_error.'</span>';}
                    ?>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="user_password" placeholder="Create Password" value="<?php echo $password ?>" >
                    <?php if($error) { echo '<span class="error-box">'.$error.'</span>'; }
                          if($password_error) { echo '<span class="error-box">'.$password_error.'</span>'; }
                     ?>
                </div>
                <div>
                    <input type="checkbox" id="signed-in"> 
                    <label for="signed-in">Keep me Signed In</label>
                </div>
                <div>
                    <button type="submit" name="submit">Register</button>
                </div>
                </form>
                <p>Already have an Account <a href="login-user.php">SignIn</a>
            </div>

            <!-- CopyRight Block -->
            <div class="copyright">
                <p>CopyRight &copy; 2023 | All Right Reserved</p>
            </div>

        </div>


        <!-- Quote Block -->
        <div class="quote-block">

            <!-- Quote Content -->
            <div class="quote-content">

                <div class="quote">
                    <!-- Content -->
                    <h1>
                    <i class="fa fa-star" aria-hidden="true"></i> &nbsp;
                    <i class="fa fa-star" aria-hidden="true"></i> &nbsp;
                    <i class="fa fa-star" aria-hidden="true"></i> &nbsp;
                    <i class="fa fa-star" aria-hidden="true"></i> &nbsp;
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam at velit 
                        iusto itaque nostrum nulla sequi, aut quisquam quis explicabo vitae 
                        esse voluptatibus atque, quae enim, eaque vero sint est voluptates 
                        ducimus excepturi reprehenderit expedita magnam a? Debitis, culpa 
                        exercitationem.
                    </p>

                    <h2>Kapoor</h2>
                    <span>Cyber Security Expert</span>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
