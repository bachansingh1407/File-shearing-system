<?php
require 'connection_db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="dashboard-style.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
   
<div class="db-files">
<?php
    
      $user_identify = $_SESSION['user_id'];
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM user_files WHERE user_identify = '$user_identify' ORDER BY id DESC");
      ?>
      <?php foreach ($rows as $row) : ?>
            <!-- File(s) -->
            <a href="print-preview.php?id=<?php echo $row["id"] ?>" class="document">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <span><?php echo $row["file_name"]; ?></span>
            </a>
      <?php endforeach; ?>

</div>
</body>
</html>