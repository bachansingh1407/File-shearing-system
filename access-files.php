<?php
    include('connection_db.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home : Shared Files</title>
    <link rel="stylesheet" type="text/css" href="access-files-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    
    <!-- Header Section -->
    <header id="main-header">
        <div class="left-logo">
            <a href="#" class="logo">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i> 
                <span>Documo</span>
            </a>
        </div>
        <div class="right-time-left">
            <!--<div class="time-left">
                <p><span>10:00</span> Left</p>
            </div>-->
        </div>
    </header>

    <!-- Access Files Dashboard -->
    <section id="files-dashboard">
        <div class="container">
            <div class="all-files">
            <?php
    
                $user_identify = $_SESSION['user_id'];
                $i = 1;
                $rows = mysqli_query($conn, "SELECT * FROM user_files WHERE user_identify = '$user_identify' ORDER BY id DESC");
            
                foreach ($rows as $row) : 
            ?>
                <!-- File(s) -->
                <a href="print-preview.php?id=<?php echo $row["id"] ?>">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span><?php echo $row["file_name"]; ?></span>
                </a>
            <?php endforeach; ?>

            </div>
        </div>
    </section>
</body>
</html>