<?php
if (isset($_POST['submit'])) {
    $targetDir = "upload/";
    $fileName = basename($_FILES["myfile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allowed file types (images)
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowTypes, true)) {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {
            echo "Upload successful.";
            echo "<script>window.location.href='profile.html';</script>";
            exit;
        } else {
            echo "Upload failed.";
        }
    } else {
        echo "Only image files (JPG, JPEG, PNG, GIF) are allowed.";
    }
}
?>
