<?php
require 'connection_db.php';

$file_id = $_GET['id'];
$query = "SELECT * FROM user_files WHERE id = '$file_id'";
$result = $result = mysqli_query($conn, $query);
$file_record = mysqli_fetch_array($result, MYSQLI_ASSOC);
$file_print = "files/". $file_record["file"];

// Function to open and display an image
function displayImage($file_print)
{
    $image_info = getimagesize($file_print);

    if ($image_info) {
        $mime_type = $image_info['mime'];
        header("Content-type: $mime_type");
        readfile($file_print);
    } else {
        echo 'Invalid image file';
    }
}

// Function to open and display a PDF
function displayPDF($file_print)
{
    header('Content-type: application/pdf');
    readfile($file_print);
}

// Function to open and display a DOC file
function displayDOC($file_print)
{
    header('Content-type: application/msword');
    readfile($file_print);
}

// Determine the file type and call the appropriate function
$file_extension = pathinfo($file_print, PATHINFO_EXTENSION);

switch ($file_extension) {
    case 'jpg':
    case 'jpeg':
    case 'png':
        displayImage($file_print);
        break;
    case 'pdf':
        displayPDF($file_print);
        break;
    case 'doc':
    case 'docx':
        displayDOC($file_print);
        break;
    default:
        echo 'Unsupported file type';
        break;
}
mysqli_close($conn);
?>
<script>
    document.addEventListener('keydown',function(event){
        if(event.keyCode === 44 && event.metaKey){
            event.preventDefault();
            alert('Screenshot are not allowed on this page');
        }
    });
    document.addEventListener('keydown', function(e){
        if(e.key === 'PrintScreen' || (e.key === 'Shift' && e.key === 'S')){
            e.preventDefault();
            alert('Screenshot are not allowed on this page');
        }
    });
</script>