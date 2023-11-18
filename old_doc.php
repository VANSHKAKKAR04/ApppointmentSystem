<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="new.css" rel="stylesheet">

</head>
<body>
<div class="info">
    <div class="form">
        <form action="doc_log.php" method="post">
            <h1>Doctor Login</h1>
        <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
    
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required><br><br>
            
            <button class="btn">SUBMIT</button>   

       
        </form>
        <a href="doctor.html"><button class="btn" type="submit">NEW DOCTOR? REGISTER</button></a>
        </div>
       
     </div>
</body>
</html>
