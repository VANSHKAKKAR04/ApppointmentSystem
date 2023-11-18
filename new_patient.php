
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Search Results</h1>
    <div style="text-align: center;">
        <h1>Patient Information</h1>
        <table border="2px">
        <table border="2px">
    <tr>
        <th>Patient ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Date Of Birth</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Email</th>
    </tr>
<?php 
$con = mysqli_connect('localhost', 'root', '','project__1');
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender= $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$email = $_POST['email'];
$sql = "INSERT INTO patient (first_name, last_name, gender, date_of_birth, contact_number, address,email) VALUES ('$first_name', '$last_name', '$gender', '$date_of_birth', '$contact_number', '$address', '$email')";
$rs = mysqli_query($con, $sql);
$sql = "SELECT * FROM patient";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($con));
}
if($rs)
{

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo'<td>'.   $row['patient_id'] . '</td>';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['date_of_birth'] . '</td>';
        echo '<td>' . $row['contact_number'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
else
{
    echo "error!!";
}
?>
</table>
</body>
</html>