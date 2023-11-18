
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new.css">
</head>

<body>

    <br>
    <br>
<div class="info">
    <div class="form">
     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button class="btn" type="submit">Login</button>
        

       

     </form>
     <a href="sign_in.html"><button class="btn" type="submit">NEW USER? SIGN IN</button></a>
        </div>
        </div>
</body>

</html>