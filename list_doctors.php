<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        body{
            background-image:
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
        <h1>Doctor Information</h1>
        <table>
            <tr>
                <th>Doctor ID</th>
                <th>Name</th>
                <th>Contact No.</th>
                <th>Specialization</th>
                <th>Qualification</th>
                <th>Experience</th>
            </tr>
            <?php
    // Database connection parameters
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project__1";

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get search criteria from the form
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $qualification = $_POST['qualification'];

    // Build the SQL query based on the entered properties
    $sql = "SELECT * FROM doctors WHERE 1=1";

    if (!empty($name) && !empty($specialization) && !empty($qualification) ) {
        $sql .= " AND username LIKE '%$name%' AND specialization LIKE '%$specialization%' AND qualification LIKE '%$qualification%'";
    } 
    if (!empty($name)&& !empty($specialization) && empty($qualification) ) {
        $sql .= " AND username LIKE '%$name%' AND specialization LIKE '%$specialization%' ";
    } 
    if (!empty($name) && !empty($qualification) && empty($specialization)) {
        $sql .= " AND username LIKE '%$name%' AND qualification LIKE '%$qualification%' ";
    } 
    if (!empty($specialization) && !empty($qualification) && empty($name)) {
        $sql .= " AND qualification LIKE '%$qualification%' AND specialization LIKE '%$specialization%'";
    }  
    if (empty($name) && !empty($specialization) && empty($qualification) ) {
        $sql .= " AND specialization LIKE '%$specialization%'";
    } 
    if (empty($name) && empty($specialization) && !empty($qualification) ) {
        $sql .= " AND qualification LIKE '%$qualification%'";
    } 
    if (!empty($name) && empty($specialization) && empty($qualification) ) {
        $sql .= " AND username LIKE '%$name%'";
    } 
    if( empty($name) && empty($specialization) && empty($qualification)){
        echo "Please enter at least one property to search for doctors.";
        exit;
    }

    // Execute the query
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['doctor_id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['contact_number'] . "</td>";
            echo "<td>" . $row['specialization'] . "</td>";
            echo "<td>" . $row['qualification'] . "</td>";
            echo "<td>" . $row['experience'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No doctors found with the specified criteria.";
    }

    // Close the database connection
    $conn->close();
    ?>
        </table>
    </div>
</body>
</html>

