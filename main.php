<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'Nikhil' && $password === '12345678') {
    header('Location: admin.html');
} elseif ($username === 'client' && $password === '12345678') {
    header('Location: user.html');
} else {
    echo "<script>alert('Invalid credentials'); window.location.href='login.html';</script>";
}
?>
