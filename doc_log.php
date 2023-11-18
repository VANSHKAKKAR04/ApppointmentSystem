<?php 

session_start(); 

$sname= "localhost";

$uname= "root";

$password = "";

$db_name = "project__1";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}
if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $pass = validate($_POST['password']);

    if (empty($username)) {

        header("Location: old_doc.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: old_doc.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM doctors WHERE username='$username' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                // $_SESSION['name'] = $row['name'];

                $_SESSION['doctor_id'] = $row['doctor_id'];

                header("Location: home.html");

                exit();

            }else{

                header("Location: old_doc.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: old_doc.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: old_doc.php");

    exit();

}