
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        body{
            
            /* background-size: cover;
            background-repeat: no-repeat;
            background-color:blue; */
        }
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
    <tr>
        <th>Patient ID</th>
        
        <th>First Name</th>
        <th>Last Name</th>
        <th> Doctor ID</th>
        <th> Doctor Name</th>
        <!-- <th>Gender</th>
        <th>Date Of Birth</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Email</th> -->
    </tr>
    <?php 
$con = mysqli_connect('localhost', 'root', '','project__1');

// get the post records
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$patient_id = $_POST['patient_id'];
// $sql = "SELECT * FROM patient";

// $sql = "SELECT patient_id, first_name,  last_name, gender, date_of_birth, contact_number, address, email,  FROM patient where patient_id = $patient_id";
// $sql="SELECT
// P.patient_id,
// P.first_name,
// P.last_name,
// A.doctor_id,
// A.doctor_name
// FROM
// Patients P
// JOIN
// Appointments A ON P.patient_id = A.patient_id
// WHERE
// patient_id=P.patient_id;
// "
$sql = "SELECT
    P.patient_id,
    P.first_name,
    P.last_name,
    A.doctor_id,
    A.doctor_name
FROM
    Patient P
JOIN
    Appointments A ON P.patient_id = A.patient_id
WHERE
    P.patient_id = $patient_id";


$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($con));
}

// if($result)
// {
//     $row = mysqli_fetch_assoc($result);
//         echo '<tr>';
//         echo'<td>'.   $row['P.patient_id'] . '</td>';
//         echo'<td>'.   $row['P.first_name'] . '</td>';
//         echo'<td>'.   $row['P.last_name'] . '</td>';
//         echo'<td>'.   $row['A.doctor_id'] . '</td>';
//         echo'<td>'.   $row['A.doctor_name'] . '</td>';
      
//         echo '</tr>';
    


//     echo '</table>';
// }
// else
// {
//     echo "error!!";
// }
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['patient_id'] . '</td>';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['doctor_id'] . '</td>';
        echo '<td>' . $row['doctor_name'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "error!!";
}

?>   
        </table>
    </div>
</body>
</html>

