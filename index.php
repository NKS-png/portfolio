<?php
session_start();

$users = [
  'Nikhil' => '12345678',  // Admin
  'client' => '12345678'   // User
];

// If already logged in, redirect
if (isset($_SESSION['user'])) {
  if ($_SESSION['user'] === 'Nikhil') {
    header('Location: admin.html');
  } else {
    header('Location: user.html');
  }
  exit;
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION['user'] = $username;
    if ($username === 'Nikhil') {
      header('Location: admin.html');
    } else {
      header('Location: user.html');
    }
    exit;
  } else {
    $error = "Invalid credentials";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Extoll.co</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
  </div>
</body>
</html>
