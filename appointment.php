
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
    <table border="2px">
    <tr>
        <th>Appointment ID</th>
        <th>Patient ID</th>
        <th>Doctor ID</th>
        <th>Doctor Name</th>
        <th>Appointment Date</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>
    <?php 

// database connection code

$con = mysqli_connect('localhost', 'root', '','project__1');

// get the post records
$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$doctor_name = $_POST['doctor_name'];
$appointment_date = $_POST['appointment_date'];
$reason = $_POST['reason'];
$status = $_POST['status'];

// $sql = "SELECT * FROM patient WHERE first_name = '$first_name' AND last_name='$last_name' AND patient_id = '$patient_id'";
// database insert SQL code
$sql = "SELECT * FROM appointments WHERE appointment_date = '$appointment_date' AND doctor_id = '$doctor_id'";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

if (mysqli_num_rows($result)) {
    echo "Appointments are already booked for the selected date. Please choose a different date.";
} 
else {
    $sq="INSERT INTO appointments(patient_id, doctor_id, doctor_name, appointment_date, reason, status)VALUES('$patient_id', '$doctor_id','$doctor_name', '$appointment_date', '$reason', '$status')";
    $rs = mysqli_query($con, $sq);
    $sq="SELECT * FROM appointments";
    $res = mysqli_query($con, $sq);
    echo "Appointments are available for the selected date with the selected doctor. Your appointment is booked!";

    

    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>';
        echo'<td>'  . $row['appointment_id'] . '</td>';
        echo '<td>' . $row['patient_id'] . '</td>';
        echo '<td>' . $row['doctor_id'] . '</td>';
        echo '<td>' . $row['doctor_name'] . '</td>';
        echo '<td>' . $row['appointment_date'] . '</td>';
        echo '<td>' . $row['reason'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
       
        echo '</tr>';
    }


    echo '</table>';
}

?>

</table>
</body>
</html>
