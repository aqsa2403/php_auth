    <?php
include 'db.php';
session_start();

if (isset($_SESSION['name'])) {
    header("Location: welcome.php");
    exit();
}
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $params = array($username, $email, $password);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        header("Location: login.php");
        exit();
    } else {
        die(print_r(sqlsrv_errors(), true));
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
        background: #1976d2;
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
        <h2>Register Now</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button name="submit">Register Now</button>
        </form>
        <p>Already have an account? <a href="./login.php">Login now</a></p>
    </div>

    </body>
    </html>