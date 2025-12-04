<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

function selectionSort(&$arr, $key) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j][$key] < $arr[$minIndex][$key]) {
                $minIndex = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
    }
}

selectionSort($students, 'name');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sorted Student Records</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: lightgray;
    padding: 20px;
    color: black;
}

h2 {
    text-align: center;
    color: skyblue;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    border-radius: 10px;
}

th, td {
    padding: 12px 15px;
    border-bottom: 1px solid gray;
    text-align: left;
}

th {
    background-color: steelblue;
    color: white;
}

tr:hover {
    background-color: whitesmoke;
}
</style>

</head>
<body>

<h2>Sorted Student Records by Name</h2>

<table>
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>USN</th>
    <th>Branch</th>
    <th>Email</th>
    <th>Address</th>
</tr>
</thead>

<tbody>
<?php foreach ($students as $student): ?>
<tr>
    <td><?php echo htmlspecialchars($student['id']); ?></td>
    <td><?php echo htmlspecialchars($student['name']); ?></td>
    <td><?php echo htmlspecialchars($student['usn']); ?></td>
    <td><?php echo htmlspecialchars($student['branch']); ?></td>
    <td><?php echo htmlspecialchars($student['email']); ?></td>
    <td><?php echo htmlspecialchars($student['address']); ?></td>
</tr>
<?php endforeach; ?>
</tbody>

</table>

</body>
</html>