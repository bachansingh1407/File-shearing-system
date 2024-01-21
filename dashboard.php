
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="dashboard-style.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- Dashboard Inner Content -->
    <div class="dashboard-head">

        <!-- Dashboard Head Content -->
        <div class="dh-content">
            <h2>Welcome! <?php echo $_SESSION["username"]; ?></h2>
            <p>Documo is a Platform for store your important Documents, PDFs and Images
                on cloud and when you need then just click on file and download. Our Platfrom
                makes your files more secure and more resticted from any third Party. We can't 
                allow anyone to save and share your files.
            </p>
        </div>
        <img src="head-content-img.svg" alt="" class="dh-img">
    </div>

     <!-- Dashboard Body Content -->
     <div class="dashboard-body">
        <h2>Document(s)</h2>

        <!-- Files List -->
        <?php include("user-files.php"); ?>
    </div>

</body>
</html>

<?php

?>