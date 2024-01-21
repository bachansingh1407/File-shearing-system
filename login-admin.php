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
    $email = clean_input($_POST['admin_email']);
    $password = clean_input($_POST['admin_password']);

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
        
        $sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user){
            
            // Password is correct, so start a new session
            session_start();
            // Store data in session variables
            $_SESSION["admin_name"] = $user["admin_name"];
            $_SESSION["admin_email"] = $user["admin_email"];
            header("Location: admin-dashboard.php");
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
    <title>Admin :LOGIN</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="admin-account-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- Admin Login Container -->
    <section id="admin-form">
        <div class="container">
            <h2>Admin Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-data">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter Email" name="admin_email" value="<?php echo $email ?>"/>
                    <?php if($email_error) { echo '<span class="error-box">'.$email_error.'</span>'; }  ?>
                </div>
                <div class="input-data">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Enter Password" name="admin_password" value="<?php echo $password ?>"/>
                    <?php if($error) { echo '<span class="error-box">'.$error.'</span>'; }
                          if($password_error) { echo '<span class="error-box">'.$password_error.'</span>'; }
                          if($account_error) { echo '<span class="error-box">'.$account_error.'</span>'; }
                     ?>
                </div>
                <div class="input-data">
                    <button type="submit" name="submit">Open Dashboard</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>