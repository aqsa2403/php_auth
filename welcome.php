<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.2);
    text-align: center;
    width: 400px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

a.logout-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 25px;
    background: #f44336;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}
a.logout-btn:hover {
    background: #d32f2f;
}
</style>
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
    <p>You are successfully logged in.</p>
    <a class="logout-btn" href="logout.php">Logout</a>
</div>
</body>
</html>