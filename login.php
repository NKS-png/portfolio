<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$users = [
  'Nikhil' => '12345678',  // Admin
  'client' => '12345678'   // Normal user
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION['user'] = $username;

    // Redirect based on user type
    if ($username === 'Nikhil') {
      header('Location: admin.html'); // Make sure this file exists
    } else {
      header('Location: user.html');  // Make sure this file exists
    }

    exit;
  } else {
    $error = "Invalid credentials";
  }
}
?>
