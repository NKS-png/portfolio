<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category = $_POST['category'];

  $targetDir = "uploads/$category/";
  if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
  }

  $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    echo "The file has been uploaded to <strong>$category</strong>!";
    echo "<br><a href='admin.html'>Go back to Admin Panel</a>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
