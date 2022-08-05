<?php 
ob_start();
session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main style="background:white;">
            <div class="container" style="position:relative; top: 100px;">
            <div class='login-form'>
                <form action="add_task.php" method="post">
                    <h1 class="tittle">Task</h1>
                    <div class="login_box">
                        <input name="task" type="text" placeholder="Add task" reqired>
                    </div>
                    
                    <input type='submit' class="button" name="addtask" value='addtask' /> 
</form> 
                    <div class="divide"></div>
                    <h1 class="content">Current task</h1> 
                    <div class="content">

                        <?php
                            include 'connect.php'; 
                            if (!isset($_SESSION['user']) && is_null($_SESSION['user'])) header("location:login.php?error=Please login before working");
                            else {
                            $sql = "SELECT * FROM content";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) 
                                {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo $row["task"]; 
                                    ?>
                                    <form action="delete.php" method="POST">
                                    <button class="remove" type="submit" name="remove" value=<?php echo $row['id']?> >Remove</button>
                                </form>
                                    <br>
                                        
                            <?php
                                    }
                                    }
                                   
                                } 
                                ob_end_flush();
                        ?>
                    </div>  
                        
                        
            </div>
            
            <a href="login.php">log out</a>
    
                

            </div>
        </main>
    </body>
</html>