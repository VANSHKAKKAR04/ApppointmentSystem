<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database (modify the credentials)
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "project__1";
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $date_of_birth= $_POST["date_of_birth"];
    $contact_number= $_POST["contact_number"];
    $address = $_POST["address"];
    $qualification = $_POST["qualification"];
    $specialization = $_POST["specialization"];
    $experience = $_POST["experience"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Perform basic server-side validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Securely hash the password (you should use a strong hashing library)
   

        // Insert user data into the database
        $sql = "INSERT INTO doctors(username, gender, date_of_birth,contact_number, address, qualification, specialization,experience, email, password) VALUES ('$username','$gender' ,'$date_of_birth','$contact_number','$address','$qualification','$specialization','$experience','$email','$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>
