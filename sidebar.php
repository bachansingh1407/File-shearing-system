<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="sidebar-style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- SIDEBAR SECTION -->
    <div id="sidebar">
    
        <!-- Logo Content -->
        <div class="main-logo">
            <a href="#" class="logo">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i> 
                <span>Documo</span>
            </a>
        </div>

        <!-- Add New Document -->
        <a href="add-document.php" class="new-document">
            <p class="text">Add New<br> Document</p>
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>

        <!-- Main Menu -->
        <div class="menu-bar">

            <ul>
                <li>
                    <a href="index.php">
                        <i class="fa fa-leaf" aria-hidden="true"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="update.php">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <span>Update Files</span>
                    </a>
                </li>
                <li>
                    <a href="delete.php">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        <span>Delete Files</span>
                    </a>
                </li>
                <li>
                    <a href="share-file.php">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                        <span>Share Files</span>
                    </a>
                </li>
                <li>
                    <a href="account-centre.php">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span>Account Centre</span>
                    </a>
                </li>
                <li>
                    <a href="upcoming-version.php">
                        <i class="fa fa-lightbulb-o" aria-hidden="true"></i> 
                        <span>Upcoming Version</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Application Version -->
        <div class="version">
            <p>Version: <span>1.0.0</span></p>
        </div>

    </div>
    
</body>
</html>