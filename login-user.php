<?php
    include('connection_db.php');
    //Declare Variables for field values and error messages
    $email = $password = "";
     $email_error = $error = $password_error = $account_error = "";

// Login User Form 
if(isset($_POST["submit"])){

    //Function to clean the submitted data
    function clean_input($field){
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);
        return $field;
    }

    //Assign form field values to variables and also apply clean function
    $email = clean_input($_POST['user_email']);
    $password = clean_input($_POST['user_password']);
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    //Check if all the required fields are submitted
    if(isset($email) && $email != "" && isset($password) && $password != "" ){

        // Check valid email ID with built-in function
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Enter valid Email ID";
        }

        // Check Password Lenght
        if(strlen($password)<8){
            $password_error = "Password Must be more than 8 characters.";
        }

    }
    //If required fields are not submitted then show the error.
    else {
        $error = "You must fill all the fields";
    }

    //If there is no error then insert data
    if( !$error && !$email_error && !$password_error ){
        
        $sql = "SELECT * FROM user_info WHERE user_email = '$email' AND user_password = '$password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user){
            
            // Password is correct, so start a new session
            session_start();
            // Store data in session variables
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["user_name"];
            $_SESSION["email"] = $user["user_email"];
            header("Location: index.php");
        }else{
            $account_error = "Please Enter Currect Detais";
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
                <h1>Welcome Back!</h1>
                <p>Sign in to access your dashboard, Setting and Files</p>

                <!-- Account Form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="account-form">

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="user_email" placeholder="Enter Email.." value="<?php echo $email ?>" >
                    <?php if($email_error) { echo '<span class="error-box">'.$email_error.'</span>'; }  ?>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="user_password" placeholder="Enter Password.." value="<?php echo $password ?>">
                    <?php if($error) { echo '<span class="error-box">'.$error.'</span>'; }
                          if($password_error) { echo '<span class="error-box">'.$password_error.'</span>'; }
                          if($account_error) { echo '<span class="error-box">'.$account_error.'</span>'; }
                     ?>
                </div>
                <div>
                    <input type="checkbox" id="signed-in"> 
                    <label for="signed-in">Keep me Signed In</label>
                </div>
                <div>
                    <button type="submit" name="submit">Sign In</button>
                </div>
                </form>
                <p>Don't have an Account <a href="register-user.php">SignUp</a>
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