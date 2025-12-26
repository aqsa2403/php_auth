<?php
include 'db.php';
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name='$username'";
    $res = $conn->query($sql);

    if($res->num_rows>0){
        $row=$res->fetch_assoc();
        if(password_verify($password,$row['password'])){
            $_SESSION['name']=$username;
            header("Location: welcome.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f5f5f5;
    font-family:Arial;
}
.box{
    width:350px;
    background:#fff;
    padding:30px;
    border-radius:8px;
    box-shadow:0 0 15px rgba(0,0,0,0.15);
}
.box h2{
    text-align:center;
    margin-bottom:20px;
}
.box input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:4px;
}
.box button{
    width:100%;
    padding:12px;
    background: #2196f3;;
    border:none;
    color:#fff;
    font-size:16px;
    cursor:pointer;
}
.box button:hover{
    background:#1976D2
}

.box p{
    text-align:center;
    margin-top:15px;
}
.box a{
    color:#f48fb1;
    text-decoration:none;
    font-weight:bold;
}
</style>
</head>
<body>

<div class="box">
    <h2>Login Now</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <button name="submit">Login Now</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register now</a></p>
</div>

</body>
</html>