<?php ob_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main style="background:white">
            <div class="container" style="position:relative; top: 100px;">
            <div class="login-form">
                
                <form action="" method="post">
                    <h1>Login</h1>
                    <div class="login_box">
                        <input name="username" type="text" placeholder="Username" required>
                    </div>
                    <div class="login_box">
                        <input name="password" type="password" placeholder="Password" required>
                    </div>
                    
                    <div class="login">
                        <button name="submit" type="submit" >
                            Login
                        </button>
                    </div>
                    <div class='divide'></div>
                    <a href="register.php">register</a>
                </form>
            </div>
            </div>
        </main>
    </body>
</html>
<?php

    include 'connect.php'; 
    if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password =$_POST['password'];

    $sql = "SELECT * FROM data WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);



    if(mysqli_num_rows($result)>0) {
        session_start();
        $rows = mysqli_fetch_array($result);
        $_SESSION['user'] = $rows["username"];
        header("location:index.php");
        exit;
    } else echo "Please check your username or password!";
    }
    ob_end_flush();
?>